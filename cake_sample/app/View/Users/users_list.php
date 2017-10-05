<div id="table-user">
		<div class="card">
			<div class="card-header">
				<h2 class="text-center">User List</h2>
				<div class="upper-right-opt">
					<?php echo $this->Html->link('Add User',array('action' => 'add'),array('class' => 'btn btn-primary')); ?>
				</div>
			</div>
			<div class="card-content">
				<div class="container col-md-12">
					<div class="table-responsive table-bordered">
						<table class="table">
							<tr>
								<th>ID</th>
						        <th>First Name</th>
						        <th>Lastname</th>
						        <th>Middlename</th>
								<th>Action</th>
							</tr>
							<?php foreach ($users as $user): ?>
								<tr>
									<td> <?php echo $user['User']['id']; ?> </td>
									<td> <?php echo $user['User']['first_name']; ?> </td>
									<td> <?php echo $user['User']['last_name']; ?> </td>
									<td> <?php echo $user['User']['middle_name']; ?> </td>
									<td> 
									<?php echo $this->Html->link('Edit', array('action' => 'edit',$user['User']['id']),array('class' => 'btn btn-primary'))." ".$this->Html->link('Delete', array('action' => 'delete',$user['User']['id']),array('confirm' => 'Are you sure you want to delete this data?','class' => 'btn btn-danger')); ?> 
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
				
			</div>
			<div class="card-footer">
				<div class="paging pagination pull-right ">
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
.current{
	background-color:#66b0ff;
	color:black;
}

</style>