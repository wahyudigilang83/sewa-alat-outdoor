

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                        <h1 class="h3 mb-0 text-gray-800">Detail Barang</h1>
                       
                    </div>
                    <?php foreach($detail as $dt) : ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <img src="<?php echo base_url().'assets/upload/'.$dt->gambar ?>" width="300">
                            </div>
                            <div class="col-md-7">
                                <table class="table">
                                    <tr>
                                        <td>Type Barang</td>
                                        <td>
                                        <?php 
                                            if($dt->kode_type == "TENT"){
                                                echo "Tenda";
                                            }elseif($dt->kode_type == "HIKING"){
                                                echo "Alat Mendaki";
                                            }elseif($dt->kode_type == "COOKING"){
                                                echo "Alat Memasak";
                                            }else{
                                                echo "<span class='text-danger'>Type Barang Belum Terdaftar</span>";
                                            }
                                         ?>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?php echo $dt->nama_barang ?></td>
                                    </tr>
                                     <tr>
                                        <td>Deskripsi</td>
                                        <td><?php echo $dt->deskripsi ?></td>
                                    </tr>
                                     <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php 
                                                if($dt->status == "0"){
                                                    echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                                }else{
                                                    echo "<span class='badge badge-primary'>Tersedia</span>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Sewa / Hari</td>
                                        <td><?php echo number_format($dt->harga,0,',','.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Denda</td>
                                        <td><?php echo number_format($dt->denda,0,',','.') ?></td>
                                    </tr>
                                </table>
                                <a class="btn btn-sm btn-primary ml-3" href="<?php echo base_url('admin/data_barang/update_barang/'.$dt->id_barang) ?>">Update</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_barang') ?>">Kembali</a>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                 </div>
                    