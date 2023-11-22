<div class="body" >
    <div class="container1" id="container">
        <div class="form-container sign-in">
            <form action="index.php?act=dangky" method="post">
                <h1>Tạo Tài Khoản</h1>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-solid fa-phone"></i></i></a>
                </div>
                <span>Sử Dụng Tài Khoản</span>
                    <input type="text" placeholder="name" name="user">
                    <input type="text" placeholder="email" name="email">
                    <input type="text" placeholder="mật khẩu" name="pass">
                    <button  type="submit" name="dangky">Tạo</button>
                <div>
                    <?php
                    if (isset($thongbao)){
                        echo $thongbao;
                    }
                    ?>
                </div>
            </form>
        </div>
        <div class="form-container sign-up">
            <form action="index.php?act=dangnhap" method="POST">
                <h1>Đăng Nhập</h1>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-solid fa-phone"></i></i></a>
                </div>
                <span>Sử Dụng Tài Khoản</span>
                    <input type="text" placeholder="name" name="user" >
                    <input type="text" placeholder="mật khẩu" name="pass" >
                    <input type="submit" value="Đăng nhập" name="dangnhap">
                    <a href="index.php?act=quenmk">Bạn Quên Mật Khẩu</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Xin Chào</h1>
                    <p> enter your personal</p>
                    <button class="hiden" id="login">sign-in</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Xin Chào Bạn</h1>
                    <p> Register your personal</p>
                    <button class="hiden" id="Register">sign-up</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="./js/form.js"></script>