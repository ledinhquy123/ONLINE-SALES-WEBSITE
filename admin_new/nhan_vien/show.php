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
            $control = new control_form();
            if(isset($_GET['delete'])){
                $control->deleteNhanVien($_GET['delete']);
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
                <p>Quán Lí Nhân Viên</p>
                <table>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Tên nhân viên</th>
                        <th>Ngày sinh</th>
                        <th>Quê quán</th>
                        <th>Giới tính</th>
                        <th>Dân tộc</th>
                        <th>Số điện thoại</th>
                        <th>Chức vụ</th>
                        <th>Lương</th>
                        <th>RoleId</th>
                        <th><a href="insert.php"> Thêm </a></th>
                    </tr>
                    <?php
                        $result = $control->getNhanVienGiamDan();
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td>'.$row['maNhanVien'].'</td>
                                    <td>'.$row['tenNhanVien'].'</td>
                                    <td>'.$row['ngaySinh'].'</td>
                                    <td>'.$row['queQuan'].'</td>
                                    <td>'.$row['gioiTinh'].'</td>
                                    <td>'.$row['danToc'].'</td>
                                    <td>'.$row['soDienThoai'].'</td>
                                    <td>'.$row['chucVu'].'</td>
                                    <td>'.$row['luong'].'</td>
                                    <td>'.$row['roleId'].'</td>
                                    <td> <a href="update.php?update='.$row['maNhanVien'].'"> Sửa </a> </td>
                                    <td> <a href="show.php?delete='.$row['maNhanVien'].'"> Xóa </a> </td>
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