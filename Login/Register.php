<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creat account</title>
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style-register.css">

    <?php
        session_start();
        // $_SESSION['cnt'] = 0;
        require_once("../controler/control_form.php");
        $control = new control_form();
        if(
            isset($_POST["midName"]) && isset($_POST["firstName"]) && 
            isset($_POST["lastName"]) && isset($_POST["userName"]) && 
            isset($_POST["password"]) && isset($_POST["date"]) &&
            isset($_POST["address"]) && isset($_POST["number"])
        ){
            $userName = $_POST["userName"]; $passWord = $_POST["password"]; 
            $fullName = $_POST["firstName"] . " ". $_POST["midName"] . " " . $_POST["lastName"];
            $roleId = "R03";
            $date = $_POST["date"];
            $address = $_POST["address"];
            $number = $_POST["number"];
            if($_POST["password"] == 'admin') $roleId = "R01";
            $control->setTaiKhoan($userName, $passWord, $fullName, $roleId);

            $maKhachHang = $control->getMaKhachHangFormTaiKhoan($userName)->fetch_array();
            $control->setKhachHang('KH0'.$maKhachHang['maKhachHang'], $fullName, $date, $address, $number, 0);
            echo '<script> alert("Đăng kí thành công"); window.location.href="Login.php" </script>';
        }
    ?>
</head>

<body>
    <div class="signup">
        <h2>Register</h2>
        <p>Already have an account?<a href="Login.php" class="form-login">Sign in</a></p>

        <form action="" method="post">
            <div class="form-0">
                <div class="form-1">
                    <input type="text" name="firstName" placeholder="Họ" class="form-input" autofocus required>
                </div>
                <div class=" form-2">
                    <input type="text" name="midName" placeholder="Tên đệm" class="form-input" required>
                    <input type="text" name="lastName" placeholder="Tên" class="form-input" required>
                </div>
                <div class="form-1">
                    <input type="text" name="userName" placeholder="Tên đăng nhập" class="form-input" required>
                </div>
                <!-- <div class="form-1">
                    <input type="email" name="email" placeholder="Email" class="form-input" required>
                </div> -->
                <div class="form-1">
                    <input type="password" name="password" placeholder="Mật khẩu" class="form-input" required>
                </div>
                <div class="form-1">
                    <input type="date" name="date" placeholder="Ngày sinh" class="form-input" required>
                </div>
                <div class="form-1">
                    <input type="text" name="address" placeholder="Địa chỉ" class="form-input" required>
                </div>
                <div class="form-1">
                    <input type="text" name="number" placeholder="Số điện thoại" class="form-input" required>
                </div>
                <div class="form-3">
                    <button type="submit"><span>Sign up</span><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="form-4">
                    <input type="checkbox" id="tox">
                    <label for="tox">I have read and agree to the <a href="#">Terms of Service</a></label>
                </div>
            </div>
        </form>
    </div>

</body>

</html>