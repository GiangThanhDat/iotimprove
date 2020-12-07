
// đăng kí controller cho app chính
(function (app) {
	app.controller('PhanQuyenNguoiDungController', function($scope,$http,accountmngService) {
		$scope.accountInfor = accountmngService.getAccountInfor();
		// tìm cách xử lý tick chức năng
		var getListTasksByRole = (ma_vaitro)=>{
			$http.get('ChucNang/getListTasksByRole/'+ma_vaitro).then((response)=>{
				if (response.data) {
					$scope.roles = response.data;
					accountmngService.setRoles($scope.roles);
				}
			});
		} 
		getListTasksByRole($scope.accountInfor.ma_vaitro);

		$scope.checkRoles = (taskName)=>{
			return (taskName && $scope.roles) ? ($scope.roles.find(task=>task.ten_chucnang===taskName)) : null;
		}

	});
})(angular.module('myIOTApp'));

