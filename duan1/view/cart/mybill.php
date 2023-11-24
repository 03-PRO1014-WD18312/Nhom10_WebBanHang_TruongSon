<div class="giohang1">
    <div class="giohang2"><h1>Đơn Hàng Của Bạn</h1></div>
    <div class="giohang">
        <table >
            <thead>
            <tr>
                <th>ma don hang</th>
                <th>ngay dat hang</th>
                <th>so luong sp</th>
                <th>thanh tien</th>
                <th>phuong thuc thanh toan</th>
                <th>trang thai</th>
            </tr>
            </thead>
            <?php
                if(is_array($listbill)){
                    foreach($listbill as $bill){
                        $ttdh=get_ttdh($bill["bill_status"]);
                        $countsp=loadall_cart_count($bill['id']);
                        $pttt=get_pttt($bill['bill_pttt']);
                        echo '  <tr>
                                    <th>dam'.$bill['id'].'</th>
                                    <th>'.$bill['ngaydathang'].'</th>
                                    <th>'.$countsp.'</th>
                                    <th>'.$bill['total'].'</th>
                                    <th>'.$pttt.'</th>
                                    <th>'.$ttdh.'</th>
                                </tr>';
                }
            }
            ?>
        </table>
    </div>
</div>