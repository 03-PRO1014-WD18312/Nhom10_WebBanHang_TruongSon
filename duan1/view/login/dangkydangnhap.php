
<?php    

                if(isset($_SESSION['user'])) {
                    extract($taikhoan);
                   
                    
                    ?>
                    
                    <div class="row2">
                    <div class="row2 font_title">
                     <h1>Thông Tin Tài Khoản</h1>
                    </div>
                    
                    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
                     <div class="row2 mb10">
                      <div class="row2 mb10 form_content_container">
                      <label> Tên nguoi dung</label> <br>
                       <input type="text" name="name" value="<?php echo $name ?>" >
                      </div>
                      <div class="row2 mb10">
                       <label>mat khau</label> <br>
                       <input type="text" name="pass" value="<?php echo $pass ?>" >
                      </div>
                      <div class="row2 mb10">
                       <label>Email</label> <br>
                       <input type="text" name="email" value="<?php echo $email?>" >
                      </div>
                      <div class="row2 mb10">
                       <label>Địa Chỉ</label> <br>
                       <input type="text" name="address" value="<?php echo $address ?>" >
                      </div>
                      <div class="row2 mb10">
                       <label>Số Điện Thoại</label> <br>
                       <input type="text" name="tel" value="<?php echo $tel ?>" >
                      </div>
                      
                      <div class="row mb10 ">
                      <input type="submit" name="updatetk" value="update">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <a href="index.php?act=dangxuat"><input  class="mr20" type="button" value="Đăng Xuất"></a>
                      
                    </form>
                    </div>
                   </div>
                   
                   <?php
                } else{    
                ?>
                
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
                    <?php if(isset($loginMess))
                    {echo $loginMess;} ?>
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
    <?php } ?>