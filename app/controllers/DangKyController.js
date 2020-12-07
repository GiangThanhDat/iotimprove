
// đăng kí controller cho app chính
(function (app) {
	app.controller('DangKyController', function($scope,$http) {
		$scope.newUser = {};		
		$('#errorMessage').hide();	
		$('#successMessage').hide();
		$scope.DangKy = ()=>{
			$http.post('TaiKhoan/DangKy', $scope.newUser).then((response)=>{
				if(response.data){
					
					if (response.data.trim() === "0") {

					}else{
						$('#successMessage').show('slow/400/fast');	
					}
					
				}
			}, ()=>{
				console.log('load fail');
			});
		}

		// check whether the account is the same or not?
		$scope.checkDuplicateAccount = ()=>{
			$http.get('TaiKhoan/isDuplicateAccount/'+$scope.newUser.tendangnhap).then((result)=>{
				if (result.data.trim() === '1') { // nhìn tên api
					$('#errorMessage').show('slow/400/fast');
					$scope.errorTitle = "Trùng tên đăng nhập"
					$scope.errorMessage = "Tên đăng nhập đã có người sử dụng, vui lòng chọn tên đăng nhập khác.";
				}else{
					$('#errorMessage').hide('slow/400/fast');	
				}
			}, ()=>{
				console.log('load fail');
			});
		}

		$scope.checkPass = ()=>{
			if($scope.newUser.matkhau === $scope.passwordCheck){	
				$('#errorMessage').hide('slow/400/fast');			
			}else{
				$('#errorMessage').show('slow/400/fast');
				$scope.errorTitle = "Mật khẩu chưa khớp"
				$scope.errorMessage = "Mật khẩu xác nhận có kí tự chưa khớp với mật khẩu góc";
			}
		}
	});
})(angular.module('myIOTApp'));

