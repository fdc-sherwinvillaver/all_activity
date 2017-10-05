$(document).ready(function(){
	function readURL(input) {
    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#profile').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#file').change(function(){
		readURL(this);
	});

	$('#frmRegister').on('submit',function(e){
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
	        type:"POST",
	        url:'ajaxRegister',
	        data:formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function(data){
	        	var json = JSON.parse(data);
	        	var password = "";
	        	var confirm_password = "";
	        	if(json.message == "success"){
	        		$('label').removeClass('active');
	        		$('span').html('').hide('slow');
	        		$('#frmRegister')[0].reset();
	        		$('#profile').attr('src','/img/no_image.jpg');
	        		$('#success').html('Succesfully Registered').addClass('alert alert-success').show('slow',function(){
	        			window.location = '/';
	        		});
	        	}
	        	else{
	        		for(var key in json.form_validation) {
				        var selector = '#'+key;
				        if(json.form_validation[key] == true){
				        	$(selector).html('').hide('slow');
				        }
				        else{
				        	$(selector).html(json.form_validation[key]).show('slow');
				        }
				    }
	        	}
	        }
		});
	});

	$('#frmLogin').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"home/ajaxLogin",
			data: $('#frmLogin').serialize(),
			success: function(data){
	        	var json = JSON.parse(data);
				if(json.message == "login_success"){
					window.location = '/home/index';
	        	}
	        	else{
	        		for (var key in json.form_validation) {
				        var selector = '#'+key;
				        if(json.form_validation[key] == true){
				        	$(selector).html('').hide('slow');
				        }
				        else{
				        	$(selector).html(json.form_validation[key]).show('slow');
				        }
				    }
	        	}
			}
		});
	});

	$('#frmChangePassword').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"ajaxChangePassword",
			data: $('#frmChangePassword').serialize(),
			success: function(data){
	        	var json = JSON.parse(data);
				if(json.message == "success"){
					window.location = '/';
	        	}
	        	else{
	        		for (var key in json.form_validation) {
				        var selector = '#'+key;
				        if(json.form_validation[key] == true){
				        	$(selector).html('').hide('slow');
				        }
				        else{
				        	$(selector).html(json.form_validation[key]).show('slow');
				        }
				    }
	        	}
	   			// console.log(data);
			}
		});
	});
});