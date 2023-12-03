<div class="xem">
    <div><h1 style="color: red;">Cảm Ơn, Quý Khách Đã Đặt Hàng</h1></div>
    <?php
    if(isset($bill)&&(is_array($bill))){
        extract($bill);
    }
    ?>
    <div class="xem5">Thông Tin Đơn Hàng</div>
    <div class="xem1">
        <li>Mã Đơn Hàng: DAM<?=$bill['id']?></li> 
        <li>Ngày Đặt Hàng: <?=$bill['ngaydathang']?></li>
        <li>Tổng Đơn Hàng: <?=$bill['total']?></li>
        <li>Phương Thức Thanh Toán: <?=$bill['bill_pttt']?></li>
    </div>
    <div class="xem2">
        <div>THông Tin Đặt Hàng</div>
        <div class="xem3">
            <table border="1">
                <tr>
                    <td>Người Đặt Hàng</td>
                    <td><?=$bill['bill_name']?></td>
                </tr>
                <tr>
                    <td>Dịa Chỉ</td>
                    <td><?=$bill['bill_address']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$bill['bill_email']?></td>
                </tr>
                <tr>
                    <td>Số Điẹn Thoại</td>
                    <td><?=$bill['bill_tel']?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="xem4">
        <div>Chi Tiết Giỏ Hàng</div>
        <div class="xem5">
            <table border="1">
                <?php
                bill_chi_tiet($billct);
                ?>
            </table>
        </div>
</div>
</div>
