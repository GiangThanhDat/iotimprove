
//config của các model
var CamBienColumnsDefine = [
	{
		'data': 'ma_cambien'
	},
	{
		'data': 'ten_cambien'
	},
	// { 
	// 	'data': null,
	// 	'defaultContent': "<div href='#' class='btn btn-info btn-circle detail'><i class='fas fa-info-circle'></i></div>"
	// },
	{ 
		'data': null,
		'defaultContent': "<div  class='btn btn-danger btn-circle cambien-remove'><i class='fas fa-trash'></i></div>"
	}
	];
var DonViColumnsDefine = [
	{'data': 'ma_donvi'},
	{'data': 'ten_donvi'},
	// { 
	// 	'data': null,
	// 	'defaultContent': "<div href='#' class='btn btn-info btn-circle detail'><i class='fas fa-info-circle'></i></div>"
	// },
	{ 
		'data': null,
		'defaultContent': "<div  class='btn btn-danger btn-circle remove' ><i class='fas fa-trash'></i></div>"
	}];
var TinhTPColumnsDefine = [
	{'data': 'ma_tinhtp'},
	{'data': 'ten_tinhtp'},
	{ 
		'data': null,
		'defaultContent': "<div class='btn btn-info btn-circle detail'><i class='fas fa-info-circle'></i></div>"
	},
	{ 
		'data': null,
		'defaultContent': "<div  class='btn btn-danger btn-circle remove'><i class='fas fa-trash'></i></div>"
	}
];
var DaiLuongColumnsDefine = [
	{'data': 'ma_dailuong'},
	{'data': 'ten_dailuong'},
	{'data': 'ten_donvi'},
	{'data': 'nguon_tren'},
	{'data': 'nguon_duoi'},
	{
		'data': 'mau',
		'render': function(mau){
			return '<input type="color" value="'+mau+'" id="mau" required="" style="width:100%" onchange="updateColor(this)"">';
		}
	},
	// { 
	// 	'data': null,
	// 	'defaultContent': "<div href='#' class='btn btn-info btn-circle detail'><i class='fas fa-info-circle'></i></div>"
	// },
	{ 
		'data': null,
		'defaultContent':  "<div   class='btn btn-danger btn-circle dailuongdo-remove'><i class='fas fa-trash'></i></div>"
	}
];
var HuyenColumnsDefine = [
	{
		'data': 'ma_huyen'
	},
	{
		'data': 'ten_huyen'
	},
	{ 
		'data': null,
		'defaultContent': "<div class='btn btn-danger btn-circle remove'><i class='fas fa-trash'></i></div>"
	}
];
var NguoiQuanLyColumnsDefine = [
	{
		'data': 'email'
	},
	{
		'data': 'hoten_nql'
	},
	{
		'data': 'ngaysinh_nql'
	},
	{
		'data': 'chitietdiachi_nql'
	},
	{
		'data': 'matkhau_nql'
	},
	{
		'data': 'taikhoan_nql'
	},
	{ 
		'data': null,
		'defaultContent': "<div href='#' class='btn btn-info btn-circle detail'><i class='fas fa-info-circle'></i></div>"
	},
	{ 
		'data': null,
		'defaultContent': "<div class='btn btn-danger btn-circle remove'><i class='fas fa-trash'></i></div>"
	}
];


var TramQuanTracColumnsDefine = [
	{'data': 'ma_tram'},
	{'data': 'ten_tram'},
	{'data': 'chitietdiachi_tram'},
	{ 
		'data': null,
		'defaultContent': "<div href='#' class='btn btn-info btn-circle detail'><i class='fas fa-info-circle'></i></div>"
	},
	{ 
		'data': null,
		'defaultContent': "<div  class='btn btn-danger btn-circle remove'><i class='fas fa-trash'></i></div>"
	}
];

var config = [];
	config["cambien"]			= CamBienColumnsDefine,
	config["donvido"]			= DonViColumnsDefine,
	config["tinhtp"]			= TinhTPColumnsDefine,
	config["dailuongdo"]		= DaiLuongColumnsDefine,
	config['huyen']				= HuyenColumnsDefine,
	config['nguoiquanly']		= NguoiQuanLyColumnsDefine,
	config['tramquantrac']		= TramQuanTracColumnsDefine

var attachModel = []; 
	attachModel["tinhtp"] = "huyen"; // bảng kèm theo tinhtp là bảng huyện (dùng trong detail)

var attachConfig = [];
	attachConfig["tinhtp"] = config[attachModel["tinhtp"]];	//trang detail của tỉnh có kèm theo datatable có model là huyen


