<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_css.css">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>NHÂN VIÊN</title>
        <?php
            $control = new control_form();
            if(isset($_GET['update'])) $result = $control->getNhanVienTheoMa($_GET['update'])->fetch_array();
            
            if(
                isset($_POST['tenNhanVien']) && isset($_POST['ngaySinh']) && isset($_POST['queQuan']) &&
                isset($_POST['gioiTinh']) && isset($_POST['danToc']) && isset($_POST['soDienThoai']) &&
                isset($_POST['chucVu']) && isset($_POST['luong']) && isset($_POST['roleId'])
            ){
                $maNhanVien = $_GET['update'];
                $tenNhanVien = $result['tenNhanVien'];
                $ngaySinh = $result['ngaySinh'];
                $queQuan = $result['queQuan'];
                $gioiTinh = $result['gioiTinh'];
                $danToc = $result['danToc'];
                $soDienThoai = $result['soDienThoai'];
                $chucVu = $result['chucVu'];
                $luong = $result['luong'];
                $roleId = $result['roleId'];

                if($_POST['tenNhanVien'] != "") $tenNhanVien = $_POST['tenNhanVien'];
                if($_POST['ngaySinh'] != "") $ngaySinh = $_POST['ngaySinh'];
                if($_POST['queQuan'] != "") $queQuan = $_POST['queQuan'];
                if($_POST['gioiTinh'] != "") $gioiTinh = $_POST['gioiTinh'];
                if($_POST['danToc'] != "") $danToc = $_POST['danToc'];
                if($_POST['soDienThoai'] != "") $soDienThoai = $_POST['soDienThoai'];
                if($_POST['chucVu'] != "") $chucVu = $_POST['chucVu'];
                if($_POST['luong'] != "") $luong = $_POST['luong'];
                if($_POST['roleId'] != "") $roleId = $_POST['roleId'];
                $control->updateNhanVien($maNhanVien, $tenNhanVien, $ngaySinh, $queQuan, $gioiTinh, $danToc, $soDienThoai, $chucVu, $luong, $roleId);
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
                <form action="" method="POST">
                    <div class="form__item">
                        <label for="tenNhanVien">Tên nhân viên</label>
                        <?= $result['tenNhanVien'] ?>
                        <input type="text" name="tenNhanVien" id="tenNhanVien" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="ngaySinh">Ngày sinh</label>
                        <?= $result['ngaySinh'] ?>
                        <input type="text" name="ngaySinh" id="ngaySinh" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="queQuan">Quê quán</label>
                        <?= $result['queQuan'] ?>
                        <input type="text" name="queQuan" id="queQuan" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="gioiTinh">Giới tính</label>
                        <?= $result['gioiTinh'] ?>
                        <input type="text" name="gioiTinh" id="gioiTinh" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="danToc">danToc</label>
                        <?= $result['danToc'] ?>
                        <input type="text" name="danToc" id="danToc" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="soDienThoai">Số điện thoại</label>
                        <?= $result['soDienThoai'] ?>
                        <input type="text" name="soDienThoai" id="soDienThoai" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="chucVu">Chức vụ</label>
                        <?= $result['chucVu'] ?>
                        <input type="text" name="chucVu" id="chucVu" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="luong">Luơng</label>
                        <?= $result['luong'] ?>
                        <input type="text" name="luong" id="luong" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="roleId">RoleId</label>
                        <?= $result['roleId'] ?>
                        <input type="text" name="roleId" id="roleId" placeholder="nhập để thay đổi">
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