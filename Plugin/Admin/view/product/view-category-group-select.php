<div class="input-group-prepend">
	<label class="input-group-text" for="inputGroupSelect01">Добави в групи категория</label>
</div>
<select class="custom-select" id="inputGroupSelectCategoryGroup" onchange="runSelectCategoryGroup()">
	<option></option>
	<?php foreach ($category as $value){ ?>
		<option value="<?php echo $value['category_group_id'] ?>"><?php echo $value['category_group_name'] ?></option>
	<?php } ?>
</select>
<script>
	function runSelectCategoryGroup(){
		run({
			plugin:'Admin',
			controller:'product',
			method:'viewCategorySub',
			back:'.back-select-category-sub',
			massive:{
				id:$('#inputGroupSelectCategoryGroup').val()
			}
		});
	}
</script>