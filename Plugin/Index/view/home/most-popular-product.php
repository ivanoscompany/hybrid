<div class="jb-product-tab_area jb-product-tab_area-2" style="padding-top:60px">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-tab product-tab-2">
					<div class="product-tab_heading">
						<h4>Най-популярните за 2019</h4>
					</div>
					<ul class="nav product-menu">
						<li><a class="active" data-toggle="tab" href="#fashion"><span>Дом и градина</span></a></li>
						<li><a data-toggle="tab" href="#electronics"><span>Електрически инструменти</span></a></li>
						<li><a data-toggle="tab" href="#toys-hobbies"><span>Компресори</span></a></li>
					</ul>
				</div>
				<div class="tab-content jb-tab_content">
					<div id="fashion" class="tab-pane active show" role="tabpanel">
						<div class="jb-product-tab_slider-2">
							<?php set::view(constant("p"), 'product-temp/noraml-product'); ?>
						</div>
					</div>
					<div id="electronics" class="tab-pane" role="tabpanel">
						<div class="jb-product-tab_slider-2">
							<?php set::view(constant("p"), 'product-temp/noraml-product'); ?>
						</div>
					</div>
					<div id="toys-hobbies" class="tab-pane" role="tabpanel">
						<div class="jb-product-tab_slider-2">
							<?php set::view(constant("p"), 'product-temp/noraml-product'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>