<?php
session_start();
 function insert_taikhoan($email,$username,$pass){
    $sql ="INSERT INTO `taikhoan`(`user`,`pass`,`email`) VALUES ('$username','$pass','$email');";
    pdo_execute($sql);
 }
 
 function dangnhap($user,$pass){
   $sql="SELECT * FROM taikhoan where user='$user' and pass='$pass';";
   $taikhoan=pdo_query_one($sql);
   if($taikhoan!=false){
      extract($taikhoan);
      $_SESSION['user']=$user;
      $_SESSION['iduser']=$id;
      $_SESSION['name']=$name;
      $_SESSION['email'] = $email;
      $_SESSION['address']=$address;
      $_SESSION['tel']=$tel;
   }else{
      return "thong tin tai khoan khong dung";
   }
 }
 function dangxuat(){
   if(isset($_SESSION['user'])){
      unset($_SESSION['user']);
      unset($_SESSION['iduser']);
      unset($_SESSION['name']);
      unset($_SESSION['email']);
      unset($_SESSION['address']);
      unset($_SESSION['tel']);
   }
 }
 function sendMail($email){
   $sql="SELECT * FROM taikhoan WHERE email='$email';";
   $taikhoan=pdo_query_one($sql);
   if ($taikhoan !=false) {
      sendMailPass($email,$taikhoan['user'],$taikhoan['pass']);
      return "gui email thanh cong";
   }else{
      return "email khong co trong he thong";
   }
 }
 function sendMailPass($email,$username,$pass){
   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php';
   $mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'e2b5f032b0ff7b';                    //SMTP username
    $mail->Password   = '077be69475d353';                               //SMTP password
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('duanmau@example.com', 'DuAnMau');
    $mail->addAddress($email, $username);     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'quen mk';
    $mail->Body    = 'mat khau ban la '.$pass;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 }
?>
