

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

                        <!-- Nav Item - Messages -->
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
                       
                    </div>
                    <a href="<?php echo base_url('admin/data_barang/tambah_barang') ?>" class="btn btn-secondary mb-3" >Tambah Data</a>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Type</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Action</th>
                             </tr>
                        </thead>
                        <body>
                            <?php 
                                $no=1;
                                foreach ($barang as $br) :  ?>
                                <tr>
                                <td><?php echo $no++ ?></td> 
                                <td>
                                    <img width="60px" src="<?php echo base_url().'assets/upload/'.$br->gambar ?>">
                                </td> 
                                <td><?php echo $br->nama_barang ?></td> 
                                <td><?php echo $br->kode_type ?></td> 
                                <td><?php echo $br->deskripsi ?></td>
                                <td><?php echo $br->stok ?></td> 
                                <td><?php 

                                if($br->status == "0") {
                                    echo "<span class='badge badge-danger'> Tidak tersedia </span>";
                                }else{
                                    echo "<span class='badge badge-primary'> Tersedia </span>";
                                }

                                ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/data_barang/detail_barang/')
                                    .$br->id_barang ?>" class="btn btn-sm "><i class="fas fa-eye"></i></a>

                                    <a href="<?php echo base_url('admin/data_barang/update_barang/')
                                    .$br->id_barang ?>" class="btn btn-sm "><i class="fas fa-edit"></i></a>

                                    <a href="<?php echo base_url('admin/data_barang/delete_barang/')
                                    .$br->id_barang ?>" class="btn btn-sm "><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>

                            <?php endforeach; ?>
                            
                        </body>
                        
                    </table>