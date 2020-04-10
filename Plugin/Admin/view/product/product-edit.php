<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Информация:</h5>
	<?php echo $singleProduct['product_link_name'] ?>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<div class="container">
		<div class="row">
			<div class="col-9">
				Добавен на: <b><?php echo $singleProduct['product_date'] ?></b>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Име на продукта</span>
					</div>
					<input value="<?php echo $singleProduct['product_title'] ?>" id="inputNameEditProduct" type="text" class="form-control" placeholder="Няма въведено име" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Код на продукта</span>
					</div>
					<input value="<?php echo $singleProduct['product_code'] ?>" id="inputCodeEditProduct" type="text" class="form-control" placeholder="Няма въведен код" aria-label="Username" aria-describedby="basic-addon1">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Статус</span>
					</div>
					<select class="custom-select" id="select-status-product">
						<option <?php if($singleProduct['product_status'] == 0){ ?>selected<?php } ?> value="0">Продукт</option>
						<option <?php if($singleProduct['product_status'] == 1){ ?>selected<?php } ?> value="1">Подарък</option>
						<option <?php if($singleProduct['product_status'] == 2){ ?>selected<?php } ?> value="2">Аксесоар</option>
						<option <?php if($singleProduct['product_status'] == 3){ ?>selected<?php } ?> value="3">Консуматив</option>
					</select>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Цена</span>
					</div>
					<input value="<?php echo $singleProduct['product_price'] ?>" id="inputPirceEditProduct" type="text" class="form-control" placeholder="Няма въведена стоиност" aria-label="Username" aria-describedby="basic-addon1">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Гаранция</span>
					</div>
					<input value="<?php echo $singleProduct['product_guarantee'] ?>" id="inputGuaranteeEditProduct" type="text" class="form-control" placeholder="Няма въведена стоиност" aria-label="Username" aria-describedby="basic-addon1">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Произход</span>
					</div>
					<input value="<?php echo $singleProduct['product_origin'] ?>" id="inputOriginEditProduct" type="text" class="form-control" placeholder="Няма въведена цена" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Промо Цена</span>
					</div>
					<input value="<?php echo $singleProduct['product_price_new'] ?>" id="inputPircePromotionEditProduct" type="text" class="form-control" placeholder="Няма въведена цена" aria-label="Username" aria-describedby="basic-addon1">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">До</span>
					</div>
					<input id="date-promotion-end-input" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $singleProduct['product_promotion_end'] ?>">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Марка</label>
					</div>
					<select class="custom-select" id="inputGroupSelectBrand">
						<option selected>Не е избрано</option>
						<?php foreach ($brand as $value){ ?>
							<option <?php if($value['brand_name'] == $singleProduct['product_brand']){?>selected<?php } ?> value="<?php echo $value['brand_name'] ?>"><?php echo $value['brand_name'] ?></option>
						<?php } ?>
					</select>
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Наличност</label>
					</div>
					<select class="custom-select" id="inputCouteEditProduct">
						<option value="На склад" >На склад</option>
						<option value="Изчерпано количество" >Изчерпано количество</option>
					</select>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Линк към видео</span>
					</div>
					<input value="<?php echo $singleProduct['product_video'] ?>" id="inputVideoEditProduct" type="text" class="form-control" placeholder="Няма въведена стоиност" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Кратко описание</span>
					</div>
					<textarea id="textarea-for-fast-desc" class="form-control" aria-label="With textarea"><?php echo $singleProduct['product_fast_desc'] ?></textarea>
				</div>
				<div class="input-group mb-3 back-select-category">
					<button type="button" class="btn btn-link" onclick="
					run({
						plugin:'Admin',
						controller:'product',
						method:'viewCategory',
						back:'.back-select-category',
						massive:{
							id:$('#inputGroupSelectCategory').val()
						}
					});
					">Добави категория</button>
					<button type="button" class="btn btn-link" onclick="
					run({
					plugin:'Admin',
					controller:'product',
					method:'viewVariation',
					back:'.back-select-category',
					massive:{
					id:$('#inputGroupSelectCategory').val()
					}
					});
					">Добави вариация</button>
					<button type="button" class="btn btn-link" onclick="
					run({
					plugin:'Admin',
					controller:'product',
					method:'viewDocument',
					back:'.back-select-category',
					massive:{
					id:$('#inputGroupSelectCategory').val()
					}
					});
					">Добави документ</button>
				</div>
				<div class="input-group mb-3 back-select-category-group">
					
				</div>
				<div class="input-group mb-3 back-select-category-sub">
					
				</div>
				<h4>Категории и филтри</h4>
				<table class="table">
					<tbody>
						<?php if($categoryProduct[0] == null){?>
							<div class="alert alert-warning" role="alert">
								Артикулът не е добавен в категория
							</div>
							<?php } else { ?>
							<?php foreach ($categoryProduct as $value){ ?>
								<tr>
									<td><?php echo $value['inter_active_product_category_name'] ?></td>
									<td><button type="button" class="btn btn-link" onclick="
										run({
										plugin:'Admin',
										controller:'product',
										method:'removeProcutCategory',
										back:'.modal-content',
										massive:{
										id:'<?php echo $value['inter_active_product_id'] ?>',
										product:'<?php echo $singleProduct['product_id'] ?>'
										}
										})
										">Премахни</button>
									</td>
								</tr>
								<?php if($value['category_id']){ ?>
									<tr>
										<?php foreach ($this->category_filte_model($value['category_id']) as $value2){ ?>
											<td>
												<b><?php echo $value2['filter_name_title'] ?></b>
												
												<?php foreach ($this->filter_value_slot_innert($value2['filter_name_id']) as $value3){ ?>
													
													<div class="form-check">
														<input name="filterStructor" type="checkbox" class="form-check-input" id="exampleCheck1" value="<?php echo $value3['filter_value_slot_link'] ?>">
														<label class="form-check-label" for="exampleCheck1"><?php echo $value3['filter_value_name'] ?></label>
													</div>
													
												<?php } ?>
											</td>
										<?php } ?>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				<h4>Вариации</h4>
				<table class="table table-bordered">
					<tbody>
						<?php include set::path('Admin', 'view', 'product/view-variation'); ?>
					</tbody>
				</table>
				<h4>Документи</h4>
			</div>
			<div class="col-3">
				Oпции за продукта<br>
				<input value="<?php echo $singleProduct['product_new'] ?>" type="checkbox" class="form-check-input" id="CheckNewEditProduct" <?php if($singleProduct['product_new'] == 1) { ?> checked <?php } ?>>
				<label class="form-check-label" for="exampleCheck1">Ново</label>
				<br>
				<input value="<?php echo $singleProduct['product_gift'] ?>" type="checkbox" class="form-check-input" id="CheckGitftEditProduct" <?php if($singleProduct['product_gift'] == 1) { ?> checked <?php } ?>>
				<label class="form-check-label" for="exampleCheck1">Подарък</label>
				<br>
				<input value="<?php echo $singleProduct['product_free_ship'] ?>" type="checkbox" class="form-check-input" id="CheckFreeShipEditProduct" <?php if($singleProduct['product_free_ship'] == 1) { ?> checked <?php } ?>>
				<label class="form-check-label" for="exampleCheck1">Доставка до 20 рабодни дни</label>
				<br>
				<input value="<?php echo $singleProduct['product_installation'] ?>" type="checkbox" class="form-check-input" id="CheckInstallEditProduct" <?php if($singleProduct['product_installation'] == 1) { ?> checked <?php } ?>>
				<label class="form-check-label" for="exampleCheck1">Монтаж</label>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<form method="POST" action="<?php echo set::url('ckeditor.php') ?>" target="_blank">
		<input type="hidden" name="id" value="<?php echo $singleProduct['product_id'] ?>">
		<button type="submit" class="btn btn-link">Добави Характеристики</button>
	</form>
	<button type="button" class="btn btn-primary" onclick="saveChangesProductEdit()">Запази промените</button>
	<button type="button" class="btn btn-danger" onclick="
	run({
	plugin:'Admin',
	controller:'product',
	method:'deleteArticul',
	back:'.body-operation',
	massive:{
	id:'<?php echo $singleProduct['product_id'] ?>'
	}
	});
	$('#Modal').modal('hide');
	">Изтриване</button>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Затвори</button>
</div>
<script>
	var getFilteMassive = <?php echo json_encode($getEplodeFilterMassive) ?>;
	for(var i=0; i<getFilteMassive.length; i++){
		$("input[value='" + getFilteMassive[i] + "']").prop('checked', true);
	}
	$("#CheckNewEditProduct").change(function() { if(this.checked) { $(this).val(1); } else { $(this).val(0); } });
	$("#CheckGitftEditProduct").change(function() { if(this.checked) { $(this).val(1); } else { $(this).val(0); } });
	$("#CheckFreeShipEditProduct").change(function() { if(this.checked) { $(this).val(1); } else { $(this).val(0); } });
	$("#CheckInstallEditProduct").change(function() { if(this.checked) { $(this).val(1); } else { $(this).val(0); } });
	
	function saveChangesProductEdit(){
		var favorite = [];
		$.each($("input[name='filterStructor']:checked"), function(){
			favorite.push($(this).val());
		});
		$('#Modal').modal('hide');
		run({
			plugin:'Admin',
			controller:'product',
			method:'saveChanges',
			back:'.errorLog',
			massive:{
				id:'<?php echo $singleProduct["product_id"] ?>',
				categorySub:$('#inputGroupSelectCategorySub').val(),
				name:$('#inputNameEditProduct').val(),
				code:$('#inputCodeEditProduct').val(),
				price:$('#inputPirceEditProduct').val(),
				pprice:$('#inputPircePromotionEditProduct').val(),
				coute:$('#inputCouteEditProduct').val(),
				gift:$('#CheckGitftEditProduct').val(),
				CheckNewEditProduct:$('#CheckNewEditProduct').val(),
				brand:$('#inputGroupSelectBrand').val(),
				category:$('#inputGroupSelectCategory').val(),
				categoryGroup:$('#inputGroupSelectCategoryGroup').val(),
				categorySub:$('#inputGroupSelectCategorySub').val(),
				filterStructor:favorite.join(" || "),
				promoend:$('#date-promotion-end-input').val(),
				freeShip:$('#CheckFreeShipEditProduct').val(),
				install:$('#CheckInstallEditProduct').val(),
				videoUrl:$('#inputVideoEditProduct').val(),
				origin:$('#inputOriginEditProduct').val(),
				guarantee:$('#inputGuaranteeEditProduct').val(),
				variation:$('#select-variation-to-add').val(),
				status:$('#select-status-product').val(),
				fastdesc:$('#textarea-for-fast-desc').val()
			}
		});
		
	}
</script>						