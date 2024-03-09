<?php
    require_once("connect.php");
    class control_form extends connect{
        function getMenu(){
            $sql = "select * from menu order by maMenu desc";
            return $this->link->query($sql);
        }
        function getTenMenu($tenMenu){
            return $this->link->query("select * from menu where tenMenu like '%$tenMenu%'");
        }

        function setMenu($maMenu, $tenMenu, $donnGia, $donViTinh, $maTheLoai, $moTaHinhAnh){
            $this->link->query("insert into menu values('$maMenu', '$tenMenu', $donnGia, '$donViTinh', '$maTheLoai', '$moTaHinhAnh')");
        }

        function updateMenu($maMenu, $tenMenu, $donGia, $donViTinh, $maTheLoai, $moTaHinhAnh){
            $this->link->query("update menu set 
                tenMenu = '$tenMenu', donGia = $donGia, donViTinh = '$donViTinh',
                maTheLoai = '$maTheLoai', moTaHinhAnh = '$moTaHinhAnh' where maMenu = '$maMenu'"
            );
        }

        function getChiNhanhTheoMa($maChiNhanh){
            return $this->link->query("select * from chi_nhanh where maChiNhanh = '$maChiNhanh'");
        }
        function setChiNhanh($maChiNhanh, $tenChiNhanh, $diaChi, $soDienThoai){
            $this->link->query("insert into chi_nhanh values('$maChiNhanh', '$tenChiNhanh', '$diaChi', '$soDienThoai')");
        }

        function deleteChiNhanh($maChiNhanh){
            $this->link->query("delete from chi_nhanh where maChiNhanh = '$maChiNhanh'");
        }

        function updateChiNhanh($maChiNhanh, $tenChiNhanh, $diaChi, $soDienThoai){
            $this->link->query("update chi_nhanh set
                tenChiNhanh = '$tenChiNhanh',
                diaChi = '$diaChi', soDienThoai = '$soDienThoai' where maChiNhanh = '$maChiNhanh'
            ");
        }
        function getMenuTheoMa($maMenu){
            return $this->link->query("select * from menu where maMenu = '$maMenu'");
        }
        function getMenuGiamDan(){
            return $this->link->query("select * from menu order by maMenu desc");
        }
        function deleteMenu($maMenu){
            $this->link->query("delete from menu where maMenu = '$maMenu'");
        }

        function getTheLoai($theLoai){
            return $this->link->query("select * from menu where maTheLoai like '$theLoai'");
        }

        function getGia($gia){
            return $this->link->query("select * from menu where donGia like $gia");
        }

        function getChiNhanh(){
            return $this->link->query("select * from chi_nhanh order by maChiNhanh desc");
        }

        function setTaiKhoan($userName, $passWord, $fullName, $roleId){
            $this->link->query("insert into tai_khoan (userName, passWord, fullName, roleId)
            values('$userName', '$passWord', '$fullName', '$roleId')");
        }

        function getTaiKhoan($userName, $passWord){
            return $this->link->query("select * from tai_khoan where userName == $userName and passWord == $passWord");
        }

        // Lấy tài khoản theo userName
        function getTaiKhoanFromUserName($userName){
            return $this->link->query("select * from tai_khoan where userName = '$userName'");
        }

        function getTaiKhoan1(){
            return $this->link->query("select * from tai_khoan");
        }
        function getDoAn(){
            return $this->link->query("select * from menu where maTheLoai='TL01' ");
        }
        function getDoUong(){
            return $this->link->query("select * from menu where maTheLoai='TL02' ");
        }
        function getDoTrangMieng(){
            return $this->link->query("select * from menu where maTheLoai='TL03' ");
        }

        function getNhanVien(){
            return $this->link->query("select * from nhan_vien order by maNhanVien");
        }

        function getNhanVienGiamDan(){
            return $this->link->query("select * from nhan_vien order by maNhanVien desc");
        }
        function getNhanVienTheoMa($maNhanVien){
            return $this->link->query("select * from nhan_vien where maNhanVien = '$maNhanVien'");
        }
        function setNhanVien($maNhanVien, $tenNhanVien, $ngaySinh, $queQuan, $gioiTinh, $danToc, $soDienThoai, $chuVu, $luong, $roleId){
            $this->link->query("insert into nhan_vien values ('$maNhanVien', '$tenNhanVien', '$ngaySinh', '$queQuan', '$gioiTinh', '$danToc', '$soDienThoai', '$chuVu', '$luong', '$roleId')");
        }

        function deleteNhanVien($maNhanVien){
            $this->link->query("delete from nhan_vien where maNhanVien = '$maNhanVien'");
        }

        function updateNhanVien($maNhanVien, $tenNhanVien, $ngaySinh, $queQuan, $gioiTinh, $danToc, $soDienThoai, $chucVu, $luong, $roleId){
            $this->link->query("update nhan_vien set
                tenNhanVien = '$tenNhanVien', ngaySinh = '$ngaySinh', queQuan = '$queQuan',
                gioiTinh = '$gioiTinh', danToc = '$danToc', soDienThoai = '$soDienThoai', chucVu = '$chucVu',
                luong = '$luong', roleId = '$roleId' where maNhanVien = '$maNhanVien'
            ");
        }
        function getKhachHang(){
            return $this->link->query("select * from khach_hang order by maKhachHang desc");
        }

        function getKhachHangTheoMa($maKhachHang){
            return $this->link->query("select * from khach_hang where maKhachHang = '$maKhachHang'");
        }
        function setKhachHang($maKhachHang, $tenKhachHang, $ngaySinh, $diaChi, $soDienThoai, $diemTichLuy){
            $this->link->query("insert into khach_hang values ('$maKhachHang', '$tenKhachHang', '$ngaySinh', '$diaChi', '$soDienThoai', '$diemTichLuy')");
        }

        function deleteKhachHang($maKhachHang){
            $this->link->query("delete from khach_hang where maKhachHang = '$maKhachHang'");
        }

        function updateKhachHang($maKhachHang, $tenKhachHang, $ngaySinh, $diaChi, $dienThoai, $diemTichLuy){
            $this->link->query("update khach_hang set 
            tenKhachHang = '$tenKhachHang', ngaySinh = '$ngaySinh', diaChi = '$diaChi',
            dienThoai = '$dienThoai', diemTichLuy = '$diemTichLuy' where maKhachHang = '$maKhachHang'
            ");
        }

        // Đơn hàng
        function setDonHang($maKhachHang, $trangThaiDonHang, $ngayHenGiaoHang, $gioHenGiaoHang){
            $this->link->query("insert into don_hang(maKhachHang, trangThaiDonHang, ngayHenGiaoHang, gioHenGiaoHang) values
                ('$maKhachHang', '$trangThaiDonHang', '$ngayHenGiaoHang', '$gioHenGiaoHang')
            ");
        }

        // Chi tiết đơn hàng
        function setChiTietDonHang($maDonHang ,$tenNguoiNhan, $maMenu, $donGia, $soLuong, $tenMenu){
            $this->link->query("insert into chi_tiet_don_hang values
                ('$maDonHang', '$tenNguoiNhan', '$maMenu', '$donGia', '$soLuong', '$tenMenu',' $donGia * $soLuong');
            ");
        }
        
        // Lấy mã khách hàng từ tài khoản
        function getMaKhachHangFormTaiKhoan($userName){
            return $this->link->query("select * from tai_khoan where userName = '$userName'");
        }

        // Lấy đồ ăn limit
        function getMenuLimit($page){
            $result = ($page - 1) * 8;
            return $this->link->query("select * from menu limit $result, 8");
        }

        // Lấy đồ ăn limit
        function getDoAnLimit($page){
            $result = ($page - 1) * 8;
            return $this->link->query("select * from menu where maTheLoai = 'TL01' limit $result, 8");
        }

        // Lấy đồ uống limit
        function getDoUongLimit($page){
            $result = ($page - 1) * 8;
            return $this->link->query("select * from menu where maTheLoai = 'TL02' limit $result, 8");
        }

        // Lấy đô tráng miêng limit
        function getDoTrangMiengLimit($page){
            $result = ($page - 1) * 8;
            return $this->link->query("select * from menu where maTheLoai = 'TL03' limit $result, 8");
        }

        // Update trạng thái đơn hàng
        function updateDonHang($maDonHang, $trangThaiDonHang){
            $this->link->query("update don_hang set trangThaiDonHang = '$trangThaiDonHang' where maDonHang = '$maDonHang'");
        }

        // Lấy mã đơn hàng
        function getMaDonHang($maKhachHang, $gioHenGiaoHang){
            return $this->link->query("select * from don_hang where maKhachHang = '$maKhachHang' and gioHenGiaoHang = '$gioHenGiaoHang'");
        }

        // Lấy đơn hàng
        function getDonHang(){
            return $this->link->query("select * from don_hang order by maDonHang desc");
        }

        // Lấy chi tiết đơn hàng theo mã đơn hàng
        function getChiTietDonHangFromMaDonHang($maDonHang){
            return $this->link->query("select * from chi_tiet_don_hang where maDonHang = $maDonHang order by maDonHang desc");
        }

        // Xóa tài khoản
        function deleteTaiKhoan($userName){
            $this->link->query("delete form tai_khoan where userName = '$userName'");
        }

        // Cập nhật tài khoản
        function updateTaiKhoan($userName, $passWord, $fullName, $roleId, $maKhachHang){
            $this->link->query("update tai_khoan set 
                passWord = '$passWord', fullName = '$fullName', roleId = '$roleId', maKhachHang = '$maKhachHang'
                where userName = '$userName'
            ");
        }

        // Tăng điểm tích lũy
        function setDiemTichLuy($maKhachHang, $diemTichLuy){
            $this->link->query("update khach_hang set diemTichLuy = '$diemTichLuy' where maKhachHang = '$maKhachHang'");
        }

        // Lấy ra số đơn hàng
        function getSoDonHang(){
            return $this->link->query("SELECT COUNT(*) FROM don_hang");
        }

        // Lấy số đơn hàng theo tháng
        function getSoDonHangTheoThang($thang){
            return $this->link->query("select count(*) from don_hang where month(ngayHenGiaoHang) = '$thang'");
        }

        function getSoDonHangDaDatTheoThang($thang){
            return $this->link->query("select count(*) from don_hang where month(ngayHenGiaoHang) = '$thang' and trangThaiDonHang = 'Đã đặt'");
        }
        // Lấy ra số đơn hàng đã đặt
        function getSoDonHangDaDat(){
            return $this->link->query("select count(*) from don_hang where trangThaiDonHang = 'Đã đặt'");
        }

        // Lấy ra số đơn hàng đã hủy
        function getSoDonHangDaHuy(){
            return $this->link->query("select count(*) from don_hang where trangThaiDonHang = 'Đã hủy'");
        }

        // Lấy ra số đơn hàng đã đặt cho từng khách hàng
        function getSoDonHangDaDatCuaKhach(){
            return $this->link->query("SELECT maKhachHang, COUNT(*) as quantity FROM don_hang WHERE trangThaiDonHang = 'Đã đặt' GROUP BY maKhachHang ORDER BY quantity DESC LIMIT 0, 3");
        }

        // Lấy ra số đơn hàng đã hủy cho từng khách hàng
        function getSoDonHangDaHuyCuaKhach(){
            return $this->link->query("SELECT maKhachHang, COUNT(*) as quantity FROM don_hang WHERE trangThaiDonHang = 'Đã hủy' GROUP BY maKhachHang ORDER BY quantity DESC LIMIT 0, 3");
        }

        // Tổng tiền đơn hàng đã đặt theo tháng
        function getTienDonHangDaDatTheoThang($thang){
            return $this->link->query("SELECT SUM(chi_tiet_don_hang.thanhTien) FROM don_hang, chi_tiet_don_hang WHERE trangThaiDonHang = 'Đã đặt' AND month(ngayHenGiaoHang) = '$thang' AND don_hang.maDonHang = chi_tiet_don_hang.maDonHang");
        }

        // Tổng số tiền đơn hàng theo tháng
        function getTienDonHangTheoThang($thang){
            return $this->link->query("SELECT SUM(chi_tiet_don_hang.thanhTien) FROM don_hang, chi_tiet_don_hang WHERE month(ngayHenGiaoHang) = '$thang' AND don_hang.maDonHang = chi_tiet_don_hang.maDonHang");
        }
    }
?>