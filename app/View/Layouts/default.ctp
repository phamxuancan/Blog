<!DOCTYPE html>
<html>
<head>
<link href="<?php echo $this->Html->url('/'); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $this->Html->url('/'); ?>bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="<?php echo $this->Html->url('/'); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="<?php echo $this->Html->url('/'); ?>bootstrap/js/jquery-1.11.2.min.js" ></script>
<script src="<?php echo $this->Html->url('/'); ?>bootstrap/js/bootstrap.js" ></script>
<script src="<?php echo $this->Html->url('/'); ?>js/User.js" ></script>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'MOB'; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body>
	<div id="container">
		<div id="header">
           <span class="fa-5x">MOB</span>
            <?php
                if($this->Session->read('is_login')){
                    echo $this->Html->link(
                        __('logout'),
                        array('controller'=>'users','action' => 'logout',),
                        array('class'=>'btn btn-warning pull-right')
                    );
                }
            ?>


		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
