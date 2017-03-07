        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Brand</h1>
            </section>
            
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <div class="form-group">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>brand/add">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
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
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Brand List</h3>
                                <div class="box-tools">
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="table-index" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(!empty($brands))
                                        {
                                            foreach($brands as $key => $brand)
                                            {
                                            ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $brand->name ?></td>
                                            <td><?php echo $brand->address ?></td>
                                            <td><?php echo $brand->created_at ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'brand/edit/'.$brand->id; ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;</a>

                                                <a href="#" data-id="<?php echo $brand->id; ?>" class="delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }   
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript">
            $(document).on("click", ".delete", function(){
                var Id = $(this).data("id"),
                    URL = "<?php echo base_url() ?>brand/delete";
                
                var confirmation = confirm("Are you sure to delete this user ?");
                
                if(confirmation)
                {
                    $.ajax({
                        type : "POST",
                        dataType : "json",
                        url : URL,
                        data : { Id : Id } 
                    }).success(function(data){
                        console.log(data);
                        window.location.href = "<?php echo base_url() ?>brand";
                        window.location.reload();
                    });
                }
            });
        </script>
