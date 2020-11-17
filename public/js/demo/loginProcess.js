
$(document).ready(function() {
	$('#loi-dang-nhap').hide();
	$('#khong-khop').hide();
	$('#da-khop').hide();
	
	$('#login-form').submit(function(e) {
		e.preventDefault();
		var $form = $(this);
	    // Serialize the data in the form
	    var serializedData = $form.serialize();
	    console.log(serializedData);
	    $.post('ajax/login', serializedData, function(response) {
	    	if(response.trim() != 0){
	    		console.log(response);
<<<<<<< HEAD
	    		$('#loi-dang-nhap').hide('slow/400/fast');
	    		location.replace("dashboard/index/10");
=======
				$('#loi-dang-nhap').hide('slow/400/fast');
				location.replace("dashboard/index/10");
>>>>>>> e9a1e4ca34a4ba28b6435b771e0b9be7f2858f01
	    	}else{	
	    		console.log(response + " error");
	    		$('#loi-dang-nhap').show('slow/400/fast');
	    	}
	    });
	});

	$('#register-form').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		var serializedData = $form.serialize();
		console.log(serializedData);
		$.post('ajax/register',serializedData,function(response){
			if(response != 0){
				alert("ĐĂNG KÍ TÀI KHOẢN THÀNH CÔNG");
				location.replace("login");
			}else{
				alert("đăng kí thất bại");
			}
		});	
	});
	$('#taikhoan_nql').keyup(function(event) {		
		var taikhoan = $(this).val();	
		$.post("ajax/validation",{taikhoan_nql:taikhoan},function (response) {
	    	if(response.trim()==1){
	    		console.log(response);
	    		console.log(response + " error");
	    		$('#loi-dang-nhap').show('slow/400/fast');
	    	}else{
	    		$('#loi-dang-nhap').hide('slow/400/fast');
	    	}

		})	
	});

	$('#laplaimatkhau').keyup(function(event) {
		var laplaimatkhau = $(this).val();
		var matkhau = $('#matkhau_nql').val();
		if(laplaimatkhau !== matkhau){
			$('#da-khop').hide("slow/400/fast");			
			$('#khong-khop').show("slow/400/fast");
		}else{
			$('#khong-khop').hide("slow/400/fast");
			$('#da-khop').show("slow/400/fast");
		}
	});
});
