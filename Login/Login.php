<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style-login.css">
</head>

<body>
    <div class="login">
        <h2>LOGIN</h2>
        <p>You have not an account?<a href="Register.php" class="form-register">Register</a></p>
        <form action="Process.php" method="post">
            <div class="form-0">
                <div class="form-1">
                    <input type="text" name="userName" placeholder="Tên đăng nhập" class="form-input" required>
                </div>
                <div class="form-1">
                    <input type="password" name="passWord" placeholder="Mật khẩu" class="form-input" required>
                </div>
                <div class="form-3">
                    <button type="submit"><span>LOGIN</span><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>