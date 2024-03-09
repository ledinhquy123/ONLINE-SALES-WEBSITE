<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_css.css">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>TÀI KHOẢN</title>
        <?php
            $control = new control_form();
            if(isset($_GET['update'])) $result = $control->getTaiKhoanFromUserName($_GET['update'])->fetch_array();
            
            if(
                isset($_POST['passWord']) && isset($_POST['fullName']) &&
                isset($_POST['roleId']) && isset($_POST['maKhachHang'])
            ){
                $userName = $_GET['update'];
                $passWord = $result['passWord'];
                $fullName = $result['fullName'];
                $roleId = $result['roleId'];
                $maKhachHang = $result['maKhachHang'];
                if($_POST['userName'] != "") $userName = $_POST['userName'];
                if($_POST['passWord'] != "") $passWord = $_POST['passWord'];
                if($_POST['fullName'] != "") $fullName = $_POST['fullName'];
                if($_POST['roleId'] != "") $roleId = $_POST['roleId'];
                if($_POST['maKhachHang'] != "") $maKhachHang = $_POST['maKhachHang'];
                $control->updateTaiKhoan($userName, $passWord, $fullName, $roleId, $maKhachHang);
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
                <p>Sửa Tài Khoản</p>
                <form action="" method="POST">
                    <div class="form__item">
                        <label for="passWord">PassWord</label>
                        <?= $result['passWord'] ?>
                        <input type="text" name="passWord" id="passWord" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="fullName">FullName</label>
                        <?= $result['fullName'] ?>
                        <input type="text" name="fullName" id="fullName" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="roleId">RoleId</label>
                        <?= $result['roleId'] ?>
                        <input type="text" name="roleId" id="roleId" placeholder="Nhập để thay đổi">
                    </div>
                    <div class="form__item">
                        <label for="maKhachHang">Mã khách hàng</label>
                        <?= $result['maKhachHang'] ?>
                        <input type="text" name="maKhachHang" id="maKhachHang" placeholder="Nhập để thay đổi">
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