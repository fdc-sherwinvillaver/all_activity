<h2>Edit Post</h2>

<div class="upper-right-opt">
	<?php echo $this->Html->link('List Posts', array('action' => 'index')); ?>
</div>
<?php  
echo $this->Form->create('Product');
	echo $this->Form->input('name');
	echo $this->Form->input('description', array('rows' => '3'));
	echo $this->Form->input('type');
	echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Update');
?>