<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="<?php echo set::host(); ?>">Начало</a></li>
				<?php if($getVategoryPathPorduct[0] != null){ ?>
				<?php foreach ($getVategoryPathPorduct as $value) { ?>
					<li><a href="<?php echo set::url('product/1-30-trade/'.set::letTrans($value)) ?>"><?php echo $value ?></a></li>
				<?php } ?>
				<?php } ?>
				<li><a href="<?php echo $getArticulInfo['product_link_name'] ?>"><?php echo $getArticulInfo['product_title'] ?></a></li>
			</ul>
		</div>
		<div class="fb-share-button custom-share-button-fb"  
		data-href="http://set.host/artikul/smartfon-Samsung-Galaxy-S20-Plus-Dual-SIM-128GB-8GB-RAM-4G-Cosmic-Black/s4g6t4esdg5" 
		data-layout="button_count">
		</div>
	</div>
</div>