
// đăng kí controller cho app chính
(function (app) {
	app.controller('PhanQuyenController', function($scope,$http,accountmngService) {
		$scope.accountInfor = accountmngService.getAccountInfor();
		$scope.ListAccount = []
		var getListAccount = ()=>{
			$http.get('TaiKhoan/getListAccount').then((response)=>{
				if (response) {			
					$scope.ListAccount = [];		
					angular.forEach(response.data, function(value, key){						
						let coord = [value.vido,value.kinhdo];
						$http.get(location.protocol 
							+ '//nominatim.openstreetmap.org/reverse?format=json&lat='
							+coord[0]+'&lon='+coord[1])
						.then((result)=>{							
							let primaryrAdress = result.data;
							value.DiaChi = primaryrAdress.display_name;							
						}, ()=>{
							console.log("load fail");
						});
					});
					$scope.ListAccount = response.data;
				}
			});
		}
		getListAccount();
	});
})(angular.module('myIOTApp'));

