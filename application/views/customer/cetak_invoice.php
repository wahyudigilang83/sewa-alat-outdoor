<table style="width: 50%">
	<h2>Invoice Pembayaran Anda</h2>
			<?php foreach($transaksi as $tr) : ?>
				<tr>
				<td>Nama Customer</td>
				<td>:</td>
				<td><?php echo $tr->nama_customer ?></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><?php echo $tr->nama_barang ?></td>
			</tr>
			<tr>
				<td>Tanggal Rental</td>
				<td>:</td>
				<td><?php echo $tr->tanggal_rental ?></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td>:</td>
				<td><?php echo $tr->tanggal_kembali ?></td>
			</tr>
			<tr>
				<td>Biaya Sewa / Hari</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($tr->harga,0,',','.')  ?></td>
			</tr>
			<tr>
				<?php 
					$x = strtotime($tr->tanggal_kembali);
					$y = strtotime($tr->tanggal_rental);
					$jumhari = abs(($x - $y)/(60*60*24));
				 ?>
				<td>Jumlah Hari Sewa</td>
				<td>:</td>
				<td><?php echo $jumhari ?> Hari</td>
			</tr>
			<tr>
				<td>Status Pembayaran</td>
				<td>:</td>
				<td><?php 
					if($tr->status_pembayaran == '0'){
						echo "Belum Lunas";
					}else{
						echo "Lunas";
					}  
					?>
					
				</td>
			</tr>
			
			<tr style="font-weight: bold; color: red">
				<td>Jumlah Pembayaran</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($tr->harga * $jumhari,0,',','.')?></td>
			</tr>
			<tr>
				<td>Rekening Pembayaran</td>
				<td>:</td>
				<td>
					<ul>
				  <li>Bank Mandiri : 6352857692658</li>
				  <li>Bank BCA     : 9756784678462</li>
				  <li>Bank BNI     : 4654786543673</li>
				  
				</ul>
				</td>
			</tr>
			
		<?php endforeach; ?>
</table>

<script type="text/javascript">
	window.print();
</script>