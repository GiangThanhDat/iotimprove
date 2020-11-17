
function browse(idStation,sensorMeasuresList) {	
	sensorMeasuresList.forEach(function(elem) {		
		setValue(idStation,elem['ma_cambien'],elem['ma_dailuong']);
	});
}

function setValue(ma_tram,ma_cambien,ma_dailuong) {
	$.get("collect/get/"+ma_tram+"/"+ma_cambien+"/"+ma_dailuong,function(val){
		// console.log(val);
		val = $.parseJSON(val);		
		value = parseFloat(val['val']);
		time = val['time'];
		max = parseFloat(val['max']);
		min = parseFloat(val['min']);
		myColor = val['mau'];
		var myTime = time.substr(11, 8);
		if (value > max || value <= min) {		
			$('#val_'+ma_tram+"_"+ma_cambien+"_"+ma_dailuong).css("color", myColor);	
			$('#time_'+ma_tram+"_"+ma_cambien+"_"+ma_dailuong).css("color", myColor);	
			$('#dv_'+ma_tram+"_"+ma_cambien+"_"+ma_dailuong).css("color", myColor);	
		}
		$('#val_'+ma_tram+"_"+ma_cambien+"_"+ma_dailuong).html(value);		
		$('#time_'+ma_tram+"_"+ma_cambien+"_"+ma_dailuong).html(myTime);		
	});
}

$(document).ready(function(){
	setInterval(function(){		
		browse(idStation,sensorMeasuresList);
	}, 100);
});

