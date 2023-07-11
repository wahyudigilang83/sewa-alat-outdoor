<!DOCTYPE html>
<html>
<head>
	<title>Ubah Barang</title>
</head>
<body>
	<h1>Ubah Barang</h1>
	<table>
		<form action="<?= base_url('barang/edit/').$barang['id_barang'] ?>" method='POST'>
			<input type="hidden" name="id" value="<?= $barang['id_barang'] ?>">
				<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('nama_barang') ?></td>
			</tr>
			<tr>
				<td>Jenis Barang</td>
				<td>:</td>
				<td><input type="text" name="jenis_barang" value="<?= $barang['jenis_barang'] ?>"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('jenis_barang') ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><input type="text" name="deskripsi" value="<?= $barang['deskripsi'] ?>"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('deskripsi') ?></td>
			</tr>
			<tr>
				<td>QTY</td>
				<td>:</td>
				<td><input type="number" name="qty" value="<?= $barang['qty']  ?>"></td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('qty') ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td>
					<textarea name="harga" rows="3"><?= $barang['harga']  ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="3" ><?php echo form_error('harga') ?></td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
			</tr>		
		</form>
			<tr>
				<td><a href="<?= base_url('barang') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>