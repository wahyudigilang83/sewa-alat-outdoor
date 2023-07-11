<!DOCTYPE html>
<html>
<head>
	<title>Data Karyawan</title>
</head>
<body>
	<h1>Data Karyawan</h1>
	<a href="tampilan/tambah">Tambah Karyawan</a>
	<table border="1">
		<tr>
			<td>NO</td>
			<td>Jabatan</td>
			<td>Tunjangan</td>
			<td>Uang Makan</td>
			<td>Bonus</td>
			<td>Jumlah Hari Kerja</td>
			
		</tr>
		<?php foreach ($tampilan->result_array() as $key) : ?>
			<tr>
				<td><?php echo $key['id_karyawan'] ?></td>	
				<td><?php echo $key['jabatan'] ?></td>
				<td><?php echo $key['tunjangan'] ?></td>
				<td><?php echo $key['uangmakan'] ?></td>
				<td><?php echo $key['bonus'] ?></td>
				<td><?php echo $key['jumlahharikerja'] ?></td>
				
				<td>
					<a href="<?php echo base_url('barang/ubah/'.$key['id_karyawan']) ?>">Edit</a>
					<a href="<?php echo base_url('barang/delete/'.$key['id_karyawan']) ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach ?>
	</table>

</body>
</html>
