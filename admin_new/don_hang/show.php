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
                $control->deleteChiNhanh($_GET['delete']);
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
                <p>Quản Lí Đơn Hàng</p>
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Ngày hẹn giao hàng</th>
                        <th>Giờ hẹn giao hàng</th>
                    </tr>
                    <?php
                        $result = $control->getDonHang();
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td>'.$row['maDonHang'].'</td>
                                    <td>'.$row['maKhachHang'].'</td>
                                    <td>'.$row['trangThaiDonHang'].'</td>
                                    <td>'.$row['gioHenGiaoHang'].'</td>
                                    <td>'.$row['ngayHenGiaoHang'].'</td>
                                    <td> <a href="detail.php?detail='.$row['maDonHang'].'"> Chi tiết </a> </td>
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