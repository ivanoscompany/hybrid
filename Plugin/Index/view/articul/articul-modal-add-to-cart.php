<div id="addProdcutSuccCont" style="display: none;">
	<div id="addProdcutSucc">
		<i class="fas fa-times closeX"></i>
		<h2>Успешно добавихте продукта в количката</h2>
		<div class="product-info">
			<img src="<?php echo $getArticulInfo['product_image'] ?>"><p><?php echo $getArticulInfo['product_title'] ?></p>
			<?php if(date("YmdHis") < $promoDateClear3){  ?>
				<span class="productPrice"><span class="new-price"><?php echo $getArticulInfo['product_price_new'] ?> лв.</span>
			<?php } else { ?>
				<span class="old-price"><?php echo $getArticulInfo['product_price'] ?> лв.</span><br></span>
			<?php } ?>
		</div>
		<p class="succAddedP">Успешно добавен <i class="fas fa-check"></i></p>
		<div class="succAddedButtons">
			<a href="">Добави още</a>
			<a href="<?php echo set::url('plashtane') ?>">Продължи към количка</a>
		</div>
	</div>
</div>