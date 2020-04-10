<?php function buttonToAddItem($className, $id){?>
	<button class="btn btn-outline-secondary" type="button" onclick="
	run({
	plugin:'Admin',
	controller:'product',
	method:'addItemToPorduct',
	back:'.modal-content',
	massive:{
	id:<?php echo $id ?>,
	item:$('#<?php echo $className ?>').val()
	}
	});
	">Добави</button>
<?php } ?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Информация:</h5>
	<?php echo $singleProduct['product_link_name'] ?>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<?php if($singleProduct['product_status'] == 0) {?>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					Добави подарък
					<div class="input-group">
						<select class="custom-select" id="getGiftToAdd">
							<?php foreach ($gifts as $value) { ?>
								<option value="<?php echo $value['product_id'] ?>"><?php echo $value['product_title'] ?></option>
							<?php } ?>
						</select>
						<div class="input-group-append">
							<?php echo buttonToAddItem('getGiftToAdd', $singleProduct['product_id']) ?>
						</div>
					</div>
					<?php if($itemsAddedGifs[0] != 0) {?>
						<?php foreach ($itemsAddedGifs as $value) { ?>
							<div class="card" style="width: 18rem;" ondblclick="removeObject(<?php echo $value['product_items_id'] ?>)">
								<img class="card-img-top" src="<?php echo $value['product_image'] ?>" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><?php echo $value['product_title'] ?></h5>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">До</span>
										</div>
										<input style="width:200px" id="date-promotion-end-input" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $value['product_items_date'] ?>">
									</div>
									<a href="#" class="btn btn-primary" onclick="setDateItemGift(<?php echo $value['product_items_id'] ?>)">Запази</a>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="col-sm">
					Добави аксесоар
					<div class="input-group">
						<select class="custom-select" id="getAcesoarToAdd">
							<?php foreach ($accessories as $value) { ?>
								<option value="<?php echo $value['product_id'] ?>"><?php echo $value['product_title'] ?></option>
							<?php } ?>
						</select>
						<div class="input-group-append">
							<?php echo buttonToAddItem('getAcesoarToAdd', $singleProduct['product_id']) ?>
						</div>
					</div>
					<?php if($itemsAddedAccssesoar[0] != 0) {?>
						<?php foreach ($itemsAddedAccssesoar as $value) { ?>
							<div class="card float-left" style="width: 5rem;" ondblclick="removeObject(<?php echo $value['product_items_id'] ?>)">
								<img class="card-img-top" src="<?php echo $value['product_image'] ?>" alt="Card image cap">
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="col-sm">
					Добави консуматив
					<div class="input-group">
						<select class="custom-select" id="getConsToAdd">
							<?php foreach ($consumativ as $value) { ?>
								<option value="<?php echo $value['product_id'] ?>"><?php echo $value['product_title'] ?></option>
							<?php } ?>
						</select>
						<div class="input-group-append">
							<?php echo buttonToAddItem('getConsToAdd', $singleProduct['product_id']) ?>
						</div>
					</div>
					<?php if($itemsAddedConsumativ[0] != 0) {?>
						<?php foreach ($itemsAddedConsumativ as $value) { ?>
							<div class="card float-left" style="width: 5rem;" ondblclick="removeObject(<?php echo $value['product_items_id'] ?>)">
								<img class="card-img-top" src="<?php echo $value['product_image'] ?>" alt="Card image cap">
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Затвори</button>
</div>
<script>
	function removeObject(rowID){
		run({
			plugin:'Admin',
			controller:'product',
			method:'removeItemProduct',
			back:'.modal-content',
			massive:{
				id:<?php echo $data['id'] ?>,
				item:rowID
			}
		});
	}
	
	function setDateItemGift(rowID){
		run({
			plugin:'Admin',
			controller:'product',
			method:'setDateItemGift',
			back:'.modal-content',
			massive:{
				id:<?php echo $data['id'] ?>,
				item:rowID,
				value:$('#date-promotion-end-input').val()
			}
		});
	}
</script>	