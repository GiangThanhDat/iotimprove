
// đăng kí controller cho app chính
(function (app) {
	app.controller('PhanQuyenNguoiDungController', function($scope,$http,accountmngService) {
		$scope.accountInfor = {};
		$scope.tendangnhap = accountmngService.getCookieData();
		$scope.getAccountInfor = ()=>{
			$http.get('TaiKhoan/getAccountInfor/'+$scope.tendangnhap).then((response)=>{
				if (response) {
					$scope.accountInfor = response.data;
					accountmngService.setAccountInfor($scope.accountInfor);
				}
			}, ()=>{
				console.debug("load fail");
			});
		}
		$scope.getAccountInfor();
	});
})(angular.module('myIOTApp'));

