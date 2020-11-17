
// đăng kí controller cho app chính
(function (app) {
	app.controller('NhanSuController', function($scope,$http,accountmngService) {
		$scope.accountInfor = accountmngService.getAccountInfor();
		$scope.ListAccount = [];
		$scope.StationByUser = [];
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

		// Load Data
		$scope.getStationsByUser = (tendangnhap)=>{
			$http.get('TramQuanTrac/getStationsByUser/'+tendangnhap).then((response)=>{
				if (response) {
					$scope.StationByUser = [];
					angular.forEach(response.data, function(value, key){
						let coord = [value.vi_do,value.kinh_do];
						$http.get(location.protocol 
							+ '//nominatim.openstreetmap.org/reverse?format=json&lat='
							+coord[0]+'&lon='+coord[1])
						.then((result)=>{							
							let primaryrAdress = result.data;
							value.DiaChi = primaryrAdress.display_name;
							$scope.StationByUser.push(value);
						}, ()=>{
							console.log("load fail");
						});
					});
				}
			});
		}	

		$scope.xemChiTiet = (accountSelected)=>{
			$scope.getStationsByUser(accountSelected.tendangnhap);
			$scope.accountSelected = $scope.ListAccount.find(elem=>elem.tendangnhap==accountSelected.tendangnhap);
		}

		$scope.updateAccount = ()=>{
			delete $scope.accountSelected['DiaChi'];
			$scope.accountSelected['ngaysinh'] = moment($scope.accountSelected.ngaysinh).format('YYYY-MM-DD');
		 	var json = JSON.stringify($scope.accountSelected, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
			$http.post('TaiKhoan/update',$scope.accountSelected).then((response)=>{
				if (response.data) {
					getListAccount();
					$('#xemChiTietNhanVien').modal('hide');
				}
			},()=>{
				console.log("load fail");
			})
		}


		$scope.removeAccount = ()=>{
			$http.get('TaiKhoan/remove/'+$scope.accountSelected.tendangnhap).then((response)=>{
				if (response.data) {
					getListAccount();
					$('#xemChiTietNhanVien').modal('hide');
				}
			});
		}
		getListAccount();
	});
})(angular.module('myIOTApp'));

