<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/thongke.php";

    $dsdm = loadall_danhmuc();
    include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "listsp":
                if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
                 $keyw=$_POST['keyw'];
                 $iddm=$_POST['iddm'];
                }else{
                    $keyw="";
                    $iddm=0;
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham($keyw,$iddm);
                include "sanpham/list.php";
                break;
            case "bieudosp":
                
            case "addsp":
                if(isset($_POST['themmoi'])&&$_POST['themmoi']){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $material=$_POST['material'];
                    $size=$_POST['size'];
                    $quantity=$_POST['quantity'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file=$target_dir.basename($_FILES['hinh']['name']);
                    move_uploaded_file($_FILES['hinh']['tmp_name'],$target_file);
                    if(!empty($iddm)&&!empty($tensp)&&!empty($giasp)&&!empty($mota)&&!empty($hinh)&&!empty($material)&&!empty($size)&&!empty($quantity)){  
                        insert_sanpham($tensp,$giasp,$hinh,$mota,$material,$size,$quantity,$iddm);
                        echo "<p style='color:red'>ban da upload anh thanh cong</p>";
                    }else{
                        echo "<p style='color:red'>khong thanh cong</p>";
                    };
                    
                }
                
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/add.php";
                break;  
            
            case "suasp":
                if(isset($_GET['idsp'])&&($_GET['idsp'])>0){
                    $sanpham=loadone_sanpham($_GET['idsp']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update.php";
                break; 

    
            case "updatesp":
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $iddm=$_POST['iddm'];
                    $id=$_POST['id'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $material=$_POST['material'];
                    $size=$_POST['size'];
                    $quantity=$_POST['quantity'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file=$target_dir.basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'],$target_file)){
                        echo " Thành Công ";
                    }else{
                        echo " Lỗi";
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$material,$size,$quantity,$hinh,);
                    $thongbao="Cập Nhật Thành Công";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;
                
            case "hard_delete":
                if(isset($_GET['idsp'])){
                    hard_delete($_GET['idsp']);
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            case "soft_delete":
                if(isset($_GET['idsp'])){
                    soft_delete($_GET['idsp']);
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            case "thongke":

            case "thongkebl":

            case "xoabl":

            case "bieudo":

            case "dangxuat":

            case "dangkyadmin":

            case "quanlitaikhoan":

            case "xoatk":

            case "listbill":

            case "listdm":
                $danhmuc=load_thongke_sanpham_danhmuc();
                include "danhmuc/listdm.php";
                break;
            case "adddm":
                if(isset($_POST['themmoi'])&&$_POST['themmoi']){
                    $name=$_POST['name'];
                    if(!empty($name)){  
                        insert_danhmuc($name);
                        echo "<p style='color:red'>ban da upload anh thanh cong</p>";
                    }else{
                        echo "<p style='color:red'>khong thanh cong</p>";
                    };
                    
                }
                break;
            case "suadm":
                if(isset($_GET['iddm'])&&($_GET['iddm'])>0){
                    $danhmuc=loadone_danhmuc($_GET['iddm']);
                }
                include "danhmuc/update.php";
                break; 
            case "updatedm":
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $name=$_POST['tendm'];
                    $id=$_POST['id'];
                    update_danhmuc($id,$name);
                    $thongbao="Cập Nhật Thành Công";
                }
                $danhmuc=load_thongke_sanpham_danhmuc();
                include "danhmuc/listdm.php";
                break;
            case "delete_dm":
                if(isset($_GET['iddm'])){
                    delete_dm($_GET['iddm']);
                }
                $danhmuc=load_thongke_sanpham_danhmuc();
                include "danhmuc/listdm.php";
                break; 
        }
    }else{
        if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
            $keyw=$_POST['keyw'];
            $iddm=$_POST['iddm'];
           }else{
               $keyw="";
               $iddm=0;
           }
        $listdanhmuc=loadall_danhmuc();
        $listsanpham=loadall_sanpham($keyw,$iddm);
        include "sanpham/list.php";
    }
    include "footer.php";
?>
