<?php if ($category[0] == NULL){ ?>
	<tr>
		<td colspan="3">
			<div class="alert alert-danger" role="alert">
				Няма добавени категории
			</div>
		</td>
	</tr>
	<?php } else { ?>
	<?php foreach ($category as $value){ ?>
		<tr>
			<td><input type="text" class="form-control edit-input-<?php echo $value['category_id'] ?>" placeholder="Име на категория" value="<?php echo $value['category_name'] ?>"></td>
			<td><?php echo set::letTrans($value['category_name']) ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic example">
					<button type="button" class="btn btn-success" onclick="run({
					plugin:'Admin',
					method:'categoryPageTable',
					back:'.table-body-category',
					massive:{
					name:$('.edit-input-<?php echo $value['category_id'] ?>').val(),
					id:'<?php echo $value['category_id'] ?>',
					methodType:'UPDATE'
					}
					})">Запази</button>
					<?php if($value['category_group'] == 1){ ?>
						<button type="button" class="btn btn-dark"  onclick="run({
						plugin:'Admin',
						method:'categoryGroupPage',
						back:'.body-operation',
						massive:{
						id:'<?php echo $value['category_id'] ?>'
						}
						})">Отиди към групи категории</button>
					<?php } elseif($value['category_filter'] == 1) { ?>
						<button type="button" class="btn btn-dark" onclick="run({
						plugin:'Admin',
						method:'categoryFilterPage',
						back:'.table',
						massive:{
						id:'<?php echo $value['category_id'] ?>',
						}
						})">Филтри</button>
					<?php } else { ?>
						<button type="button" class="btn btn-outline-dark" onclick="run({
						plugin:'Admin',
						method:'switchSubCategory',
						back:'.table-body-category',
						massive:{
						id:'<?php echo $value['category_id'] ?>'
						}
						})">подкатегории</button>
						<button type="button" class="btn btn-outline-dark" onclick="run({
						plugin:'Admin',
						method:'setFilterCategory',
						back:'.table',
						massive:{
						id:'<?php echo $value['category_id'] ?>'
						}
						})">Филтри</button>
					<?php } ?>
					<button type="button" class="btn btn-danger" onclick="run({
					plugin:'Admin',
					method:'deleteCategory',
					back:'.table-body-category',
					massive:{
					id:'<?php echo $value['category_id'] ?>',
					}
					})">Изтриване</button>
				</div>
			</td>
		</tr>
	<?php } ?>
<?php } ?>