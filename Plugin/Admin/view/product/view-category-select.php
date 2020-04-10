<div class="input-group-prepend">
	<label class="input-group-text" for="inputGroupSelect01">Добави в категория</label>
</div>
<select class="custom-select" id="inputGroupSelectCategory" onchange="runSelectCategory()">
<option></option>
	<?php foreach ($category as $value){ ?>
		<option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
	<?php } ?>
</select>
<script>
	function runSelectCategory(){
		run({
			plugin:'Admin',
			controller:'product',
			method:'viewCategoryGroup',
			back:'.back-select-category-group',
			massive:{
				id:$('#inputGroupSelectCategory').val()
			}
		});
	}
</script>