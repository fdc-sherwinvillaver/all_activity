<?php 
	$paginator = $this->Paginator; 
?>
<div class="row">
	<div class="pull-left col-md-4">
		<div class="card">
			<div class="pull-left container col-md-4">
				<?php echo $this->Html->image('tenor.gif',array('style'=> 'height:66px; width:100px;')); ?>
			</div>
			<div class="container">
				<br>
				<p class="text-center">
					Welcome Mr. <?php echo $user['first_name']." ".$user['middle_name'][0].". ".$user['last_name']; ?>
				</p>
			</div>
			<div class="text-center">
				 <a class="btn btn-primary" href="../users/logout">Logout</a>
				 <br><br>
			</div>
		</div>
	</div>
</div>
<br>
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
		url: 'users/usersList',
		dataType: 'html',
		success: function(data){
			$('#table-users').html(data);
		}
	});
}

function getProductList(){
	$.ajax({
		type: 'GET',
		url: '../products/productLists',
		dataType: 'html',
		success: function(data){
			$('#table-products').html(data);
		}
	});
}
</script>
