<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
</head>
<body>
	<h1>Keranjang Belanja</h1>
	<a href="deleteall">Hapus Semua</a>
	<a href="checkout">Checkout</a>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Nama Barang</td>
			<td>Deskripsi</td>
			<td>Qty</td>
			<td>Harga</td>
		</tr>
		<?php foreach ($this->cart->contents() as $key): ?>
		<tr>
			<td><?php echo $key['id'] ?></td>
			<td><?php echo $key['name'] ?></td>
			<td><?php echo $key['options'] ['descriptions'] ?></td>
			<td><?php echo $key['qty'] ?></td>
			<td><?php echo $key['price'] ?></td>
		</tr>
	<?php endforeach?>

	<tr>
		<td colspan="5"><center><b>Total : Rp.<?php echo $this->cart->total()?>,-</b></center></td>
	</tr>
	</table>

</body>
</html>