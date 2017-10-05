<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('dataTables.bootstrap4');
		echo $this->Html->css('sb-admin');
    echo $this->Html->css('styles');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  <?php 
    echo $this->Html->script('jquery');
    echo $this->Html->script('jquery.min');
    echo $this->Html->script('popper.min');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('jquery.easing.min');
    echo $this->Html->script('jquery.dataTables');
    echo $this->Html->script('dataTables.bootstrap4');
    echo $this->Html->script('ajax');
    echo $this->Html->script(array('jquery.backDetect.min'));
  ?>
</head>

<body>
  <div class="container col-md-12">
    <br>
    <br>
    <br>
    <br>
      <?php echo $this->Flash->render('Message') ?>
      <?php echo $this->Flash->render('auth') ?>
      <?php echo $this->fetch('content'); ?>
  </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
