<h2>Add User</h2>
<div class="upper-right-opt">
	<?php echo $this->Html->link('List Users',array('action' => 'index')); ?>
</div>
<?php  
	echo $this->Form->create('User');
	echo $this->Form->input('first_name');
	echo "<div id='first_name'></div>";
	echo $this->Form->input('last_name');
	echo "<div id='last_name'></div>";
	echo $this->Form->input('middle_name');
	echo "<div id='middle_name'></div>";
	echo $this->Form->end('Save');
?>