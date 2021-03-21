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
        $sql = "select * from customers";
        $res = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_all($res, MYSQLI_NUM);
    ?>
    <?php require('header.php') ?>
    <div class="main-content">
        <h1 class="customers-heading">CUSTOMERS</h1>
        <table class="table">
        <thead class="thead">
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Email</th>
            <th scope="col">A/C type</th>
            <th scope="col">Balance</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($arr as $element){
        ?>
            <tr>
                <td><a href=<?php echo "view-customer.php?cust_id=$element[0]"?> ><?php echo $element[1];?></a></td>
                <td><?php echo $element[4];?></td>
                <td><?php echo $element[3];?></td>
                <td><?php echo $element[2];?></td>
                <td><?php echo $element[5];?></td>
                <td>₹&nbsp;<?php echo $element[6];?></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <?php require('footer.php') ?>
</body>
</html>