<?php if($ProductVaritaion[0] == null) {?>
	<div class="alert alert-warning" role="alert">
		Няма добавени вариации
	</div>
	<?php } else { ?>
	<?php foreach ($ProductVaritaion as $value){ ?>
		<tr>
			<th scope="row"><?php echo $value['filter_name_title'] ?></th>
			<td><button type="button" class="btn btn-link" onclick="
				run({
				plugin:'Admin',
				controller:'product',
				method:'removeVariation',
				back:'.modal-content',
				massive:{
				id:'<?php echo $value['product_variation_id'] ?>',
				product:'<?php echo $singleProduct['product_id'] ?>'
				}
				})
			">Премахни</button></td>
		</tr>
	<?php } ?>
<?php } ?>