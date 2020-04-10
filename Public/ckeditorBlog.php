<?php
	session_start();
	if($_SESSION['ADMIN']){
		require_once('../set.php');
		$mysqli = new mysqli(set::config('db_host'), set::config('db_user'), set::config('db_password'), set::config('db_table'));
		$insert = "UPDATE blog SET blog_content='".$_POST['editor1']."' WHERE blog_id=".$_POST['id'];
		$select = "SELECT blog_content FROM blog WHERE blog_id=".$_POST['id'];
		$result = $mysqli->query($select);
		while($row = $result->fetch_assoc()) {
			if ($mysqli->query($insert) === TRUE) {
				
				} else {
				
			}
		?>
		<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
		<form method="POST" action="ckeditorBlog.php">
			<textarea name="editor1" id="editor1" rows="10" cols="80" class="testgetval">
				<?php echo $row["blog_content"]; ?>
			</textarea>
			<input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
			<button type="submit" class="btn btn-primary">Запази</button>
		</form>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>
		<?php 
		}
	}
?>