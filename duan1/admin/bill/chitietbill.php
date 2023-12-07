<div>
    <div style="text-align: center;">
        <h1 >Chi Tiết Đơn Hàng</h1>
    </div>
    <?php 
        foreach($chitietbill as $bill){
            extract($bill);
            $hinh="../upload/".$img;
            echo'<div class="user-info-table">
        <table><div style="text-align:center;"> <h4>Thông tin người dùng</h4></div>
            <tr>
            <td><strong>id User:</strong></td>
            <td>'.$id.'</td>
            </tr>
            <tr>
                <td><strong>Họ tên:</strong></td>
                <td>'.$nametk.'</td>
            </tr>
            <tr>
                <td><strong>Địa chỉ:</strong></td>
                <td>'.$address.'</td>
            </tr>
            <tr>
                <td><strong>Số điện thoại:</strong></td>
                <td>'.$tel.'</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>'.$email.'</td>
            </tr>
            
        </table>
    </div>
    ';
    break;
        }
    ?>
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
            $hinh="../upload/".$img;
            echo '<tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>'."<img src='".$hinh."' width='100px' heigh='100px'>".'</td>
            <td>'.$name.'</td>
            <td>'.$soluong.'</td>
                </tr>';
        }
        // echo '<div class="ct123" >
        // <h4>Thông tin người dùng</h4>
        // <div class="ct124">'.$nametk.'</div>
        // <div class="ct124">'.$address.'</div>
        // <div class="ct124">'.$tel.'</div>
        // <div class="ct124">'.$email.'</div></div>';
        
        
        ?>
        
    </table>
    <a href="index.php?act=listbill"><input type="button" value="Quay Lại"></a>
</div>