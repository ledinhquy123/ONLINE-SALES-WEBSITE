<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <link rel="stylesheet" href="../css/admin_css.css">
        <title>CHI NHÁNH</title>
        <?php
            $control = new control_form();
            if(isset($_GET['update'])) $result = $control->getChiNhanhTheoMa($_GET['update'])->fetch_array();
            
            if(
                isset($_POST['tenChiNhanh']) && isset($_POST['diaChi']) && isset($_POST['soDienThoai'])
            ){
                $maChiNhanh = $result['maChiNhanh'];
                $tenChiNhanh = $result['tenChiNhanh'];
                $diaChi = $result['diaChi'];
                $soDienThoai = $result['soDienThoai'];
                if($_POST['tenChiNhanh'] != "") $tenChiNhanh = $_POST['tenChiNhanh'];
                if($_POST['diaChi'] != "") $diaChi = $_POST['diaChi'];
                if($_POST['soDienThoai'] != "") $soDienThoai = $_POST['soDienThoai'];
                $control->updateChiNhanh($maChiNhanh, $tenChiNhanh, $diaChi, $soDienThoai);
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
                        <label for="tenChiNhanh">Tên chi Nhánh</label>
                        <?=$result['tenChiNhanh'] ?>
                        <input type="text" name="tenChiNhanh" id="tenChiNhanh" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="diaChi">Địa chỉ</label>
                        <?= $result['diaChi'] ?>
                        <input type="text" name="diaChi" id="diaChi" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="soDienThoai">Số điện thoại</label>
                        <?= $result['soDienThoai'] ?>
                        <input type="text" name="soDienThoai" id="soDienThoai" placeholder="Nhập để thay đổi">
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