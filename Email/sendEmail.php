<?php
 
 use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/PHPMailer.php';
 require_once 'PHPMailer/SMTP.php';
 require_once 'PHPMailer/Exception.php';

$mail= new PHPMailer(); //khởi tạo đối tượng PHPMailer

//Cấu hình mail

$mail->IsSMTP(); // khai báo gửi email qua SMTP
$mail->CharSet = 'UTF-8';
$mail->Debugoutput = "html"; // 
$mail->Host       = "smtp.gmail.com"; //server gửi smtp
$mail->Port       = 465; // thiết lập cổng mail
$mail->SMTPSecure = "ssl"; //Phương thức mã hóa dữ liệu - ssl: 465 hoặc tls:587
$mail->SMTPAuth   = true; //Xác thực SMTP

//Cấu hình bắt đầu phần gửi mail
$mFrom = "dan.nh.61cntt@ntu.edu.vn"; // Địa chỉ email của người gửi -----(Mac dinh)
$nFrom = $_POST['name']; //mail được từ đâu, thường để tên cơ quan/công ty ---------------(Ten khach hang)
$mPass = "225767448"; //mật khẩu email của người gửi------------------(Mac dinh)
$mTo = "kuti.hieu01@gmail.com"; //địa chỉ email của người nhận------------(Mac dinh)
$nTo = "Mango Suport"; //tên người nhận-----------------------------------(Mac dinh)
$body = $_POST['message'];//nội dung thư, định dạng HTML----------------------------------(Noi dung mail)
$title = $_POST['name']; //tiêu đề email--------------------------------------------------(ID va Ten KH)
$mail->Username   = $mFrom; //khai báo địa chỉ email
$mail->Password   = $mPass;  //khai báo mật khẩu
$mail->SetFrom($mFrom, $nFrom); //thông tin người gửi
$mail->AddReplyTo($_POST['email'],"Email Reply");//---------------------------------------(@email khach hang)
$mail->AddAddress($mTo,$nTo);//Email của người nhận
$mail->Subject= $title;//khai báo tiêu đề 
$mail->MsgHTML($body); //Nội dung chính của email được đặt ở đây
 
//Tiến hành gửi mail và thông báo lỗi
// if(!$mail->Send()) 
//  	echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
// else 
//  	echo "Gửi mail thành công!";
if($mail->send()){
    $status = "success";
    $response = "Email is sent!";
}
else
{
    $status = "failed";
    $response = "Something is wrong: <br>" . $mail->ErrorInfo;
}

exit(json_encode(array("status" => $status, "response" => $response)));
