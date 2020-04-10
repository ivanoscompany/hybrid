
<!-- JB's Header Area End Here -->

<!-- Begin JB's Breadcrumb Area -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="<?php echo set::host() ?>">Начало</a></li>
				<li class="active">Консумативи</li>
			</ul>
		</div>
	</div>
</div>
<!-- JB's Breadcrumb Area End Here -->

<!-- Begin JB's Content Wrapper Area -->

<div class="container">
	<div class="row">
		<div class="col-lg-9 order-1 order-lg-2">
			<div class="shopbar-with_banner">
				<div class="shop-products-wrapper">
					<div class="tab-content">
						<div id="list-view" class="tab-pane fade active show shop-product-list_view" role="tabpanel">
							<div class="row no-gutters">
								<?php if($product[0] == null){ ?>
									<div class="alert alert-danger" role="alert">
										Няма резултати
									</div>
									<?php } else { ?>
									<?php foreach ($product as $value){ ?>
										<?Php $articulLinkStructor = set::url('artikul/'.$value['product_link_name'].'/'.$value['product_code']) ?>
										<div class="row no-gutters jb-slide-item">
											<div class="col-lg-4 col-md-4 jb-single_product">
												<div class="product-img">
													<a href="<?php echo $articulLinkStructor ?>">
														<img src="<?php echo $value['product_image'] ?>" alt="JB's Product Image">
													</a>
												</div>
											</div>
											<div class="col-lg-8 col-md-8">
												<div class="jb-product_content">
													<div class="product-desc_info">
														<div class="manufacturer">
															<?php $brandSlect = array_shift($this->select_brand_model($value['product_brand'])); ?>
															<?Php if($brandSlect['brand_img'] == null){ ?>
																
																<?php } else { ?>
																<a href="#"><img width="90" src="<?php echo $brandSlect['brand_img'] ?>" /></a>
															<?php } ?>
														</div>
														<div class="product-desc">
															<p><?php echo $value['product_desc'] ?></p>
														</div>
														<div class="price-box">
															<?Php 
																$promoDateClear1 = str_replace(' ','',$value['product_promotion_end']);
																$promoDateClear2 = str_replace(':','',$promoDateClear1);
																$promoDateClear3 = str_replace('-','',$promoDateClear2);	
																
															?>
															<?php if(date("YmdHis") < $promoDateClear3) {?>
																<span class="old-price"><?php echo $value['product_price'] ?> лв.</span>
																<span class="new-price"><?php echo $value['product_price_new'] ?> лв.</span>
																<?php } else { ?>
																<span class="new-price"><?php echo $value['product_price'] ?> лв.</span>
															<?php } ?>
														</div>
													</div>
													<div class="add-actions">
														<ul>
															<li><a class="jb-add_cart" href="<?php echo $articulLinkStructor ?>"><i
															class="icon_cart_alt"></i>Виж повече</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								<?php } ?>	
							</div>
						</div>
					</div>
				</div>
				<!-- Shop Products Wrapper Area End Here -->
			</div>
		</div>
		<!-- Shopbar With Banner Area End Here -->
	</div>
</div>
