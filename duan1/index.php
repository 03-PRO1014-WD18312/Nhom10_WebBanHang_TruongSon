<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "global.php";
    
    $spnew = loadall_sanpham_home();
    $dstop10 = loadall_sanpham_top10();
    include "view/header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
               
            case "sanphamct":
                
            case "dangky":
               
            case "dangnhap":
                
            case "dangxuat":
                
            case "quenmk":
               
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
