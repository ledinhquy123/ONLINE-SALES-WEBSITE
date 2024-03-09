<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_css.css">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>CHI NHÁNH</title>
        <?php
            $control = new control_form();
            if(isset($_GET['delete'])){
                $control->deleteKhachHang($_GET['delete']);
            }
        ?>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php include_once("../php/header.php") ?>
            </div>

            <div class="content">
                <p>Quán Lí Khách Hàng</p>
                <table>
                    <tr>
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Điểm tích lũy</th>
                    </tr>
                    <?php
                        $result = $control->getKhachHang();
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td>'.$row['maKhachHang'].'</td>
                                    <td>'.$row['tenKhachHang'].'</td>
                                    <td>'.$row['ngaySinh'].'</td>
                                    <td>'.$row['diaChi'].'</td>
                                    <td>'.$row['dienThoai'].'</td>
                                    <td>'.$row['diemTichLuy'].'</td>
                                    <td> <a href="update.php?update='.$row['maKhachHang'].'"> Sửa </a> </td>
                                    <td> <a href="show.php?delete='.$row['maKhachHang'].'"> Xóa </a> </td>
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