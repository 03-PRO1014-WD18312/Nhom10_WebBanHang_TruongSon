<div class="xem">
    <form action="index.php?act=billconfirm" method="post">
        <div style="text-align: center; color: red;"><h1>Thông Tin Đặt Hàng</h1></div>
        <div class="bill1">
            <table class="bill2">
                <?php
                if(isset($_SESSION['user'])){
                    $name=$_SESSION['name'];
                    $email=$_SESSION['email'];
                    $address=$_SESSION['address'];
                    $tel=$_SESSION['tel'];
                }else{
                    $name="";
                    $email="";
                    $address="";
                    $tel="";
                }
                ?>
                <tr>
                    <td>Người Đặt Hàng</td>
                    <td><input type="text" name="name" value="<?=$name?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?=$email?>"></td>
                </tr>
                <tr>
                    <td>Đia Chi</td>
                    <td><input type="text" name="address" value="<?=$address?>"></td>
                </tr>
                <tr>
                    <td>Số Điện Thoại</td>
                    <td><input type="text" name="tel" value="<?=$tel?>"></td>
                </tr>
            </table>
        </div>
        <div class="bill3">
            <div>Phương Thức Thanh Toán</div>
            <div class="bill4">
                <table class="bill5">
                    <tr>
                        <td><input type="radio" value="1" name="pttt" checked>Tiền Mặt</td>
                        <td><input type="radio" value="2" name="pttt">Chuyển Khoản</td>
                        <td><input type="radio" value="3" name="pttt">tt online</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bill6">
            <div>Thông Tin Giỏ Hàng</div>
            <div class="bill7">
                <table class="bill8">
                    <?php viewcart(0); ?>
                </table>
            </div>
        </div>
        <div class="bill9">
            <input type="submit" value="Đồng Ý Đặt Hàng" name="dongydathang">
        </div>
    </form>
</div>