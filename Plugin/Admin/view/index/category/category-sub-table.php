<?php if ($category[0] == NULL){ ?>
	<tr>
		<td colspan="3">
			<div class="alert alert-danger" role="alert">
			Няма добавени подкатегории
			</div>
		</td>
	</tr>
<?php } else { ?>
	<?php foreach ($category as $value){ ?>
		<tr>
			<td><input type="text" class="form-control edit-input-<?php echo $value['category_group_content_id'] ?>" placeholder="Име на категория" value="<?php echo $value['category_group_name'] ?>"></td>
			<td><?php echo set::letTrans($value['category_link']) ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic example">
					<button type="button" class="btn btn-success" onclick="run({
					plugin:'Admin',
					method:'categorySupPageTable',
					back:'.table-body-category',
					massive:{
					name:$('.edit-input-<?php echo $value['category_group_content_id'] ?>').val(),
					id:'<?php echo $value['category_group_id'] ?>',
					supid:'<?php echo $value['category_group_content_id'] ?>',
					methodType:'UPDATE'
					}
					})">Запази</button>
					<button type="button" class="btn btn-dark" onclick="run({
						plugin:'Admin',
						method:'categoryFilterPage',
						back:'.table',
						massive:{
						id:'<?php echo $value['category_group_content_id'] ?>',
						}
						})">Филтри</button>
					<button type="button" class="btn btn-danger"  onclick="run({
						plugin:'Admin',
						method:'deleteCategorySup',
						back:'.table-body-category',
						massive:{
							subid:'<?php echo $value['category_group_id'] ?>',
							id:'<?php echo $value['category_group_content_id'] ?>',
						}
					})">Изтриване</button>
				</div>
			</td>
		</tr>
	<?php } ?>
<?php } ?>