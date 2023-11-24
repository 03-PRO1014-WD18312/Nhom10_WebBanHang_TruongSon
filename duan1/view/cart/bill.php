<div>
    <form action="index.php?act=billconfirm" method="post">
        <div>thong tin dat hang</div>
        <div>
            <table border="1">
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
                    <td>người đặt hàng</td>
                    <td><input type="text" name="name" value="<?=$name?>"></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="text" name="email" value="<?=$email?>"></td>
                </tr>
                <tr>
                    <td>dia chi</td>
                    <td><input type="text" name="address" value="<?=$address?>"></td>
                </tr>
                <tr>
                    <td>tel</td>
                    <td><input type="text" name="tel" value="<?=$tel?>"></td>
                </tr>
            </table>
        </div>
        <div>
            <div>phuong thuc thanh toan</div>
            <div>
                <table>
                    <tr>
                        <td><input type="radio" value="1" name="pttt" checked>tien mat</td>
                        <td><input type="radio" value="2" name="pttt">chuyen khoan</td>
                        <td><input type="radio" value="3" name="pttt">tt online</td>
                    </tr>
                </table>
            </div>
        </div>
        <div>
            <div>thong tin gio hang</div>
            <div>
                <table border="1">
                    <?php viewcart(0); ?>
                </table>
            </div>
        </div>
        <div>
            <input type="submit" value="dong y dat hang" name="dongydathang">
        </div>
    </form>
</div>