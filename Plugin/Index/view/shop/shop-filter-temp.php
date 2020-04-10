<div class="jb-sidebar_categories">
	<div class="jb-categories_title mt-5">
		<h4>Филтрирай по</h4>
	</div>
	<div class="sidebar-categories_menu">
		<ul>
			<?php foreach ($filterModelByCategory as $value) { ?>
				<div class="sidebar-checkbox_title mt-3">
					<h5><?php echo $value['filter_name_title'] ?></h5>
				</div>
				<ul class="sidebar-checkbox_list">
					<?php foreach ($this->category_filte_on_page_model($value['filter_name_id']) as $value2) { ?>
						<li>
							<input id="<?php echo $value2['filter_value_slot_link']?>" value="<?php echo $value2['filter_value_slot_link']?>" type="checkbox" name="fruits[]">
							<label><?php echo $value2['filter_value_name']?></label>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</ul>
	</div>
</div>