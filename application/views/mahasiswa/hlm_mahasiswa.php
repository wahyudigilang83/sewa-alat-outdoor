<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<a href="mahasiswa/tambah">Tambah Mahasiswa</a>
	<table border="1">
		<tr>
			<td>NO</td>
			<td>NIM</td>
			<td>Nama Mahasiswa</td>
			<td>Jurusan</td>
			<td>Tlp</td>
			<td>Alamat</td>
			<td>Action</td>
		</tr>
		<?php foreach ($mahasiswa->result_array() as $key) : ?>
			<tr>
				<td><?php echo $key['id_mahasiswa'] ?></td>
				<td><?php echo $key['nim'] ?></td>
				<td><?php echo $key['nama_mahasiswa'] ?></td>
				<td><?php echo $key['jurusan'] ?></td>
				<td><?php echo $key['tlp'] ?></td>
				<td><?php echo $key['alamat'] ?></td>
				<td>
					<a href="<?php echo base_url('mahasiswa/ubah/'.$key['id_mahasiswa']) ?>">Edit</a>
					<a href="<?php echo base_url('mahasiswa/delete/'.$key['id_mahasiswa']) ?>">Delete</a>
				</td>

			</tr>
			<?php endforeach ?>
	</table>

</body>
</html>