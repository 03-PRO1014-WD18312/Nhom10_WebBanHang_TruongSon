<div class="row2">
         <div class="row2 font_title">
          <h1>THỐNG KÊ TÀI KHOẢN TRONG DỮ LIỆU</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>ID</th>
                <th>TẢI KHOẢN</th>
                <th>MẬT KHẨU</th>
                <th>EMAIL</th>
                <th>VAI TRÒ</th>
                <th>THAO TÁC</th>
            </tr>
            <?php
            foreach($dsthongketk as $thongke){
                extract($thongke);
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $user ?></td>
                    <td><?php echo $pass ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $role ?></td>
                    <td><a href="index.php?act=xoatk&&id=<?php echo $id;?>">   <input type="button" value="Xóa" onclick="return confirm('bạn có chắc chắn muốn xóa')"> </a></td>
                </tr>
            <?php
            }
            ?>
            
           
            
           </table>
           </div>
          </form>
          <a href="index.php?act=dangkyadmin"> <input class="mr20" type="button" value="ĐĂNG KÝ ADMIN"> </a>
         </div>
        </div>