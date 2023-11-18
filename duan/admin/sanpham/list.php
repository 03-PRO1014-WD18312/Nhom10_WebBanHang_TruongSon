<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            <form action="index.php?act=listsp" method="post">
                <input type="text" name="keyw">
                <select name="iddm" id="">
                    <option value="" selected>Danh Mục</option>
                    <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="clickOK" value="GO">
            </form>
           <table border="1">
           <tr>
                <th></th>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>size</th>
                <th>chat lieu</th>
                <th>Giá</th>
                <th>Image</th>
                <th>View</th>
                <th>quantity</th>
                <th>Comment quantity</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach($listsanpham as $sanpham){
                extract($sanpham);
                $suasp="index.php?act=suasp&&idsp=".$id;
                $hard_delete="index.php?act=hard_delete&&idsp=".$id;
                $soft_delete="index.php?act=soft_delete&&idsp=".$id;
                $hinhpath="../upload/".$img;
                if(is_file($hinhpath)){
                    $hinhpath="<img src='".$hinhpath."' width='100px' heigh='100px'>";
                }else{
                    $hinhpath="no file img!";
                };
                echo '<tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$size.'</td>
                <td>'.$material.'</td>
                <td>'.$price.'</td>
                <td>'.$hinhpath.'</td>
                <td>'.$luotxem.'</td>
                
                <td>'.$soBinhLuan.'</td>
                <td>
                <a href="'.$suasp.'">         <input type="button" value="Sửa">    </a>
                <a href="'.$hard_delete.'">   <input type="button" value="Xóa" onclick="return confirm(\'bạn có chắc chắn muốn xóa\')"> </a>
                <a href="'.$soft_delete.'">   <input type="button" value="Xóa Mềm" onclick="return confirm(\'bạn có chắc chắn muốn xóa\')"> </a>
                </td>
            </tr>';
            } ?>
           
           
            
           </table>
           </div>
           <div class="row mb10 ">
         <a href="index.php?act=dangkyadmin"> <input class="mr20" type="button" value="ĐĂNG KÝ ADMIN"> </a>
         <a href="index.php?act=quanlitaikhoan"> <input class="mr20" type="button" value="QUẢN LÍ TÀI KHOẢN"> </a>
         <a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>