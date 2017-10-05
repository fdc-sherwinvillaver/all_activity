<div id="table-product">
	<div class="card">
		<div class="card-header">
			<h2 class="text-center">Product List</h2>
			<div class="upper-right-opt">
				<?php echo $this->Html->link('Add Product',array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
			</div>
		</div>
		<div class="card-content">
			<div class="container col-md-12">
				<div class="table-responsive table-bordered">
					<table class="table">
					<tr>
						<th>Product ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
					<?php  foreach ($products as $product): ?>
						<tr>
							<td><?php echo $product['Product']['product_id']; ?></td>
							<td><?php echo $product['Product']['name']; ?></td>
							<td><?php echo $product['Product']['description']; ?></td>
							<td><?php echo $product['Product']['type']; ?></td>
							<td><?php echo $this->Html->link('Edit',array('action' => 'edit',$product['Product']['product_id']),array('class' => 'btn btn-primary'))." ".$this->Html->link('Delete',array('action' => 'delete',$product['Product']['id']),array('confirm' => 'Are you sure?','class'=>'btn btn-danger')); ?></td>
						</tr>
					<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="paging pagination pull-right">
				<?php  
					echo $this->paginator->prev('Previous',array('class' => 'page-link'));
					echo $this->paginator->numbers(array('separator' => ' ','class' => 'page-link'));
					echo $this->paginator->next('Next',array('class' => 'page-link'));
				?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
.pagination {
	margin: 0px !important;
}
</style>