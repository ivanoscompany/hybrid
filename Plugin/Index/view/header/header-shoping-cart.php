<?php 
	foreach ($cartProduct as $value) {
		$getPrice = $this->get_product_price_model($value['product_id']);
		$getTotalValuePrice .= $getPrice * $value['product_cart_count'].'/';
	} 
	$getExplodeTotalValue = explode('/',$getTotalValuePrice);
	$getSumTotalPrice = array_sum($getExplodeTotalValue);
	$getDeliveryPrice = 3;
	if($getSumTotalPrice == 0){
		$getTotalPrice = 0;
	} else {
		$getTotalPrice = $getSumTotalPrice + $getDeliveryPrice;
	}
?>
<div class="col-lg-2 col-md-3 col-sm-6 col-6 order-1 order-lg-3 order-sm-1">
	<div class="hm-minicart_area">
		<ul>
			<li>
				<a href="cart.html">
					<div class="minicart-icon">
						<i class="fa fa-shopping-cart"></i>
						<?php if($cartProduct[0]==null){ ?> 
							<span class="item-count">0</span>
							<?php } else { ?>
							<span class="item-count"><?php echo count($cartProduct) ?></span>
						<?php } ?>
					</div>
					<div class="minicart-text"><span>Кошница</span></div>
					<div class="item_total"><span><?php echo $getTotalPrice ?>лв</span></div>
				</a>
				<ul class="minicart-body">
					<?php if($cartProduct[0]==null){ ?> 
						<div class="alert alert-primary" role="alert">
							Няма добавени продукти
						</div>
						<?php } else { ?>
						<?php foreach ($cartProduct as $value) { ?>
							<li class="minicart-item_area">
								<div class="minicart-single_item">
									<div class="minicart-img">
										<a href="single-product.html">
											<img src="<?php echo $value['product_image'] ?>" alt="JB's Product Image">
										</a>
										<span class="product-quantity"><?php echo $value['product_cart_count'] ?>x</span>
									</div>
									<div class="minicart-content">
										<div class="product-name">
											<h6>
												<a href="single-product.html">
													<?php echo $value['product_title'] ?>
												</a>
											</h6>
										</div>
										<div class="price-box">
											<?php if(date("Y-m-d H:i:s") < $value['product_promotion_end']){  ?>
												<span class="new-price"><?php echo $value['product_price_new'] ?>лв</span>
												<?php } else { ?>
												<span class="new-price"><?php echo $value['product_price'] ?>лв</span>
											<?php } ?>
										</div>
										<div class="attributes_content">
											<?php $variationHeaderView = explode('/',$value['product_cart_info']) ?>
											<?php foreach ($variationHeaderView as $value2) { ?>
												<span><?php echo $value2 ?></span>
											<?php } ?>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
					<?php } ?>
					<li>
						<div class="price_content">
							<div class="cart-subtotals">
								<div class="products subtotal-list">
									<span class="label">Общо</span>
									<span class="value"><?php echo $getSumTotalPrice; ?>лв</span>
								</div>
								<div class="shipping subtotal-list">
									<span class="label">Доставка</span>
									<span class="value"><?php echo $getDeliveryPrice ?> лв</span>
								</div>
								<div class="cart-total subtotal-list">
									<span class="label">Крайна сума</span>
									<span class="value"><?php echo $getTotalPrice ?>лв</span>
								</div>
							</div>
							<?php include set::path('Index', 'view', 'articul/articul-button-go-to-pay'); ?>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- Begin JB's Offcanvas Area -->
	<a href="#" class="menu-btn color--white">
		<i class="fa fa-bars"></i>
	</a>
	<!-- JB's Offcanvas Area End Here -->
</div>