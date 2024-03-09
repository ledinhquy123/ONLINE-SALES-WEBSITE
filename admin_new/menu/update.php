<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_css.css">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>MENU</title>
        <?php
            $control = new control_form();
            if(isset($_GET['update'])) $result = $control->getMenuTheoMa($_GET['update'])->fetch_array();
            
            if(
                isset($_POST['tenMenu']) && isset($_POST['donGia']) && isset($_POST['donViTinh']) &&
                isset($_POST['maTheLoai']) && isset($_POST['moTaHinhAnh'])
            ){
                $maMenu = $_GET['update'];
                $tenMenu = $result['tenMenu'];
                $donGia = $result['donGia'];
                $donViTinh = $result['donViTinh'];
                $maTheLoai = $result['maTheLoai'];
                $moTaHinhAnh = $result['moTaHinhAnh'];

                if($_POST['tenMenu'] != "") $tenMenu = $_POST['tenMenu'];
                if($_POST['donGia'] != "") $donGia = $_POST['donGia'];
                if($_POST['donViTinh'] != "") $donViTinh = $_POST['donViTinh'];
                if($_POST['maTheLoai'] != "") $maTheLoai = $_POST['maTheLoai'];
                if($_POST['moTaHinhAnh'] != "") $moTaHinhAnh = $_POST['moTaHinhAnh'];
                $control->updateMenu($maMenu, $tenMenu, $donGia, $donViTinh, $maTheLoai, $moTaHinhAnh);
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
                <p>Sửa Menu</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form__item">
                        <label for="tenMenu">Tên menu</label>
                        <?= $result['tenMenu'] ?>
                        <input type="text" name="tenMenu" id="tenMenu" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="donGia">Đơn giá</label>
                        <?= $result['donGia'] ?>
                        <input type="text" name="donGia" id="donGia" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="donViTinh">Đơn vị tính</label>
                        <?= $result['donViTinh'] ?>
                        <input type="text" name="donViTinh" id="donViTinh" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="maTheLoai">Mã thể loại</label>
                        <?= $result['maTheLoai'] ?>
                        <input type="text" name="maTheLoai" id="maTheLoai" placeholder="nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="moTaHinhAnh">Mô tả hình ảnh</label>
                        <?= $result['moTaHinhAnh'] ?>
                        <input type="text" name="moTaHinhAnh" id="moTaHinhAnh" placeholder="nhập để thay đổi">
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