
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index.html">Начало</a></li>
				<li class="active">Сравни продукти</li>
			</ul>
		</div>
	</div>
</div>
<!-- JB's Breadcrumb Area End Here -->

<!-- Begin JB's Compare Area -->
<div class="compare-area">
	<div class="container">
		<div class="compare-table table-responsive">
			<?php if($product[0] == null){ ?>
				<div class="alert alert-secondary" role="alert">
					Няма добавени артикули
				</div>
				<?php } else { ?>
				<table class="table table-bordered table-hover mb-0">
					<tbody>
						<tr>
							<th class="compare-column-titles">Изображение</th>
							<?php foreach ($product as $value) { ?>
								<td class="compare-column-productinfo">
									<div class="compare-pdoduct-image">
										<a href="<?php echo set::url('artikul/'.$value['product_link_name'].'/'.$value['product_code']) ?>">
											<img src="<?php echo $value['product_image'] ?>" alt="JB's Product Image">
										</a>
										<a href="<?php echo set::url('artikul/'.$value['product_link_name'].'/'.$value['product_code']) ?>" class="jb-compare_btn">
											<span>Преглед</span>
										</a>
									</div>
								</td>
							<?php } ?>
						</tr>
						<tr>
							<th>Продукт</th>
							<?php foreach ($product as $value) { ?>
								<td>
									<h5 class="compare-product-name"><a href="<?php echo set::url('artikul/'.$value['product_link_name'].'/'.$value['product_code']) ?>"><?php echo $value['product_title'] ?></a>
									</h5>
								</td>
							<?php } ?>
						</tr>
						<tr>
							<th>Артикулен №</th>
							<?php foreach ($product as $value) { ?>
								<td>
									<h5 class="compare-product-name"><a href="single-product.html"><?php echo $value['product_code'] ?></a>
									</h5>
								</td>
							<?php } ?>
						</tr>
						<tr>
							<th>Марка</th>
							<?php foreach ($product as $value) { ?>
								<td><?php echo $value['product_brand'] ?></td>
							<?php } ?>
						</tr>
						<tr>
							<th>Гаранция</th>
							<?php foreach ($product as $value) { ?>
								<td><?php echo $value['product_guarantee'] ?></td>
							<?php } ?>
						</tr>
						<tr>
							<th>Характеристики</th>
							<?php foreach ($product as $value) { ?>
								<td>
									<?php echo $value['product_desc'] ?>
								</td>
							<?php } ?>
						</tr>
						<tr>
							<th>Цена</th>
							<?php foreach ($product as $value) { ?>
								<td><?php echo $value['product_price'] ?> лв.</td>
							<?php } ?>
						</tr>
						<tr>
							<th>Наличност</th>
							<?php foreach ($product as $value) { ?>
								<td><span><?php echo $value['product_count'] ?></span></td>
							<?php } ?>
						</tr>
						<tr>
							<th>Рейтинг</th>
							<?php foreach ($product as $value) { ?>
								<td>
									<?php 
										$getRatingLarg = array_shift($this->product_rating_larg($value['product_id']));
										$getRatingLow = array_shift($this->product_rating_low($value['product_id']));
										$getProductRaitingValue = floor(($getRatingLarg['product_rating'] + $getRatingLow['product_rating']) / 2);	
									?>
									<?php for ($i = 1; $i <= $getProductRaitingValue; $i++) { ?>
										<span><i class="fa fa-star"></i></span>
									<?php } ?>
								</div>
							</td>
						<?php } ?>
					</tr>
					<tr>						
						<?php foreach ($product as $value) { ?>
							<th>
								<a href="" class="jb-compare_btn" onclick="run({
										plugin:'Index',
										controller:'articul',
										method:'removeCompareContoller',
										back:'.error-log',
										massive:{
										id:<?php echo $value['user_compare_id'] ?>
										}
									})">
									<span>Премахни</span>
								</a>
							</th>
							<th></th>
						<?php } ?>	
					</tr>
				</tbody>
			</table>
		<?php } ?>
		</div>
	</div>
	</div>	