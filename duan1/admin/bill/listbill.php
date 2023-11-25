<div>
    <div>
        <h1>danh sach don hang</h1>
    </div>
    <form action="index.php?act=listbill" method="post">
        <input type="text" name="kyw" placeholder="nhap ma don hang">
        <input type="submit" name="listok" value="GO">
    </form>
    <table border="1">
        <tr>
            <th></th>
            <th>MA DON HANG</th>
            <th>KHACH HANG</th>
            <th>SO LUONG HANG</th>
            <th>GIA TRI DON HANG</th>
            <th>TINH TRANG DON HANG</th>
            <th>NGAY DAT HANG</th>
            <th>THAO TAC</th>
        </tr>
        <?php
        foreach($listbill as $bill){
            extract($bill);
            $kh=$bill_name.'
            <br>'.$bill_email.'
            <br>'.$bill_address.'
            <br>'.$bill_tel;
            $countsp=loadall_cart_count($id);
            $ttdh=get_ttdh($bill_status);
            echo '<tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>DAM-'.$id.'</td>
            <td>'.$kh.'</td>
            <td>'.$countsp.'</td>
            <td>'.$total.'</td>
            <td>'.$ttdh.'</td>
            <td>'.$ngaydathang.'</td>
            <td>
            <a href="index.php?act=suabill&&idbill='.$id.'"><input type="button" value="sua"></a>
             </td>
                </tr>';
        }
        ?>
        
    </table>
</div>