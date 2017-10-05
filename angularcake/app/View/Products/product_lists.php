<div id="table-product">
		<h2>Product List</h2>
		<div class="upper-right-opt">
			<?php echo $this->Html->link('Add Product',array('action' => 'add')); ?>
		</div>
		<table>
		<tr>
			<th>Product ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Type</th>
			<th>Action</th>
		</tr>
		<div style="position: relative;"><?php echo $this->Html->image('tenor.gif', array('class' => 'hide', 'id' => 'loader')); ?></div>
		<?php  foreach ($products as $product): ?>
			<tr>
				<td><?php echo $product['Product']['product_id']; ?></td>
				<td><?php echo $product['Product']['name']; ?></td>
				<td><?php echo $product['Product']['description']; ?></td>
				<td><?php echo $product['Product']['type']; ?></td>
				<td><?php echo $this->Html->link('Edit',array('action' => 'edit',$product['Product']['id']))."||".$this->Html->link('Delete',array('action' => 'delete',$product['Product']['id']),array('confirm' => 'Are you sure?')); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
		<div class="paging">
			<?php  
				echo $this->paginator->prev('Previous');
				echo $this->paginator->numbers();
				echo $this->paginator->next('Next');
			?>
		</div>
	</div>