

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
                                            <button class="btn btn-dark" type="button">
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
                        <h1 class="h3 mb-0 text-gray-800">Update Data Customer</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">

                           
                            <?php foreach ($customer as $cs) : ?>
                            <form method="POST" action=" <?php echo base_url('admin/data_customer/update_customer_aksi')?> ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="hidden" name="id_customer" value="<?php echo $cs->id_customer ?>">
                                        <input type="text" name="nama_customer" class="form-control" value="<?php echo $cs->nama_customer ?>">
                                        <?php echo form_error('nama_customer','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                     <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $cs->username ?>">
                                        <?php echo form_error('username','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat ?>">
                                        <?php echo form_error('alamat','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="<?php echo $cs->gender ?>"><?php echo $cs->gender ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <?php echo form_error('gender','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" name="no_telp" class="form-control" value="<?php echo $cs->no_telp ?>">
                                        <?php echo form_error('no_telp','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>No. KTP</label>
                                        <input type="text" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp ?>">
                                        <?php echo form_error('no_ktp','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" value="<?php echo $cs->password ?>">
                                        <?php echo form_error('password','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                      <div class="form-group">
                                        <label>Role</label>
                                        <input type="number" name="role_id" class="form-control">
                                        <?php echo form_error('role_id','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                                    <button type="reset" class="btn btn-danger mt-4" value="reset">Reset</button>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                          
                    </div>


            </div>
        </div>


