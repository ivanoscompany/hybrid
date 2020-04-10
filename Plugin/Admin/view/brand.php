<table class="table">
	<thead>
		<tr>
			<th scope="col" colspan="100">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Качване</span>
					</div>
					<div class="custom-file">
						<input id="fileupload" class="custom-file-input" type="file" name="files[]" data-url="ajax.php" multiple>
						<label class="custom-file-label" for="inputGroupFile01">Избрани файлове</label>
					</div>
				</div>	
			</th>
		</tr>
	</thead>
	<tbody>
		<?php if($brand[0] == null) { ?>
			<tr>
				<td>
					<div class="alert alert-danger" role="alert">
						Няма добавени марки
					</div>
				</td>
			</tr>
			<?php } else {?>
			<?php foreach ($brand as $value){ ?>
				<tr>
					<td><img src="<?php echo $value['brand_img'] ?>" alt="No image found" height="60" width="120" ></td>
					<td>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Име на марка</span>
							</div>
							<input value="<?php echo $value['brand_name'] ?>" type="text" class="form-control edit-input-<?php echo $value['brand_id'] ?>" placeholder="Няма въведено име" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-success" onclick="run({
							plugin:'Admin',
						controller:'brand',
						method:'updateBrand',
						back:'.body-operation',
						massive:{
						id:'<?php echo $value['brand_id'] ?>',
						name:$('.edit-input-<?php echo $value['brand_id'] ?>').val()
						}
						});">Запази</button>
						<button type="button" class="btn btn-danger" onclick="run({
							plugin:'Admin',
							controller:'brand',
							method:'deleteBrand',
							back:'.body-operation',
							massive:{
								id:'<?php echo $value['brand_id'] ?>',
								name:'<?php echo $value['brand_img'] ?>',
							}
						});">Изтриване</button>
					</div>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</tbody>
</table>
<script>
	$(function () {
		$('#fileupload').fileupload({
			dataType: 'json',
			done: function (e, data) {
				$.each(data.result.files, function (index, file) {
					run({
						plugin:'Admin',
						controller:'brand',
						method:'addImgBrand',
						back:'.body-operation',
						massive:{
							name:file.thumbnailUrl
						}
					});
				});
			}
		});
	});
	</script>			