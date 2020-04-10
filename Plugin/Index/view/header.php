<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>
			<?php echo $title.' || '.$_SERVER['HTTP_HOST'] ?>
		</title>
		<?php 
			include set::path('Index', 'view', 'header/header-meta');
			include set::path('Index', 'view', 'header/header-link');
			include set::path('Index', 'view', 'header/header-script');
		?>
		
	</head>
	<body>
		<div class="wrapper">
			<?php  include set::path('Index', 'view', 'loading'); ?>
			<div class="header-middle_area">
				<div class="container">
					<div class="row">
						<?php 
							include set::path('Index', 'view', 'header/header-logo');
							include set::path('Index', 'view', 'header/header-search-by-cat');
							include set::path('Index', 'view', 'header/header-shoping-cart');
						?>
					</div>
				</div>
			</div>	