
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
						accountmngService.setCookieData(tendangnhap);
						window.location.href = 'TongQuan';	
					}
				}
			}, ()=>{
				console.log('load fail');
			});
		}
	});
})(angular.module('myIOTApp'));

