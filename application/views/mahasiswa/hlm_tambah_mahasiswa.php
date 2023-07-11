<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mahasiswa</title>
</head>
<body>

	<h1>Tambah Mahasiswa</h1>
	<table>
		<a href="<?= base_url('mahasiswa') ?>"><button>Kembali</button></a>

		<form action="<?php echo base_url('mahasiswa/add') ?>" method="post">
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama_mahasiswa"></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td>
					<select name="jurusan">
						<option value="">Pilih Jurusan</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Teknik Sipil">Teknik Sipil</option>
						<option value="Pariwisata">Pariwisata</option>
						<option value="Administrasi Niaga">Administrasi Niaga</option>
						<option value="Akuntansi">Akuntansi</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="tlp"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>

				<td><button type="submit">Tambah</button></td>
			</tr>

			
		</form>




	</table>
</body>
</html>