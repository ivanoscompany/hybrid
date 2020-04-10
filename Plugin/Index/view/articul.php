<?php include set::path('Index', 'view', 'articul/articul-header'); ?>
<div class="sp-area">
	<div class="container">
		<div class="sp-nav">
			<div class="row">
				<?php 
					include set::path('Index', 'view', 'articul/articul-media'); 
					include set::path('Index', 'view', 'articul/articul-information'); 
				?>
			</div>
			<!-- Begin JB's Product Tab Area -->
			<div class="col-lg-7 col-md-7" style="max-width:100%; flex:100%">
				<div class="jb-product-tab_area sp-product-tab_area">
					<div class="container">
						<?php include set::path('Index', 'view', 'articul/articul-descriptions'); ?>
						<?php if($getArticulInfo['product_status'] != 3){ ?>
						<div class="look_up_buttons">
							<!--
							<a class="noLinkStyle" href="<?php echo set::url('konsumativi/'.$getArticulInfo['product_id']) ?>">
								<button class='similarProductsTagsContainer' id="buttonToArticulLink">
									<span class='similarProductsTags'>Виж всички спирални маркучи</span>
								</button>
							</a>
							-->
							<?php if($getArticulInfo['product_brand'] != 'Не е избрано'){ ?>
							<a class="noLinkStyle" href="<?php echo set::url('product/1-30-trade/none/priceSize:0-1710/brand:'.$getArticulInfo['product_brand']) ?>">
								<button class='similarProductsTagsContainer' id="buttonToArticulLink">
									<span class='similarProductsTags'>Виж всички продукти на <?php echo $getArticulInfo['product_brand'] ?></span>
								</button>
							</a>
							<?php } ?>
							<a class="noLinkStyle" href="<?php echo set::url('konsumativi/'.$getArticulInfo['product_id']) ?>">
								<button class='similarProductsTagsContainer' id="buttonToArticulLink">
									<span class='similarProductsTags'>Консумативи за този продукт</span>
								</button>
							</a>
						</div>
						<?php } ?>
						</div>
				</div>
			</div>
			<!-- JB's Product Tab Area End Here -->
			</div>
		</div>
		</div>
</div>
<?php 
include set::path('Index', 'view', 'articul/articul-by-product'); 
include set::path('Index', 'view', 'articul/articul-by-sell'); 
include set::path('Index', 'view', 'articul/articul-by-random-product'); 
?>
<div class="error-log"></div>
<script>
	function addToCardScript(){
		var index;
		var getString;
		$('.select-variation-to-cart  option:selected').each(function() {
			getString += '/'+$(this).val();
		});
		run({
			plugin:'Index',
			controller:'articul',
			method:'addPordeuctToCart',
			back:'.error-log',
			massive:{
				info:getString,
				count:$('.cart-plus-minus-box').val(),
				id:<?php echo $getArticulInfo['product_id'] ?>
			}
		});
	}
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>																																																											