<nav class="navbar navbar-dark bg-primary">
	<button type="button" class="btn btn-primary" onclick="run()">Home</button>
	<a class="navbar-brand" href="#">SIMPLE LOGIN</a>
</nav>
<div class="container">
	<div class="row">
		<div class="col-sm"></div>
		<div class="col-sm">
			<h2 class="text-center">Sing in</h2>
			<div class="jumbotron">
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input class="form-control username" type="text" placeholder="">
					<small id="emailHelp" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control password" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary" onclick="run('login', 'Admin', {user:$('.username').val(),pass:$('.password').val()})">Login</button>
			</div>
		</div>
		<div class="col-sm"></div>
	</div>
</div>
<?php  if(!is_array($errorLog)) {?>
	<script>
		Swal.fire({
			icon: 'error',
			title: 'Грешка',
			text: '<?php echo $errorLog ?>',
		})
	</script>
<?php } ?>

