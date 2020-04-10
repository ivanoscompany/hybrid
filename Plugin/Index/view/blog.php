
<!-- JB's Header Area End Here -->

<!-- Begin JB's Breadcrumb Area -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="breadcrumb-content">
			<ul>
				<li><a href="index.html">Начало</a></li>
				<li class="active">Блог</li>
			</ul>
		</div>
	</div>
</div>
<!-- JB's Breadcrumb Area End Here -->

<!-- Begin JB's Blog Left Sidebar Area -->
<div class="jb-blog_area jb-banner_area jb-blog-grid_view">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 order-lg-1 order-2">
				<div class="jb-blog-sidebar-wrapper">
					<div class="jb-blog-sidebar">
						<div class="jb-sidebar-search-form">
							<form action="javascript:void(0)">
								<input type="text" class="jb-search-field" placeholder="Намерете статия">
								<button type="submit" class="jb-search-btn"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<div class="jb-blog-sidebar">
						<h4 class="jb-blog-sidebar-title">Категории</h4>
						<ul class="jb-blog-archive">
							<li><a href="javascript:void(0)">Ударни инструменти (10)</a></li>
							<li><a href="javascript:void(0)">Ремонт вкъщи (08)</a></li>
							<li><a href="javascript:void(0)">Направи си сам (07)</a></li>
							<li><a href="javascript:void(0)">За градината (14)</a></li>
						</ul>
					</div>
					<div class="jb-blog-sidebar" style="margin-top: 10%">
						<h4 class="jb-blog-sidebar-title">Тагове</h4>
						<ul class="jb-blog-tags">
							<li><a href="javascript:void(0)">За дома</a></li>
							<li><a href="javascript:void(0)">За градината</a></li>
							<li><a href="javascript:void(0)">Домашен майстор</a></li>
							<li><a href="javascript:void(0)">Бормашини</a></li>
							<li><a href="javascript:void(0)">Продукти Bosch</a></li>
							<li><a href="javascript:void(0)">Продукти Makita</a></li>
							<li><a href="javascript:void(0)">Продукти Einhell</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 order-lg-2 order-1">
				<div class="row blog-item_wrap">
					<?php foreach($this->blog_model() as $value){ ?>
					<div class="col-lg-6 col-md-6">
						<div class="blog-item">
							<div class="blog-content">
								<div class="blog-meta">
									<div class="blog-time_schedule">
										<span class="day">20</span>
										<span class="month">Фев</span>
									</div>
									<div class="meta-author">
										<span><?php echo $value['blog_name'] ?></span>
									</div>
								</div>
								<div class="blog-short_desc">
									<?php echo $value['blog_content'] ?>
								</div>
								<div class="jb-read-more_area">
									<!-- <a href="blog-details-left-sidebar.html" class="jb-read_more">Прочетете още</a>-->
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="jb-paginatoin-area text-center">
							<div class="row">
								<div class="col-lg-12">
									<ul class="jb-pagination-box">
										<li><a class="Previous" href="javascript:void(0)">Предишна</a></li>
										<li class="active"><a href="javascript:void(0)">1</a></li>
										<li><a href="javascript:void(0)">2</a></li>
										<li><a href="javascript:void(0)">3</a></li>
										<li><a class="Next" href="javascript:void(0)">Следваща</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>