<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
</head>
<body>

	<h1>Tambah Barang</h1>
	<table>
		<a href="<?= base_url('barang') ?>"><button>Kembali</button></a>

		<form action="<?php echo base_url('barang/add') ?>" method="post">
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang"></td>
			<tr>
				<td colspan="3" ><?php echo form_error('nama_barang') ?></td>
			</tr>
			</tr>
			<tr>
				<td>Jenis Barang</td>
				<td>:</td>
				<td><input type="text" name="jenis_barang"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('jenis_barang') ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><input type="text" name="deskripsi"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('deskripsi') ?></td>
			</tr>
			<tr>
				<td>QTY</td>
				<td>:</td>
				<td><input type="number" name="qty"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('qty') ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('harga') ?></td>
			</tr>
			<tr>
				<td><button type="submit">Tambah</button></td>
			</tr>
		</form>
	</table>
</body>
</html>