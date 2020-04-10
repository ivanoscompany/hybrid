<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Изображения</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<?php if($allIMG[0] == null){ ?>
		<div class="container">
			<div class="row">
				<div class="col">
					
				</div>
				<div class="col-10">
					<div class="alert alert-danger" role="alert">
						Няма качена медиа за този артиикул!
					</div>
				</div>
				<div class="col">
					
				</div>
			</div>
		</div>
		<?php } else { ?>
		<?php foreach ($allIMG as $value){ ?>
			<div class="card float-left ml-1 mb-1" style="width: 10rem;">
				<img ondblclick="run({
					plugin:'Admin',
					controller:'product',
					method:'productImgDlete',
					back:'.modal-content',
					massive:{
						id:'<?php echo $product['product_id'] ?>',
						rowID:'<?php echo $value['upload_img_id'] ?>',
						name:'<?php echo $value['upload_img_name'] ?>'
					}
				});" class="card-img-top" src="<?php echo $value['upload_img_name'] ?>" alt="Card image cap">
				<?php if($value['upload_img_name'] == $product['product_image']){ ?>
				<?php } else { ?>
					<button onclick="
					$('#Modal').modal('hide');
					run({
						plugin:'Admin',
						controller:'product',
						method:'setPoster',
						back:'.body-operation',
						massive:{
							id:'<?php echo $product['product_id'] ?>',
							tableID:'<?php echo $value['upload_img_id'] ?>',
							name:'<?php echo $value['upload_img_name'] ?>'
						}
					});
					" type="button" class="btn btn-light btn-sm">Направи главна</button>
				<?php } ?>
			</div>
		<?php } ?>
	<?php } ?>
</div>
<div class="modal-footer">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Качване</span>
		</div>
		<div class="custom-file">
			<input id="fileupload" class="custom-file-input" type="file" name="files[]" data-url="ajax.php" multiple>
			<label class="custom-file-label" for="inputGroupFile01">Избрани файлове</label>
		</div>
	</div>
</div>
<script>
	$(function () {
		$('#fileupload').fileupload({
			dataType: 'json',
			done: function (e, data) {
				$.each(data.result.files, function (index, file) {
					run({
						plugin:'Admin',
						controller:'product',
						method:'productUploadImg',
						back:'.modal-content',
						massive:{
							id:'<?php echo $product["product_id"] ?>',
							name:file.thumbnailUrl
						}
					});
				});
			}
		});
	});
</script>