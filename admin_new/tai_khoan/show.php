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
            if(isset($_GET['delete'])){
                $control->deleteTaiKhoan($_GET['delete']);
                echo '
                    <script> 
                        alert("Xóa thành công"); window.location.href="show.php";
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
                <p>Quán Lí Tài Khoản</p>
                <table>
                    <tr>
                        <th>UserName</th>
                        <th>PassWord</th>
                        <th>FullName</th>
                        <th>RoleId</th>
                        <th>Mã khách hàng</th>
                    </tr>
                    <?php
                        $result = $control->getTaiKhoan1();
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td>'.$row['userName'].'</td>
                                    <td>'.$row['passWord'].'</td>
                                    <td>'.$row['fullName'].'</td>
                                    <td>'.$row['roleId'].'</td>
                                    <td>'."KH0".$row['maKhachHang'].'</td>
                                    <td> <a href="update.php?update='.$row['userName'].'"> Sửa </a> </td>
                                    <td> <a href="show.php?delete='.$row['userName'].'"> Xóa </a> </td>
                                </tr>
                            ';
                        }
                    ?>
                </table>
            </div>

            <div class="footer">
                <?php include_once("../php/footer.php") ?>
            </div>
        </div>
    </body>
</html>