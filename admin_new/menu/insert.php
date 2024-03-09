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
            if(
                isset($_FILES['file-input']) && isset($_POST['maMenu']) && isset($_POST['tenMenu']) && 
                isset($_POST['donGia']) && isset($_POST['donViTinh']) && isset($_POST['maTheLoai']) &&
                isset($_POST['moTaHinhAnh'])
            ){
                move_uploaded_file($_FILES['file-input']['tmp_name'], '../../img/'.$_POST['maMenu'].'.jpg');
                $control = new control_form();
                $control->setMenu($_POST['maMenu'], $_POST['tenMenu'], $_POST['donGia'], $_POST['donViTinh'], $_POST['maTheLoai'], $_POST['moTaHinhAnh']);
                echo '
                    <script> 
                        alert("Thêm thành công"); window.location.href="show.php";
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
                <p>Thêm Menu</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form__item">
                        <label for="file-input">Ảnh chi nhánh</label>
                        <input type="file" name="file-input" id="file-input">
                    </div>
                    <div class="form__item">
                        <label for="maMenu">Mã menu</label>
                        <input type="text" name="maMenu" id="maMenu" placeholder="mã menu">
                    </div>
                    <div class="form__item">
                        <label for="tenMenu">Tên menu</label>
                        <input type="text" name="tenMenu" id="tenMenu" placeholder="tên menu">
                    </div>
                    <div class="form__item">
                        <label for="donGia">Đơn giá</label>
                        <input type="text" name="donGia" id="donGia" placeholder="đơn giá">
                    </div>
                    <div class="form__item">
                        <label for="donViTinh">Đơn vị tính</label>
                        <input type="text" name="donViTinh" id="donViTinh" placeholder="đơn vị tính">
                    </div>
                    <div class="form__item">
                        <label for="maTheLoai">Mã thể loại</label>
                        <input type="text" name="maTheLoai" id="maTheLoai" placeholder="mã thể loại">
                    </div>
                    <div class="form__item">
                        <label for="moTaHinhAnh">Mô tả hình ảnh</label>
                        <input type="text" name="moTaHinhAnh" id="moTaHinhAnh" placeholder="mô tả hình ảnh">
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