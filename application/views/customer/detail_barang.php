<div class="container mt-5 mb-5">
	<div class="card">
		<div class="cars-body">
			<?php foreach ($detail as $dt) : ?>
				<div class="row">
					<div class="col-md-6">
						<img style="width: 65%" src="<?php echo base_url('assets/upload/'.$dt->gambar) ?>">
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Nama</th>
								<td><?php echo $dt->nama_barang ?></td>
							</tr>
							<tr>
								<th>Deskripsi Barang</th>
								<td><?php echo $dt->deskripsi ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
									<?php if($dt->status == '1'){
										echo "Tersedia";
									}else{
										echo "Tidak Tersedia/Sedang Dirental";
									} ?>
								</td>
								
							</tr>
							<tr>
								<th>Harga Sewa</th>
								<td><?php echo $dt->harga ?></td>
							</tr>
							<tr>
								<th>Denda</th>
								<td><?php echo $dt->denda ?></td>
							</tr>
							<tr>
								<td></td>
								<td>
									 <?php 
                                if ($dt->status =="0"){
                                    echo "<span class='btn btn-danger e' disable>Tidak Tersedia</span>";
                                }else{
                                    echo anchor('customer/rental/tambah_rental'.$dt->id_barang, '
                                        <button class="btn btn-outline-dark mt-auto" >Rental</button>');
                                }
                                ?>
								</td>
							</tr>
						</table>
						
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>