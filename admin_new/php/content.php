<div class="content--header">
    <p>THỐNG KÊ</p>
</div>
<div class="chart--layout">
    <ul class="chart__list">
        <?php
            $control = new control_form();
            $time = getdate(time());
            for($i = 1; $i <= $time['mon']; $i++){
                $soDonHangTheoThang = $control->getSoDonHangTheoThang($i)->fetch_array()[0];
                $soDonHangDaDatTheoThang = $control->getSoDonHangDaDatTheoThang($i)->fetch_array()[0];
                $percent = (double)number_format($soDonHangDaDatTheoThang * 100 / $soDonHangTheoThang, 2);
                echo '
                    <div> <li class="chart--item" style="--percent: '.($percent).'px">'.$percent.'%</li> Tháng'.$i.' </div>
                ';
            }
        ?>
    </ul>
    <p class="chart__text">Biểu đồ các đơn hàng đã bán trong từng tháng / Tổng số đơn hàng trong tháng đó</p>
</div>
<div class="statistical">
    <div class="statistical--one">
        <p class="statistical__text">Top 3 khách hàng <span> đặt </span> hàng nhiều nhất</p>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số lượng đơn đặt hàng</th>
            </tr>
            <?php
                $stt = 1;
                $statistical = new control_form();
                $statistical_result = $statistical->getSoDonHangDaDatCuaKhach();
                while($statistical_row = $statistical_result->fetch_assoc()){
                    $maKhachHang = $statistical->getKhachHangTheoMa($statistical_row['maKhachHang'])->fetch_array();
                    echo '
                        <tr>
                            <td>'.$stt++.'</td>
                            <td>'.$maKhachHang['tenKhachHang'].'</td>
                            <td>'.$statistical_row['quantity'].'</td>
                        </tr>
                    ';
                }
            ?>
        </table>
    </div>
    <div class="statistical--two">
        <p class="statistical__text">Top 3 khách hàng <span> hủy </span> hàng nhiều nhất</p>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số lượng đơn hủy hàng</th>
            </tr>
            <?php
                $stt = 1;
                $statistical = new control_form();
                $statistical_result = $statistical->getSoDonHangDaHuyCuaKhach();
                while($statistical_row = $statistical_result->fetch_assoc()){
                    $maKhachHang = $statistical->getKhachHangTheoMa($statistical_row['maKhachHang'])->fetch_array();
                    echo '
                        <tr>
                            <td>'.$stt++.'</td>
                            <td>'.$maKhachHang['tenKhachHang'].'</td>
                            <td>'.$statistical_row['quantity'].'</td>
                        </tr>
                    ';
                }
            ?>
        </table>
    </div>
</div>

<div class="chart--layout">
    <ul class="chart__list">
        <?php
            $control = new control_form();
            $time = getdate(time());
            for($i = 1; $i <= $time['mon']; $i++){
                $tienDonHangTheoThang = $control->getTienDonHangTheoThang($i)->fetch_array()[0];
                $tienDonHangDaDatTheoThang = $control->getTienDonHangDaDatTheoThang($i)->fetch_array()[0];
                $percent = (double)number_format($tienDonHangDaDatTheoThang * 100 / $tienDonHangTheoThang, 2);
                echo '
                    <div> <li class="chart--item" style="--percent: '.($percent).'px">'.$tienDonHangDaDatTheoThang.'</li> Tháng'.$i.' </div>
                ';
            }
        ?>
    </ul>
    <p class="chart__text">
        Biểu đồ doanh thu theo tháng / Tổng số đơn hàng tháng đó (ĐV: Đồng)
    </p>
</div>