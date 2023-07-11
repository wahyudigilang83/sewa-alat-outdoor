<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach($barang as $br) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo base_url('assets/upload/'.$br->gambar) ?>" style="width: 260px; height: 260px" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $br->nama_barang ?></h5>
                                    <!-- Product price-->
                                    Deskripsi : <?php echo $br->deskripsi ?>
                                    <h6>Harga : Rp. <?php echo number_format($br->harga,0,',','.') ?> / Hari</h6>
                                    <h5>Stok : <?= $br->stok ?></h5>
                                </div>
                            </div>

                            <!-- Product actions-->
                            <center>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <?php 
                                if ($br->status =="0"){
                                    echo "<span class='btn btn-danger e' disable>Tidak Tersedia</span>";
                                }else{
                                    echo anchor('customer/rental/tambah_rental/'.$br->id_barang, '
                                        <button class="btn btn-outline-dark mt-auto">Rental</button>');
                                }

                                ?>
                                <a class="btn btn-warning" href="<?php echo base_url('customer/dashboard/detail_barang/'.$br->id_barang) ?>">Detail</a>
                            </div>
                            </center>
                        </div>
                        
                    </div>
                  <?php endforeach; ?>  
                </div>
            </div>
        </section>