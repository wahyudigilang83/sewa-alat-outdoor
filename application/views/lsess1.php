<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
<h1>Login</h1>

	<form action="<?= base_url('loginn1/cek')?>" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td><button type="submit">LOGIN</button></td>
			</tr>
		</table>
	</form>
</body>
</html>