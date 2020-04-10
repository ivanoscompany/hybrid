<div class="table-content table-responsive">
	<?php if( $product[0] == null ){?>
		<div class="alert alert-secondary" role="alert">
			Няма добавени артикули
		</div>
		<?php } else { ?>
		<table class="table">
			<thead>
				<tr>
					<th class="jb-product-remove">Премахни</th>
					<th class="jb-product-thumbnail">Изображение</th>
					<th class="cart-product-name">Продукт</th>
					<th class="jb-product-price">за 1бр.</th>
					<th class="jb-product-quantity">Количество</th>
					<th class="jb-product-subtotal">Общо</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($product as $value) { ?>
					<tr>
						<td class="jb-product-remove"><a href=""><i class="fa fa-trash" title="Remove"  onclick="run({
							plugin:'Index',
							controller:'cart',
							method:'removeItemCart',
							back:'.error-log',
							massive:{
							id:<?php echo $value['product_cart_id'] ?>
							}
						})"></i></a></td>
						<td class="jb-product-thumbnail"><a href="<?php echo $value['product_link_name'] ?>"><img src="<?php echo $value['product_image'] ?>" alt="JB's Cart Thumbnail"></a></td>
						<td class="jb-product-name"><a href="<?php echo $value['product_link_name'] ?>"><?php echo $value['product_title'] ?></a></td>
						<td class="jb-product-price"><span class="amount"><?php echo $this->get_product_price_model($value['product_id']); ?> лв.</span></td>
						<td class="quantity">
							<div class="cart-plus-minus">
								<input id="cartProductCountPicker" class="cart-plus-minus-box value-of-product-count" value="<?php echo $value['product_cart_count'] ?>" type="text">
							</div>
							<a href="">
							<button type="button" class="btn btn-link" onclick="run({
							plugin:'Index',
							controller:'cart',
							method:'refreshCartInfo',
							back:'.error-log',
							massive:{
							id:<?php echo $value['product_cart_id'] ?>,
							count:$('#cartProductCountPicker').val(),
							product:<?php echo $value['product_id'] ?>
							}
							})">Обнови</button>
							</a>
						</td>
						<td class="product-subtotal<?php echo $value['product_cart_id'] ?>"><span class="amount"><?php echo $this->get_product_price_model($value['product_id']) * $value['product_cart_count']; ?> лв.</span></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
</div>
<div class="row">
	<div class="col-12">
		<div class="coupon-all">
			<div class="coupon">
				<input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Код от ваучер" type="text">
				<input class="button" name="apply_coupon" value="Въведи купон" type="submit">
			</div>
			<!--
			<div class="coupon2">
				<input class="button" name="update_cart" value="Завърши поръчка" type="submit">
			</div>
			-->
		</div>
	</div>
</div>