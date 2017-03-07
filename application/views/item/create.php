<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Item<small>Add</small></h1>
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
					echo form_open('item/add');
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
										echo form_label('Description', "description");
										echo form_textarea('description', set_value('description'), 'class="form-control"');
										?>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<?php
										echo form_label('Stock', "stock");
										echo form_input('stock', set_value('stock'), 'class="form-control"');
									?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<?php
										echo form_label('Brand', "brand");
										?>
										<select class="form-control" name="brand">
											<option value="">Select Brands</option>
											<?php
											if(!empty($brands))
											{
												foreach ($brands as $brand)
												{
												?>
												<option value="<?php echo $brand->id ?>" <?php if(set_value('brand') == $brand->id){
													{echo "selected=selected";}
													}?>><?php echo $brand->name ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>    
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<?php
										echo form_label('Status Active', "is_active");
										?>
										<select class="form-control" name="is_active">
											<option value="1" 
												<?php if(set_value('is_active') == 1){
													{echo "selected=selected";}
													}?>
												>Active</option>
											<option value="0" <?php if(set_value('is_active') == 0){
													{echo "selected=selected";}
													}?>
													>Not Active</option>
										</select>
									</div>
								</div>    
							</div>
						</div><!-- /.box-body -->

						<div class="box-footer">
							<?php
							echo form_submit('item/add', 'Submit', 'class="btn btn-primary" ');
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