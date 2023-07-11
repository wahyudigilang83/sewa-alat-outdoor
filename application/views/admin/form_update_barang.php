

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
                        <h1 class="h3 mb-0 text-gray-800">Update Data Barang</h1>
                       
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($barang as $br ) : ?>

                            <form method="POST" action="<?= base_url('admin/data_barang/update_barang_aksi') ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Type Barang</label>
                                        <input type="hidden" name="id_barang" value="<?php echo $br->id_barang ?>">
                                        <select name="kode_type" class="form-control">
                                            <option value="<?php echo $br->kode_type ?>"><?php echo $br->kode_type ?></option>
                                            <?php foreach ($type as $ty) : ?>
                                                <option value="<?php echo $ty->kode_type ?>">
                                                <?php echo $ty->nama_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('kode_type','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama_barang" class="form-control" value="<?php echo $br->nama_barang ?>">
                                        <?php echo form_error('nama_barang','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $br->deskripsi ?>">
                                        <?php echo form_error('deskripsi','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            
                                            <option <?php if($br->status == "1"){echo "
                                                selected = 'selected'";}
                                                echo $br->status; ?> value="1">Tersedia</option>
                                            <option <?php if($br->status == "0"){echo "
                                                selected = 'selected'";}
                                                echo $br->status; ?> value="0">Tidak Tersedia</option>
                                        </select>
                                        <?php echo form_error('status','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Sewa / Hari</label>
                                        <input type="number" name="harga" class="form-control" value="<?php echo $br->harga ?>">
                                        <?php echo form_error('harga','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Denda</label>
                                        <input type="number" name="denda" class="form-control" value="<?php echo $br->denda ?>">
                                        <?php echo form_error('denda','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" class="form-control" value="<?php echo $br->stok ?>">
                                        <?php echo form_error('stok','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                     <div class="form-group">
                                        <label>Gambar</label>
                                    <div class="form-group">
                                        <label></label>
                                        <img width="60px" src="<?php echo base_url().'assets/upload/'.$br->gambar ?>">
                                    </div>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                    <input type="hidden" name="gambarlama" value="<?php echo $br->gambar ?>">
                                    <button type="submit" class="btn btn-primary mt-4" >Simpan</button>
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


