<?php  
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body');
	echo $this->Form->input('author');
	echo $this->Form->end('Save');
?>