<div class="container">
	<div class="card mx-auto" style="margin-top: 80px; margin-bottom: 100px; width: 80%;">
		<div class="card-header">
			Data Transaksi Anda
		</div>
		<span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
		<div class="card-body">
			<table class="table table-boerdered table-striped">
				<tr>
					<th>No</th>
                    <th>Nama Customer</th>
                    <th>Barang</th>
                    <th>Harga Sewa</th>
                    <th>Action</th>
                    <th>Batal</th>
				</tr>

				<?php $no=1; foreach ($transaksi as $tr) : ?>
				<tr>
					 <td><?php echo $no++ ?></td>
                     <td><?php echo $tr->nama_customer ?></td>
                     <td><?php echo $tr->nama_barang ?></td>
                     <td>Rp. <?php echo number_format($tr->harga,0,',','.')  ?></td>
                     <td>
                     	<?php if($tr->status_rental == "Selesai") { ?>
                     		<button class="btn btn-sm btn-danger">Rental Selesai</button>
                     	<?php }else{ ?>
                     		<a href="<?php echo base_url('customer/transaksi/pembayaran/'.$tr->id_rental) ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
                     	<?php } ?>
                     </td>
                     <td>

                     	<?php if($tr->status_rental =='Belum Selesai') { ?>
							           <a onclick="return confirm('Yakin Batal?')" class="btn btn-sm btn-danger" href="<?php echo base_url('customer/transaksi/batal_transaksi/'.$tr->id_rental) ?>">Batal</a>
                     	<?php }else { ?>
                     		<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
							             Batal
						          	</button>
                     	<?php } ?>

                     	
                     </td>
				</tr>
			    <?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Rental Selesai, Gagal melakukan pembatalan!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">Confirm</button>
        
      </div>
    </div>
  </div>
</div>