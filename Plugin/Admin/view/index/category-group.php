<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		Главна категория:<li class="breadcrumb-item active" aria-current="page"><?php echo $lastCategory['category_name'] ?></li>
	</ol>
</nav>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Име на група</th>
			<th scope="col">Име на страница</th>
			<th>
				<div class="input-group mb-3">
					<input type="text" class="form-control cteagory-name-input" placeholder="Име на група">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" onclick="run({
							plugin:'Admin',
							method:'categoryGroupPageTable',
							back:'.table-body-category',
							massive:{
								name:$('.cteagory-name-input').val(),
								id:'<?php echo $lastCategory['category_id'] ?>',
								methodType:'PUT'
							}
						})">Добави</button>
					</div>
				</div>
			</th>
		</tr>
	</thead>
	<tbody class="table-body-category">
		<?php include set::path('Admin', 'view', 'index/category/category-group-table'); ?>
	</tbody>
</table>