<div class="modal-header">
	Име на филтър 
	<h5 class="modal-title" id="exampleModalLabel"><?php echo $getFilteName['filter_name_title'] ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<?php foreach ($this->filter_value_only_model() as $value) { ?>
		<?php if($value['filter_value_id']==0) {  } else { ?>
			<ul class="list-group float-left ml-1 mb-1 list-of-all-value">
				<li class="list-group-item" id="listValue<?php echo $value['filter_value_id'] ?>" style="cursor: pointer;" ondblclick="
				$('#Modal').modal('hide');
				run({
				plugin:'Admin',
				controller:'product',
				method:'filterValueOption',
				back:'.body-operation',
				massive:{
				type:'PUT',
				id:<?php echo $value['filter_value_id'] ?>,
				slot:<?php echo $data['SlotID'] ?>,
				blokID:<?php echo $data['filterID'] ?>
				}
				})">
					<?php echo $value['filter_value_name'] ?>
					<button type="button" class="close" aria-label="Close" onclick="
					document.getElementById('listValue<?php echo $value['filter_value_id'] ?>').remove();
					run({
					plugin:'Admin',
					controller:'product',
					method:'filterValueOption',
					back:'.body-operation',
					massive:{
					type:'DELETE',
					id:<?php echo $value['filter_value_id'] ?>
					}
					})">
						<span aria-hidden="true">&times;</span>
					</button>
				</li>
			</ul>
		<?php } ?>
	<?php } ?>
</div>
<div class="modal-footer">
	<div class="col-8">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Добави стойност</span>
			</div>
			<input type="text" class="form-control add-new-filter-name-input" placeholder="Име на стойност">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary " type="button" id="button-addon2" onclick="
				$('#Modal').modal('hide');
				run({
				plugin:'Admin',
				controller:'product',
			method:'addNewFilteValue',
			back:'.errorLog',
			massive:{
			name:$('.add-new-filter-name-input').val()
			}
			})">Добави</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>