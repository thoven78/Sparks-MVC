<h1>Dashboard <span>  Welcome, <?php echo $_SESSION['username']; ?></span></h1> 
<div class="content">
	<form method="post" id="xhrSave">
		<p>
			<label for="todo">Insert your todo</label>
			<input type="text" id="todo" name="todo" />
			<input type="submit" value="Save" />
		</p>
	</form>
	<div id="ajaxData"></div>
</div>