function setAttachLists(){
	 // mổi key của attachLists sẽ là 1 danh sách (attachList) chứa các obj(key:abc,value:xyz)
	 for(key in attachLists){
		console.log("attachLists["+key+"] = "+attachLists[key]);	// mảng dạng json	
		const list = JSON.parse(attachLists[key]); // parse qua mảng dạng array
		console.log("list="+list);
		objKeys = getKeyArray(list[0]);// lấy các key của 1 obj(mổi obj chỉ có key(index 0) và value(index 1) mặc định)
		const selector = '#'+objKeys[0]; // quy ước selector sẽ là key của obj
		const selectors = '.'+objKeys[0];
		console.log("selector="+selector);
		if(list){
			console.log("objKeys="+objKeys);
			console.log($(selector));
			$(selector).append(setDropdownList(list,objKeys[0],objKeys[1]));
			$(selectors).append(setDropdownList(list,objKeys[0],objKeys[1]));
		}
	}
}


var columnName; // get the column name when cick on axny cell
var row_num;
var column_num;

var dataTableModel = model;
var columnsConfig = config[model];

function updateColor(e){	
	const mauCanhBao = e.value;
	const row = dataTableList[row_num];
	const keyArray = getKeyArray(row);
	const keyID = keyArray[0];
	console.log(keyArray + " -- " + " -- " + keyID);		
	dataSend = {key:'mau',val:mauCanhBao};
	$.post('ajax/edit/'+dataTableModel+'/'+row[keyID],dataSend,function(response){
		if(response != 0){
			// location.reload(true);
		}else{	
			alert("Có lổi, vui lòng kiểm tra lại");					
		}
	});	
}


function getKeyArray(obj){
	var result = [];
	for(key in obj){
		result.push(key);
	}
	return result;
}
function setDropdownList(list,keyName,value) {
	var option = '';
	for (var i=0;i<list.length;i++){
		option += '<option value="'+ list[i][keyName] + '">' + list[i][value] + '</option>';
	}
	return option;	
}


function getIndexOf(abc,seperator,number){
	var count = 0;
	for(let i=0;i<abc.length;++i){
    	if(abc[i]==seperator)
        	count++;
        if(count == number) return i;
    }
    return abc.length;
}

function fill(obj) {
	textField = document.querySelectorAll("#add-from input[type='text'");
	if(textField != null){		
		for(let i = 0 ; i < textField.length ; ++i){
			for(key in obj){
				if(textField[i].id === key){
					textField[i].value = (obj[key]);
				}
			}
		}
	}
}

