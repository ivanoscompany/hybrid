<div class="modal-header">
	<div class="container">
		<div class="row align-items-start">
			<div class="col-6">
				<h3>Добавяне на <?php echo $data['name'] ?></h3>
			</div>
			<div class="col-4">
				
			</div>
			<div class="col-2">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-2">
					
				</div>
				<div class="col-8">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Име на <?php echo $data['name'] ?></span>
						</div>
						<input type="text" class="form-control get-name-blog" placeholder="Въведете име" aria-label="Username" aria-describedby="basic-addon1">
						<div class="input-group-append">
							<button onclick="newDataBlog()" class="btn btn-outline-secondary" type="button">Добави</button>
						</div>
					</div>
				</div>
				<div class="col-2">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-body">
	<table class="table">
		<tbody>
			<?php if($blogData[0] == null) { ?>
				
			<?php } else { ?>
				<?php foreach($blogData as $value){ ?>
					<tr>
						<td><?php echo $value['blog_name'] ?></td>
						<td><button type="submit" onclick="removeDataBlog(<?php echo $value['blog_id'] ?>)" class="btn btn-link">Премахни</button></td>
					</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<script>
	function newDataBlog(){
		run({
			plugin:'Admin',
			controller:'blog',
			method:'addNewBlog',
			back:'.modal-content',
			massive:{
				table:"<?php echo $data['table'] ?>",
				name:"<?php echo $data['name'] ?>",
				value:$('.get-name-blog').val()
			}
		});
	}
	
	function removeDataBlog(varId){
		run({
			plugin:'Admin',
			controller:'blog',
			method:'removeBlog',
			back:'.modal-content',
			massive:{
				table:"<?php echo $data['table'] ?>",
				name:"<?php echo $data['name'] ?>",
				id:varId
			}
		});
	}
</script>
