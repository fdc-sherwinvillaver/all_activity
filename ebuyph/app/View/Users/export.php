<?php
	$line = $users[0]['User'];
	$this->Csv->addRow(array_keys($line));

 	foreach ($users as $user)
 	{
   		$line = $user['User']; 
   		$this->Csv->addRow($line);
 	}
 	$this->Csv->addRow(array_keys($line));

 	$filename = 'users';
 	echo  $this->Csv->render($filename);
?>