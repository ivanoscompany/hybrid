<?php if ($category[0] == NULL){ ?>
	<tr>
		<td colspan="3">
			<div class="alert alert-danger" role="alert">
				Няма добавени групи
			</div>
		</td>
	</tr>
	<?php } else { ?>
	<?php foreach ($category as $value){ ?>
		<tr>
			<td><input type="text" class="form-control edit-input-<?php echo $value['category_group_id'] ?>" placeholder="Име на категория" value="<?php echo $value['category_group_name'] ?>"></td>
			<td><?php echo set::letTrans($value['category_link']) ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic example">
					<button type="button" class="btn btn-success" onclick="run({
					plugin:'Admin',
					method:'categoryGroupPageTable',
					back:'.table-body-category',
					massive:{
					name:$('.edit-input-<?php echo $value['category_group_id'] ?>').val(),
					id:'<?php echo $value['category_id'] ?>',
					groupid:'<?php echo $value['category_group_id'] ?>',
					methodType:'UPDATE'
					}
					})">Запази</button>
					<button type="button" class="btn btn-dark"  onclick="run({
					plugin:'Admin',
					method:'categorySupPage',
					back:'.body-operation',
					massive:{
					id:'<?php echo $value['category_group_id'] ?>'
					}
					})">Отиди към подкатегории</button>
					<button type="button" class="btn btn-danger" onclick="run({
					plugin:'Admin',
					method:'deleteCategoryGroup',
					back:'.table-body-category',
					massive:{
					subid:'<?php echo $value['category_id'] ?>',
					id:'<?php echo $value['category_group_id'] ?>',
					}
					})">Изтриване</button>
				</div>
			</td>
		</tr>
	<?php } ?>
<?php } ?>