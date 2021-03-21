<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <?php require('header.php') ?>
    <div class="main-content">
        <div class="container">
            <div class="bs">
                <span class="bsl">
                    <h2>We offer</h2>
                    <h1>Most <br> <span style="color:#7162f5">Simplified <br>Banking Services </span></h1><br>
                    <button class="app-button view-customers">View customers</button>
                    <button class="app-button transfer-money">Transfer money</button><br><br>
                    <button class="app-button transaction-history">Transaction history</button>
                </span>
                <img src="./images/services.png" alt="" width="40%" height="30%">
            </div>
        </div>
    </div>
    <?php require('footer.php') ?>
    <script>
        document.getElementsByClassName('view-customers')[0].addEventListener("click", () => {
            window.location.href = "view-customers.php"
        })
        document.getElementsByClassName('transfer-money')[0].addEventListener("click", () => {
            window.location.href = "transfer-money.php"
        })
        document.getElementsByClassName('transaction-history')[0].addEventListener("click", () => {
            window.location.href = "transaction-history.php"
        })
    </script>
</body>
</html>