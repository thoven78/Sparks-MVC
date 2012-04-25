<h1>Create a new user</h1>
<div class="content">
	
	<form method="post" action="/user/create" id="form">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" />
		</p>
		<p>
			<label for="password">Password</label>
			<input type="text" name="password" id="password" />
		</p>
		<p>
			<select name="role">
				<option value="admin">Admin</option>
				<option value="default">Default</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Log In" />
		</p>
	</form>
</div>