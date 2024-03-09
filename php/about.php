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
    <title>ĐỒ ĂN NHANH</title>
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

        <div class="our-story">
            <div class="our-story__item--one">
                <div class="our-story__header">
                    Lịch sử hình thành
                </div>
                <div class="our-story__content">
                    Được thành lập vào thời điểm đại dịch Covid 19, chúng tôi đã tận dụng cơ hội của mình để thành lập nên một thương hiệu chuỗi cửa hàng thức ăn nhanh nhằm cung cấp thực phẩm tốt nhất và dịch vụ giao hàng chuyên nghiệp! 
                    Tái hiện đúng định nghĩa về phong cách sống 4.0 tiện lợi, những gì chúng tôi mang đến cho mọi người là đa dạng ẩm thực từ các nền văn hóa đa dạng, cùng với dịch vụ giao hàng thuận lợi và thậm chí còn có cả nơi ăn uống vô cùng thoải mái!
                </div>
            </div>
            <div class="our-story__item--two">
                <div class="our-story__image">
                    <img src="../img/daDang.jpg" alt="Ảnh">
                </div>
                <div class="our-story__desc">
                    <div class="our-story__header">
                        Đa dạng là chìa khóa
                    </div>
                    <div class="our-story__content">
                        Deliany là một chuỗi nhà hàng đa khái niệm, tiện lợi sở hữu các thương hiệu thực phẩm nổi bật từ các nền văn hóa khác nhau! 
                        Nói cách khác, bạn có thể có tất cả các loại thực phẩm bạn yêu thích chỉ trong một đơn đặt hàng!
                    </div>
                </div>
            </div>
            <div class="our-story__item--three">
                <div class="our-story__image">
                    <img src="../img/thuanTien.jpg" alt="Ảnh">
                </div>
                <div class="our-story__desc">
                    <div class="our-story__header">
                        Thuận tiện là chất lượng
                    </div>
                    <div class="our-story__content">
                        Chúng tôi mong muốn cung cấp cho khách hàng những thực phẩm chất lượng tốt nhất trong khi vẫn duy trì trải nghiệm tiện lợi!
                    </div>
                </div>
            </div>
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
