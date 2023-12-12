<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "global.php";

    $dsdm = loadall_danhmuc();
    $spnew = loadall_sanpham_home();
    $dstop10 = loadall_sanpham_top10();
    if (!isset($_SESSION["mycart"])){
        $_SESSION["mycart"]=[];
    }
    if (!isset($_SESSION["mycart1"])){
        $_SESSION["mycart1"]=[];
    }
    if (isset($_SESSION["user"])){
        $taikhoan=loadone_taikhoan($_SESSION['iduser']);
    }
    include "view/header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $kyw = $_POST['keyword'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                // $tendm= load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
               
            case "sanphamct":
                if(isset($_POST['guibinhluan'])){
                    if(isset($_SESSION['iduser'])){
                        insert_binhluan($_POST['idpro'], $_POST['noidung'],$_SESSION['iduser']);
                    }else{
                        $mess= "Mày Chưa Đăng Nhập";
                    }
                }
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                    $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                    $binhluan = loadall_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }else{
                    include "view/home.php";
                }
                break;
            case "dangky":
                if (isset($_POST['dangky'])){
                    if (isset($_POST['email'])&&isset($_POST['user'])&&isset($_POST['pass'])&&($_POST['email'])!=''&&($_POST['user'])!=''&&($_POST['pass'])!=''){
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        insert_taikhoan($email,$user,$pass);
                        $thongbao="Đăng Ký THành Công";
                    }else{
                        $thongbao= "khong duoc";
                    }

                }
                if(isset($_SESSION['iduser'])){
                $taikhoan=loadone_taikhoan($_SESSION['iduser']);
                }
                include "view/login/dangkydangnhap.php";
                break ;
            case "dangnhap":
                if (isset($_POST['dangnhap'])) {
                    $loginMess=dangnhap($_POST['user'], $_POST['pass']);
                    $validateuser=validateuser($_POST['user']);
                    $validatepass=validatepassword($_POST['pass']);
                       if(isset($_SESSION['user'])){
                            if($_SESSION['role']==1){
                                header("location:admin/index.php");
                            }else{
                                header("location:index.php");
                            }
                        }else{
                            include "view/login/dangkydangnhap.php";
                        }
                    }else{
                        include "view/login/dangkydangnhap.php";
                    }
                    break;
            case "dangxuat":
                dangxuat();
                // include "view/home.php";
                header("location:index.php");
                break;
            case "quenmk":
                if (isset($_POST['guiemail'])) {
                    $email=$_POST['email'];
                    $sendMailMess=sendMail($email);
                }
                include "view/login/quenmk.php";
                break;
            case "addtocart":
                if (isset($_POST["addtocart"])&&($_POST['addtocart'])) {
                    if(isset($_SESSION['user'])){
                    $id=$_POST['id'];
                    $soluong=$_POST['soluong'];
                    $product_exists = false;
                    foreach ($_SESSION['mycart'] as &$item) {
                        if ($item[0] == $id) {
                            // Nếu sản phẩm đã tồn tại, cộng thêm vào số lượng
                            $item[4] += $soluong;
                            $item[5] = intval($item[4]) * intval($item[3]); // Cập nhật thành tiền
                            $product_exists = true;
                            break;
                        }
                    }
                    if (!$product_exists) {
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    $ttien=intval($soluong)*intval($price);
                    $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                    array_push($_SESSION['mycart'],$spadd);
                    }
                    include "view/cart/viewcart.php";
                }else{
                    header("location:index.php?act=dangnhap");
                }
            }
            if (isset($_POST["addtobill"])&&($_POST['addtobill'])) {
                    if(isset($_SESSION['user'])){
                    $_SESSION["mycart1"]=[];
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    $soluong=$_POST['soluong'];
                    $ttien=intval($soluong)*intval($price);
                    $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                    array_push($_SESSION['mycart1'],$spadd);
                    include "view/cart/bill1.php";
                }else{
                    header("location:index.php?act=dangnhap");
                }
            }
        
                
                break;
            case "delcart":
                if(isset($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['mycart']=[];
                }
                header("location:index.php?act=viewcart");
                break;
            case "viewcart":
                include "view/cart/viewcart.php";
                break;
            case "bill":
                if (isset($_POST["addtobill"])&&($_POST['addtobill'])) {
                    if(isset($_SESSION['user'])){
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    $soluong=$_POST['quantity'];
                    $ttien=intval($soluong)*intval($price);
                    $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                    array_push($_SESSION['mycart'],$spadd);
                    
                }else{
                    header("location:index.php?act=dangnhap");
                }
                }
                if($_SESSION['mycart']!=[]&&isset($_SESSION['mycart'])){
                    include "view/cart/bill.php";
                    }else{
                        echo "gio hang khong co gi";
                    }
                // include "view/cart/bill.php";
                break;
            case "billconfirm":
                if (isset($_POST["dongydathang"])&&($_POST['dongydathang'])) {
                    if(isset($_SESSION['user'])) { $iduser = $_SESSION['iduser']; }else{ $iduser = 0; }
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang = date('Y-m-d');
                    $tongdonhang=tongdonhang();
                    if(!empty($name)&&!empty($email)&&!empty($address)&&!empty($tel)&&!empty($pttt)&&!empty($ngaydathang)&&($tongdonhang>0)){
                    $idbill=insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                    foreach($_SESSION['mycart'] as $cart){
                        insert_cart($_SESSION['iduser'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    }
                    $_SESSION["mycart"]=[];
                    $bill=loadone_bill($idbill);
                    $billct=loadall_cart($idbill);
                    include "view/cart/billconfirm.php";
                    }else{
                        echo "<div style='text-align:center;'><p style='color:red'>Bạn Để Thiếu Thông Tin , Vào Phần Quản Lý Tài Khoản Để Thêm Thông Tin</p></div>";

                    }
                
            }
            
                break;
            case "billconfirm1":
                if (isset($_POST["dongydathang"])&&($_POST['dongydathang'])) {
                    if(isset($_SESSION['user'])) { $iduser = $_SESSION['iduser']; }else{ $iduser = 0; }
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang = date('Y-m-d');
                    $tongdonhang=tongdonhang1();
                    if(!empty($name)&&!empty($email)&&!empty($address)&&!empty($tel)&&!empty($pttt)&&!empty($ngaydathang)&&($tongdonhang>0)){
                    $idbill=insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                    foreach($_SESSION['mycart1'] as $cart){
                        insert_cart($_SESSION['iduser'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    }
                    $_SESSION["mycart1"]=[];
                    $bill=loadone_bill($idbill);
                    $billct=loadall_cart($idbill);
                    include "view/cart/billconfirm1.php";
                    }else{
                        echo "k hop le";
                    }
                
            }
            
                break;
            case "mybill":
                if(isset($_SESSION['iduser'])){
                    $listbill=loadall_bill("",$_SESSION['iduser']);
                    include "view/cart/mybill.php";
                    }else{
                        header("location:index.php?act=dangnhap");
                    }
                    break;
            case "updatetk":
                if (isset($_POST["updatetk"])&&($_POST['updatetk'])) {
                    if(isset($_SESSION['user'])){
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="upload/";
                    $target_file=$target_dir.basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'],$target_file)){
                        echo "";
                    }else{
                        echo "";
                    }
                    update_taikhoan($id,$name,$pass,$email,$address,$tel,$hinh);
                    $thongbao="<div style='color :green;'>Cập Nhật Thành Công</div>";
                    
                }
                }
                
                
                $taikhoan=loadone_taikhoan($_SESSION['iduser']);
                include "view/login/dangkydangnhap.php";
                break;
            case "chitietbillnguoidung":
                if(isset($_GET['idbill'])&&($_GET['idbill'])>0){
                    $chitietbill=loadall_sanpham_bill($_GET['idbill']);
                }
                include "view/cart/chitietbillnguoidung.php";
                break; 
            }
            
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>
