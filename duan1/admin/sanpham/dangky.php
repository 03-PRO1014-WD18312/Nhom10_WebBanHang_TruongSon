<main class="catalog  mb ">

    <div class="boxleft" style="width:100%">

      <div class="box_title">Đăng ký admin</div>
      <div class="box_content form_account">
        <form action="index.php?act=dangkyadmin" method="post">
          <div>
            <p>Email</p>
            <input type="email" name="email" placeholder="email"> 
          </div>
          <div>
            Tên đăng nhập
            <input type="text" name="user"  placeholder="user">
          </div>
        
          <div>
            Mật khẩu
            <input type="password" name="pass"  placeholder="pass">
          </div>
          <input type="submit" value="Đăng ký" name="dangky">
          <input type="reset" value="Nhập lại">
        </form>
        <?php
        if (isset($thongbao)&&$thongbao!="") {
          echo $thongbao;
        } 
        ?>
      </div>

    </div>
    

  </main>