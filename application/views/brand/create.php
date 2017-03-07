<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Brand<small>Add</small></h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<?php
				$error = $this->session->flashdata('error');
				if($error)
				{
				?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php 
				}
				$success = $this->session->flashdata('success');
				if($success)
				{
				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php 
				} 
				?>

				<div class="row">
					<div class="col-md-12">
						<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
					</div>
				</div>
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Form Data</h3>
					</div><!-- /.box-header -->
					<!-- form start -->

					<?php
					echo form_open('brand/add');
					?>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<?php
										echo form_label('Name', "name");
										echo form_input('name', set_value('name'), 'class="form-control"');
										?>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<?php
										echo form_label('Address', "address");
										echo form_textarea('address', set_value('address'), 'class="form-control"');
										?>
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->

						<div class="box-footer">
							<?php
							echo form_submit('brand/add', 'Submit', 'class="btn btn-primary" ');
							?>
						</div>
					<?php
					echo form_close();
					?>
				</div>
			</div>
		</div>   
	</section>
</div>