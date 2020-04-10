<nav id="sidebar">
	<div class="sidebar-header">
		<h5>Админ панел v0.3</h5>
	</div>
	
	<ul class="list-unstyled components">
		<li>
			<a href="/">HEADER</a>
		</li>
		<li>
			<a href="/">Към магазина</a>
		</li>
		<li>
			<a href="/admin">Админ</a>
		</li>
		<li class="">
			<a href="#all-page-submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Страници</a>
			<ul class="collapse list-unstyled" id="all-page-submenu">
				<li>
					<a href="#">НАЧАЛО</a>
				</li>
				<li>
					<a href="#">ЗА НАС</a>
				</li>
				<li>
					<a href="#" >МАГАЗИН</a>
				</li>
				<li>
					<a href="#">ПРОМОЦИИ</a>
				</li>
				<li>
					<a href="#" onclick="run({
						plugin:'Admin',
						controller:'blog',
						back:'.body-operation',
						massive:{
							page:1
						}
					})">БЛОГ</a>
				</li>
				<li>
					<a href="#">КОНТАКТИ</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#product-submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Продукти</a>
			<ul class="collapse list-unstyled" id="product-submenu">
				<li>
					<a href="#" onclick="run({
						plugin:'Admin',
						controller:'product',
						back:'.body-operation',
						massive:{
							page:1
						}
					})">Всички продукти</a>
				</li>
				<li>
					<a href="#" onclick="run({
						plugin:'Admin',
						controller:'product',
						method:'addNewProduct',
						back:'.body-operation'
					})">Добавяне на продукти</a>
				</li>
				<li>
					<a href="#" onclick="run({
						plugin:'Admin',
						method:'categoryPage',
						back:'.body-operation'
					})">Категории</a>
				</li>
				<li>
					<a href="#" onclick="run({
						plugin:'Admin',
						controller:'product',
						method:'filterPage',
						back:'.body-operation'
					})">Филтри</a>
				</li>
				<li>
					<a href="#" onclick="run({
						plugin:'Admin',
						controller:'brand',
						back:'.body-operation'
					})">Марка</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#">Модули</a>
		</li>
		<li>
			<a href="/">FOOTER</a>
		</li>
	</ul>
	
	<ul class="list-unstyled CTAs">
		<button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#exampleModal">
			Медиа блок
		</button>
	</ul>
</nav>