<div class="input-group-prepend">
	<label class="input-group-text" for="inputGroupSelect01">Добави в групи категория</label>
</div>
<select class="custom-select" id="inputGroupSelectCategorySub">
	<option></option>
	<?php foreach ($category as $value){ ?>
		<option value="<?php echo $value['category_group_content_id'] ?>"><?php echo $value['category_group_name'] ?></option>
	<?php } ?>
</select>