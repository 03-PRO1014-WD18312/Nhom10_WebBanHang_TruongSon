<div>
    <div style="text-align: center;">
        <h1 >Danh Sách Đơn Hàng</h1>
    </div>
    <form class="formlist" action="index.php?act=listbill" method="post">
        <input type="text" name="kyw" placeholder="nhap ma don hang" style="border-radius: 10px;">
        <input type="submit" name="listok" value="Tìm Kiếm">
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
            $countsl=0;
            foreach($countsp as $count){
                $countsl+=$count['soluong'];
            }
            $ttdh=get_ttdh($bill_status);
            echo '<tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>DAM-'.$id.'</td>
            <td>'.$kh.'</td>
            <td>'.$countsl.'</td>
            <td>'.$total.'</td>
            <td>'.$ttdh.'</td>
            <td>'.$ngaydathang.'</td>
            <td>
            <a href="index.php?act=suabill&&idbill='.$id.'"><input type="button" value="Sửa"></a>
            <a href="index.php?act=chitietbill&&idbill='.$id.'"><input type="button" value="Xem Chi Tiết"></a>
             </td>
                </tr>';
        }
        ?>
        
    </table>
</div>