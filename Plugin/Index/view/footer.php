<?php 
	include set::path('Index', 'view', 'footer/footer-subscribe-form');
?>
<div class="footer-middle_area bg--nero">
    <div class="container">
        <div class="row">
            <!-- Begin Footer Widgets Information Area -->
            <div class="col-lg-4">
                <div class="footer-widgets_info">
					<?php 
						include set::path('Index', 'view', 'footer/footer-logo'); 
						include set::path('Index', 'view', 'footer/footer-about-short-text'); 
						include set::path('Index', 'view', 'footer/footer-communication-info'); 
						include set::path('Index', 'view', 'footer/footer-social-icon'); 
					?>
				</div>
			</div>
            <!-- Footer Widgets Information Area End Here -->
            <!-- Begin Footer Widgets With Banner Area -->
            <div class="col-lg-8">
                <div class="footer-widgets-with_banner">
                    <?php include set::path('Index', 'view', 'footer/footer-banner'); ?>
                    <div class="row">
						<?php include set::path('Index', 'view', 'footer/footer-menu'); ?>
					</div>
				</div>
			</div>
            <!-- Footer Widgets With Banner Area End Here -->
		</div>
	</div>
</div>
<?php 
	include set::path('Index', 'view', 'footer/footer-copyright');
	include set::path('Admin', 'view', 'script');
?>
<script src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/js/plugins.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/js/main.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/js/bootstrap-datepicker.min.js"></script>
</div>
</body>
</html>