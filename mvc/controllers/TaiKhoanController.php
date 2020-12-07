<?php 
require_once PHPMAILER."src/PHPMailer.php";
require_once PHPMAILER."src/SMTP.php";
require_once PHPMAILER."src/Exception.php";
// require './vendor/autoload.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * 
 */
class TaiKhoanController extends controller
{
	
	function __construct()
	{
		
	}

	function DangKy(){
		$postdata = file_get_contents("php://input");		
		$newUser = json_decode($postdata,true);		
		// băm mật khẩu	
		$hashed_password = password_hash($newUser['matkhau'], PASSWORD_DEFAULT );
		unset($newUser['matkhau']);

		$newUser['matkhau_hash'] = $hashed_password;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time = date('Y-m-d');
		$newUser['ngaytao']= $time;
		$model = $this->model("taikhoan");	
		if(method_exists($model,"add")){
			echo $model->add($newUser);
		}
	}

	function update()
	{
		$postdata = file_get_contents("php://input");		
		$updateUser = json_decode($postdata,true);			
		$model = $this->model("taikhoan");	
		if(method_exists($model,"update")){
			echo $model->update($updateUser);
		}
	}

	function remove($tendangnhap)
	{
		$model = $this->model("taikhoan");
		if(method_exists($model,"remove")){
			echo $model->remove($tendangnhap);
		}
	}


	function DangNhap()
	{
		$postdata = file_get_contents("php://input");

		$loginInfor = json_decode($postdata,true);						
		if (!empty($loginInfor)) {			
			$model = $this->model("taikhoan");	
			if(method_exists($model,"checkLogin")){
				echo $model->checkLogin($loginInfor);
			}			
		}
		echo '';

	}

	function isDuplicateAccount($tendangnhap)
	{
		echo $this->model("taikhoan")->isDuplicateAccount($tendangnhap);
	}


	function getAccountInfor($tendangnhap)
	{
		echo $this->model('taikhoan')->getAccountInfor($tendangnhap);
	}


	function getListAccount()
	{
		$model = $this->model('taikhoan');
		if(method_exists($model,"getListAccount")){
			echo $model->getListAccount();
		}
	}

	function sendMail()
	{
		$postdata = file_get_contents("php://input");		
		$userInfor = json_decode($postdata,true);			
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time = date('d-m-Y');
		$mail = new PHPMailer();				
	 	$mail->isSMTP(); // send as HTML
	    $mail->Host = "smtp.gmail.com"; // SMTP servers
	    $mail->SMTPAuth = true; // turn on SMTP authentication
	    $mail->Username = "gthanhdatpro@gmail.com"; // Your mail
	    $mail->Password = 'nomoneynoluv0K'; // Your password mail
	    $mail->Port = 587; //specify SMTP Port
		$mail->SMTPSecure = 'tls';            
		$mail->CharSet = 'UTF-8';        	        
		$mail->From = 'gthanhdatpro@gmail.com';
		$mail->FromName = 'HỆ THỐNG QUAN TRẮC NHÀ MÁY XỬ LÝ RÁC THẢI';
		$mail->addAddress($userInfor['email'],$userInfor['hovaten']);     // Add a recipient
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');
		$mail->addAttachment(FILES.'TongHop-1607085340644.xls', 'Tập tin tổng hợp '. $time);    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Báo cáo tổng hợp ' . $time;
		$mail->Body    = 'Chào ' . $userInfor['hovaten'] . "\nHệ thống quan trắc THANHDAT IOT vừa gửi cho bạn tập tin báo cáo tổng hợp vào lúc " . date('H:m:s d-m-Y');
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		// mail("canhthai.11041998@gmail.com","My subject","This is the HTML message body ");
	}
}