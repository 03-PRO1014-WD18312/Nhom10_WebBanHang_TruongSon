<?php
include "../model/taikhoan.php";
if(isset($_SESSION['role'])&&($_SESSION['role']==1)){
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/thongke.php";
include "../model/binhluan.php";
include "../model/cart.php";
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
                $listsanpham=loadall_sanpham();
                include "sanpham/bieudo.php";
                break;
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
                        echo "<p style='color:red'>ban da them moi thanh cong</p>";
                    }else{
                        echo "<p style='color:red'>thiếu trường dữ liệu</p>";
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
                    $giacu=$_POST['oldgiasp'];
                    $mota=$_POST['mota'];
                    $material=$_POST['material'];
                    $size=$_POST['size'];
                    $quantity=$_POST['quantity'];
                    if(!empty($_FILES['hinh']['name'])){
                    $hinh=$_FILES['hinh']['name'];
                    }else{
                        $hinh=$_POST['hinhcu'];
                    }
                    $target_dir="../upload/";
                    $target_file=$target_dir.basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'],$target_file)){
                        echo " Thành Công ";
                    }else{
                        echo "";
                    }
                    if(!empty($iddm)&&$iddm!=""&&!empty($tensp)&&$tensp!=""&&!empty($giasp)&&$giasp!=""&&!empty($mota)&&$mota!=""&&!empty($material)&&$material!=""&&!empty($size)&&$size!=""&&!empty($quantity)&&$quantity!=""){
                    update_sanpham($id,$iddm,$tensp,$giasp,$giacu,$mota,$material,$size,$quantity,$hinh);
                    $thongbao="Cập Nhật Thành Công";
                    $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                    }else{
                        echo "bạn đã nhập thiếu trường dữ liệu";
                        if(isset($_GET['idsp'])&&($_GET['idsp'])>0){
                            $sanpham=loadone_sanpham($_GET['idsp']);
                        }
                        $listdanhmuc=loadall_danhmuc();
                        include "sanpham/update.php";
                    }
                }
                
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
                $dsthongke=load_thongke_sanpham_danhmuc();
                include "thongke/list.php";
                break;
            case "thongkebl":
                $dsthongkebl=load_thongke_binhluan();
                include "thongke/thongkebl.php";
                break;
            case "xoabl":
                if(isset($_GET['id'])){
                    delete_binhluan($_GET['id']);
                }
                $dsthongkebl=load_thongke_binhluan();
                header("location:index.php?act=thongkebl");
                break;
            case "bieudo":
                $dsthongke=load_thongke_sanpham_danhmuc();
                include "thongke/bieudo.php";
                break; 
            case "dangkyadmin":
                if(isset($_POST['dangky'])){
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    insert_taikhoanadmin($email,$user,$pass);
                    $thongbao="dang ky thanh cong";
                }
                include "sanpham/dangky.php";
                break;
            case "quanlitaikhoan":
                $dsthongketk=load_thongke_taikhoan();
                include "thongke/thongketk.php";
                break;
            case "xoatk":
                if(isset($_GET['id'])){
                    delete_taikhoan($_GET['id']);
                }
                $dsthongketk=load_thongke_taikhoan();
                header("location:index.php?act=quanlitaikhoan");
                break;
            case "listbill":
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST["kyw"];
                }else{
                    $kyw="";
                }
                $listbill=loadall_bill($kyw,0);
                include "bill/listbill.php";
                break;
            case "suabill":
                    if(isset($_GET['idbill'])&&($_GET['idbill'])>0){
                        $bill=loadone_bill($_GET['idbill']);
                    }
                    include "bill/update.php";
                    break; 
            case "updatebill":
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $bill_status=$_POST['bill_status'];
                        $id=$_POST['id'];
                        update_bill($id,$bill_status);
                        $thongbao="Cập Nhật Thành Công";
                    }
                    $listbill=loadall_bill("",0);
                    include "bill/listbill.php";
                    break;
            case "listdm":
                $danhmuc=load_thongke_sanpham_danhmuc();
                include "danhmuc/listdm.php";
                break;
            case "adddm":
                if(isset($_POST['themmoi'])&&$_POST['themmoi']){
                    $name=$_POST['name'];
                    if(!empty($name)){  
                        insert_danhmuc($name);
                        echo "<p style='color:red'>ban da them danh muc thanh cong</p>";
                    }else{
                        echo "<p style='color:red'>vui long dien ten danh muc</p>";
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
            case "dangxuat":
                dangxuat();
                // include "view/home.php";
                header("location:../index.php");
                break;
            case "chitietbill":
                if(isset($_GET['idbill'])&&($_GET['idbill'])>0){
                    $chitietbill=loadall_sanpham_bill($_GET['idbill']);
                }
                include "bill/chitietbill.php";
                break; 
                
        }
    }else{
        $dsthongke=load_thongke_sanpham_danhmuc();
        $listsanpham=loadall_sanpham();
        include "home.php";
    }
    include "footer.php";
}else{
    echo "<div style='text-align:center;color:red'><h1>you don't have permission</h1></div>";
}

?>
