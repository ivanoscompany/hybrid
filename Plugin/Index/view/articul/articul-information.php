<div class="col-lg-7 col-md-7">
	<div class="sp-content">
		<div class="sp-heading">
			<h5><a href="#"><?php echo $getArticulInfo['product_title'] ?></a></h5>
		</div>
		<div class="split-box">
			<div class="rating-box">
				<ul>
					<?php for ($i = 1; $i <= $getProductRaitingValue; $i++) { ?>
						<li><i class="fa fa-star"></i></li>
					<?php } ?>
				</ul>
			</div>
			<?php if($getArticulInfo['product_status'] != 3){ ?>
				<div class="reference-box">
					<div>Артикулен номер: <span style="font-size: 18px"><?php echo $getArticulInfo['product_code'] ?></span></div><br>
					<div><a href="shop.html"><img src="<?php echo $Brand['brand_img'] ?>" /></a></div><br>
					<div>Произход: <?php echo $getArticulInfo['product_origin'] ?></div><br>
					<?php if($getArticulInfo['product_guarantee']){ ?>
						<div>Гаранция: <?php if($getArticulInfo['product_guarantee'] != ""){ echo $getArticulInfo['product_guarantee'].' години'; } else { echo 'Няма'; } ?></div><br>
					<?php } ?>
					<div><i class="fas fa-sync-alt"></i> 15 дни право на връщане</div><br>
					<?php if($getArticulInfo['product_price'] > 69){ ?>
						<div><i class="fa fa-truck"></i> Безплатна доставка</div><br>
					<?php } ?>
					<?Php if($getArticulInfo['product_free_ship']){ ?>
						<div><i class="fa fa-truck"></i> Доставка до 20 рабодни дни</div><br>
					<?php } ?>
					<?Php if($getArticulInfo['product_installation']){ ?>
						<div class='installation'><i class="fas fa-wrench"></i> Монтаж <sup><i class="far fa-question-circle"></i></sup>
							<p class='installation-tooltip'>Фирмата предлага платен монтаж</p>
						</div><br>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if($getProductVariation[0] != null){ ?>
				<?php foreach ($getProductVariation as $value){ ?>
					<div class="product-size_box">
						<span><?php echo $value['filter_name_title'] ?></span>
						<select class="nice-select select-variation-to-cart">
							<?php foreach ($this->filter_value_slot_innert($value['filter_name_id']) as $value2){ ?>
								<option value="<?php echo $value['filter_name_title'].':'.$value2['filter_value_name'] ?>"><?php echo $value2['filter_value_name'] ?></option>
							<?php } ?>
						</select>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="split-box">
			<div class="availbaility-box">
				<span id='storage'><?php echo $getArticulInfo['product_count'] ?></span>
			</div>
			<?php if($getArticulInfo['product_count'] == 'На склад'){ ?>
				<?php if(date("YmdHis") < $promoDateClear3) {?>
					<div class="product-desc_info">
						<div class="inner-desc">
							<p>Побързайте! Промоцията изтича след:</p>
						</div>
						<div class="jb-countdown" countdown-date='<?php echo $getArticulInfo['product_promotion_end'] ?>'></div>
					</div>
					<div class="price-box">
						<span class="new-price"><?php echo $getArticulInfo['product_price_new'] ?> лв.</span>
						<span class="old-price"><?php echo $getArticulInfo['product_price'] ?> лв.</span><br>
						<span class="saved"><i class="fas fa-coins"></i>Спестявате <?php echo $getArticulInfo['product_price'] - $getArticulInfo['product_price_new'] ?> лв.</span>
					</div>
					<?php } else { ?>
					<div class="price-box">
						<span class="new-price"><?php echo $getArticulInfo['product_price'] ?> лв.</span>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="quantity">
				<?php if($getArticulInfo['product_count'] == 'На склад'){ ?>
					<?php if($getProducCarExsist[0] == null){ ?>
						<label>Количество</label>
						<div class="cart-plus-minus">
							<input class="cart-plus-minus-box" value="1" type="text">
							<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
							<div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
						</div>
						<div class="jb-quantity-btn_area">
							<a class="jb-quantity_btn buy addToCartButton" href="" onclick="addToCardScript()">Добави в кошница</a>
						</div>
						<?php include set::path('Index', 'view', 'articul/articul-modal-add-to-cart'); ?>
						<!--
							<div class="jb-quantity-btn_area">
							<a class="jb-quantity_btn leasing" href="cart.html">Купи на изплащане</a>
							</div>
						-->
						<?php } else { ?>
						<div class="alert alert-success" role="alert">
							Продуктът вече е добавен в количката
						</div>
						<?php include set::path('Index', 'view', 'articul/articul-button-go-to-pay'); ?>
					<?php } ?>
				<?php } ?>
				<?php if($getArticulInfo['product_count'] == 'Изчерпано количество'){ include set::path('Index', 'view', 'articul/articul-offer'); } ?>
			</div>
		</div>
		<div class="jb-social_link jb-link_share">
			<?php if(count($this->user_compare_model()) < 2){ ?>
				<a class="jb-sp_link" href="<?php echo set::url('sravnqvane') ?>">
					<button onclick="run({
					plugin:'Index',
					controller:'articul',
					method:'addNewCompareContoller',
					back:'.error-log',
					massive:{
					id:<?php echo $getArticulInfo['product_id'] ?>
					}
					})">
						<span>Сравни продукт</span>
						<i class="far fa-copy"></i>
					</button>
				</a>
				<?php } else { ?>
				<button onclick="alert('Имате прекалено много артикули за сравняване')">
					<span>Сравни продукт</span>
					<i class="far fa-copy"></i>
				</button>
			<?php } ?>
			<a href="<?php echo set::url('lubimi') ?>">
				<button onclick="run({
				plugin:'Index',
				controller:'articul',
				method:'addNewWihlistContoller',
				back:'.error-log',
				massive:{
				id:<?php echo $getArticulInfo['product_id'] ?>
			}
			})">
				<span>Добави в любими</span>
				<i class="far fa-heart"></i>
			</button>
			</a>
		</div>
		<div class='SingleProductBundle present'>
			<div class="section_title-2">
				<h4>Подарък към продукта</h4>
			</div>
			<?php foreach ($getGifsWhile as $value){ ?>
				<?php if(date("Y-m-d") <= $value['product_items_date']) { ?>
				<div class='BundleProduct'>
					<h5 class='bundleProductName'><?php echo $value['product_title'] ?></h5>
					<img src='<?php echo $value['product_image'] ?>'/>
				</div>
				<?php } else { ?>
				<div class="alert alert-dark" role="alert">
					Няма подарък за този продукт
				</div>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>