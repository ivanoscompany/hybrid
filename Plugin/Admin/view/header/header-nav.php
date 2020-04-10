<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" id="sidebarCollapse" class="btn btn-dark"> > </button>
			<button type="button" class="btn btn-primary">
				Поръчки <span class="badge badge-danger">4</span>
			</button>
			<button type="button" class="btn btn-primary">
				Оферти <span class="badge badge-danger">1</span>
			</button>
			<button type="button" class="btn btn-primary">
				Отзиви <span class="badge badge-danger">10</span>
			</button>
			<button type="button" class="btn btn-primary">
				Абонаменти <span class="badge badge-danger">2</span>
			</button>
			<button type="button" id="sidebarCollapse" class="btn btn-dark"> < </button>
		</div>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" onclick="run({
					plugin:'Admin',
					method:'logaut'
					})" href="#">Изход</a>
				</li>
			</ul>
		</div>
	</div>
</nav>