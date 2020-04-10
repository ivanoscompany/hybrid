<?php 
	$getCategoryByLink = array_shift($this->category_by_link($getCategory));
	$getCategoryGroupByLink = array_shift($this->category_group_by_link($getCategory));
	$getCategorySubByLink = array_shift($this->category_sub_by_link($getCategory));
?>
<?php if($getCategoryByLink['category_group']==1) { ?>
	<div class="jb-sidebar_categories mt-5">
		<div id='categoriesTitle' class="jb-categories_title">
			<h4><?php echo $getCategoryByLink['category_name'] ?></h4>
		</div>
		<div class="sidebar-categories_menu">
			<ul>
				<?php foreach ($this->category_group($getCategoryByLink['category_id']) as $value) { ?>
					<li class="has-sub"><a href=""><b><?php echo $value['category_group_name'] ?></b></a>
						<ul>
							<?php foreach ($this->category_group_content($value['category_group_id']) as $value2) { ?>
								<li><a href="<?php echo set::url($getSimpleLink.'/'.$getPageSortLink.'/'.$value2['category_link']); ?>"><?php echo $value2['category_group_name'] ?></a></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php } elseif($getCategoryByLink['category_filter']==1) { ?>
	<?php 
		$filterModelByCategory = $this->category_filte_model($getCategoryByLink['category_id']); 
		include set::path('Index', 'view', 'shop/shop-filter-temp');
	?>
<?php } else { ?>
	<?php if($getCategoryGroupByLink == null){ ?>
		<?php if($getCategorySubByLink != null){ ?>
			<?php 
				$filterModelByCategory = $this->category_filte_model($getCategorySubByLink['category_group_content_id']); 
				include set::path('Index', 'view', 'shop/shop-filter-temp');
			?>
		<?php } ?>
		<?php } else { ?>
		<div class="jb-sidebar_categories mt-5">
			<div id='categoriesTitle' class="jb-categories_title">
				<h4>Подкатегории</h4>
			</div>
			<div class="sidebar-categories_menu">
				<ul class="list-group list-group-flush">
					<?php foreach ($this->category_group_content($getCategoryGroupByLink['category_group_id']) as $value) { ?>
						<li class="list-group-item"><a href="<?php echo set::url($getSimpleLink.'/'.$getPageSortLink.'/'.$value['category_link']) ?>"><?php echo $value['category_group_name'] ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	<?php } ?>
<?php } ?>