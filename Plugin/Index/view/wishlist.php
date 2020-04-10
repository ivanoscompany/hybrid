<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="<?php echo set::host() ?>">Начало</a></li>
				<li class="active">Любими продукти</li>
			</ul>
		</div>
	</div>
</div>
<!-- JB's Breadcrumb Area End Here -->

<!--Begin JB's Wishlist Area -->
<div class="jb-wishlist_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form action="javascript:void(0)">
					<div class="table-content table-responsive">
						<?php if($product[0] == null){ ?>
							<div class="alert alert-secondary" role="alert">
								Няма добавени артикули
							</div>
						<?php } else { ?>
						<table class="table">
							<thead>
								<tr>
									<th class="jb-product_remove">премахни</th>
									<th class="jb-product-thumbnail">изображение</th>
									<th class="cart-product-name">продукт</th>
									<th class="jb-product-price">цена за 1бр.</th>
									<th class="jb-product-stock-status">наличност</th>
									<th class="jb-cart_btn">Преглед</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($product as $value) { ?>
								<?Php 
									$promoDateClear1 = str_replace(' ','',$value['product_promotion_end']);
									$promoDateClear2 = str_replace(':','',$promoDateClear1);
									$promoDateClear3 = str_replace('-','',$promoDateClear2);	
									
								?>
								<tr>
									<td class="jb-product_remove"><a href="" ><i class="fa fa-trash" title="Remove" onclick="run({
										plugin:'Index',
										controller:'articul',
										method:'removeWihlistContoller',
										back:'.error-log',
										massive:{
										id:<?php echo $value['product_id'] ?>
										}
									})"></i></a></td>
									<td class="jb-product-thumbnail"><a href="javascript:void(0)"><img src="<?php echo $value['product_image'] ?>" alt="JB's Wishlist Thumbnail"></a></td>
									<td class="jb-product-name"><a href="javascript:void(0)"><?php echo $value['product_title'] ?></a></td>
									<td class="jb-product-price"><span class="amount"><?php if(date("YmdHis") < $promoDateClear3) { echo $value['product_price_new']; } else { echo $value['product_price']; }?> лв.</span></td>
									<td class="jb-product-stock-status"><span class="in-stock"><?php echo $value['product_count'] ?></span></td>
									<td class="jb-cart_btn"><a href="<?php echo set::url('artikul/'.$value['product_link_name'].'/'.$value['product_code']) ?>">Преглед</a></td>
								</tr>
							<?php } ?>
					</tbody>
				</table>
				<?php } ?>
			</div>
		</form>
	</div>
</div>
</div>
</div>