
<div class="container">
	<div class="row align-items-start mb-1">
		<div class="col-6">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		</div>
		<div class="col">
		</div>
		<div class="col">
			
		</div>
	</div>
	<div class="btn-toolbar mb-1" role="toolbar" aria-label="Toolbar with button groups">
		<div class="btn-group mr-2" role="group" aria-label="First group">
			<?php for ($x = 1; $x <= $totalPages; $x++) {  ?>
				<?php if($dataPage == $x){ ?>
					<button type="button" class="btn btn-primary"><?php echo $x ?></button>
				<?php } else { ?>
					<button type="button" class="btn btn-secondary" onclick="run({
						plugin:'Admin',
						controller:'product',
						back:'.body-operation',
						massive:{
							page:<?php echo $x ?>
						}
					})"><?php echo $x ?></button>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>