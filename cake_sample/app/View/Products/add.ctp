<h2>Add New Post</h2>
<div class="upper-right-opt">
	<?php echo $this->Html->link('List Products', array('action' => '../users/index')); ?>
</div>

<?php  
echo $this->Form->create('Product');
	echo $this->Form->input('name');
	echo $this->Form->input('description', array('rows' => '3'));
	echo $this->Form->input('type');
echo $this->Form->end('Submit');
?>