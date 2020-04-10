<div class="jb-sidebar_categories mt-5">
	<div id='categoriesTitle' class="jb-categories_title">
		<h4>Категории</h4>
	</div>
	<div class="sidebar-categories_menu">
		<ul class="list-group list-group-flush">
			<?php foreach ($this->category() as $value) { ?>
			<li class="list-group-item"><a href="<?php echo set::url($getSimpleLink.'/'.$getPageSortLink.'/'.$value['category_link']) ?>"><?php echo $value['category_name'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>