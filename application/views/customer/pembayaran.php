<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Invoice Pembayaran Anda
				</div>

				<div class="card-body">
					<table class="table">
						<?php foreach($transaksi as $tr) : ?>
						<tr>
							<th>Nama Barang</th>
							<td>:</td>
							<td><?php echo $tr->nama_barang ?></td>
						</tr>
						<tr>
							<th>Tanggal Rental</th>
							<td>:</td>
							<td><?php echo $tr->tanggal_rental ?></td>
						</tr>
						<tr>
							<th>Tanggal Kembali</th>
							<td>:</td>
							<td><?php echo $tr->tanggal_kembali ?></td>
						</tr>
						<tr>
							<th>Biaya Sewa / Hari</th>
							<td>:</td>
							<td>Rp. <?php echo number_format($tr->harga,0,',','.')  ?></td>
						</tr>
						<tr>
							<?php 
								$x = strtotime($tr->tanggal_kembali);
								$y = strtotime($tr->tanggal_rental);
								$jumhari = abs(($x - $y)/(60*60*24));
							 ?>
							<th>Jumlah Hari Sewa</th>
							<td>:</td>
							<td><?php echo $jumhari ?> Hari</td>
						</tr>
						<tr class="text-success">
							<th>Jumlah Pembayaran</th>
							<td>:</td>
							<td>Rp. <?php echo number_format($tr->harga * $jumhari,0,',','.')?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><a href="<?php echo base_url('customer/transaksi/cetak_invoice/'.$tr->id_rental) ?>" class="btn btn-sm btn-secondary">Print Invoice</a></td>
						</tr>
					<?php endforeach; ?>
					</table>
				</div>	
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header alert alert-primary">
					Informasi Pembayaran
				</div>
			<div class="card-body">
				<p class="text-success mb-2">Silahkan Melakukan Pembayaran Melalui Nomor Rekening Dibawah!</p>
				  <ul class="list-group list-group-flush">
				  <li class="list-group-item">Bank Mandiri : 6352857692658</li>
				  <li class="list-group-item">Bank BCA     : 9756784678462</li>
				  <li class="list-group-item">Bank BNI     : 4654786543673</li>
				  
				</ul>
						<?php 

						if(empty($tr->bukti_pembayaran)) { ?>
							<button style="width: 100%" type="button" class="btn btn-sm btn-danger mt-3"  data-bs-toggle="modal" data-bs-target="#bukti_pembayaran">
							  Upload Bukti Pembayaran !
							</button>

						<?php }elseif($tr->status_pembayaran == '0'){ ?>
							<button style="width: 100%" class="btn btn-sm btn-warning mt-3"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>

						<?php }elseif ($tr->status_pembayaran == '1') { ?>
							<button style="width: 100%" class="btn btn-sm btn-success mt-3"><i class="fa fa-check"></i> Pembayaran Selesai</button>

						<?php } ?>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- Button trigger modal -->

<div class="modal fade" id="bukti_pembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Upload Bukti Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="<?php echo base_url('customer/transaksi/pembayaran_aksi/'.$tr->id_rental) ?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
        	<label>Upload Bukti Pembayaran</label>
        	<input type="hidden" name="id_rental" class="form-control" value="<?php echo $tr->id_rental ?>">
        	<input type="file" name="bukti_pembayaran" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
    
        <button type="submit" class="btn btn-sm btn-success">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>