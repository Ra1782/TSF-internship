<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="./css/index.css">
    <style>
        .modal-bg {
            position: fixed;
            width: 100%;
            height: 100vh;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .modal {
            position: relative;
            background-color: white;
            width: 35%;
            height: 55%;
            border: #0b4444 solid 1px;
            border-radius: 10px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <?php
        require_once("conn.php");
        if(isset($_POST['sender']) && isset($_POST['receiver']) && isset($_POST['inp_amount']) && 
        $_POST['sender'] != "" && $_POST['receiver'] != "dummy" && $_POST['inp_amount'] != ""){
            if(!isset($_POST['inp_message']) || $_POST['inp_message'] == ""){
                $message = "-";
            }
            else{
                $message = $_POST['inp_message'];
            }
            date_default_timezone_set('Asia/Kolkata');
            $receiver_id = $_POST['receiver'];
            $sql = "select cust_name from customers where cust_id =". $receiver_id;
            $res = mysqli_query($conn, $sql);
            $temp = mysqli_fetch_all($res, MYSQLI_NUM);
            $receiver = $temp[0][0];
            if($_GET['sender'] == 'fixed'){
                $sender = $_POST["sender"];
                $sql = "select cust_id from customers where cust_name = '$sender'";
                $res = mysqli_query($conn, $sql);
                $temp = mysqli_fetch_all($res, MYSQLI_NUM);
                $sender_id = $temp[0][0];
            }
            else {
                $sender_id = $_POST["sender"];
                $sql = "select cust_name from customers where cust_id = ".$sender_id;
                $res = mysqli_query($conn, $sql);
                $temp = mysqli_fetch_all($res, MYSQLI_NUM);
                $sender = $temp[0][0];
            }
            $amount = $_POST["inp_amount"];
            $date = date("Y-m-d");
            $time = date('H:i:s');

            $sql = "INSERT INTO transfers (tr_sender, tr_receiver, amount, message, date, time) 
                    VALUES ('$sender', '$receiver', $amount, '$message', '$date', '$time')";
            $sql1 = "Update customers set cust_balance = cust_balance - $amount where cust_id = ". $sender_id;
            $sql2 = "Update customers set cust_balance = cust_balance + $amount where cust_id = ". $receiver_id;
            $res = mysqli_query($conn, $sql1);
            $res1 = mysqli_query($conn, $sql2);
            $res2 = mysqli_query($conn, $sql);
            
            if($res && $res1 && $res2){
                echo "
                <div class='modal-bg'>
                    <div class='modal'>
                        <h1>Transaction Successful</h1>
                        <img src='./images/success-tick.png' alt=''>
                        <button class='app-button' id='modal-close'>Ok</button>
                    </div>
                </div>
                <script>
                    document.getElementById('modal-close').addEventListener('click', ()=>{
                        window.location.href = 'view-customers.php'
                    })
                </script>";
            }
            else {
                echo "
                <div class='modal-bg'>
                    <div class='modal'>
                        <h1>Transaction Unsuccessful</h1>
                        <img src='./images/failure-cross.png' alt='' width=50% height=50%>
                        <button class='app-button' id='modal-close'>Ok</button>
                    </div>
                </div>
                <script>
                    document.getElementById('modal-close').addEventListener('click', ()=>{
                        window.location.href = 'view-customers.php'
                    })
                </script>";
            }
        }
    ?>
</body>
</html>