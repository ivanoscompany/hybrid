<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01">Филтри</label>
				</div>
				<select class="custom-select select-filter-to-category" id="inputGroupSelect01">
					<?php foreach ($filterName as $value){ ?>
						<option value="<?php echo $value['filter_name_id'] ?>"><?php echo $value['filter_name_title'] ?></option>
					<?php } ?>
				</select>
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button"  onclick="run({
					plugin:'Admin',
					method:'categoryFilterOption',
					back:'.table',
					massive:{
					type:'POST',
					categoryid:<?php echo $catID ?>,
					input:$('.select-filter-to-category').val()
					}
					})">Добави</button>
				</div>
			</div>
		</div>
		<div class="col-3">
			
		</div>
		<div class="col-3">
			
		</div>
	</div>
</div>
<?php if($categoryFilteModel[0] != null){ ?>
	<?php foreach ($categoryFilteModel as $value){ ?>
		<tr>
			<td>
				<?php echo $value['filter_name_title'] ?>
			</td>
			<td>
				<button class="btn btn-link" type="button" onclick="run({
				plugin:'Admin',
				method:'categoryFilterOption',
				back:'.table',
				massive:{
				type:'DELETE',
				id:<?php echo $value['category_filte_id'] ?>,
				categoryid:<?php echo $catID ?>,
				}
				})">Премахни</button>
			</td>
		</tr>
	<?php } ?>
<?php } ?>
