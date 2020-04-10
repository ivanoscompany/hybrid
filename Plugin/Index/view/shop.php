<div class="jb-content_wrapper">
	<div class="container">
		<div class="row">	
			<div class="col-lg-3 order-2 order-lg-1">
				<div class="jb-sidebar-catagories_area">
					<div class="fb-filter-btn_area">
						<div class="btn-group" role="group" aria-label="Basic example">
							<a onclick="putFilter()" type="button" class="btn btn-dark text-white">Филтрирай</a>
							<a class="btn btn-dark text-white" href="<?php echo set::url('product/'.$getPageSortLink.'/'.$getFullCategoryLink) ?>">Изчисти</a>
						</div>
					</div>
					<div class="sidebar-checkbox first-child">
						<div class="sidebar-checkbox_title">
							<h5>Цена</h5>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">Цена от</span>
							</div>
							<input type="text" class="form-control filterPriceSizeTo" placeholder="цена" value="<?php echo $getPrizeRange[0] ?>">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">.лв</span>
							</div>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">Цена до</span>
							</div>
							<input type="text" class="form-control filterPriceSizeFrom" placeholder="цена" value="<?php echo $getPrizeRange[1] ?>">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">.лв</span>
							</div>
						</div>
					</div>
					<div class="sidebar-checkbox first-child">
						<div class="sidebar-checkbox_title">
							<h5>Марка</h5>
						</div>
						<ul class="sidebar-checkbox_list">
							<?php foreach ($this->brand_model() as $value) { ?>
								<li>
									<input id="brand:<?php echo $value['brand_name']?>" value="brand:<?php echo $value['brand_name']?>" type="checkbox" name="fruits[]">
									<label><?php echo $value['brand_name']?></label>
								</li>
							<?php } ?>
						</ul>
					</div>
					<?php if($getCategory == 'none'){ ?>
						<?php  include set::path('Index', 'view', 'shop/shop-filters-category'); ?>	
					<?php } else { ?>
						<?php  include set::path('Index', 'view', 'shop/shop-filters'); ?>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-9 order-1 order-lg-2">
				<div class="shopbar-with_banner">
					<div class="jb-sidebar_banner">
						<div class="banner-item">
							<a href="#">
								<img src="<?php echo set::url('image/shop/2.jpg') ?>" alt="JB's Shop Banner">
							</a>
						</div>
					</div>
					<div class='filterAnchor'><a href='#categoriesTitle'>Филтри</a></div>
					<!-- Begin Shop Topbar Area -->
					<div class="shop-topbar">
						<div class="product-select-box" id='perPage'>
							<div class="product-short">
								<p>Покажи по</p>
								<select onchange="setMaxResult()" class="nice-select get-max-page-value" id="get-max-page-value_id">
									<option value="30">30</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span>на страница</span>
							</div>
						</div>
						<div class="product-select-box">
							<div class="product-short">
								<p>Покажи</p>
								<select onchange="setSortBy()" class="nice-select get-sort-value" id="get-sort-value_id">
									<option value="trade">		Най - продавани</option>
									<option value="new">		Най - нови</option>
									<option value="priceup">	Най - скъпи</option>
									<option value="pricedown">	Най - евтини</option>
									<option value="clinet">		Клиентски отзиви</option>
									<option value="promo">		Промоционални</option>
								</select>
							</div>
						</div>
					</div>
					<!-- Shop Topbar Area End Here -->
					<!-- Begin Shop Products Wrapper Area -->
					<div class="shop-products-wrapper">
						<div class="tab-content">
							<div id="list-view" class="tab-pane fade active show shop-product-list_view" role="tabpanel">
								<div class="row no-gutters">
									<div class="col-lg-12">
										<?php  include set::path('Index', 'view', 'shop/shop-product'); ?>
									</div>
									<div class="col-lg-12">
										<div class="paginatoin-area">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6">
													<ul class="pagination-box">
														<?php 
															$tmp = [];
															for($p=1, $i=0; $i < $total_pages; $p++, $i++ ) {
																if($getDataSortPage == $p) { 
																	$tmp[] = '<li class="active"><a href="#">'.$p.'</a></li>';
																	} else {
																	$tmp[] = '<li><a href="'.set::url($getSimpleLink."/".$p."-".$getDataSortMaxPage."-".$getDataSortType."/".$getCategory).$getFilterLinkSave.'">'.$p.'</a></li>';
																} 
															}
															for($i = count($tmp) - 2; $i > 0; $i--) {
																if(abs($getDataSortPage - $i - 1) > 3) {
																	unset($tmp[$i]);
																}
															}
															if(count($tmp) > 1) {
																
																if($getDataSortPage > 1) {
																	$prevPage = $getDataSortPage-1;
																	echo '<li><a href="'.set::url($getSimpleLink."/".$prevPage."-".$getDataSortMaxPage."-".$getDataSortType."/".$getCategory).$getFilterLinkSave.'" class="Previous"><i class="fa fa-chevron-left"></i></a></li>';
																}
																
																$lastlink = 0;
																foreach($tmp as $i => $link) {
																	if($i > $lastlink + 1) {
																		echo " ... ";
																		} elseif($i) {
																		echo "  ";
																	}
																	echo $link;
																	$lastlink = $i;
																}
																
																if($getDataSortPage <= $lastlink) {
																	$nextPage = $getDataSortPage+1;
																	echo '<li><a href="'.set::url($getSimpleLink."/".$nextPage."-".$getDataSortMaxPage."-".$getDataSortType."/".$getCategory).$getFilterLinkSave.'" class="Next"><i class="fa fa-chevron-right"></i></a></li>';
																}
															}
														?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Shop Products Wrapper Area End Here -->
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var jArray = <?php echo json_encode($data); ?>;
    for(var i=0; i<jArray.length; i++){
		document.getElementById(jArray[i]).checked = true;
    }
	var getPageSave = "<?php echo $getDataSortPage ?>";
	var getSortSave = "<?php echo $getDataSortType ?>";
	var getMaxPageSave = "<?php echo $getDataSortMaxPage ?>";
	var getFullCategoryLink = '<?php echo $getCategory ?>';
	var getFilterLinkSave = '<?php echo $getFilterLinkSave ?>';
	document.getElementById('get-max-page-value_id').value = getMaxPageSave;
	document.getElementById('get-sort-value_id').value = getSortSave;
	function setMaxResult(){
		var getValueMaxPage = $('.get-max-page-value').val();
		var getStructorUrl = 'product/1-'+getValueMaxPage+'-'+getSortSave+'/'+getFullCategoryLink+getFilterLinkSave;
		location.href = '<?php echo set::url("'+getStructorUrl+'") ?>';
	}
	function setSortBy(){ 
		var getValueSortBy = $('.get-sort-value').val();
		var getStructorUrl = 'product/1-'+getMaxPageSave+'-'+getValueSortBy+'/'+getFullCategoryLink+getFilterLinkSave;
		location.href = '<?php echo set::url("'+getStructorUrl+'") ?>';
	}
	$('.loading').fadeOut(500);
	function putFilter(){
		if(!$('.filterPriceSizeFrom').val()){ var priceValueFrom = <?php echo $getMostUpPrice; ?>; } else { var priceValueFrom = $('.filterPriceSizeFrom').val(); }
		if(!$('.filterPriceSizeTo').val()){ var priceValueTo = 0; } else { var priceValueTo = $('.filterPriceSizeTo').val(); }
		var values = [].filter.call(document.getElementsByName('fruits[]'), function(c) {
			return c.checked;
			}).map(function(c) {
			return c.value;
		});
		var text = "";
		var i;
		for (i = 0; i < values.length; i++) {
			text += values[i] + "/";
		}
		getUrlForFilter = '<?php echo set::url($getSimpleLink."/1-'+getMaxPageSave+'-'+getSortSave+'/'+getFullCategoryLink+'") ?>/priceSize:'+priceValueTo+'-'+priceValueFrom+'/'+text;
		location.href = getUrlForFilter;
	}
	
	function searchButtonClick(){
		getUrlForFilter = '<?php echo set::url($getSimpleLink."/1-'+getMaxPageSave+'-'+getSortSave+'/'+getFullCategoryLink+'") ?>/search:'+$('.product-search-input').val();
		location.href = getUrlForFilter;
	}
	
</script>