<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DASHBOARD</title>
</head>
<body>
	<h1>SELAMAT ANDA BERHASIL LOGIN <?php echo $this->session->userdata('username');?> !</h1>
	<tr> Start untuk memulai program </tr>
	<form action="<?= base_url('barang')?>" method="post">
		<button type="submit">Start</button>
	</form>
	 <br>
	 <tr> Exit untuk logout dari akun </tr>
	<form action="<?= base_url('loginn/logout')?>" method="post">
		<button type="submit">Exit</button>
	</form>
</body>
</html>