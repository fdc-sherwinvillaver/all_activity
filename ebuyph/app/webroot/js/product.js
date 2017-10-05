$(document).ready(function(){
	function readURL(input) {
	    if (input.files) {
	        var file_count = input.files.length;
	        var selector = "";
	        var test = 0;
	        for(var i = 0; i < file_count; i++){
        		$('#picture').append('<img src="" id="product'+i+'" style="width:52px; height:50px;">');
	        	var reader = new FileReader();
	        	reader.onload = function (e) {
	        		var selector = '#product'+test++;
	        		$(selector).attr('src',e.target.result);
		        }
	    		reader.readAsDataURL(input.files[i]);
	        }
	    }
	}
	$('#file').change(function(){
		readURL(this);
	});
	
	var type = {'Shirt':'shirt','Shoes':'shoes','Jeans':'jeans'};

	var variations = {'Shirt' : { 'Size' : 'size-shirt' },'Shoes' : { 'Size' : 'size-shoes' },'Jeans' : { 'Size' : 'size-jeans' }};

	var variation_type = {'Size-shoes' : {'8' : 8,'9' : 9,'10' : 10,'11' : 11,'12' : 12,},'Size-shirt' : {'Small' : 'small','Medium' : 'medium','Large' : 'large'},'Size-jeans' : {'31' : 31,'32' : 32,'33' : 33,'34' : 34,'35' : 35,} };

	var colors = {'Red' : 'red', 'Green' : 'green', 'Blue' : 'blue'};

	// $('#myselect').material_select('destroy');

	$.each(type, function(key, value) {   
     	$('#type').append('<option value="'+ value +'">'+ key +'</option>');
	});

	$.each(colors, function(key, value) {   
     	$('#product_colors').append('<option value="'+ value +'">'+ key +'</option>');
	});

	$('.mdb-select').material_select();


	$('#type').on('blur',function(){
		console.log('test');
	});

	$('#type').on('change',function(e){

		$('.mdb-select').material_select('destroy');

		$('#variations #wo_value').siblings().remove();
		$('#variation_type #wo_value').siblings().remove();
		$('#variations #wo_value').prop('selected','selected');
		$('#variation_type').prop('disabled', true);
		var first_letter = e.target.value[0].toUpperCase();
		var value = e.target.value;
		var value = first_letter+value.substring(1,value.length);
		$.each(variations[value], function(key, value) {
	     	$('#variations').append('<option id="w_value" value="'+ value +'">'+ key +'</option>');
		});
		$('#variations').prop('disabled', false);

		$('.mdb-select').material_select();
	});


	$('#variations').on('change',function(e){

		$('.mdb-select').material_select('destroy');
		$('#variation_type #wo_value').siblings().remove();
		var first_letter = e.target.value[0].toUpperCase();
		var value = e.target.value;
		var value = first_letter+value.substring(1,value.length);

		$.each(variation_type[value], function(key, value) {
	     	$('#variation_type').append('<option id="w_value" value="'+ value +'">'+ key +'</option>');
		});

		$('#variation_type').prop('disabled', false);
		$('.mdb-select').material_select();
	});

	


	$('#frmProduct').on('submit',function(e){
		e.preventDefault();
		var formData = new FormData(this);
		var files = $('#file').get(0).files;
		
		for(var i=0; i<files.length; i++){
			formData.append('data[ProductInformation][product_picture]['+i+']',files[i]);
		}

		$('#variation_type option').each(function(i) {
            if (this.selected == true) {
            	if(this.value !=""){
                	formData.append('data[ProductInformation][product_variation_type]['+i+']',this.value);
            	}
                // mySelections.push(this.value);
            }
        });
        $('#product_colors option').each(function(i) {
            if (this.selected == true) {
            	if(this.value !=""){
                	formData.append('data[ProductInformation][product_colors]['+i+']',this.value);
            	}
                // mySelections.push(this.value);
            }
        });

		$.ajax({
	        type:"POST",
	        url:'ajaxRegProduct',
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function(data){
	        	var json = JSON.parse(data);
	        	if(json.message == "success"){
	        		window.location = "myproducts";
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
	$('.negative').on('click',function(e){
		var selector = '#input'+e.target.id;
		var quantity = parseInt($(selector).val());
		var data = quantity - 1;
		if(data < 0){
			$(selector).val(0);
		}
		else{
			$(selector).val(data);
		}
	});
	$('.positive').on('click',function(e){
		var selector = '#input'+e.target.id;
		var quantity = parseInt($(selector).val());
		$(selector).val(quantity + 1);
	});

	$('.addToCart').on('click',function(e){
		e.preventDefault();
		var selector = '#input'+e.target.id;
		var product_id = $(this).data('id');
		var quantity = $(selector).val();
		var user_id = $('#user_id').val();
		var data = {
			'data[ProductCart][product_id]' : product_id,
			'data[ProductCart][quantity]' : parseInt(quantity),
			'data[ProductCart][user_id]' : user_id
		};
		$.ajax({
			type:'POST',
			url:'cart',
			data: data,
			success: function(data){
				var json = JSON.parse(data);
				if(json.message == "success"){
					updateCart();
				}
			}
		});
		$(selector).val(0);
	});
	var product_count;
	updateCart();
	function updateCart(){
		var user_id = $('#user_id').val();
		var data = {
			'data[ProductCart][user_id]' : user_id
		}
		$.ajax({
			type:'POST',
			url:'/products/cartlist',
			data:data,
			success: function(data){
				var total_payment = 0;
				var total_quantity = 0;
				var json = JSON.parse(data);
				var cart_list = "";
				var number = 0;
				$('#cart_data').html('');
				if(json.cart.length > 0){
					for(var i = 0; i < json.cart.length; i++){
						number = number + 1;
						cart_list += "<tr>";
						cart_list += "<th scope='row'>"+ number +"</th>";
						cart_list += "<td>"+ json.cart[i].ProductInformation.product_name +"</td>";
						cart_list += "<td>$"+ json.cart[i].ProductInformation.product_price +"</td>";
						cart_list += "<td>"+ json.cart[i].ProductCart.quantity +"</td>";
						cart_list += "<td><input name='product_id"+i+"' id='product_id"+i+"' type='text' value='" +json.cart[i].ProductCart.product_cart_id +"' hidden><a><i class='fa fa-remove'></i></a></td>"
						cart_list += "</tr>";
						total_payment += parseInt(json.cart[i].ProductInformation.product_price) * parseInt(json.cart[i].ProductCart.quantity);
						total_quantity += parseInt(json.cart[i].ProductCart.quantity);
					}
					cart_list += "<tr>";
					cart_list += "<th scope='row'>#</th>";
					cart_list += "<td><strong>TOTAL</strong></td>";
					cart_list += "<td>$"+ total_payment +".00<input type='text' name='total_payment' value='"+total_payment+"' hidden></td>";
					cart_list += "<td>"+ total_quantity +"<input type='text' name='total_quantity' value='"+total_quantity+"' hidden></td>";
					cart_list += "</tr>";
					$('#cart_data').html(cart_list);
				}
				else{
					cart_list += "<tr>";
					cart_list += "<td class='text-center'>No items on cart</td>";
					cart_list += "</tr>";
					$('#cart_data').html(cart_list);
				}
				if(json.count > 0){
					$('#cart_number').html(json.count);
				}
				else{
					$('#cart_number').html(0);
				}	
				product_count = json.count;
			}
		});
	}

	$("#frmCheckout").on('submit',function(e){
		e.preventDefault();
		var formData = [];
		var form_inputs = $('#frmCheckout input[type="text"],#frmCheckout input[type="email"]');
		$.each(form_inputs,function(key,value){
			var input_name = value.name;
			var obj = {};
			obj[input_name] = value.value
			formData.push(obj);
		});
		var data;
		var old_key;
		var new_data;
		var old_data;
		$.each(formData,function(key,value){
			$.each(value,function(key,value){
				if(old_key == null){
					data = '"Payments]['+ key +']": "'+ value +'",';
					old_key = key;
					old_data = data;
				}
				else{
					if(old_key != key){
						data = old_data + '"Payments]['+ key +']" : "'+ value + '",';
						old_data = data;
					}
				}
			});
		});
		data = old_data + '"Payments][product_count]" : "'+ product_count + '",';
		var payment_data = '{"data" : {' + data.substring(0,data.length - 1) + '}}';
		var json = JSON.parse(payment_data)
		$.ajax({
			type:'POST',
			url:'ajaxCheckOut',
			data: json,
			success: function(data){
				var json = JSON.parse(data);
				if(json.message == 'success'){
					window.location = '/products/myproducts';
				}
				else{
					$.each(json.form_validation,function(key,value){
						var selector = '#'+key;
						console.log(selector);
						$(selector).html(value).show('slow');
					});
				}
			}
		});
	});
});