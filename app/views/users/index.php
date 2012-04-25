<h1>User Index</h1>
<div class="content">
	<form method="post" action="/user/create">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" />
		</p>
		<p>
			<label for="password">Password</label>
			<input type="text" name="password" id="password" />
		</p>
		<p>
			<label for="role">User Group</label>
			<select name="role" id="role">
				<option selected="selected">Select One</option>
				<option value="admin">Admin</option>
				<option value="default">Default</option>
			</select>
		</p>
		<p>
			<label></label>
			<input type="submit" value="Create User" />
		</p>
	</form>

	<table id="users">
	<thead>
		<tr>				
			<th>Username</th>
			<th>Date Created</th>
			<th>User Group</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?= $users; ?>
	</tbody>		
	</table>
</div>