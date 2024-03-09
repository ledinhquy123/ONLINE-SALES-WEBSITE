<!DOCTYPE html>
<?php
    require_once("../controler/control_form.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>ĐỒ ĂN NHANH</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <?php  
                session_start();
                if(isset($_SESSION["account"])){
                    include_once("header_accept.php");
                }else include_once("header.php");
            ?>
        </div>

        <div class="about">
            <?php include_once("content.php") ?>
        </div>

        <div class="footer--container">
            <?php include_once("footer.php") ?>
        </div>

        <div class="modal">
            <?php include_once("modal.php") ?>
        </div>
    </div>

    <script src="../js/web.js"></script>
</body>

</html>
