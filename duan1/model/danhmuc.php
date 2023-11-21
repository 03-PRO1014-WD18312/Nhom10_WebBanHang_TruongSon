<?php
function loadall_danhmuc(){
    $sql="select * from danhmuc order by id desc";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}

// function load_ten_dm($iddm){
//     if($iddm>0){
//         $sql="select * from danhmuc where id=".$iddm;
//         $dm=pdo_query_one($sql);
//         extract($dm);
//         return $name;
//     }else{
//         return "";
//     }
// }
function delete_dm($id){
    $sql= "DELETE FROM danhmuc WHERE id=".$id;
    pdo_execute($sql);
}