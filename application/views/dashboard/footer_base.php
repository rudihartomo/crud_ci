			
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>CRUD</b> Codeigniter
			</div>
			<strong>Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo base_url(); ?>">CRUD CI</a></strong>
		</footer>

		<!-- Bootstrap 3.3.2 JS -->
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- DataTables -->
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(function () {
			$('#table-index').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"pageLength": 5
			});
		});
		</script>
	</body>
</html>