<div class="container">
	<div class="card mx-auto" style="margin-top: 100px; margin-bottom: 100px">
		<div>
			Form Rental Mobil
		</div>

		<div class="card-body">
			<?php foreach($detail as $dt) : ?>
				<form method="POST" action="<?php echo base_url('customer/rental/tambah_rental_aksi') ?>">

					<div class="form-group">
						<label>Harga Sewa / Hari</label>
						<input type="hidden" name="id_barang" value="<?php echo $dt->id_barang ?>">
						<input type="text" name="harga" class="form-control" value="<?php echo number_format($dt->harga,0,',','.') ?>" readonly="">
					</div>

					<div class="form-group">
						<label>Denda</label>
						<input type="hidden" name="denda" value="<?php echo $dt->denda ?>">
						<input type="text" class="form-control" value="<?php echo number_format($dt->denda,0,',','.') ?>" readonly="">
					</div>

					<input type="hidden" name="stok" value="<?= $dt->stok ?>">

					<div class="form-group">
						<label>Tanggal Rental</label>
						<input type="date" name="tanggal_rental" class="form-control">
					</div>
					<div class="form-group">
						<label>Tanggal Kembali</label>
						<input type="date" name="tanggal_kembali" class="form-control" >
					</div>
					<br>
					<input type="hidden" name="status" value="1">
					<button type="submit" class="btn btn-outline-dark mt-auto">Rental</button>
				</form>

			<?php endforeach; ?>
		</div>
	</div>
</div>