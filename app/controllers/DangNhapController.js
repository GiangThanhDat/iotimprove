
// đăng kí controller cho app chính
(function (app) {
	app.controller('DangNhapController', function($scope,$http,$window,accountmngService) {
		$scope.user = {};	
		accountmngService.clearCookieData();	
		$('#errorMessage').hide();	
		$scope.DangNhap = ()=>{
			$http.post('TaiKhoan/DangNhap', $scope.user).then((response)=>{				
				if (response.data) {	
					let tendangnhap = response.data.trim();
					if (tendangnhap === "") 
						$('#errorMessage').show('slow/400/fast');				
					else{
						$http.get('TaiKhoan/getAccountInfor/'+tendangnhap).then((response)=>{
							if (response) {
								$scope.accountInfor = response.data;
								accountmngService.setAccountInfor($scope.accountInfor);								
								window.location.href = 'TongQuan';
							}
						}, ()=>{
							console.debug("load fail");
						});
						
					}
				}
			}, ()=>{
				console.log('load fail');
			});
		}
	});
})(angular.module('myIOTApp'));

