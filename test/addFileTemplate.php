<h1>Create a directory</h1>
<form action="fileController.php" method="POST">
  <input class="form-control" type="text" name="newFolder" id="input_dirname" required placeholder="Directory name..." value="" />
	<input class="form-control" type="hidden" name="currentUserPath" id="input_dirpath" value="drive" />
	<button type="submit">Create directory</button>
</form>