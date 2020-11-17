<?php 

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
		$model = $this->model("taikhoan");	
		if(method_exists($model,"checkLogin")){
			echo $model->checkLogin($loginInfor);
		}
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
}