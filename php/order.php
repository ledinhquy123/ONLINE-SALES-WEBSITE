<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['arr']) && empty($_SESSION['arr'])){
        echo '<script> alert("Đơn hàng rỗng"); window.location.href="index.php" </script>';
    }
    require_once("../controler/control_form.php");
    $check = false;
    $tongTien = "";
    $moTa = "";
    $soLuong = "";
    $date = "";
    $time = "";
    $control = new control_form();
    $result = $control->getMaKhachHangFormTaiKhoan($_SESSION['account'][0])->fetch_array();
    if(isset($_POST['date']) && isset($_POST['time']) && $_POST['date'] != "" && $_POST['time'] != ""){
        $date = $_POST['date'];
        $time = $_POST['time'];
        $gio = (int)$time.substr(0, 2);
        $phut = (int)$time.substr(2, 2);
        if(
            $gio * 60 * 60 + $phut * 60 >= 28800 && 
            $gio * 60 * 60 + $phut * 60 <= 79200
        ){
            if(isset($_SESSION['dem'])) ++$_SESSION['dem'];
            $maKhachHang = $result['maKhachHang'];
            $trangThaiDonHang = 'Đang xử lí'; 
            $ngayHenGiaoHang = $_POST['date'];
            $gioHenGiaoHang = $_POST['time'];
            $check = true;
            $control->setDonHang('KH0'.$maKhachHang, $trangThaiDonHang, $ngayHenGiaoHang, $gioHenGiaoHang);
            $maDonHang = $control->getMaDonHang('KH0'.$maKhachHang, $gioHenGiaoHang)->fetch_array();
            echo '<script> confirm("Bạn đã xác nhận thành công") </script>';
        }else{
            echo '<script> 
                    alert("Cửa hàng chỉ giao hàng từ 8h tới 22h");
                    window.location.href="order.php";
                </script>';
        }

    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Đặt hàng</title>

    <style>
        .promotion{
            min-height: 100px;
            padding: 40px 0;
        }
        .promotion__child{
            display: inline-block;
            padding: 0 8px;
        }
        form input[type='submit'], 
        .input h2,
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
        .cart__total table{
            width: 100%;
            min-height: 100px;
        }
        table th{
            border: 1px solid #000;    
        }
        table td{
            border: 1px solid #ccc;
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
        form input[type='submit'],
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

        .cart--list form{
            display: :flex;
            margin: 8px auto;
        }
        form .date, form .time{
            display: inline-block;
            margin: 0px 32px;
        }
        form h2{
            margin-bottom: 16px;
        }
        .info-customer{
            display: flex;
            flex-direction: column;
            background-color: #fff;
            margin: 16px 0;
            border-radius: 5px;
        }
        .info-customer p{
            font-size: 28px;
            color: red;
            font-weight: 600;
            margin: 8px auto;
        }
        .info-customer>div{
            margin: 8px;
            border-bottom: 1px solid #ccc;
        }
        .info-customer>div span{
            font-weight: bold;
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

        <<div class="about">
            <div class="promotion">
                <h1>Đặt hàng</h1>
                <ul class="cart--list">
                    <div class="cart__total">
                        <table>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php
                                $quantity = 0; $total = 0; $cnt = 0;
                                if(isset($_SESSION["arr"])){  
                                    $quantity = count($_SESSION["arr"]);
                                    $soLuong = count($_SESSION["arr"]);
                                    $temp = array();
                                    foreach($_SESSION["arr"] as $value) $temp[$value] = 0;
                                    foreach($_SESSION["arr"] as $value){
                                        if($temp[$value] == 0) $temp[$value] = 1;
                                        else $temp[$value] += 1;
                                    }
                                    $_SESSION["ans"] = $temp;
                                    $control = new control_form();
                                    foreach($_SESSION["ans"] as $key=>$value){
                                        $moTa .= $key . "x" . $value . "; ";
                                        $row = $control->getTenMenu($key)->fetch_array();
                                        $total += $row["donGia"] * $value;
                                        echo '
                                            <tr>
                                                <td>'.++$cnt.'</td>
                                                <td>'.$key.'</td>
                                                <td>'.$value.'</td>
                                                <td>'.number_format($row["donGia"] * $value)." ".$row['donViTinh'].'</td>
                                            </tr>
                                        ';
                                    }
                                    $tongTien = $total;
                                    if($check){
                                        $temp = $control->getKhachHangTheoMa('KH0'.$result['maKhachHang'])->fetch_array();
                                        foreach($_SESSION["ans"] as $key=>$value){
                                            $row = $control->getTenMenu($key)->fetch_array();
                                            $control->setChiTietDonHang($maDonHang['maDonHang'] , $temp['tenKhachHang'], $row['maMenu'], $row["donGia"], $value, $key);
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>

                    <form action="#" method="post">
                        <div class="date">
                            <h2>Hẹn ngày giao hàng</h2>
                            <input type="date" name="date" value="<?=$date?>">
                        </div>
                        <div class="time">
                            <h2>Hẹn giờ giao hàng</h2>
                            <input type="time" name="time" value="<?=$time?>">
                        </div>
                        <div class="info-customer">
                            <?php
                                $info = $control->getKhachHangTheoMa('KH0'.$result['maKhachHang'])->fetch_array();
                                echo '
                                    <p>Xác nhận thông tin khách hàng</p>
                                    <div class="name"> <span> Tên khách hàng: </span>'.$info['tenKhachHang'].'</div>
                                    <div class="phone"> <span> Số điện thoại: </span>'.$info['dienThoai'].'</div>
                                    <div class="address"> <span> Địa chỉ: </span>'.$info['diaChi'].'</div>
                                ';
                            ?>
                        </div>
                        <input type="submit" value="Xác nhận">
                    </form>

                    <div class="cart__total">
                        <div class="cart--desc">
                            <p>Số mặt hàng: <?=count($_SESSION["ans"])?></p>
                            <p>Số lượng sản phẩm: <?=$quantity?></p>
                            <p>Tổng tiền: <?=number_format($total)?> đồng</p>
                        </div>
                        <div class="btn--buy">
                            <a href="order_process.php?type=2&maDonHang=<?=$maDonHang['maDonHang']?>#maKhachHang=<?='KH0'.$result['maKhachHang']?>">Hủy</a>
                        </div>
                        <div class="btn--buy">
                            <a href="order_process.php?type=3&maDonHang=<?=$maDonHang['maDonHang']?>#maKhachHang=<?='KH0'.$result['maKhachHang']?>">Đặt hàng</a>
                        </div>
                    </div>
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