$(document).ready(function() {			
	console.log	("config="+config);
	console.log("attachConfig="+attachConfig);
	console.log("dataTableModel="+dataTableModel);
	console.log("dataTableList="+dataTableList);
	console.log("attachLists="+attachLists);
	$("#alert-success").hide();
	$("#alert-fail").hide();
	$("#list-all-alert-success").hide();
	$("#list-all-alert-fail").hide();	

	const createdCell = function(cell) {
		let original

		cell.setAttribute('contenteditable', true);
		cell.setAttribute('spellcheck', false);

		cell.addEventListener('focus', function(e) {
			original = e.target.textContent;					
		});

		cell.addEventListener('blur', function(e) {
			if (original !== e.target.textContent) {				
				let newContent = e.target.textContent;
				var row = myTable.row(e.target).data();				

				const keyArray = getKeyArray(row);
				console.log(column_num);
				const keyName = keyArray[column_num]; // key của cột muốn sửa dử liệu
				const keyID   = keyArray[0];// key là mả của obj muốn sửa

				console.log(keyArray + " -- " + keyName + " -- " + keyID);		

				dataSend = {key:keyName,val:newContent};
				//ajax/edit/cambien/12
				$.post('ajax/edit/'+dataTableModel+'/'+row[keyID],dataSend,function(response){
					if(response != 0){
						console.log(response);	
						// alert(response);
						$("#list-all-alert-success").fadeTo(2500, 500).slideUp(500,function(){
							$("#list-all-alert-success").slideUp(500);
						});
					}else{
						console.log(response);
						$("#list-all-alert-fail").fadeTo(2500, 500).slideUp(500,function(){
							$("#list-all-alert-fail").slideUp(500);
						});		    	
					}
				});
			}	
		});
	
	}



	if(attachLists){
		setAttachLists();
		console.log("?");
	}

	if(obj !== null) {// có obj tức là đang ở trang detail
		dataTableModel = attachModel[model];
		columnsConfig = attachConfig[model];
	}


	var myTable = $('#dataTable').DataTable({
		data:dataTableList,
		columns:columnsConfig,
		columnDefs: [{ 
			targets: '_all',
			createdCell: createdCell
		}],
		paging: false		
	});
	

	$("#dataTable td").click(function() {		
		column_num = parseInt($(this).index());			
		row_num = parseInt($(this).parent().index());
		columnName = document.getElementById('dataTable').rows[0].cells[column_num].innerHTML;
		if(columnName === "Tên đơn vị đo"){						
			$("#myModal").modal();			
		}		
		if(columnName === "Địa chỉ"){				
			var diachi = document.getElementById('dataTable').rows[row_num + 1].cells[column_num].innerHTML;			
			var chitietdiachi_tram = diachi.substr(0,getIndexOf(diachi,',',4));
			document.getElementById('dataTable').rows[row_num + 1].cells[column_num].innerHTML = chitietdiachi_tram;
		}
		console.log(row_num);
	});	



	$('#close-donvi').click(function(){
		var ma_donvi = $('#ma_donvi').val();
		const row = dataTableList[row_num];
		const keyArray = getKeyArray(row);
		const keyID = keyArray[0];
		console.log(keyArray + " -- " + " -- " + keyID);		
		dataSend = {key:'ma_donvi',val:ma_donvi};
		$.post('ajax/edit/'+dataTableModel+'/'+row[keyID],dataSend,function(data){
			if(data != 0){
				location.reload(true);
			}else{	
				alert("Có lổi, vui lòng kiểm tra lại");					
			}
		});
	});

	$('#close-mau').click(function(){
		var mauCanhBao = $('#mau-canh-bao').val();
		const row = dataTableList[row_num];
		const keyArray = getKeyArray(row);
		const keyID = keyArray[0];
		console.log(keyArray + " -- " + " -- " + keyID);		
		dataSend = {key:'mau',val:mauCanhBao};
		$.post('ajax/edit/'+dataTableModel+'/'+row[keyID],dataSend,function(response){
			if(response != 0){
				location.reload(true);
			}else{	
				alert("Có lổi, vui lòng kiểm tra lại");					
			}
		});
	});	

	// hiện thông báo
	$("#add-from").submit(function(event){		
	    // Prevent default posting of form - put here to work in case of errors
	    event.preventDefault();
	    var $form = $(this);
	    // Serialize the data in the form
	    var serializedData = $form.serialize();
	    console.log(serializedData);
	    $.post('ajax/add/'+model, serializedData, function(response) {
	    	if(response != 0){
	    		console.log(response);		    	
	    		$("#alert-success").fadeTo(2500, 500).slideUp(500,function(){
	    			$("#alert-success").slideUp(500);
	    		});
	    	}else{
	    		console.log(response);	
	    		$("#alert-fail").fadeTo(2500, 500).slideUp(500,function(){
	    			$("#alert-fail").slideUp(500);
	    		});		    	
	    	}
	    });
	});
	// click vào nút xóa thì 
	$(".remove").click(function(event) {
		if(row_num !== 'undefine'){
			var Ok = confirm("Are you sure?");
			if (Ok) {
				const row = dataTableList[row_num];			
				//ajax/del/dailuongdo/3	
				$.post('ajax/del/'+dataTableModel+'/'+row[getKeyArray(row)[0]],function(response){					
					if(response != 0){
						location.reload(true);
					}else{
						alert(response);
					}
				});
			}
		}
	});		

	$(".cambien-remove").click(function(event) {
		if(row_num !== 'undefine'){
			var Ok = confirm("Are you sure?");			
			if (Ok) {
				const row = dataTableList[row_num];							
				if (ma_tram) {							
					$.post('ajax/giatri_del/'+ma_tram+"/"+row[getKeyArray(row)[0]],function(response){					
						if(response != 0){							
							location.reload(true);
						}else{
							alert(response);
						}
					});	
				}
			}
		}
	});	


	$(".dailuongdo-remove").click(function(event) {
		if(row_num !== 'undefine'){
			var Ok = confirm("Are you sure?");			
			if (Ok) {
				const row = dataTableList[row_num];							
				// alert(ma_tram + " " + ma_cb);
				if (ma_tram && ma_cb) {						
					// alert('ajax/giatri_del/'+ma_tram+"/"+ma_cb+"/"+row[getKeyArray(row)[0]]);
					$.post('ajax/giatri_del/'+ma_tram+"/"+ma_cb+"/"+row[getKeyArray(row)[0]],function(response){					
						if(response != 0){							
							location.reload(true);
						}else{
							alert(response);
						}
					});	
				}
			}
		}
	});	

	$('.detail').click(function(event) {
		if(row_num !== 'undefine'){
			const row = dataTableList[row_num];
			const key = row[getKeyArray(row)[0]];			
			if(dataTableModel == "tramquantrac"){				
				window.location.replace("collect/load/"+key);
			}else
				window.location.replace("admin/detail/"+dataTableModel+"/"+key);
		}
	});

	$('.huyen-add').click(function(event) {
		let ma_tinhtp = $('#ma_tinhtp').val();
		window.location.replace("admin/add/huyen/"+ma_tinhtp);
	});

	if(obj !== null){
		fill(obj);
	}

	$('#ma_tinhtp').on('change', function (e) {
		var ma_tinhtp = this.value;
		$.get('ajax/getListByFK/huyen/'+(ma_tinhtp),function(response){ // lấy các huyện thuộc tỉnh có ma = ma_tinhtp
			let huyenThuocTinh = $.parseJSON(response);
			console.log(huyenThuocTinh);
			$('#ma_huyen').empty().append('<option>Chọn Quận-Huyện</option>');
			$('#ma_huyen').append(setDropdownList(huyenThuocTinh,"ma_huyen","ten_huyen"));			
		});
	});

});

