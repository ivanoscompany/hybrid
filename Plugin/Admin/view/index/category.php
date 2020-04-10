<table class="table">
	<thead>
		<tr>
			<th scope="col">Име на категория</th>
			<th scope="col">Име на страница</th>
			<th>
				<div class="input-group mb-3">
					<input type="text" class="form-control cteagory-name-input" placeholder="Име на категория">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" onclick="run({
							plugin:'Admin',
							method:'categoryPageTable',
							back:'.table-body-category',
							massive:{
								name:$('.cteagory-name-input').val(),
								methodType:'PUT'
							}
						})">Добави</button>
					</div>
				</div>
			</th>
		</tr>
	</thead>
	<tbody class="table-body-category">
		<?php include set::path('Admin', 'view', 'index/category/category-table'); ?>
	</tbody>
</table>