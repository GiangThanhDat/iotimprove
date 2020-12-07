
// đăng kí controller cho app chính
(function (app) {
	app.controller('ThongTinCaNhanController', function($scope,$http,accountmngService,fileUpload) {
		$scope.accountInfor = accountmngService.getAccountInfor();
		var _mapForAdd
		var marker = null;

		// Load Data
		var getStationsByUser = ()=>{
			$http.get('TramQuanTrac/getStationsByUser/'+$scope.accountInfor.tendangnhap).then((response)=>{
				if (response) {
					angular.forEach(response.data, function(value, key){
						let coord = [value.vi_do,value.kinh_do];
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

					$scope.TramList = response.data;
				}
			});
		}

		var getTenVaiTro = ()=>{
			$http.get('VaiTro/getByKey/'+$scope.accountInfor.ma_vaitro).then((response)=>{
				if (response) {
					$scope.accountInfor.ten_vaitro = response.data['ten_vaitro'];
				}
			});
		}

		getTenVaiTro();



		var onMapForAddClick = (e)=> {
			markerGroup.removeLayer(marker._leaflet_id);
			$http.get(location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+e.latlng.lat+'&lon='+e.latlng.lng)
			.then((result)=>{
				let adressInfor = result.data.display_name;
				L.popup().setLatLng(e.latlng).setContent("<span>Địa chỉ:" + adressInfor + " </span>").openOn(_mapForAdd);
				marker = L.marker(e.latlng);
				marker = marker.bindPopup("<span>Địa chỉ:" + adressInfor + " </span>").addTo(markerGroup);
				$scope.accountInfor.vido = marker._latlng.lat;
				$scope.accountInfor.kinhdo = marker._latlng.lng;
				$scope.accountInfor.DiaChi = adressInfor;				
			});
		}		
		$scope.enabelMapOnClick = (enable)=>{
			(enable) ? _mapForAdd.on('click',onMapForAddClick) : _mapForAdd.off('click',onMapForAddClick);
		}
		var loadingMap = ()=>{
			if (_mapForAdd !== undefined && _mapForAdd !== null) {
				_mapForAdd.remove(); // should remove the map from UI and clean the inner children of DOM element
  			}
  			let coord;
  			if ($scope.accountInfor.vido === "" && $scope.accountInfor.kinhdo === "" ) {
  				coord = [10.762622, 106.660172];
  			}else{
  				coord =  [$scope.accountInfor.vido,$scope.accountInfor.kinhdo];	
  			}
  			
  			zoomLevel = 20;
			// init map
			_mapForAdd = L.map('map-custom', {attributionControl: false}).setView(coord,zoomLevel);			
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
				let adressInfor = result.data.display_name;
				marker = L.marker({lat:coord[0],lng:coord[1]});
				marker = marker.bindPopup("<span>Địa chỉ:" + adressInfor + " </span>").addTo(markerGroup);
				$scope.accountInfor.vido = marker._latlng.lat;
				$scope.accountInfor.kinhdo = marker._latlng.lng;
				$scope.accountInfor.DiaChi = adressInfor;				
			});			
		}
		// getAccountInfor();
		getStationsByUser();
		loadingMap();
		$("a[href='#DiaChi']").on('shown.bs.tab', function(e) {
			_mapForAdd.invalidateSize(false);
			
		});

		$("a[href='#ChinhSua']").on('shown.bs.tab', function(e) {
			
		});

		$scope.updateAccount = ()=>{
			delete $scope.accountInfor['DiaChi'];
			delete $scope.accountInfor['ten_vaitro'];
		 	var json = JSON.stringify($scope.accountInfor, function( key, value ) {
		 		if( key === "$$hashKey" ) {
		 			return undefined;
		 		}
		 		return value;
		 	});
			$http.post('TaiKhoan/update',$scope.accountInfor).then((response)=>{
				if (response) {
					$http.get('TaiKhoan/getAccountInfor/'+$scope.accountInfor.tendangnhap).then((response)=>{
						if (response) {
							$scope.accountInfor = response.data;
							accountmngService.setAccountInfor($scope.accountInfor);															
						}
					}, ()=>{
						console.debug("load fail");
					});					
					getTenVaiTro();
				}
			},()=>{
				console.log("load fail");
			})
		}
		
		$scope.chooseImage = ()=>{		
			if ($scope.edit === true) {
				
			}	
			CKFinder.popup( {
				chooseFiles: true,
				height: 600,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						console.log(file.getUrl());
						$scope.accountInfor.avatar = file.getUrl();						
					} );
					finder.on( 'file:choose:resizedImage', function( evt ) {
						document.getElementById( 'url' ).value = evt.data.resizedUrl;
					} );
				}
			} );
		}

	});
})(angular.module('myIOTApp'));

