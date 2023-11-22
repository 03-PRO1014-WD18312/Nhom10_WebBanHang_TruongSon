<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";
    include "global.php";

    $dsdm = loadall_danhmuc();
    $spnew = loadall_sanpham_home();
    $dstop10 = loadall_sanpham_top10();
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
                        echo "may chua dang nhap";
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
                include "view/login/dangkydangnhap.php";
                break ;
            case "dangnhap":
                if (isset($_POST['dangnhap'])) {
                    $loginMess=dangnhap($_POST['user'], $_POST['pass']);
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
                header("location:index.php?act=dangky");
                break;
            case "quenmk":
                if (isset($_POST['guiemail'])) {
                    $email=$_POST['email'];
                    $sendMailMess=sendMail($email);
                }
                include "view/login/quenmk.php";
            case "addtocart":
                
            case "delcart":
                
            case "viewcart":
                
            case "bill":
                
            case "billconfirm":
               
            case "mybill":
               
        }
            
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>
