<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>Log in | Crud CI</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  	</head>
  	<body class="login-page">
    	<div class="login-box">
      		<div class="login-logo">
       			<a href="#"><b>Crud Codeigniter</b></a>
      		</div><!-- /.login-logo -->
      	
      		<div class="login-box-body">
        		<h3 class="login-box-msg">Log In</h3>
        		
        		<div class="row">
            		<div class="col-md-12">
                		<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            		</div>
        		</div>
        		<?php
    			$error = $this->session->flashdata('error');
    			if($error)
    			{
        		?>
        			<div class="alert alert-danger alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            			<?php echo $error; ?>                    
        			</div>
    			<?php 
    			}

    			echo form_open('user');
        		?>
					<div class="form-group has-feedback">
						<?php
		                    echo form_input('email', set_value('email'), 'class="form-control"  placeholder="Email"');
		                ?>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<?php
		                    echo form_password('password', '', 'class="form-control" placeholder="Password"');
		                ?>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-3">           
						</div><!-- /.col -->
						<div class="col-xs-6">
							<?php echo form_submit('user', 'Login', 'class="btn btn-primary btn-block btn-flat"'); ?>
						</div><!-- /.col -->
					</div>
				<?php
				echo form_close();
				?>
			</div><!-- /.login-box-body -->
		</div><!-- /.login-box -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>