
// đăng kí controller cho app chính
(function (app) {
	app.controller('namesCtrl', function($scope,$http) {
		$scope.names = [
			{name:'Jani',country:'Norway'},
			{name:'Hege',country:'Sweden'},
			{name:'Kai',country:'Denmark'}
		];
		// đã lấy được api
		$scope.load = function () {
			$http.get("ajax/getModelListAll/tramquantrac").then(function(response) {
				$scope.myData = response.data;
				console.log($scope.myData);
			});
		}
		$scope.load();
	});
})(angular.module('myIOTApp'));

