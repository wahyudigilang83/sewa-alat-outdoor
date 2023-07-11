

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
                        <h1 class="h3 mb-0 text-gray-800">Laporan Transaksi</h1>
                       
                    </div>

                    <form method="POST" action="<?php echo base_url('admin/laporan') ?>">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control">
                            <?php echo form_error('dari','<div class="text-small 
                                            text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control">
                            <?php echo form_error('dari','<div class="text-small 
                                            text-danger">','</div>') ?>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mb-3">Tamppilkan Data</button>
                    </form>
                    <hr>
                    
                    <div class="btn-group">
                        <a class="btn btn-sm btn-success" target="_blank" href="<?php echo 
                        base_url().'admin/laporan/print_laporan/?dari='.set_value('dari
                        ').'&sampai='.set_value('sampai') ?>">Print</a>
                    </div>
                  
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
                            
                        </tr>

                        <?php 

                        $no=1;
                        foreach ($laporan as $tr) :  ?>
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

                                

                               
                            </tr>
                         
                        <?php endforeach; ?>
                    </table>
                    </div>