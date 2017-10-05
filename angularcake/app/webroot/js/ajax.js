$(document).ready(function(){

	$('#UserAddForm').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'ajaxAdd',
			data: $('#UserAddForm').serialize(),
			success: function(result){
				var json = JSON.parse(result);
				if(json.message == "success"){
					window.location = '../users';
				}
				else{
					$('span#errors').remove();
					console.log(json);
					for(var i = 0; i < json['error_fields'].length; i++){
						var field = json['error_fields'][i];
						var selector = '#'+field;
						$(selector).prepend('<span id="errors">' + json['errors'][field][0] + '</span>').css('color','red');
					}
				}
			}
		});
	});

	$('#UserEditForm').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'../ajaxEdit',
			data: $('#UserEditForm').serialize(),
			success: function(result){
				var json = JSON.parse(result);
				if(json.message == "success"){
					window.location = '../../users';
				}
				else{
					$('span#errors').remove();
					console.log(json);
					for(var i = 0; i < json['error_fields'].length; i++){
						var field = json['error_fields'][i];
						var selector = '#'+field;
						$(selector).prepend('<span id="errors">' + json['errors'][field][0] + '</span>').css('color','red');
					}
				}
			}
		});
	});

	

	$(document).on('click','#table-users .paging span a',function(e){
		e.preventDefault();
		e.stopPropagation();
		var href = "http://local.cakephp.com" + $(this).attr('href');
		$.ajax({
			type: 'GET',
			url: href,
			dataType: 'html',
			beforeSend: function() {
		        $('#loader').fadeIn('slow');
		        $('#table-users').fadeOut('slow');
		    },
			success: function(data){
				$('#table-user').remove();
				$('#table-users').html(data);
			},
			complete: function() {
		    	$('#loader').fadeOut('slow');
		    	$('#table-users').fadeIn('slow');
		    }
		});
	});


	$(document).on('click','#table-products .paging span a',function(e){
		e.preventDefault();
		e.stopPropagation();
		var href = "http://local.cakephp.com" + $(this).attr('href');
		$.ajax({
			type: 'GET',
			url: href,
			dataType: 'html',
			beforeSend: function() {
		        $('#loader').fadeIn('slow');
		        $('#table-products').fadeOut('slow');
		    },
			success: function(data){
				$('#table-product').remove();
				$('#table-products').html(data);
				
			},
			complete: function() {
		    	$('#loader').fadeOut('slow');
		    	$('#table-products').fadeIn('slow');
		    }
		});
	});
});