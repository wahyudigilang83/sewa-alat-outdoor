<!DOCTYPE html>
<html>
<head>
	<title>Session</title>
</head>
<body>
	<form method="POST" action="<?= base_url('login/set') ?>">
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
			<td><button type="submit">Login</button></td>
		</tr>
		</table>
	</form>
	<br>
	<br>
	Username : <?= $this->session->userdata('username'); ?><br>
	Password : <?= $this->session->userdata('password'); ?><br>
	<a href="login/deleteall"><button>Logout</button></a><br>
</body>
</html>