
	// đăng kí controller cho app chính
	(function (app) {
		app.controller('TongQuanController', function($scope,$http,$filter,Excel,accountmngService) {
			$scope.accountInfor = accountmngService.getAccountInfor();

			// Lấy số liệu tổng quan theo phân quyền


			//=====================================

			 //Date range as a button
			 //mặc định là tuần hiện tại
			 $scope.ngayDau = moment().startOf('week').format("YYYY-MM-DD");
			 $scope.ngayCuoi = moment().endOf('week').format("YYYY-MM-DD");
			 $scope.fill = false;
			 $scope.fillChartShow = true;
			 $('#daterange-btn').daterangepicker({
			 	ranges   : {
			 		'Hôm nay'      : [moment(), moment()],
			 		'Hôm qua'      : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			 		'7 Ngày qua'   : [moment().subtract(6, 'days'), moment()],
			 		'30 ngày qua'  : [moment().subtract(29, 'days'), moment()],
			 		'Tuần này'     : [moment().startOf('week'), moment().endOf('week')],
			 		'Tuần trước'   : [moment().subtract(1, 'week').startOf('week'), moment().subtract(1,'week').endOf('week')],
			 		'Tháng này'    : [moment().startOf('month'), moment().endOf('month')],
			 		'Tháng trước'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			 	},
			 	startDate: moment().startOf('week'),
			 	endDate  : moment().endOf('week')
			 },function (start, end) {	      	
			 	$scope.ngayDau = start.format("YYYY-MM-DD");
			 	$scope.ngayCuoi = end.format("YYYY-MM-DD");
			 	$scope.duLieuMoiTruongTheoTram($scope.ngayDau,$scope.ngayCuoi);
			 });


			 $scope.chiTietTramQuanTrac = {};
			 $scope.TramQuanTracList = [];
		  	// đã lấy được api
		  	$scope.TramQuanTracListAll = function () {
		  		$http.get("TramQuanTrac/ListAll").then(function(response) {
		  			$scope.TramQuanTracList = response.data;
		  			$scope.chiTietTramQuanTrac = $scope.TramQuanTracList[0];
		  			$scope.duLieuMoiTruongTheoTram($scope.ngayDau,$scope.ngayCuoi);
					// $scope.duLieuMoiTruongHangTuan();
				});
		  	}



		  	$scope.TramQuanTracListAll();


		  	var mapObj = null;
		  	window.onload = function() {								
		  		$http.get("TramQuanTrac/ListAll").then(function(response) {
		  			var tramList = response.data;
		  			defaultCoord = [tramList[0].vi_do,tramList[0].kinh_do];
		  			zoomLevel = 12;
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
					tramList.forEach((tram)=>{
						$http.get(location.protocol + '//nominatim.openstreetmap.org/reverse?format=json&lat='+tram.vi_do+'&lon='+tram.kinh_do)
						.then((result)=>{
							console.log(result);
							let primaryrAdress = result.data;	
							let _latLng = [tram.vi_do,tram.kinh_do];
							const popupInfo = '<div class="row">'
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
						+'</div>'
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
						// +'<div class="card-footer clearfix"><a ng-click="xemChiTiet(\''+tram.ma_tram+'\')" style="" href=""  class="" >Xem chi tiết</a></div>'
						+'</div>'
						+'</div>'
						+'</div>';
							L.marker(_latLng,markerIcon).bindPopup(popupInfo).addTo(mapObj);
						}, ()=>{
							console.log("load fail");
						});
					});
				});
				// đã lấy được địa chỉ từ tọa độ.

				// chưa lưu được tạo độ vào cơ sở dữ liệu.(thêm trạm);		

		  	};


		  // Get context with jQuery - using jQuery's .get() method.
		  var myChartCanvas = $('#myChart').get(0).getContext('2d')

		  var myChartData = {
		  	labels  : ['Thứ hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật'],			  	
		  }

		  var myChartOptions = {
		  	maintainAspectRatio : false,
		  	responsive : true,
		  	legend: {
		  		display: true
		  	},
		  	scales: {
		  		xAxes: [{
		  			gridLines : {
		  				display : true,
		  			}
		  		}],
		  		yAxes: [{
		  			gridLines : {
		  				display : true,
		  			}
		  		}]
		  	}
		  }

			  // This will get the first returned node in the jQuery collection.
			  var myChart = new Chart(myChartCanvas, { 
			  	type: 'line', 
			  	data: myChartData, 
			  	options: myChartOptions
			  })


		  //---------------------------
		  //- END MONTHLY SALES CHART -
		  //---------------------------

		  $scope.fillChart = function () {
		  	angular.forEach(myChart.data.datasets, function(value){
		  		value.fill = $scope.fill;
		  	});
		  	myChart.update();
		  }



		  $scope.changeTypeChart = function (_type) {
		  	if(myChart != undefined)
		  		myChart.destroy();
		  	myChart = new Chart(myChartCanvas, { 
		  		type: _type, 
		  		data: myChartData, 
		  		options: myChartOptions
		  	});
		  }
		  //Gọi API 


		  $scope.chonTram = function () {
		  	$scope.chiTietTramQuanTrac = $scope.Tram;
		  	$scope.duLieuMoiTruongTheoTram($scope.ngayDau,$scope.ngayCuoi);
		  }

		  function generateRandomColor()
		  {
		  	var randomColor = '#'+Math.floor(Math.random()*16777215).toString(16);
		  	return randomColor;
			    //random color will be freshly served
			}

			//gom nhóm
			const groupBy = (xs, key) => {
				return xs.reduce(function(rv, x) {
					(rv[x[key]] = rv[x[key]] || []).push(x);
					return rv;
				}, {});
			};
			//tính trung bình
			const average = (array) => array.reduce((a, b) => a + b) / array.length;

			

			/*
			dataset = [
				0: Array(2)
					0: "2020-11-01"
					1: Array(12)
						0:
						giatri: "30"
						thoigian: "2020-11-01"
						__proto__: Object
						1: {giatri: "28", thoigian: "2020-11-01"}
						2: {giatri: "30", thoigian: "2020-11-01"}
						3: {giatri: "28", thoigian: "2020-11-01"}
						4: {giatri: "1", thoigian: "2020-11-01"}
						5: {giatri: "0", thoigian: "2020-11-01"}
						6: {giatri: "29", thoigian: "2020-11-01"}
						7: {giatri: "14", thoigian: "2020-11-01"}
						8: {giatri: "6", thoigian: "2020-11-01"}
						9: {giatri: "1", thoigian: "2020-11-01"}
						10: {giatri: "23", thoigian: "2020-11-01"}
						11: {giatri: "16", thoigian: "2020-11-01"}
						length: 12
						__proto__: Array(0)
					length: 2
					__proto__: Array(0)
				1: (2) ["2020-11-02", Array(7)]
				2: (2) ["2020-11-03", Array(8)]
				3: (2) ["2020-11-04", Array(6)]
				4: (2) ["2020-10-25", Array(5)]
				5: (2) ["2020-10-26", Array(3)]
				6: (2) ["2020-10-27", Array(3)]
				7: (2) ["2020-10-28", Array(3)]
				8: (2) ["2020-10-29", Array(4)]
				9: (2) ["2020-10-30", Array(5)]
				length: 10
			]
			*/
			const processDataset = (dataset,formatLabel) => {
				var avgData = {
					labels:[],data:[]
				}
				if (formatLabel === undefined) {
					formatLabel = "DD/MM";
				}
				var giaTriNhomTheoNgay = groupBy(dataset,'thoigian');
				giaTriNhomTheoNgay = Object.entries(giaTriNhomTheoNgay);
				giaTriNhomTheoNgay.sort(function (a,b) {
					// console.log( a[0].replaceAll('-','') + " " + b[0].replaceAll('-',''));
					return a[0].replaceAll('-','') - b[0].replaceAll('-','');
				}); // nhóm theo ngày tăng dần
				
				angular.forEach(giaTriNhomTheoNgay, function(data){		
					let Ngay = data[0];
					let tapGiaTri = data[1];
					let mangGiaTri = tapGiaTri.map(x=>{return parseInt(x.giatri)}); // map ra một mảng mới mà chỉ lấy giá trị.
					let giaTriTrungBinh = average(mangGiaTri).toFixed(2);; // làm tròn 2 số
					let labelDay = new Date(Ngay);
					avgData.labels.push(moment(labelDay).format(formatLabel));
					avgData.data.push(giaTriTrungBinh);
				});
				return avgData;
			}

			$scope.duLieuMoiTruongTheoTram = (ngayDau=null,ngayCuoi=null)=>{
				const ma_tram = $scope.chiTietTramQuanTrac.ma_tram;
				$scope.DanhSachThongKeCacDaiLuong = [];

				myChart.data.datasets = [];
				myChart.data.labels = [];
				myChart.update();

				let requestUrl = "giatri/getDataSetFromTo/"+ma_tram;
				if (ngayDau && ngayCuoi) {
					requestUrl += "/" + ngayDau + "/" + ngayCuoi;
				}
				$http.get(requestUrl).then(function(result){
					if (result.data!= undefined) {
						$scope.dataByStation = groupBy(result.data,"ma_cambien");
						$scope.camBienList = [];
						angular.forEach($scope.dataByStation,function (item,key) {
							$http.get('cambien/getByKey/'+key).then((camBien)=>{
								if (camBien.data != undefined) {
									let avgData = processDataset(item);								
									//fill data into chart
									var dataset = {		
										label 				: camBien.data.ten_cambien,					
										backgroundColor     : generateRandomColor(),
										borderColor         : generateRandomColor(),
										pointRadius         : 1,
										pointHoverRadius	: 5,
										pointColor          : generateRandomColor(),
										pointStrokeColor    : generateRandomColor(),
										pointHighlightFill  : generateRandomColor(),
										pointHighlightStroke: generateRandomColor(),
										fill                : $scope.fill,
										data 				: avgData.data
									};
									myChart.data.datasets.push(dataset);
									myChart.data.labels = avgData.labels;
									myChart.update();	
									//fill data into tables
									avgData = processDataset(result.data,"DD/MM/YYYY");
									for (var i = 0; i < avgData.data.length; i++) {
										// let ten_donvi = value.DaiLuong.ten_donvi;
										let thoigian = avgData.labels[i];
										let giatri = avgData.data[i];
										avgData.data[i] = {
											thoigian  : thoigian,
											giatri    : giatri,
											bgColor   : backgroundColor[i%backgroundColor.length]
										}
									}
									let temp = {
										CamBien:camBien.data,
										data:avgData.data
									};
									$scope.DanhSachThongKeCacDaiLuong.push(temp);
								}
							});
						})
					}
				});
			}



			const backgroundColor = [
			"bg-success",
			"bg-warning",
			"bg-danger",
			"bg-primary"
			]

			const ThuTrongTuan = {
				1:"Thứ hai",
				2:"Thứ ba",
				3:"Thứ tư",
				4:"Thứ năm",
				5:"Thứ sáu",
				6:"Thứ bảy",
				7:"Chủ nhật",
			}

			// ================================== table list ===========================//
			/*
			DanhSachThongKeCacDaiLuong = [
				0:{
					CamBien:
					    ma_cambien: "2"
						   ten_cambien: "MQ-135"				
					DaiLuong:
					    ma_dailuong: "5"
					    ma_donvi: "2"
					    mau: "#c5de4a"
					    nguon_duoi: "0"
					    nguon_tren: "70"
					    ten_dailuong: "Bụi"
						ten_donvi: "ppm"	
					data :[
						0:{
							bgColor: "bg-success"
							giatri: "11.75"
							thoigian: "01/11/2020"
						}
						1: {thoigian: "02/11/2020", giatri: "14.86", bgColor: "bg-warning", $$hashKey: "object:8"}
						2: {thoigian: "03/11/2020", giatri: "12.13", bgColor: "bg-danger", $$hashKey: "object:9"}
						3: {thoigian: "04/11/2020", giatri: "11.50", bgColor: "bg-primary", $$hashKey: "object:10"}
						4: {thoigian: "05/11/2020", giatri: "18.67", bgColor: "bg-success", $$hashKey: "object:11"}
						5: {thoigian: "06/11/2020", giatri: "14.86", bgColor: "bg-warning", $$hashKey: "object:12"}
					]
				}
			]

			*/
			
			// Trung bình hàng tuần


			var myDetailChart = null;
			//========================== Chi tiết theo ngày =======================//
			//detail chart
			 // Get context with jQuery - using jQuery's .get() method.			 
			 $("#ChiTietTheoNgay").on('shown.bs.modal', function() {			    
			 	var myDetailChartOptions = {
			 		maintainAspectRatio : false,
			 		responsive : true,
			 		legend: {
			 			display: false
			 		},
			 		scales: {
			 			xAxes: [{
			 				gridLines : {
			 					display : true,
			 				}
			 			}],
			 			yAxes: [{
			 				gridLines : {
			 					display : true,
			 				}
			 			}]
			 		}
			 	}

			 	var myDetailChartCanvas = $("#detailChart").get(0).getContext("2d");

			 	if(myDetailChart != undefined)
			 		myDetailChart.destroy();

			 	myDetailChart = new Chart(myDetailChartCanvas, { 
			 		type: 'line',
			 		data :$scope.myDetailChartData,
			 		options: myDetailChartOptions
			 	});
			 });


			 $scope.xemChiTiet = (ThongTinChung,ThongTinChiTiet) =>{
			 	$scope.duLieuMoiTruongTheoNgay(ThongTinChung,ThongTinChiTiet);
			 	$('#ChiTietTheoNgay').modal('show');
			 }



			 var converDate = (date)=>{
			 	let a = date.split('/');
			 	return a[2] + "-" + a[1] + "-" + a[0];
			 }

			 $scope.ChiTietThongKeTheoNgay = {};
			// xử lý dữ liệu
			$scope.duLieuMoiTruongTheoNgay = (ma_cambien,thoigian) => {
				$scope.NgayXem = thoigian;
				$scope.ChiTietThongKeTheoNgay.CamBien = $scope.DanhSachThongKeCacDaiLuong.map(x=>x.CamBien).find((elem)=>{
					return elem.ma_cambien === ma_cambien;
				});
				$scope.ChiTietThongKeTheoNgay.TramQuanTrac = $scope.chiTietTramQuanTrac;
				const ngayXem = converDate($scope.NgayXem);		
				$scope.myDetailChartData = {
					datasets:[],
					labels:[]
				};
				$scope.ThongKeTheoNgay = [];
				let requestUrl = "giatri/getDataSetByDate/"+ma_cambien+"/"+ngayXem;
				$http.get(requestUrl).then(function(result){
					// nhận response
					if (result.data!= undefined) {
						const dataResponse = result.data;
						// fill data vào bảng thống kê theo ngày
						dataResponse.forEach((elem)=>{
							let value = elem.giatri;
							let copyElem = elem;
							copyElem.bgColor = $scope.ChiTietThongKeTheoNgay.CamBien.mau;
							let min = parseInt($scope.ChiTietThongKeTheoNgay.CamBien.nguon_duoi);
							let max = parseInt($scope.ChiTietThongKeTheoNgay.CamBien.nguon_tren);
							if (min < value && value < max) {
								copyElem.bgColor = "#212529";
							}
							$scope.ThongKeTheoNgay.push(copyElem);
						});						

						//fill data vào biểu đồ chi tiết thống kê theo ngày
						const data = dataResponse.map((elem) => {
							return elem.giatri;
						});
						const labels = dataResponse.map((elem)=> {
							return elem.time;
						});
						var dataset = {
							backgroundColor     : generateRandomColor(),
							borderColor         : generateRandomColor(),
							pointRadius         : 2,
							pointHoverRadius	: 5,
							pointColor          : generateRandomColor(),
							pointStrokeColor    : generateRandomColor(),
							pointHighlightFill  : generateRandomColor(),
							pointHighlightStroke: generateRandomColor(),
							fill                : false,
							data 				: data
						};

						$scope.myDetailChartData.datasets.push(dataset);
						$scope.myDetailChartData.labels = labels;
					}
				});	
			}
			//===========

			// =============== XUẤT FILE EXCEL =================
			$scope.exportToExcel=function(tableId,filename){ // ex: '0'
			tableId = '#'+tableId;
			var exportHref=Excel.tableToExcel(tableId,filename);
	            location.href=exportHref; // trigger download
	        }

				
		});
})(angular.module('myIOTApp'));
