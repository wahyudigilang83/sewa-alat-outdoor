

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
                        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
                       
                    </div>
                    <a href="<?php echo base_url('admin/data_customer/tambah_customer') ?>" class="btn btn-secondary mb-3" >Tambah Akun</a>
                    <?php echo $this->session->flashdata('pesan') ?>

                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>No. Telepon</th>
                            <th>No. KTP</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>

                        <?php 

                        $no=1;
                        foreach ($customer as $cus) :  ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $cus->nama_customer ?></td>
                                <td><?php echo $cus->username ?></td>
                                <td><?php echo $cus->alamat ?></td>
                                <td><?php echo $cus->gender ?></td>
                                <td><?php echo $cus->no_telp ?></td>
                                <td><?php echo $cus->no_ktp ?></td>
                                <td><?php echo $cus->password ?></td>
                                <td><?php echo $cus->role_id ?></td>
                                <td>

                                

                                    <a href="<?php echo base_url('admin/data_customer/update_customer/').$cus->id_customer ?>" class="btn btn-sm" ><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/data_customer/delete_customer/').$cus->id_customer ?>" class="btn btn-sm" ><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                         
                        <?php endforeach; ?>
                    </table>
                    