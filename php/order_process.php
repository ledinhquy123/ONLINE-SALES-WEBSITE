<?php
    session_start();
    require_once("../controler/control_form.php");
    $control = new control_form();
    if(isset($_GET["type"]) && isset($_GET["maDonHang"])){
        $control = new control_form();
        $type = $_GET["type"];
        unset($_SESSION["arr"]);

        if($type == 3){
            $control->updateDonHang($_GET["maDonHang"], "Đã đặt");
            $diemTichLuy = $control->getKhachHangTheoMa($_GET['maKhachHang'])->fetch_array();
            // $control->setDiemTichLuy($_GET['maKhachHang'], (int)($diemTichLuy['diemTichLuy']) + 1);
            echo '<script> alert("Đặt hàng thành công"); window.location.href="cart.php"</script>';
        }else if($type == 2){
            $control->updateDonHang($_GET["maDonHang"], "Đã hủy");
            echo '<script> alert("Hủy thành công"); window.location.href="cart.php"</script>';
        }
    }
?>