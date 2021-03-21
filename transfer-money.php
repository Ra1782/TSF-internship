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
        $sql = "select * from customers";
        $res = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_all($res, MYSQLI_NUM);
    ?>
    <?php require('header.php') ?>
    <div class="main-content">
        <h1 class="transfers-heading">TRANSFER MONEY</h1>
        <form action="transfer-money-backend.php?sender=not-fixed" method="post" class="transfer-money">
            <div class="tf-elem">
                <label for="sender">Select sender: </label>
                <select name="sender" id="sender">
                    <option value="dummy"><-- Select sender --></option>
                    <?php foreach($arr as $elem){ ?>
                        <option value="<?php echo $elem[0]?>"><?php echo $elem[1]?></option>
                    <?php } ?>
                </select><span style="color:red">&nbsp;*</span>
            </div><br>
            <div class="tf-elem">
                <label for="receiver">Select receiver: </label>
                <select name="receiver" id="receiver">
                    <option value="dummy"><-- Select receiver --></option>
                    <?php foreach($arr as $elem){ ?>
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
                <textarea name="inp_message" rows="4" cols="60" placeholder="max 1000 characters allowed"></textarea> 
            </div><br>
            <button class="app-button tf-submit" style="width:60%;margin: 0 10%">Send</button>
        </form>
    </div>
    <?php require('footer.php') ?>
</body>
</html>