<div>
    <div style="text-align: center;">
        <h1 >chi tiet Đơn Hàng</h1>
    </div>
    
    <table border="1">
        <tr>
            <th></th>
            <th>Ảnh Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng Mua</th>
        </tr>
        <?php
        foreach($chitietbill as $bill){
            extract($bill);
            $hinh="upload/".$img;
            echo '<tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>'."<img src='".$hinh."' width='100px' heigh='100px'>".'</td>
            <td>'.$name.'</td>
            <td>'.$soluong.'</td>
                </tr>';
        }
        ?>
        
    </table>
    <a href="index.php?act=mybill"><input type="button" value="Quay Lại"></a>
</div>