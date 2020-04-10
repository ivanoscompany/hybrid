<div class="col-lg-5 col-md-5">
	<div class="sp-images">
		<div class="sp-largeimages sp-imagezoom">
			<?php foreach ($getAllImg as $value) { ?>
				<div class="sp-singleimage" data-src="<?php echo $value['upload_img_name'] ?>">
					<img src="<?php echo $value['upload_img_name'] ?>" alt="JB's Product Image">
				</div>
			<?php } ?>
		</div>
		<div class="sp-thumbs">
			<?php foreach ($getAllImg as $value) { ?>
				<div class="sp-singlethumb">
					<img src="<?php echo $value['upload_img_name_small'] ?>" alt="product thumb">
				</div>
			<?php } ?>
		</div>
	</div>
	<div id="singleProdVideo">
		<?php if($getArticulInfo['product_video']){ ?>
			<iframe width="420" height="315"
			src="<?php echo $getArticulInfo['product_video'] ?>">
			</iframe>
		<?php } ?>
	</div>
</div>