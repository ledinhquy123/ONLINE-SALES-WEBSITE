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
            if(
                isset($_FILES['file-input']) && isset($_POST['maChiNhanh']) &&
                isset($_POST['tenChiNhanh']) && isset($_POST['diaChi']) && isset($_POST['soDienThoai'])
            ){
                move_uploaded_file($_FILES['file-input']['tmp_name'], '../../img/'.$_POST['maChiNhanh'].'.jpg');
                $control = new control_form();
                $control->setChiNhanh($_POST['maChiNhanh'], $_POST['tenChiNhanh'], $_POST['diaChi'], $_POST['soDienThoai']);
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
                <p>Thêm Chi Nhánh</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form__item">
                        <label for="file-input">Ảnh chi nhánh</label>
                        <input type="file" name="file-input" id="file-input">
                    </div>
                    <div class="form__item">
                        <label for="maChiNhanh">Mã chi Nhánh</label>
                        <input type="text" name="maChiNhanh" id="maChiNhanh" placeholder="mã chi nhánh">
                    </div>
                    <div class="form__item">
                        <label for="tenChiNhanh">Tên chi Nhánh</label>
                        <input type="text" name="tenChiNhanh" id="tenChiNhanh" placeholder="tên chi nhánh">
                    </div>
                    <div class="form__item">
                        <label for="diaChi">Địa chỉ</label>
                        <input type="text" name="diaChi" id="diaChi" placeholder="địa chỉ">
                    </div>
                    <div class="form__item">
                        <label for="soDienThoai">Số điện thoại</label>
                        <input type="text" name="soDienThoai" id="soDienThoai" placeholder="số điện thoại">
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