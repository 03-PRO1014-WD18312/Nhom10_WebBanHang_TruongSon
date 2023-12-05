<div class="giohang1">
    <div class="giohang2"><h1>Đơn Hàng Của Bạn</h1></div>
    <div class="giohang">
        <table >
            <thead>
            <tr >
                <th>Mã Đơn Hàng</th>
                <th>Ngày Đặt Hàng</th>
                <th>Số Lượng Sản Phẩm</th>
                <th>Thành Tiền</th>
                <th>Phương Thức Thanh Toán</th>
                <th>Trạng Thái</th>
                <th>THAO TAC</th>
            </tr>
            </thead>
            <?php
                if(is_array($listbill)){
                    foreach($listbill as $bill){
                        $ttdh=get_ttdh($bill["bill_status"]);
                        $countsp=loadall_cart_count($bill['id']);
                        $countsl=0;
                        foreach($countsp as $count){
                            $countsl+=$count['soluong'];
                        }
                        $pttt=get_pttt($bill['bill_pttt']);
                        echo '  <tr>
                                    <th>dam'.$bill['id'].'</th>
                                    <th>'.$bill['ngaydathang'].'</th>
                                    <th>'.$countsl.'</th>
                                    <th>'.$bill['total'].'</th>
                                    <th>'.$pttt.'</th>
                                    <th>'.$ttdh.'</th>
                                    <th><a href="index.php?act=chitietbillnguoidung&&idbill='.$bill['id'].'"><input type="button" value="Xem Chi Tiết"></a></th>
                                </tr>';
                }
            }
            ?>
        </table>
    </div>
</div>