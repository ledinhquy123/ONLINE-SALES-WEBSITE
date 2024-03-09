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
        ?>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php include_once("../php/header.php") ?>
            </div>

            <div class="content">
                <p>Chi Tiết Đơn Hàng</p>
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Mã menu</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tên menu</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                        $result = $control->getChiTietDonHangFromMaDonHang($_GET['detail']);
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td>'.$row['maDonHang'].'</td>
                                    <td>'.$row['tenNguoiNhan'].'</td>
                                    <td>'.$row['maMenu'].'</td>
                                    <td>'.$row['donGia'].'</td>
                                    <td>'.$row['soLuong'].'</td>
                                    <td>'.$row['tenMenu'].'</td>
                                    <td>'.$row['thanhTien'].'</td>
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