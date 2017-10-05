<?php 
	$paginator = $this->Paginator; 
?>
<div>
	<p>Welcome Mr. <?php echo $user['first_name']." ".$user['middle_name'][0].". ".$user['last_name']; ?> <a href="../users/logout">Logout</a></p>
</div>
<div id="table-users">
	
</div>
<br>
<br>
<div id="table-products">
	
</div>
<script>

$(function() {
	getUserList();
	getProductList();
});

function getUserList() {
	$.ajax({
		type: 'GET',
		url: 'usersList',
		dataType: 'html',
		beforeSend: function() {
			$('#loader').fadeIn('slow');
		},
		success: function(data){
			$('#table-users').html(data);
		},
		complete: function() {
			$('#loader').fadeOut('slow');
		}
	});
}

function getProductList(){
	$.ajax({
		type: 'GET',
		url: '../products/productLists',
		dataType: 'html',
		beforeSend: function() {
			$('#loader').fadeIn('slow');
		},
		success: function(data){
			$('#table-products').html(data);
		},
		complete: function() {
			$('#loader').fadeOut('slow');
		}
	});
}

</script>
