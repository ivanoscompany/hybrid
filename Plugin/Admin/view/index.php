<div class="wrapper">
	<!-- Sidebar  -->
	<?php include set::path('Admin', 'view', 'header/header-nav-left'); ?>
	<!-- Page Content  -->
	<div id="content">
		<?php include set::path('Admin', 'view', 'header/header-nav'); ?>
		<div class="body-operation">
			<?php include set::path('Admin', 'view', 'index/home'); ?>
			
		</div>
		<?php set::view('Trait', 'Modal'); ?>
	</div>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.iframe-transport.js"></script>
	<script src="js/jquery.fileupload.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
</div>