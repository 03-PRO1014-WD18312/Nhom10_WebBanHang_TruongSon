<div>
    <div style="text-align: center;">
        <h1 >chi tiet Đơn Hàng</h1>
    </div>
    
    <table border="1">
        <tr>
            <th></th>
            <th>anh san pham</th>
            <th>TEN SAN PHAM</th>
            <th>SO LUONG MUA</th>
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
    <a href="index.php?act=mybill"><input type="button" value="thoat"></a>
</div>