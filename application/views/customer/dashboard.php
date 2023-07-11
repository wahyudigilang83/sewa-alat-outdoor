
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('customer/dashboard') ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('customer/data_barang') ?>">Menu</a></li>
                        <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('customer/transaksi') ?>">Transaksi</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo base_url('register') ?>">Register</a></li>
                        
                         <li class="nav-item ">
                            <?php if ($this->session->userdata('nama_customer')) { ?>
                                <div>
                                <a class="nav-link" href="<?php echo base_url('auth/logout') ?>"><?php echo $this->session->userdata('nama_customer') ?> |<li><span class="btn btn-sm btn-warning">Logout</span></a></li>
                               <li> <a class="nav-link" href="<?php echo base_url('auth/ganti_password') ?>"><span class="btn btn-sm btn-primary">Ganti Password</span></a> </li>
                                </div>
                            <?php } else { ?>
                                <a class="nav-link" href="<?php echo base_url('auth/login') ?>"><span class="btn btn-sm btn-success">Login</span></a>
                            <?php } ?>
                            
                        </li>

                    </ul>
                   

                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Easy Way Outdoor</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        

        <!-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div> Footer-->
       
