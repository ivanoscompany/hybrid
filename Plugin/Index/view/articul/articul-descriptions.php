<div class="row">
	<div class="col-lg-12">
		<div class="product-tab">
			<ul class="nav product-menu">
				<li><a class="active" data-toggle="tab" href="#description"><span>Описание</span></a></li>
				<li><a data-toggle="tab" href="#product-details"><span>Характеристики</span></a></li>
				<li><a data-toggle="tab" href="#documentation"><span>Документация</span></a></li>
				<li><a data-toggle="tab" href="#accessories"><span>Аксесоари</span></a></li>
				<li><a data-toggle="tab" href="#reviews"><span>Отзиви</span></a></li>
			</ul>
		</div>
		<div class="tab-content jb-tab_content">
			<div id="description" class="tab-pane active show" role="tabpanel">
				<div class="product-description">
					<p class="short-desc">
						<?php echo $getArticulInfo['product_fast_desc']; ?>
					</p>
				</div>
			</div>
			<div id="product-details" class="tab-pane" role="tabpanel">
				<div class="product-related_stuff">
					<div class="product-desc_list">
						<?php echo html_entity_decode($getArticulInfo['product_desc']); ?>
					</div>
				</div>
			</div>
			<div id="documentation" class="tab-pane" role="tabpanel">
				<div class="product-documentation">
					<a href='image/product/single-product/sample.pdf' target='_blank'><img src='image/product/large-size/1.jpg'/></a>
				</div>
			</div>
			<div id="product-details" class="tab-pane" role="tabpanel">
				<div class="product-related_stuff">
					<div class="product-manufacturer">
						<a href="#">
							<img src="image/single-product/1.jpg" alt="JB's Manufacturer Image">
						</a>
					</div>
					<div class="product-reference">
						<span><strong>Reference</strong>demo_1</span>
					</div>
					<div class="product-quantities">
						<span><strong>In stock</strong>299 Items</span>
					</div>
				</div>
			</div>
			<div id='accessories' class='tab-pane' role='tabpanel'>
				<?php if($getAccsessoariWhile[0] == null){ ?>
					<div class="alert alert-dark" role="alert">
						Няма аксесоари за този продукт
					</div>
					<?php } else { ?>
					<div class="accessories-box">
						<div class='SingleProductBundle'>
							<div class='singleProdSlider singleProductsSlider'>
								<?php foreach ($getAccsessoariWhile as $value){ ?>
									<div class='BundleProduct jb-slide-item'>
										<h5 class='bundleProductName'><?php echo $value['product_title'] ?></h5>
										<img src='<?php echo $value['product_image'] ?>'/>
										<span class='bundleProductPrice'><?php echo $value['product_price'] ?> лв.</span><br><br>
										<button class='addBundleProduct'>Виж повече</button>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div id="reviews" class="tab-pane" role="tabpanel">
				<div class="product_comments_block">
					<?php if($getAllComent[0] == null){ ?>
						<div class="jumbotron">
							<h1 class="display-4">Здравей</h1>
							<p class="lead">Все още никой потребител не е написал отзвис, ако този продукт ви е харесал моля напишете отзив.</p>
							<hr class="my-4">
							<p>Вие ще бъдете първият който ще напише отзив.</p>
						</div>
						<?php } else { ?>
						<?php foreach ($getAllComent as $value) { ?>
							<div class="rating-box">
								<span>Оценка</span>
								<ul>
									<?php for ($x = 1; $x <= $value['product_rating']; $x++) { ?>
										<li><i class="fa fa-star"></i></li>
									<?php } ?>
								</ul>
							</div>
							<div class="comment_details same-stuff">
								<span class="user-id"><?php echo $value['product_rating_name'] ?></span>
								<em><?php echo $value['product_rating_date'] ?></em>
								<em class="user-comment"><?php echo $value['product_rating_coment'] ?></em>
							</div>
						<?php } ?>
					<?php } ?>
					<hr>
					<div class="review-btn_area">
						<a class="review-btn" href="#" data-toggle="modal" data-target="#mymodal">Напишете вашия отзив!</a>
					</div>
					<?php include set::path('Index', 'view', 'articul/articul-descriptions/articul-modal-user-coment'); ?>
				</div>
			</div>
		</div>
	</div>
</div>						