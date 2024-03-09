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
            if(
                isset($_POST['maNhanVien']) && isset($_POST['tenNhanVien']) && isset($_POST['ngaySinh']) &&
                isset($_POST['queQuan']) && isset($_POST['gioiTinh']) && isset($_POST['danToc']) && 
                isset($_POST['soDienThoai']) && isset($_POST['chucVu']) && isset($_POST['luong']) &&
                isset($_POST['roleId'])
            ){
                $control = new control_form();
                $control->setNhanVien(
                    $_POST['maNhanVien'], $_POST['tenNhanVien'], $_POST['ngaySinh'], $_POST['queQuan'],
                    $_POST['gioiTinh'], $_POST['danToc'], $_POST['soDienThoai'], $_POST['chucVu'],
                    $_POST['luong'], $_POST['roleId']
                );
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
                        <label for="maNhanVien">Mã nhân viên</label>
                        <input type="text" name="maNhanVien" id="maNhanVien" placeholder="mã nhân viên">
                    </div>
                    <div class="form__item">
                        <label for="tenNhanVien">Tên nhân viên</label>
                        <input type="text" name="tenNhanVien" id="tenNhanVien" placeholder="tên nhân viên">
                    </div>
                    <div class="form__item">
                        <label for="ngaySinh">Ngày sinh</label>
                        <input type="text" name="ngaySinh" id="ngaySinh" placeholder="ngày sinh">
                    </div>
                    <div class="form__item">
                        <label for="queQuan">Quê quán</label>
                        <input type="text" name="queQuan" id="queQuan" placeholder="quê quán">
                    </div>
                    <div class="form__item">
                        <label for="gioiTinh">Giới tính</label>
                        <input type="text" name="gioiTinh" id="gioiTinh" placeholder="giới tính">
                    </div>
                    <div class="form__item">
                        <label for="danToc">danToc</label>
                        <input type="text" name="danToc" id="danToc" placeholder="dân tộc">
                    </div>
                    <div class="form__item">
                        <label for="soDienThoai">Số điện thoại</label>
                        <input type="text" name="soDienThoai" id="soDienThoai" placeholder="số điện thoại">
                    </div>
                    <div class="form__item">
                        <label for="chucVu">Chức vụ</label>
                        <input type="text" name="chucVu" id="chucVu" placeholder="chức vụ">
                    </div>
                    <div class="form__item">
                        <label for="luong">Luơng</label>
                        <input type="text" name="luong" id="luong" placeholder="lương">
                    </div>
                    <div class="form__item">
                        <label for="roleId">RoleId</label>
                        <input type="text" name="roleId" id="roleId" placeholder="roleid">
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