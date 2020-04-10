<div class="input-group mb-3">
	<div class="input-group-prepend">
		<label class="input-group-text" for="inputGroupSelect01">Добави вариация</label>
	</div>
	<select class="custom-select select-filter-to-category" id="select-variation-to-add">
		<?php foreach ($filterName as $value){ ?>
			<option value="<?php echo $value['filter_name_id'] ?>"><?php echo $value['filter_name_title'] ?></option>
		<?php } ?>
	</select>
</div>