<div class="row">
	<?php if($product[0] == null){ ?>
		<div class="alert alert-danger" role="alert">
			Няма промоции
		</div>
		<?php } else { ?>
		<?php foreach ($product as $value) { ?>
			<div class="col-md-3 mt-1 ml-1">
				<figure class="card card-product">
					<div class="img-wrap"> 
						<img src="<?php echo $value['product_image'] ?>">
					</div>
					<figcaption class="info-wrap">
						<h6 class="title text-dots"><a href="<?php echo set::url('artikul/'.$value['product_link_name'].'/'.$value['product_code']) ?>"><?php echo $value['product_title'] ?></a></h6>
						<div class="action-wrap">
							<button class="btn btn-danger btn-sm float-right"> Спестяванте <?php echo $value['product_price'] - $value['product_price_new'] ?> лв.</button>
							<div class="price-wrap h5">
								<del class="price-old"><?php echo $value['product_price'] ?> лв.</del><br>
								<span class="price-new"><?php echo $value['product_price_new'] ?> лв.</span>
							</div> <!-- price-wrap.// -->
						</div> <!-- action-wrap -->
					</figcaption>
				</figure> <!-- card // -->
			</div> <!-- col // -->
		<?php } ?>
	<?php } ?>
</div> <!-- row.// -->