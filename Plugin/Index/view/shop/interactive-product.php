<div class="col-lg-9 order-1 order-lg-2">
	<div class="shopbar-with_banner">
		<div class="jb-sidebar_banner">
			<div class="banner-item">
				<a href="#">
					<img src="image/shop/2.jpg" alt="JB's Shop Banner">
				</a>
			</div>
		</div>
		<div class='filterAnchor'><a href='#categoriesTitle'>Филтри</a></div>
		<!-- Begin Shop Topbar Area -->
		<div class="shop-topbar">
			<div class="product-select-box" id='perPage'>
				<div class="product-short">
					<p>Покажи по</p>
					<select class="nice-select">
						<option value="30">30</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
					<span>на страница</span>
				</div>
			</div>
			<div class="product-select-box">
				<div class="product-short">
					<p>Покажи</p>
					<select class="nice-select">
						<option value="trending">Най - продавани</option>
						<option value="sales">Най - нови</option>
						<option value="price">Цена (възх.)</option>
						<option value="price">Цена (низх.)</option>
						<option value="price">Клиентски отзиви</option>
						<option value="price">Промоционални</option>
					</select>
				</div>
			</div>
		</div>
		<!-- Shop Topbar Area End Here -->
		<!-- Begin Shop Products Wrapper Area -->
		<div class="shop-products-wrapper">
			<div class="tab-content">
				<div id="list-view" class="tab-pane fade active show shop-product-list_view" role="tabpanel">
					<div class="row no-gutters">
						<div class="col-lg-12">
							<?php set::view(constant("p"), 'product-temp/shop-product'); ?>
						</div>
						<div class="col-lg-12">
							<div class="paginatoin-area">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<ul class="pagination-box">
											<li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i></a>
											</li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li>
												<a href="#" class="Next"><i class="fa fa-chevron-right"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Shop Products Wrapper Area End Here -->
	</div>
</div>