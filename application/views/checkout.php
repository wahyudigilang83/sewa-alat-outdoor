<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proses Checkout</title>
</head>
<body>
	<h1>Proses Checkout</h1>
	<a href="<?= base_url('barang/keranjang')?>">Kembali</a>
	<table>
		<form action="<?php echo base_url('barang/pembeli') ?>" method="post">
		<?php foreach ($this->cart->contents() as $key ): ?>
          <tr>
               <td><?php echo $key['name']?></td>
               <td><?php echo $key['qty']?> x </td>
               <td>Rp.<?php echo $key['price']?></td>
          </tr>
          <?php endforeach?>
		<tr>
			<td>Nama</a></td>
			<td>:</td>
			<td><input type="text" name="nama_pembeli"></td>
		</tr>
		<tr>
			<td>No Telp</a></td>
			<td>:</td>
			<td><input type="text" name="telp"></td>
		</tr>
		<tr>
			<td>Alamat</a></td>
			<td>:</td>
			<td><input rows="3" name="alamat"></td>
		</tr>
		<tr>
			<td>Metode</a></td>
			<td>:</td>
			<td>
				<select name="metode">
					<option value="">Metode Pembayaran</option>
					<option value="cash">Cash</option>
					<option value="cashless">Cashless</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="5"><b>Total yang harus dibayar Rp. <?php echo $this->cart->total() ?>,-</b></td>
		</tr>
		<tr>
			<td><button type="submit">Simpan</button></td>
		</tr>
	</form>
</body>
</html>