<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/view-customers.css">
</head>
<body>
    <?php
        require_once("conn.php");
        $sql = "select tr_sender, tr_receiver, amount, message, date, time from transfers";
        $res = mysqli_query($conn, $sql);
        $temp = mysqli_fetch_all($res, MYSQLI_NUM);
        $arr = array_reverse($temp);
    ?>
    <?php require('header.php') ?>
    <div class="main-content">
        <h1 class="customers-heading">TRANSACTIONS</h1>
        <table class="table">
        <thead class="thead">
            <tr>
            <th scope="col">Sender</th>
            <th scope="col">Receiver</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Message</th>
            <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($arr as $element){
        ?>
            <tr>
                <td><?php echo $element[0];?></td>
                <td><?php echo $element[1];?></td>
                <td><?php echo $element[4];?></td>
                <td><?php echo $element[5];?></td>
                <td><?php echo $element[3];?></td>
                <td><?php echo $element[2];?></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <?php require('footer.php') ?>
</body>
</html>