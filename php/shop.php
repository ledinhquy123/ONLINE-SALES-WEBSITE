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
    <link rel="stylesheet" href="../css/about_css.css">
    <title>CHI NHÁNH</title>
    <style>
        .shop--list{
            margin-top: 60px;
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 64px;
        }
        .shop--list h1{
            color: red;
            margin: 32px auto;
        }
        .shop__item{
            flex-basis: 90%;
            margin: 8px auto;
            display: flex;
        }
        .shop__item .image{
            flex: 1;
            margin-right: 32px;
        }
        .image img{
            border-radius: 20px;
        }
        .shop__item .shop--info{
            flex: 3;
            background-color: rgba(240, 103, 103, 0.14);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .shop--info p,
        .shop--info a{
            font-size: 24px;
            color: red;
            font-style: italic;
            line-height: 1.6;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="container">

        <!-- Begin header -->
        <div class="header">
            <?php  
                session_start();
                if(isset($_SESSION["account"])){
                    include_once("header_accept.php");
                }else include_once("header.php");
            ?>
        </div>
        <!-- End header -->

        <!-- Begin content -->
        <div class="shop--list">
            <h1>Hệ thống cửa hàng của chúng tôi</h1>
            <?php
                require_once("../controler/control_form.php");
                $control = new control_form();
                $result = $control->getChiNhanh();   
                if($result->num_rows > 0){
                    $cnt = 1;
                    while($row = $result->fetch_assoc()){
                        echo '
                            <div class="shop__item">
                                <div class="image">
                                    <img src="../img/'. $row["maChiNhanh"] .'.jpg" width="450" height="300" alt="Ảnh cửa hàng">
                                </div>
                                <div class="shop--info">
                                    <p>Tên chi nhánh: '. $row["tenChiNhanh"] .'</p>
                                    <p>Địa chỉ: '. $row["diaChi"] .'</p>
                                    <p> <a href="tel: +84 '. $row["soDienThoai"] .'">Số điện thoại: '. $row["soDienThoai"] .'</a></p>
                                </div>
                            </div>
                        ';
                    }
                }         
            ?>
        </div>

        <!-- End content -->
        
        <!-- Begin footer -->
        <div class="footer--container">
            <?php include_once("footer.php") ?>
        </div>
        <!-- End footer -->

        <!-- Begin modal -->
        <div class="modal">
            <?php include_once("modal.php") ?>
        </div>
        <!-- End modal -->
    </div>

    <script src="../js/web.js"></script>
</body>

</html>
