


(function (app) {
	app.controller('TramQuanTracController', function($scope,$http,$filter,Excel,$compile,accountmngService) {
		$scope.accountInfor = accountmngService.getAccountInfor();
		var mapObj = null;
		$scope.TramList = [];
		$scope.ChiTietTQT = {};
		$scope.ma_tram = null;
		$scope.edit = false;
		var SoMau = 9;
		var mapObj = null;
		var mainMapOnLoad = ()=>{
			$http.get("TramQuanTrac/ListAll").then(function(response) {
				var tramList = response.data;
				$scope.TramList = tramList;
				defaultCoord = [tramList[0].vi_do,tramList[0].kinh_do];
				zoomLevel = 15;
				if (mapObj !== undefined && mapObj !== null) {
	  				mapObj.remove(); // should remove the map from UI and clean the inner children of DOM element
	  			}
				// init map
				mapObj = L.map('map', {attributionControl: false}).setView(defaultCoord, zoomLevel);			
				// add tile để map có thể hoạt động, xài free từ OSM
				L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',maxZoom: 18,
					// id: 'mapbox/streets-v11',
					// tileSize: 512,
					// zoomOffset: -1,
					// accessToken: 'your.mapbox.access.token'
				}).addTo(mapObj);

				var markerIcon = {
					icon: L.icon({
						iconSize: [25, 41],
						iconAnchor: [10, 41],
						popupAnchor: [2, -40],
				      // specify the path here
				      iconUrl: "https://unpkg.com/leaflet@1.4.0/dist/images/marker-icon.png",
				      shadowUrl: "https://unpkg.com/leaflet@1.4.0/dist/images/marker-shadow.png"
				  })
				};

				// function onMapClick(e) {
				// 	L.popup()
				// 	.setLatLng(e.latlng)
				// 	.setContent("You clicked the map at " + e.latlng.toString())
				// 	.openOn(mapObj);
				// 	apObL.marker(e.latlng).addTo(mj);
				// }

				// mapObj.on('click', onMapClick);

				//api lấy search ngược từ tạo độ ra vị trí



				$scope.TramList.forEach((tram)=>{
					$http.get(location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+tram.vi_do+'&lon='+tram.kinh_do)
					.then((result)=>{
						console.log(result);
						let primaryrAdress = result.data;	
						tram.DiaChi = primaryrAdress.display_name;
						let _latLng = [tram.vi_do,tram.kinh_do];
						var html =  '<div class="row">'
						+'<div class="col-sm-12">'
						+ '<div class="card">'
						+'<div class="card-header bg-primary">'
						+'<div class="card-title " >Thông tin chung</div>  '
						+'</div>'
						+'<div class="card-body">'
						+'<div class="row">'
						+'<div class="col-md-12">'
						+'<div class="row">'
						+'<div class="col border border-primary rounded-top"><label for="">Mã trạm: </label> '+tram.ma_tram+'</div>'						
						+'{{ma_tram}}</div>'
						+'<div class="row">'
						+'<div class="col  border-primary border-bottom  border-left border-right"><label for="">Tên trạm: </label> '+tram.ten_tram+'</div>'                              
						+'</div>'
						+'<div class="row">'
						+'<div class="col  border-primary border-bottom border-left border-right"><label for="">Địa chỉ: </label> '+primaryrAdress.display_name+'</div>'                              
						+'</div>'
						+'<div class="row">'
						+'<div class="col  border-primary border-bottom border-left border-right"><label for="">Kinh độ: </label> '+primaryrAdress.lon+'</div>'                              
						+'</div>'
						+'<div class="row">'
						+'<div class="col  border-left border-right border-bottom border-primary rounded-bottom"><label for="">Vĩ độ: </label> '+primaryrAdress.lat+'</div>'                              
						+'</div>'
						+'</div>'
						+'</div>'
						+'</div>'
						+'<div class="card-footer clearfix"><a ng-click="xemChiTiet(\''+tram.ma_tram+'\')" style="" href=""  class="" >Xem chi tiết</a></div>'
						+'</div>'
						+'</div>'
						+'</div>';
						var compiledHtml = $compile(angular.element(html));
						L.marker(_latLng,markerIcon).bindPopup(compiledHtml($scope)[0]).addTo(mapObj);
					}, ()=>{
						console.log("load fail");
					});
				});
			});
			// đã lấy được địa chỉ từ tọa độ.

			// chưa lưu được tạo độ vào cơ sở dữ liệu.(thêm trạm);					
		}


		window.onload = function() {								
			mainMapOnLoad();
		};

		var onMapCustomClick = (e)=> {
			if (marker !== undefined) {
				markerGroup.removeLayer(marker._leaflet_id);	
			}		
			let getApi = location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+e.latlng.lat+'&lon='+e.latlng.lng;		
			$http.get(getApi)
			.then((result)=>{
				let adressInfor = result.data.display_name;
				L.popup().setLatLng(e.latlng).setContent("Địa chỉ : " + adressInfor).openOn(_mapCustom);
				marker = L.marker(e.latlng);
				marker = marker.addTo(markerGroup);
				$scope.ChiTietTQT.vi_do = marker._latlng.lat;
				$scope.ChiTietTQT.kinh_do = marker._latlng.lng;
				$scope.ChiTietTQT.DiaChi = adressInfor;				
			});
		}

		var onMapForAddClick = (e)=> {
			markerGroup.removeLayer(marker._leaflet_id);
			$http.get(location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+e.latlng.lat+'&lon='+e.latlng.lng)
			.then((result)=>{
				let adressInfor = result.data.display_name;
				L.popup().setLatLng(e.latlng).setContent("Địa chỉ : " + adressInfor).openOn(_mapForAdd);
				marker = L.marker(e.latlng);
				marker = marker.addTo(markerGroup);
				$scope.ChiTietTQT.vi_do = marker._latlng.lat;
				$scope.ChiTietTQT.kinh_do = marker._latlng.lng;
				$scope.ChiTietTQT.DiaChi = adressInfor;				
			});
		}


		$scope.editClick = ()=>{
			if ($scope.edit == true) {
				_mapCustom.on('click', onMapCustomClick);	
			}else{
				_mapCustom.off('click',onMapCustomClick);
			}
		}

		var _mapCustom;
		var marker;
		var markerGroup;
		var loadCustomMap = ()=>{
			if (_mapCustom !== undefined && _mapCustom !== null) {
  				_mapCustom.remove(); // should remove the map from UI and clean the inner children of DOM element
  			}
			let _defaultCoord = [$scope.ChiTietTQT.vi_do,$scope.ChiTietTQT.kinh_do];
			zoomLevel = 20;
			// init map
			_mapCustom = L.map('map-custom', {attributionControl: false}).setView(_defaultCoord, zoomLevel);			
			// add tile để map có thể hoạt động, xài free từ OSM
			L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',maxZoom: 18,
				// id: 'mapbox/streets-v11',
				// tileSize: 512,
				// zoomOffset: -1,
				// accessToken: 'your.mapbox.access.token'
			}).addTo(_mapCustom);

			var markerIcon = {
				icon: L.icon({
					iconSize: [25, 41],
					iconAnchor: [10, 41],
					popupAnchor: [2, -40],
			      // specify the path here
			      iconUrl: "https://unpkg.com/leaflet@1.4.0/dist/images/marker-icon.png",
			      shadowUrl: "https://unpkg.com/leaflet@1.4.0/dist/images/marker-shadow.png"
			  })
			};
			markerGroup = L.layerGroup().addTo(_mapCustom);
			// if (marker != undefined) {
			// 	markerGroup.removeLayer(marker._leaflet_id);
			// }
			//api lấy search ngược từ tạo độ ra vị trí			
			let getApi = location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+$scope.ChiTietTQT.vi_do+'&lon='+$scope.ChiTietTQT.kinh_do;
			$http.get(getApi)
			.then((result)=>{
				console.log(result);
				let primaryrAdress = result.data;	
				$scope.ChiTietTQT.DiaChi = primaryrAdress.display_name;
				let _latLng = [$scope.ChiTietTQT.vi_do,$scope.ChiTietTQT.kinh_do];
				var html =  '<div class="row">'
				+'<div class="col-sm-12">'
				+ '<div class="card">'
				+'<div class="card-header bg-primary">'
				+'<div class="card-title " >Thông tin chung</div>  '
				+'</div>'
				+'<div class="card-body">'
				+'<div class="row">'
				+'<div class="col-md-12">'
				+'<div class="row">'
				+'<div class="col border border-primary rounded-top"><label for="">Mã trạm: </label> '+$scope.ChiTietTQT.ma_tram+'</div>'						
				+'{{ma_tram}}</div>'
				+'<div class="row">'
				+'<div class="col  border-primary border-bottom  border-left border-right"><label for="">Tên trạm: </label> '+$scope.ChiTietTQT.ten_tram+'</div>'                              
				+'</div>'
				+'<div class="row">'
				+'<div class="col  border-primary border-bottom border-left border-right"><label for="">Địa chỉ: </label> '+primaryrAdress.display_name+'</div>'                              
				+'</div>'
				+'<div class="row">'
				+'<div class="col  border-primary border-bottom border-left border-right"><label for="">Kinh độ: </label> '+primaryrAdress.lon+'</div>'                              
				+'</div>'
				+'<div class="row">'
				+'<div class="col  border-left border-right border-bottom border-primary rounded-bottom"><label for="">Vĩ độ: </label> '+primaryrAdress.lat+'</div>'                              
				+'</div>'
				+'</div>'
				+'</div>'
				+'</div>'		
				+'</div>'
				+'</div>';
				var compiledHtml = $compile(angular.element(html));
				marker = L.marker(_latLng,markerIcon).bindPopup(compiledHtml($scope)[0]).addTo(markerGroup);
			}, ()=>{
				console.log("load fail");
			});
		
		// đã lấy được địa chỉ từ tọa độ.

		// chưa lưu được tạo độ vào cơ sở dữ liệu.(thêm trạm);		
		}



		var getTramLastID = ()=>{
			$http.get('tramquantrac/getLastID').then((response)=>{
				if (response.data) {
					$scope.ChiTietTQT.ma_tram =  (parseInt(response.data.ma_tram) + 1 ) + "";		
				}
			});
		}

		


		var _mapForAdd
		var loadCustomMapForNew = ()=>{
			if (_mapForAdd !== undefined && _mapForAdd !== null) {
  				_mapForAdd.remove(); // should remove the map from UI and clean the inner children of DOM element
  			}			
  			let coord = [$scope.TramList[0].vi_do,$scope.TramList[0].kinh_do];
			zoomLevel = 20;
			// init map
			_mapForAdd = L.map('map-for-add', {attributionControl: false}).setView(coord,zoomLevel);			
			// add tile để map có thể hoạt động, xài free từ OSM
			L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',maxZoom: 18,
				// id: 'mapbox/streets-v11',
				// tileSize: 512,
				// zoomOffset: -1,
				// accessToken: 'your.mapbox.access.token'
			}).addTo(_mapForAdd);

			var markerIcon = {
				icon: L.icon({
					iconSize: [25, 41],
					iconAnchor: [10, 41],
					popupAnchor: [2, -40],
			      // specify the path here
			      iconUrl: "https://unpkg.com/leaflet@1.4.0/dist/images/marker-icon.png",
			      shadowUrl: "https://unpkg.com/leaflet@1.4.0/dist/images/marker-shadow.png"
			  })
			};
			markerGroup = L.layerGroup().addTo(_mapForAdd);
			$http.get(location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+coord[0]+'&lon='+coord[1])
			.then((result)=>{				
				let primaryrAdress = result.data;
				var html =  "<span>Địa chỉ:" + primaryrAdress.display_name + " </span>";				
				marker = L.marker(coord,markerIcon).bindPopup(html).addTo(markerGroup);
			}, ()=>{
				console.log("load fail");
			});
			_mapForAdd.on('click',onMapForAddClick);
		}

		$scope.realTimeChartsList = [];
		//========================== Chi tiết theo ngày =======================//
		//detail chart
		 // Get context with jQuery - using jQuery's .get() method.	
		 var loadCharts = ()=> {			    
		 	var myDetailChartOptions = {
		 		maintainAspectRatio : false,
		 		responsive : true,
		 		legend: {
		 			display: false,
		 		},
		 		scales: {
		 			xAxes: [
		 				{
			 				ticks: {
			                    // Include a dollar sign in the ticks
			                    callback: function(value, index, values) {
			                    	return  moment(value).format('HH:mm:ss');
			                    }
			                }
			 			}
		 			],
		 			yAxes: [
		 				{
			 				ticks: {
			                    beginAtZero: true
			                }
		 				}]
		 		}
		 	}

		 	angular.forEach($scope.listSensorByStation, function(value, key){
		 		if($scope.realTimeChartsList[key] != undefined){
		 			$("#item-chart-"+value.ma_cambien).remove(); // this is my <canvas> element
		 			$("#wrapper-chart-"+value.ma_cambien).append('<canvas id="item-chart-'+value.ma_cambien+'" height="310" style="height: 310px;"></canvas>');
		 			$scope.realTimeChartsList[key].destroy();
		 		}

		 		var myDetailChartCanvas = $("#item-chart-"+value.ma_cambien).get(0).getContext("2d");
		 		myDetailChartCanvas.canvas.width = 476; // resize to parent width
  				myDetailChartCanvas.canvas.height = 310; // resize to parent height

		 		$scope.realTimeChartsList[key] = new Chart(myDetailChartCanvas, { 
		 			type: 'line',
		 			data :{
		 				datasets:[
			 				{
			 					label               : value.ten_cambien,
			 					backgroundColor     : generateRandomColor(),
			 					borderColor         : generateRandomColor(),
			 					pointRadius         : 1,
			 					pointHoverRadius	: 5,
			 					pointColor          : generateRandomColor(),
			 					pointStrokeColor    : generateRandomColor(),
			 					pointHighlightFill  : generateRandomColor(),
			 					pointHighlightStroke: generateRandomColor(),
			 					fill                : false,
			 					data 				:[]
			 				}
		 				],
		 				labels :[]
		 			},
		 			options: myDetailChartOptions
		 		});
		 	});
		 	loadCustomMap();
		 	updateCharts();
		 }


		 $("#ChiTietTram").on('shown.bs.modal',loadCharts);
		 $("#FormThemTram").on('shown.bs.modal',()=>{
		 	$scope.ChiTietTQT = {};
		 	loadCustomMapForNew();
		 	getTramLastID();
		 });

		 $scope.themTram = ()=>{
			delete $scope.ChiTietTQT['DiaChi'];
		 	var json = JSON.stringify($scope.ChiTietTQT, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
			$http.post('tramquantrac/add',json ).then((response)=>{		
				mainMapOnLoad();
				$scope.edit = false;
				$scope.ChiTietTQT = {};
				$('.modal').modal('hide');
			});
		 }

		 var realtime = "OFF";
		 $scope.realtimeBtn = "OFF";

		 $scope.realtimeCtr = ()=>{
		 	if ($scope.realtimeBtn === "ON") {
		 		$scope.realtimeBtn = "OFF";
		 		realtime = "ON";
		 	}else{
		 		$scope.realtimeBtn = "ON";
		 		realtime = "OFF"
		 	}
		 	updateCharts();	
		 }

		 var updateCharts = ()=>{
		 	angular.forEach($scope.listSensorByStation, function(value, key){
		 		let ma_cambien = value.ma_cambien;		 		
		 		$scope.DuLieuThoiGianThucCuaMotDaiLuong(ma_cambien,key); // key của cảm biến phải trùng với biểu đồ biểu diễn cho nó
		 	});
		 	if (realtime === "ON") {
		 		setTimeout(updateCharts,1000);
		 	}
		 }

		 $scope.xemChiTiet = (ma_tram) =>{	
		 	$scope.ChiTietTQT = $scope.TramList.filter( function( value ){ return value.ma_tram == ma_tram; })[0];
		 	$scope.DuLieuChiTietTQT(ma_tram);
		 	$('#ChiTietTram').modal('show');
		 	realtime = "ON"; // bắt đầu load dữ liệu thời gian thực		
		 	$scope.realtimeBtn = "OFF";	 	
		 }


		 $scope.updateTQT = ()=>{
		 	delete $scope.ChiTietTQT['DiaChi'];
		 	var json = JSON.stringify($scope.ChiTietTQT, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
		 	$http.post('tramquantrac/update', json).then(function (response) {

		 		if (response.data){
		 			mainMapOnLoad();
		 			$scope.msg = "Post Data Submitted Successfully!";
		 		}
		 			

		 	}, function (response) {

		 		$scope.msg = "Service not Exists";

		 		$scope.statusval = response.status;

		 		$scope.statustext = response.statusText;

		 		$scope.headers = response.headers();

		 	});
		}

		// khi mà cửa sổ đóng
		$("#ChiTietTram").on("hidden.bs.modal", function () {
			 realtime = "OFF"; // ngừng load dữ liệu thời gian thực
		});

		 function generateRandomColor()
		 {
		 	var randomColor = '#'+Math.floor(Math.random()*16777215).toString(16);
		 	return randomColor;
			    //random color will be freshly served
		 }
		 $scope.realTimeChartsList = [];
		 $scope.DuLieuChiTietTQT = (ma_tram)=>{
			$http.get("cambien/getListSensorsByStation/"+ma_tram).then(function(response){
				$scope.listSensorByStation = response.data;// dùng để khởi tạo chart				
			});
		 }


		 // lấy dữ liệu realtime
		 $scope.DuLieuThoiGianThucCuaMotDaiLuong = (ma_cambien,chartKey)=>{

			let chartConfiguration = $scope.realTimeChartsList[chartKey];
			let dataConfig = chartConfiguration.data;
		 	let requestUrl = "giatri/getLatesData/"+ma_cambien		
			let data = dataConfig.datasets[0].data;
			let labels = dataConfig.labels;
			$http.get(requestUrl).then(function(result){
				// Đoạn code này xử lý cập nhật biểu đồ khi mà server nhận được 
				// giá trị từ ESP8266 gửi lên một cách tức thì.
				let responseData = result.data;
				let value = responseData.giatri;
				let newTime = responseData.thoigian;
				if (labels.length === 0) {
					data.push(value);
					labels.push(newTime);
				}else{		
					let lastTime = labels[labels.length - 1];
					if (lastTime < newTime) {
						data.push(value);						
						labels.push(newTime);
					}
				}
				if (data.length > SoMau) {
					data.shift();
					labels.shift();
				}
				let color = $scope.listSensorByStation[chartKey].mau;
				let min = $scope.listSensorByStation[chartKey].nguon_duoi;
				let max = $scope.listSensorByStation[chartKey].nguon_tren;
				if (min < value && value < max) {
					color = "#007bff"; // bg-primary
				}

				$scope.listSensorByStation[chartKey].latesValue = value;
				$scope.listSensorByStation[chartKey].latesTime = moment(newTime).format("HH:mm:ss");
				$scope.listSensorByStation[chartKey].latesDate = moment(newTime).format("DD/MM/YYYY");
				$scope.listSensorByStation[chartKey].bgColor = color;
				dataConfig.datasets[0].data = data;
				dataConfig.labels = labels;
				$scope.realTimeChartsList[chartKey].data = dataConfig;
				$scope.realTimeChartsList[chartKey].update();
			});
		 }

		 // cảm biến =================
		$scope.CBEdit = false;

		$scope.ChiTietCamBien = {};		

		$("#FormThemCamBien").on('shown.bs.modal',()=>{
			$scope.ChiTietCamBien = {};
			$scope.getCamBienLastID();			
		});

		$scope.ThemCamBien = ()=>{
			delete $scope.ChiTietCamBien['ten_donvi'];
			$scope.ChiTietCamBien.ma_tram = $scope.ChiTietTQT.ma_tram;			
			var json = JSON.stringify($scope.ChiTietCamBien, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
			$http.post('CamBien/add', json).then(function (response) {
				if (response.data){
					$scope.DuLieuChiTietTQT($scope.ChiTietTQT.ma_tram);
					$scope.ChiTietCamBien = {};
					$('.modal').modal('hide');
				}
			}, function (response) {
			});
		}

		$scope.updateCamBien = ()=>{
			delete $scope.ChiTietCamBien['ten_donvi'];			
			delete $scope.ChiTietCamBien['latesValue'];
			delete $scope.ChiTietCamBien['latesTime'];
			delete $scope.ChiTietCamBien['latesDate'];
			delete $scope.ChiTietCamBien['bgColor'];
			$scope.ChiTietCamBien.ma_tram = $scope.ChiTietTQT.ma_tram;
			var json = JSON.stringify($scope.ChiTietCamBien, function( key, value ) {
				if( key === "$$hashKey" ) {
					return undefined;
				}
				return value;
			});			
			$http.post('CamBien/update', json).then(function (response) {
				if (response.data){
					$scope.DuLieuChiTietTQT($scope.ChiTietTQT.ma_tram);
					$scope.ChiTietCamBien = {};
					$('.modal').modal('hide');
				}
			}, function (response) {

			});
		}


		$scope.chiTietCamBien = (camBien)=>{
			$scope.ChiTietCamBien = camBien;
		}



		$scope.thaoCamBien = (camBien)=>{
			$http.get('cambien/remove/'+camBien.ma_cambien).then((response)=>{
				if (response.data) {
					console.log("Xóa thành công");				 	
					$scope.DuLieuChiTietTQT($scope.ChiTietTQT.ma_tram);
					$scope.ChiTietCamBien = {};
					$('.modal').modal('hide');	 
				}
			});
		}



		$scope.listDonViDo = [];
		$scope.getCamBienLastID = ()=>{
			$http.get('cambien/getLastID').then((response)=>{
				if (response.data) {
					$scope.ChiTietCamBien.ma_cambien =  (parseInt(response.data.ma_cambien) + 1 ) + "";		
				}
			});
		}






		//===========================
		// Đơn vị ===================
		$scope.DVEdit = false;
		$scope.getListDonVi = ()=>{
			$http.get('donvi/getListAll').then((response)=>{
				$scope.listDonViDo = response.data;
			});
		}
		$scope.getListDonVi();

		$scope.chiTietDonVi = (ma_donvi)=>{
			$scope.DonVi = $scope.listDonViDo.find((elem)=>{
				return elem.ma_donvi === ma_donvi;
			});
		}



		$scope.updateDonVi = ()=>{			
			var json = JSON.stringify($scope.DonVi, function( key, value ) {
				if( key === "$$hashKey" ) {
					return undefined;
				}
				return value;
			});			
			$http.post('donvi/update', json).then(function (response) {
				if (response.data){
					$scope.DuLieuChiTietTQT($scope.ChiTietTQT.ma_tram);
					$scope.DonVi = {};
					$('.modal').modal('hide');
				}
			}, function (response) {

			});
		}


		$('#FormThemDonVi').on('shown.bs.modal', function() {	
			$('#FormXemDonVi').modal('hide');
			$scope.DonVi = {};
			$http.get('donvi/getLastID').then((response)=>{
				if (response.data) {
					$scope.DonVi.ma_donvi =  (parseInt(response.data.ma_donvi) + 1 ) + "";		
				}
			});
		})

		$scope.addDonVi = ()=>{						
			var json = JSON.stringify($scope.DonVi, function( key, value ) {
				if( key === "$$hashKey" ) {
					return undefined;
				}
				return value;
			});			
			$http.post('donvi/add',json ).then((response)=>{
				$scope.DuLieuChiTietTQT($scope.ChiTietTQT.ma_tram);
				$scope.DonVi = {};
				$('.modal').modal('hide');
			});
		}
		// =========================
	});
})(angular.module('myIOTApp'));