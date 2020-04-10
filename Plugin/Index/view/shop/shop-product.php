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
						<h6><a class="product-name" href="<?php echo $articulLinkStructor ?>"><?php echo $value['product_title'] ?>
							<?php if($value['product_gift'] == 1){ ?>
								<br><span>+ ПОДАРЪК</span>
							<?php } ?>
						</a></h6>
						<div class="rating-box">
							<ul>
								<?php 
									$getRatingLarg = array_shift($this->product_rating_larg($value['product_id']));
									$getRatingLow = array_shift($this->product_rating_low($value['product_id']));
									$getProductRaitingValue = floor(($getRatingLarg['product_rating'] + $getRatingLow['product_rating']) / 2);	
								?>
								<?php for ($i = 1; $i <= $getProductRaitingValue; $i++) { ?>
									<li><i class="fa fa-star"></i></li>
								<?php } ?>
							</ul>
						</div>
						<div class="product-desc">
							<p><?php echo $value['product_fast_desc'] ?></p>
						</div>
						<div class="price-box">
							<?php echo $this->get_product_price_model($value['product_id'], 'product'); ?>
						</div>
					</div>
					<div class="add-actions">
						<ul>
							<li><a class="jb-wishlist_link" href="<?php echo set::url('lubimi') ?>" onclick="run({
										plugin:'Index',
										controller:'articul',
										method:'addNewWihlistContoller',
										back:'.error-log',
										massive:{
											id:<?php echo $value['product_id'] ?>
										}
									})"><i
							class="fa fa-heart"></i></a></li>
							<li><a class="jb-add_cart" href="<?php echo $articulLinkStructor ?>"><i
							class="icon_cart_alt"></i>Виж повече</a></li>
							<?php if(count($this->user_compare_model()) < 2){ ?>
							<li><a class="jb-sp_link" href="<?php echo set::url('sravnqvane') ?>" onclick="run({
										plugin:'Index',
										controller:'articul',
										method:'addNewCompareContoller',
										back:'.error-log',
										massive:{
											id:<?php echo $value['product_id'] ?>
										}
									})"><i
							class="fa fa-copy"></i></a></li>
							<?php } else { ?>
							<li><a class="jb-sp_link" href="#" onclick="alert('Имате прекалено много артикули за сравняване')"><i
							class="fa fa-copy"></i></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>														