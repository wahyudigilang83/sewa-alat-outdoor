<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
</head>
<body>
	<h1>Data Barang</h1>
	<a href="barang/tambah">Tambah Barang</a> |
	<a href="barang/keranjang">Keranjang Belanja(<?php echo count($this->cart->contents())?>)</a>
	<table border="1">
		<tr>
			<td>NO</td>
			<td>Nama Barang</td>
			<td>Jenis Barang</td>
			<td>Deskripsi</td>
			<td>Qty</td>
			<td>Harga</td>
			<td>Action</td>
		</tr>
		<?php foreach ($barang->result_array() as $key) : ?>
			<tr>
				<td><?php echo $key['id_barang'] ?></td>	
				<td><?php echo $key['nama_barang'] ?></td>
				<td><?php echo $key['jenis_barang'] ?></td>
				<td><?php echo $key['deskripsi'] ?></td>
				<td><?php echo $key['qty'] ?></td>
				<td><?php echo $key['harga'] ?></td>
				<td>
					<a href="<?php echo base_url('barang/edit/'.$key['id_barang']) ?>">Edit</a> |
					<a href="<?php echo base_url('barang/delete/'.$key['id_barang']) ?>">Delete</a> |
					<a href="<?php echo base_url('barang/addcart/'.$key['id_barang'])?>">Cart</a>
				</td>


			</tr>
			<?php endforeach ?>

	</table>
	<br>
	<form action="<?= base_url('loginn/logout')?>" method="post">
		<button type="submit">Logout</button>
	</form>

</body>
</html>