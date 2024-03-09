<?php
    require_once("../../controler/control_form.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>ADMIN</title>
        <link rel="stylesheet" href="../css/admin_css.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php include_once("header.php") ?>
            </div>

            <div class="content">
                <?php include_once "content.php" ?>
            </div>

            <div class="footer">
                <?php include "footer.php" ?>
            </div>
        </div>
    </body>
</html>