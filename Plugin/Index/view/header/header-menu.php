<div class="header-bottom_area d-none d-lg-block">
    <div class="container">
        <div class="row">
            <!-- Begin JB's Category Menu Area -->
            <div class="col-lg-3 col-md-4">
				<div class="category-menu category-menu-hidden">
					<div class="category-heading">
						<h2 class="categories-toggle"><span>Категории</span></h2>
					</div>
					<div id="cate-toggle" class="category-menu-list">
						<ul>
							<?php foreach ($this->category() as $category){  ?>
								<?php if($category['category_group'] == 1){ ?>
									<li class="right-menu"><a href="<?php echo set::url('product/1-30-trade'.$getPageSortLink.'/'.$category['category_link']) ?>"><?php echo $category['category_name'] ?></a>
										<ul class="cat-mega-menu">
											<?php foreach ($this->category_group($category['category_id']) as $category_group){  ?>
												<?php if($category['category_id'] == $category_group['category_id']){ ?>
													<li class="right-menu cat-mega-title">
														<a href="<?php echo set::url('product/1-30-trade'.$getPageSortLink.'/'.$category_group['category_link']) ?>"><?php echo $category_group['category_group_name'] ?></a>
														<ul>
															<?php foreach ($this->category_group_content($category_group['category_group_id']) as $category_group_content){  ?>
																<?php if($category_group['category_group_id'] == $category_group_content['category_group_id']){ ?>
																	<li><a href="<?php echo set::url('product/1-30-trade'.$getPageSortLink.'/'.$category_group_content['category_link']); ?>"><?php echo $category_group_content['category_group_name'] ?></a></li>
																<?php } ?>
															<?php } ?>
														</ul>
													</li>
												<?php } ?>
											<?php } ?>
										</ul>
									</li>
									<?php } else { ?>
									<li><a href="/product/1-30-trade/<?php echo $category['category_link'] ?>"><?php echo $category['category_name'] ?></a></li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
            <!-- JB's Category Menu Area End Here -->
            <!-- Begin Header Middle Menu Area -->
            <div class="col-lg-7 position-static d-none d-lg-block">
                <div class="hm-menu hm-menu-2">
                    <nav>
                        <ul>
                            <li id='indexNav'>
                                <a href="<?php echo set::host() ?>">НАЧАЛО</a>
							</li>
                            <li id='aboutusNav'>
                                <a href="<?php echo set::url('za-nas') ?>">ЗА НАС</a>
							</li>
                            <li id='shopNav'>
                                <a href="<?php echo set::url('product') ?>">МАГАЗИН</a>
							</li>
                            <li id='promotionsNav'>
                                <a href="<?php echo set::url('promociq') ?>">ПРОМОЦИИ</a>
							</li>
                            <li id='blogNav'>
                                <a href="<?php echo set::url('blog') ?>">БЛОГ</a>
							</li>
                            <li id='contactNav'>
                                <a href="<?php echo set::url('kontakti') ?>">КОНТАКТИ</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
            <!-- Header Middle Menu Area End Here -->
            <!-- Begin Header Contact Information Area -->
            <div class="col-lg-2">
                <div class="contact-info">
                    <a href="tel://+359885 248 405"><i class="fa fa-phone-volume"></i> 0885 248 405</a>
				</div>
			</div>
            <!-- Header Contact Information Area End Here -->
		</div>
	</div>
</div>			