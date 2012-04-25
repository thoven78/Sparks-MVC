<div class="content">
	
	<form method="post" action="/user/updateUser/<?php echo $users[0]; ?>" id="form" autocomplete="off">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?php echo $users[1]; ?>"/>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="text" name="password" id="password"/>
		</p>
		<p>
			<label for="role">Role</label>
			<select name="role" id="role">
				<option selected="selected">Select One</option>
				<option value="owner" <?php if ($users[2] == 'owner') echo 'selected'; ?>>Owner</option>
				<option value="admin" <?php if ($users[2] == 'admin') echo 'selected'; ?>>Admin</option>
				<option value="default" <?php if ($users[2] == 'default') echo 'selected'; ?>>Default</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Save" />
		</p>
	</form>
</div>