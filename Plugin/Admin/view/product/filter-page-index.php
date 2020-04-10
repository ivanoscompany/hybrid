<div class="container">
	<div class="row">
		<div class="col-2">
			
		</div>
		<div class="col-8">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Добави филтър</span>
				</div>
				<input type="text" class="form-control add-new-filte-name-input" placeholder="Име на филтър">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary " type="button" id="button-addon2" onclick="run({
					plugin:'Admin',
					controller:'product',
					method:'filterNameOption',
					back:'.body-operation',
					massive:{
					type:'CREATE',
					name:$('.add-new-filte-name-input').val()
					}
					})">Добави</button>
				</div>
			</div>
		</div>
		<div class="col-2">
			
		</div>
	</div>
</div>
<?php if($this->filter_name_model()[0]==null){ ?>
	<div class="alert alert-warning" role="alert">
		Няма добавени филтри
	</div>
<?php } else { ?>
<?php foreach ($this->filter_name_model() as $value){  ?>
	<div class="card float-left ml-1 mb-1" style="width: 18rem;">
		<div class="list-group">
			<input type="text" class="form-control add-new-filte-name-input-update<?php echo $value['filter_name_id'] ?>" value="<?php echo $value['filter_name_title'] ?>">
			<?php 
				if(array_shift($this->filter_value_slot_model($value['filter_name_id'])) == null){ ?> 
				<div class="alert alert-danger" role="alert">
					Няма добавени стойности
				</div>
				<?php } else { ?>
				<?php foreach ($this->filter_value_slot_model($value['filter_name_id']) as $value2){  ?>
					<a href="#" class="list-group-item list-group-item-action">
						<?php if($value2['filter_value_id'] == 0){ ?>
							<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#Modal" onclick="run({
							plugin:'Admin',
							controller:'product',
							method:'filteValuePage',
							back:'.modal-content',
							massive:{
							filterID:<?php echo $value['filter_name_id'] ?>,
							SlotID:<?php echo $value2['filter_value_slot_id'] ?>
							}
							})">Добавяне</button>
							<button type="button" class="btn btn-outline-danger" onclick="run({
							plugin:'Admin',
							controller:'product',
							method:'filterNameOption',
							back:'.body-operation',
							massive:{
							type:'DELETEPOST',
							id:<?php echo $value2['filter_value_slot_id'] ?>
							}
							})">Изтриване</button>
							<?php } else { ?>
							<?php 
								$getValueFilter = array_shift($this->filter_value_model($value2['filter_value_id']));
								echo $getValueFilter['filter_value_name'];
							?>
							<button type="button" class="close" aria-label="Close" onclick="run({
							plugin:'Admin',
							controller:'product',
							method:'filterNameOption',
							back:'.body-operation',
							massive:{
							type:'REMOVEPOST',
							id:<?php echo $value2['filter_value_slot_id'] ?>
							}
							})">
								<span aria-hidden="true">&times;</span>
							</button>
						<?php } ?>
					</a>
				<?php } ?>
				<?php } ?>
				<a href="#" class="list-group-item list-group-item-action">
					<div class="btn-group" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-success" onclick="run({
						plugin:'Admin',
						controller:'product',
						method:'filterNameOption',
						back:'.body-operation',
						massive:{
						type:'PUT',
						name:$('.add-new-filte-name-input-update<?php echo $value['filter_name_id'] ?>').val(),
						id:<?php echo $value['filter_name_id'] ?>
						}
						})">Запази</button>
						<button type="button" class="btn btn-primary" onclick="run({
						plugin:'Admin',
						controller:'product',
						method:'filterNameOption',
						back:'.body-operation',
						massive:{
						type:'POST',
						id:<?php echo $value['filter_name_id'] ?>
						}
						})">Добави</button>
						<button type="button" class="btn btn-danger" onclick="run({
						plugin:'Admin',
						controller:'product',
						method:'filterNameOption',
						back:'.body-operation',
						massive:{
						type:'DELETE',
						id:<?php echo $value['filter_name_id'] ?>
						}
						})">Изтрии</button>
					</div>
				</a>
			</div>
		</div>
	<?php } ?>	
<?php } ?>	