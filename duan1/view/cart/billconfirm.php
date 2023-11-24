<div>
    <div>cam on</div>
    <div>quy khach da dat hang</div>
    <div>thong tin dat hang</div>
    <?php
    if(isset($bill)&&(is_array($bill))){
        extract($bill);
    }
    ?>
    <div>thong tin don hang</div>
    <div>
        <li>ma don hang: DAM<?=$bill['id']?></li> 
        <li>ngay dat hang: <?=$bill['ngaydathang']?></li>
        <li>tong don hang: <?=$bill['total']?></li>
        <li>pttt: <?=$bill['bill_pttt']?></li>
    </div>
    <div>
        <div>thong tin dat hang</div>
        <div>
            <table border="1">
                <tr>
                    <td>nguoi dat hang</td>
                    <td><?=$bill['bill_name']?></td>
                </tr>
                <tr>
                    <td>dia chi</td>
                    <td><?=$bill['bill_address']?></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><?=$bill['bill_email']?></td>
                </tr>
                <tr>
                    <td>sdt</td>
                    <td><?=$bill['bill_tel']?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div>
        <div>chi tiet gio hang</div>
        <div>
            <table border="1">
                <?php
                bill_chi_tiet($billct);
                ?>
            </table>
        </div>
</div>