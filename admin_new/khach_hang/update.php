<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_css.css">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>KHÁCH HÀNG</title>
        <?php
            $control = new control_form();
            if(isset($_GET['update'])) $result = $control->getKhachHangTheoMa($_GET['update'])->fetch_array();
            
            if(
                isset($_POST['tenKhachHang']) && isset($_POST['ngaySinh']) && 
                isset($_POST['diaChi']) && isset($_POST['dienThoai']) && isset($_POST['diemTichLuy'])
            ){
                $maKhachHang = $_GET['update'];
                $tenKhachHang = $result['tenKhachHang'];
                $ngaySinh = $result['ngaySinh'];
                $diaChi = $result['diaChi'];
                $dienThoai = $result['dienThoai'];
                $diemTichLuy = $result['diemTichLuy'];

                if($_POST['tenKhachHang'] != "") $tenKhachHang = $_POST['tenKhachHang'];
                if($_POST['ngaySinh'] != "") $ngaySinh = $_POST['ngaySinh'];
                if($_POST['diaChi'] != "") $diaChi = $_POST['diaChi'];
                if($_POST['dienThoai'] != "") $diaChi = $_POST['dienThoai'];
                if($_POST['diemTichLuy'] != "") $diemTichLuy = $_POST['diemTichLuy'];
                $control->updateKhachHang($maKhachHang, $tenKhachHang, $ngaySinh, $diaChi, $dienThoai, $diemTichLuy);
                echo '
                    <script> 
                        alert("Sửa thành công"); window.location.href="show.php";
                    </script>
                ';
            }
        ?>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php include_once("../php/header.php") ?>
            </div>

            <div class="content">
                <p>Sửa Chi Nhánh</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form__item">
                        <label for="tenKhachHang">Tên khách hàng</label>
                        <?=$result['tenKhachHang'] ?>
                        <input type="text" name="tenKhachHang" id="tenKhachHang" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="ngaySinh">NgaySinh</label>
                        <?= $result['ngaySinh'] ?>
                        <input type="text" name="ngaySinh" id="ngaySinh" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="diaChi">Địa chỉ</label>
                        <?= $result['diaChi'] ?>
                        <input type="text" name="diaChi" id="diaChi" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="dienThoai">Điện thoại</label>
                        <?= $result['dienThoai'] ?>
                        <input type="text" name="dienThoai" id="dienThoai" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="diemTichLuy">Điểm tích lũy</label>
                        <?= $result['diemTichLuy'] ?>
                        <input type="text" name="diemTichLuy" id="diemTichLuy" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <input type="submit" value="Xác nhận">
                    </div>
                </form>
            </div>

            <div class="footer">
                <?php include_once("../php/footer.php") ?>
            </div>
        </div>
    </body>
</html>