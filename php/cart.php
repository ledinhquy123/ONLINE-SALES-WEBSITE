<!DOCTYPE html>
<?php
    require_once("../controler/control_form.php");
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>GIỎ HÀNG</title>
    <style>
        .promotion{
            min-height: 100px;
            padding: 40px 0;
        }
        .promotion__child{
            display: inline-block;
            padding: 0 8px;
        }
        h1{
            color: red;
            text-align: center;
        }
        .promotion .cart--list{
            width: 100vw;
            list-style: none;
            display: flex;
            flex-direction: column;
        }
        .cart--list .cart__total{
            width: 94vw;
            background-color: #fff;
            margin: 8px auto;
            min-height: 100px;
            display: flex;
            text-align: center;
            align-items: center;
        }
        .cart__total .cart--desc{
            flex-basis: 70%;
        }
        .cart--desc p{
            font-size: 18px;
            font-weight: bold;
        }
        .cart__total .btn--buy{
            flex-basis: 30%;
        }
        .btn--buy a{
            text-decoration: none;
            background-color: rgba(236, 77, 77, 0.945);
            color: #fff;
            padding: 8px 16px;
            border: none;
        }
        .cart--list .cart__item{
            min-height: 50px;
            background-color: #fff;
            border: 1px solid #0cc;
            display: flex;
            margin: 4px 8px;
        }
        .cart__item .image{
            flex-basis: 30%;
        }
        .cart__item .info{
            flex-basis: 70%;
            display: flex;
            flex-direction: column;
        }
        .info>div{
            margin: 8px 0;
        }
        .info__desc>div, .info__desc>input{
            padding: 8px 0;
        }
        .info__desc .info__name{
            font-size: 32px;
            color: red;
        }
        .info__desc .info__price{
            font-size: 18px;
        }
        .info .info__icon{
            display: flex;
        }
        .info__icon a{
            text-decoration: none;
            color: #000;
        }
        .info__icon>div{
            background-color: #ccc;
            padding: 2px 4px;
            margin: 0 4px;
            border: 1px solid #0cc;
        }
        .info__desc .btn{
            background-color: #efefef;;
            text-decoration: none;
            border: 1px solid #000;
            color: #000;
            padding: 2px 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <?php  
                if(isset($_SESSION["account"])){
                    include_once("header_accept.php");
                }else include_once("header.php");
            ?>
        </div>

        <div class="about">
            <div class="promotion">
                <h1>Giỏ hàng của <?php
                    if(isset($_SESSION["account"])){
                        echo $_SESSION["account"][0];
                    }else echo "bạn";
                ?></h1>
                <ul class="cart--list">
                    <?php
                        $quantity = 0; $total = 0;
                        if(isset($_SESSION["arr"])){  
                            $quantity = count($_SESSION["arr"]);
                            $temp = array();
                            foreach($_SESSION["arr"] as $value) $temp[$value] = 0;
                            foreach($_SESSION["arr"] as $value){
                                if($temp[$value] == 0) $temp[$value] = 1;
                                else $temp[$value] += 1;
                            }
                            $_SESSION["ans"] = $temp;
                            $control = new control_form();
                            foreach($_SESSION["ans"] as $key=>$value){
                                $row = $control->getTenMenu($key)->fetch_array();
                                $total += $row["donGia"] * $value;
                                echo '
                                    <li class="cart__item">
                                        <div class="image">
                                            <img src="../img/'.$row["maMenu"].'.jpg" width="300" height="200" alt="Ảnh đồ ăn">
                                        </div>
                                        <div class="info">
                                            <div class="info__desc">
                                                <div class="info__name">
                                                    <p>Tên sản phẩm: '.$row["tenMenu"].'</p>
                                                </div>
                                                <div class="info__price">
                                                    <p>Đơn giá: '.number_format($row["donGia"]).' '.$row["donViTinh"].'</p>
                                                </div>
                                                <a class="btn" href="process.php?name='.$row["tenMenu"].'">Mua hàng</a>
                                                <a class="btn" href="process.php?name='.$row["tenMenu"].'&pid=delete">Xóa</a>
                                            </div>
                                            <div class="info__icon">
                                                <div class="quantity">'.$value.'</div>
                                                <div class="icon--plus">
                                                    <a href="process.php?name='.$row["tenMenu"].'"><i class="ti-plus"></i></a>
                                                </div>
                                                <div class="icon--minus">
                                                    <a href="process.php?name='.$row["tenMenu"].'&pid=1"><i class="ti-minus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                ';
                            }
                        }

                    ?>
                    <?php if(isset($_SESSION["arr"]) && isset($quantity) && isset($total)){
                        echo '
                            <div class="cart__total">
                                <div class="cart--desc">
                                    <p>Số mặt hàng: '.count($_SESSION["ans"]).'</p>
                                    <p>Số lượng sản phẩm:'. $quantity.'</p>
                                    <p>Tổng tiền: '.number_format($total).' đồng</p>
                                </div>
                                <div class="btn--buy">
                                    <a href="order.php?type=1">Thanh toán</a>
                                </div>
                            </div>
                        ';
                    }
                    ?>
                </ul>
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
