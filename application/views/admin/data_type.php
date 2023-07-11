

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
                        <h1 class="h3 mb-0 text-gray-800">Data Type Barang</h1>
                       
                    </div>
                    <a  href="<?php echo base_url('admin/data_type/tambah_type') ?>" class="btn btn-secondary mb-3" >Tambah Type</a>

                    <?php echo $this->session->flashdata('pesan') ?>
                   
                    <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Kode Type</th>
                            <th>Nama Type</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>

                    <body>
                        <?php 
                        $no = 1;
                            foreach ($type as $ty): ?>
                            
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ty->kode_type ?></td>
                                    <td><?php echo $ty->nama_type ?></td>
                                    <td>
                                        <a class="btn btn-sm" href="<?php echo base_url('admin/data_type/update_type/'.$ty->id_type) ?>"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-sm" href="<?php echo base_url('admin/data_type/delete_type/'.$ty->id_type) ?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                        <?php endforeach; ?>
                        
                    </body>

                    </table>
                </div>