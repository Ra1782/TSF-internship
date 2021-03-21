<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/view-customer.css">
</head>
<body>
    <?php
        require_once("conn.php");
        function filter_cust($cust){
            return $cust[0] == $_GET["cust_id"];
        }
        function filter_rem_cust($cust){
            return $cust[0] != $_GET["cust_id"];
        }
        function map_names($cust){
            return array($cust[0], $cust[1]);
        }
        $sql = "select * from customers";
        $res = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_all($res, MYSQLI_NUM);
        $cust_arr = array_filter($arr, "filter_cust");
        $rec_arr = array_map("map_names", array_filter($arr, "filter_rem_cust"));
    ?>
    <?php require('header.php') ?>
    <div class="main-content">
        <div class="cutomer-contents">
            <div class="customer-info">
                <?php foreach($cust_arr as $elem){?>
                <h2><?php echo "Name: <br><span class='infos' >{$elem[1]}</span><br><br>";?></h2>
                <h2><?php echo "Email: <br><span class='infos' >{$elem[2]}</span><br><br>";?></h2>
                <h2><?php echo "Age: <br><span class='infos' >{$elem[3]}</span><br><br>";?></h2>
                <h2><?php echo "Gender: <br><span class='infos' >{$elem[4]}</span><br><br>";?></h2>
                <h2><?php echo "Account Type: <br><span class='infos' >{$elem[5]}</span><br><br>";?></h2>
                <h2><?php echo "Account Balance: <br><span class='infos' >₹ {$elem[6]}</span><br><br>";?></h2>
                <?php } ?>
            </div>
            <div class="cutomer-transfer">
                <button class="app-button transfer-to-button">Transfer money</button>
                <div id="transfer-money-img">
                    <img src='./images/transfer-money.png' alt=''>
                </div>
                <div class="transfer-to"><br><br>
                    <form action="transfer-money-backend.php?sender=fixed" method="post" class="transfer-form">
                        <div class="tf-elem">
                            <label for="sender">Sender: </label>
                            <input type="text" id="sender" name="sender" disabled="disabled" value="<?php print_r($cust_arr[$_GET["cust_id"]-1][1]) ?>" class="sender" style="cursor: not-allowed;">
                        </div><br>
                        <div class="tf-elem">
                            <label for="receiver">Select receiver: </label>
                            <select name="receiver" id="receiver">
                                <option value="dummy"><-- Select receiver --></option>
                                <?php foreach($rec_arr as $elem){ ?>
                                    <option value="<?php echo $elem[0]?>"><?php echo $elem[1]?></option>
                                <?php } ?>
                            </select><span style="color:red">&nbsp;*</span>
                        </div><br>
                        <div class="tf-elem">
                            <label for="inp_amount">Enter amount: </label>
                            <input type="number" name="inp_amount" placeholder="e.g. 4000 (in ₹)"><span style="color:red">&nbsp;*</span>
                        </div><br>
                        <div class="tf-elem">
                            <label for="inp_message">Enter message: </label><br>
                            <textarea name="inp_message" rows="4" cols="40" placeholder="max 1000 characters allowed"></textarea> 
                        </div><br>
                        <button class="app-button tf-submit" style="width:80%">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('footer.php') ?>
    <script>
        document.getElementsByClassName("transfer-to-button")[0].addEventListener("click", () => {
            document.getElementsByClassName("transfer-to")[0].style.display = "block";
            document.getElementById('transfer-money-img').style.display = 'none';
        })
        document.getElementsByClassName("tf-submit")[0].addEventListener("click", () => {
            document.getElementById('sender').disabled = ""
        })
    </script>
</body>
</html>
