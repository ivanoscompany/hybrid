
<?php if($product[0]==null){ ?>
	<div class="alert alert-danger" role="alert">
		Няма добавени продукти
	</div>
<?php } else { ?>
	<?php foreach ($product as $value){ ?>
		<div class="card float-left ml-1 mb-1" style="width: 12rem;">
			<a data-toggle="modal" data-target="#Modal" href="#" class="btn btn-light btn-sm" onclick="run({
			plugin:'Admin',
			controller:'product',
			method:'productInfoTow',
			back:'.modal-content',
			massive:{
			id:'<?php echo $value['product_id'] ?>'
			}
			})">Настроики</a>
			<img height="200" onclick="run({
			plugin:'Admin',
			controller:'product',
			method:'productImg',
			back:'.modal-content',
			massive:{
			id:'<?php echo $value['product_id'] ?>'
			}
			})" data-toggle="modal" data-target="#Modal" style="cursor: pointer;" class="card-img-top" src="<?php echo $value['product_image'] ?>" alt="Няма изображения">
			
			<a data-toggle="modal" data-target="#Modal" href="#" class="btn btn-light btn-sm" onclick="run({
			plugin:'Admin',
			controller:'product',
			method:'productInfo',
			back:'.modal-content',
			massive:{
			id:'<?php echo $value['product_id'] ?>'
			}
			})">Разширени Настроики</a>
		</div>
	<?php } ?>	
<?php } ?>