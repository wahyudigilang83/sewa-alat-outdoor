<!DOCTYPE html>
<html>
<head>
	<title>From</title>
</head>
<body>
	<form method="post" action="<?php echo base_url('valid/input')?>">
		<table>
			<tr>
				<td colspan="3"><?php echo form_error('nama') ?></td>
			</tr>
			<tr>
				<td><label>Nama</label></td>
				<td>:</td>
				<td><input type="text" name="nama" placeholder="Input Nama"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('email') ?></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td>:</td>
				<td><input type="text" name="email" placeholder="Input Email"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('alamat') ?></td>
			</tr>
			<tr>
				<td><label>Alamat</label></td>
				<td>:</td>
				<td><input type="text" name="alamat" placeholder="Input Alamat"></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

</body>
</html>