

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" >

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#"  aria-haspopup="true" aria-expanded="false">
                                <div class="small text-gray-500">Welcome <?php echo $this->session->userdata('nama_customer') ?></div>
                              
                            </a>
                            
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                       

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
                       
                    </div>
                    
                    <?php echo $this->session->flashdata('pesan') ?>
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Barang</th>
                            <th>Tgl. Rental</th>
                            <th>Tgl. Kembali</th>
                            <th>Harga/Hari</th>
                            <th>Denda/Hari</th>
                            <th>Total Denda</th>
                            <th>Tgl. Dikembalikan</th>
                            <th>Status Pengembalian</th>
                            <th>Status Rental</th>
                            <th>Cek Pembayaran</th>
                            <th>Action</th>
                        </tr>

                        <?php 

                        $no=1;
                        foreach ($transaksi as $tr) :  ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $tr->nama_customer ?></td>
                                <td><?php echo $tr->nama_barang ?></td>
                                <td><?php echo date('d/m/Y', strtotime($tr->tanggal_rental)); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($tr->tanggal_kembali)); ?></td>
                                <td><?php echo number_format($tr->harga,0,',','.')  ?></td>
                                <td><?php echo number_format($tr->denda,0,',','.')  ?></td>
                                <td><?php echo number_format($tr->total_denda,0,',','.')  ?></td>
                                <td>
                                    <?php 
                                        if($tr->tanggal_pengembalian =="0000-00-00") {
                                            echo "-";
                                        }else {
                                            echo date ('d/m/Y', strtotime($tr->tanggal_pengembalian));
                                        }
                                     ?>

                                </td>
                                 <td><?php echo $tr->status_pengembalian ?>
                                     
                                 </td>

                                  <td><?php echo $tr->status_rental ?>
                                     
                                 </td>

                                 <td>
                                     <center>
                                         <?php 
                                         if(empty($tr->bukti_pembayaran)){ ?>
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                         <?php }else{ ?>
                                            <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/transaksi/pembayaran/'.$tr->id_rental) ?>"><i class="fas fa-check"></i></a>
                                         <?php } ?>
                                     </center>
                                 </td>

                                <td>
                                        <div class="row">
                                            <a class="btn ml-md-3" href="<?php echo base_url('admin/transaksi/transaksi_selesai/'.$tr->id_rental) ?>"><i class='fas fa-check'></i></a>
                                            <a class="btn ml-md-3" href="<?php echo base_url('admin/transaksi/transaksi_batal/'.$tr->id_rental) ?>"><i class='fas fa-times'></i></a>
                                        </div>
                                    
                                </td>
                            </tr>
                         
                        <?php endforeach; ?>
                    </table>
                    </div>
                    