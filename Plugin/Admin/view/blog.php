<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button onclick="addBlog('blog', 'пост')" type="button" data-toggle="modal" data-target="#Modal" class="btn btn-primary">Добави пост</button>
			<button onclick="addBlog('blog_tag', 'таг')" type="button" data-toggle="modal" data-target="#Modal" class="btn btn-primary">Добави таг</button>
			<button onclick="addBlog('blog_category', 'категория')" type="button" data-toggle="modal" data-target="#Modal" class="btn btn-primary">Добави категория</button>
		</div>
	</div>
</nav>
<table class="table">
	<tbody>
		<?php if($blogData[0] == null) { ?>
			
		<?php } else { ?>
			<?php foreach($blogData as $value){ ?>
				<tr>
					<td><?php echo $value['blog_name'] ?></td>
					<td>
						<form action="<?php echo set::url('ckeditorBlog.php') ?>" method="post" target="_blank">
							<input type="hidden" name="id" value="<?php echo $value['blog_id'] ?>">
							<button type="submit" class="btn btn-link">Редактиране</button>
						</form>
						<button type="submit" class="btn btn-link">Настройки</button>
					</td>
				</tr>
			<?php } ?>
		<?php } ?>
	</tbody>
</table>
<script>
	function addBlog(varTable, varName){
		run({
			plugin:'Admin',
			controller:'blog',
			method:'openModalMenu',
			back:'.modal-content',
			massive:{
				table:varTable,
				name:varName
			}
		});
	}
</script>