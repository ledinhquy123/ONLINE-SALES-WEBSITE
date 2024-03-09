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
    <title>CHI TIẾT SẢN PHẨM</title>
    <style>
        .promotion{
            padding-top: 50px;
        }

        .promotion__child--two{
            padding: 15px;
            background-color: #fff;
            line-height: 1.4;
        }

        .title{
            font-size: 32px;
            color: red;
        }
        .promotion .btn{
            background-color: #ccc;
            text-decoration: none;
            color: #000;
            padding: 2px 4px;
            border: 1px solid #000;
        }
        
    </style>
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
            <div class="promotion">
                <?php
                    if(isset($_GET["pid"])){
                        $control = new control_form();
                        $result = $control->getTenMenu($_GET["pid"]);
                        if($result->num_rows > 0){
                            $cnt = 1;
                            while($row = $result->fetch_assoc()){
                                echo '
                                    <div class="promotion__child">
                                        <a href="detail.php?pid='. $row["tenMenu"] .'"><img src="../img/' . $row["maMenu"] . '.jpg" width="300" height="200" alt="Ảnh đồ ăn"></a>
                                    </div>
                                    <div class="promotion__child--two">
                                        <p class="title"> Thông tin sản phẩm </p>
                                        <p>' . $row["moTaHinhAnh"] .'</p>

                                        <p class="promotion__child--name">Tên đô ăn: ' . $row["tenMenu"] . '</p>
                                        <p class="promotion__child--price">
                                            Giá: ' . $row["donGia"] . 'VNĐ
                                        </p>
                                        <a class="btn" href="process.php?name='.$row["tenMenu"].'">Mua hàng</a>
                                        <a class="btn" href="process.php?name='.$row["tenMenu"].'">Thêm vào giỏ hàng</a>
                                    </div>
                                ';
                            }
                        }
                    }
                ?>
            </div>
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
