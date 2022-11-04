<?php
 
// require_once('PHPMailer/class.phpmailer.php'); //gọi thư viện phpmailer
 use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/PHPMailer.php';
 require_once 'PHPMailer/SMTP.php';
 require_once 'PHPMailer/Exception.php';
$mail= new PHPMailer(); //khởi tạo đối tượng PHPMailer

//Cấu hình mail
$mail->IsSMTP(); // khai báo gửi email qua SMTP
// 0 = off kkhong thong bao loi, 
// 1 = thong bao loi client
// 2 = Thong bao loi o server va o client
// $mail->SMTPDebug  = 2;
$mail->CharSet = 'UTF-8';
$mail->Debugoutput = "html"; // 
$mail->Host       = "smtp.gmail.com"; //server gửi smtp
$mail->Port       = 465; // thiết lập cổng mail
$mail->SMTPSecure = "ssl"; //Phương thức mã hóa dữ liệu - ssl: 465 hoặc tls:587
$mail->SMTPAuth   = true; //Xác thực SMTP

//Cấu hình bắt đầu phần gửi mail
$mFrom = "hieu.nm.61cntt@ntu.edu.vn"; // Địa chỉ email của người gửi
$nFrom = "client"; //mail được từ đâu, thường để tên cơ quan/công ty
$mPass = "Hieu31();"; //mật khẩu email của người gửi
$mTo = "kuti.hieu01@gmail.com"; //địa chỉ email của người nhận
$nTo = "sever"; //tên người nhận
$body = "<h2>Welcome to my website!</h2>";//nội dung thư, định dạng HTML
$title = "Test email 02"; //tiêu đề email
$mail->Username   = $mFrom; //khai báo địa chỉ email
$mail->Password   = $mPass;  //khai báo mật khẩu
$mail->SetFrom($mFrom, $nFrom); //thông tin người gửi
$mail->AddReplyTo("kuti.hieu01@gmail.com","MANGO SUPORT");// khi người dùng phản hồi sẽ gửi đến email này
$mail->AddAddress($mTo,$nTo);//Email của người nhận
$mail->Subject= $title;//khai báo tiêu đề 
$mail->MsgHTML($body); //Nội dung chính của email được đặt ở đây
// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// $mail->AltBody = "This is a plain-text message body";
// $mail->AddAttachment("images/s_abbott_ganiq.jpg");//tập tin đính kèm 
 
//Tiến hành gửi mail và thông báo lỗi
if(!$mail->Send()) 
 	echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
else 
 	echo "Gửi mail thành công!";

?>