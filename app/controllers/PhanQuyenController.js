
// đăng kí controller cho app chính
(function (app) {
	app.controller('PhanQuyenController', function($scope,$http,accountmngService) {
		$scope.accountInfor = accountmngService.getAccountInfor();
		$scope.ListAccount = [];
		$scope.role = {};	
		$scope.listRoles = [];

		var getListRoles = ()=>{
			$http.get('VaiTro/getListRoles').then((response)=>{
				if (response.data) {
					var lastID = 0, newID = 0;
					$scope.listRoles = response.data;
					if ($scope.listRoles.length!=0) {
						lastID = $scope.listRoles[$scope.listRoles.length - 1].ma_vaitro;
						newID = ((parseInt(lastID)+1) + "");
					}else
					newID = '1';
					$scope.role = {
						ma_vaitro : newID						
					}
				}
			});
		}

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
							value.ten_vaitro = $scope.listRoles.find(elem => elem.ma_vaitro === value.ma_vaitro).ten_vaitro;
						}, ()=>{
							console.log("load fail");
						});
					});
					$scope.ListAccount = response.data;
				}
			});
		}

		
		var getListTasks = ()=>{
			$http.get('ChucNang/getListTasks').then((response)=>{
				if (response.data) {
					var lastID = 0, newID = 0;
					$scope.listTasks = response.data;
					if ($scope.listTasks.length!=0) {
						lastID = $scope.listTasks[$scope.listTasks.length - 1].ma_chucnang;
						newID = ((parseInt(lastID)+1) + "");
					}else
					newID = '1';
					$scope.task = {
						ma_chucnang : newID						
					}
				}
			});
		}

		$scope.themVaiTro = ()=>{						
		 	var json = JSON.stringify($scope.role, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
			$http.post('VaiTro/add',$scope.role).then((response)=>{
				if (response.data) {
					getListTasks();
					getListRoles();
					getListAccount();
					$('#ThemVaiTro').modal('hide');
				}
			},()=>{
				console.log("load fail");
			})
		}

		$scope.themChucNang = ()=>{
		 	var json = JSON.stringify($scope.task, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
			$http.post('ChucNang/add',$scope.task).then((response)=>{
				if (response.data) {
					getListTasks();
					getListRoles();
					getListAccount();
					$('#ThemChucNang').modal('hide');
				}
			},()=>{
				console.log("load fail");
			})
		}

		$scope.updateAccount = (account)=>{
			delete account['ten_vaitro'];
			delete account['DiaChi'];
		 	var json = JSON.stringify(account, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});

			$http.post('TaiKhoan/update',json).then((response)=>{
				if (response.data) {
					getListTasks();
					getListRoles();
					getListAccount();
				}
			},()=>{
				console.log("load fail");
			})
		}		

		$scope.apDungPhanCong = ()=>{
			$http.get('ChucNang/clearTaskFromRoleID/'+$scope._ma_vaitro).then((response)=>{
				if (response) {
					console.log("success");
				}
			});
			$scope.listTasks.forEach((task)=>{
				if (task.checked) {
					updateTemp = {
						ma_vaitro : $scope._ma_vaitro,
						ma_chucnang : task.ma_chucnang
					}
					$http.post('ChucNang/addTaskFromRole',updateTemp).then((response)=>{
						if (response.data) {
							console.log("apple");
						}
					});
				}
			});
		}

		// tìm cách xử lý tick chức năng
		$scope.getListTasksByRole = (ma_vaitro)=>{
			$scope.listTasks.forEach(task=> task.checked=false);
			$http.get('ChucNang/getListTasksByRole/'+ma_vaitro).then((response)=>{
				if (response.data) {
					response.data.forEach((task)=>{
						$scope.listTasks.find((item)=>item.ma_chucnang===task.ma_chucnang).checked = true;
					});
				}
			});
		}		

		getListTasks();
		getListRoles();
		getListAccount();
	});
})(angular.module('myIOTApp'));

