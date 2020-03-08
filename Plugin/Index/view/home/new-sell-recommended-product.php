<div class="jb-product-tab_area" style="padding-top:60px">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-tab">
					<ul class="nav product-menu">
						<li><a class="active" data-toggle="tab" href="#new-arrival"><span>Нови</span></a></li>
						<li><a data-toggle="tab" href="#bestseller"><span>Най-продавани</span></a></li>
						<li><a data-toggle="tab" href="#featured-products"><span>Препоръчвани</span></a></li>
					</ul>
				</div>
				<div class="tab-content jb-tab_content">
					<div id="new-arrival" class="tab-pane active show" role="tabpanel">
						<div class="jb-product-tab_slider">
							<?php set::view(constant("p"), 'product-temp/noraml-product'); ?>
						</div>
					</div>
					<div id="bestseller" class="tab-pane" role="tabpanel">
						<div class="jb-product-tab_slider">
							<?php set::view(constant("p"), 'product-temp/noraml-product'); ?>
						</div>
					</div>
					<div id="featured-products" class="tab-pane" role="tabpanel">
						<div class="jb-product-tab_slider">
							<?php set::view(constant("p"), 'product-temp/noraml-product'); ?>
						</div>
					</div>
				</div>
			</div>
			</div>
	</div>
</div>