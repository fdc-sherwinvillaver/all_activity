<h2>User List</h2>
<div class="upper-right-opt">
	<?php echo $this->Html->link('Add User',array('action' => 'add')); ?>
</div>
<div id="contents">
	
    <?php foreach($users as $value): ?>
    <div class="content">
        <div style="border:1px solid; height:200px;"><?php echo $value['User']['first_name']; ?><?php echo " "; ?><?php echo $value['User']['last_name']; ?><?php echo " "; ?><?php echo $value['User']['middle_name']; ?>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="append">

    </div>
    <?php echo $this->Html->image('tenor.gif', array('class' => 'hide', 'id' => 'loader')); ?>
</div>
