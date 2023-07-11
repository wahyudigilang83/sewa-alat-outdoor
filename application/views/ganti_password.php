<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ganti Password!</h1>
                                        <span class="m-2"><?php echo $this->session->flashdata('pesan') ?></span>
                                    </div>
                                    <form method="POST" action="<?php echo base_url('auth/ganti_password_aksi') ?>">
                                        <div class="form-group">
                                        <input type="password" class="form-control " id="password_baru" name="password_baru" 
                                            placeholder="New Password">
                                            <?php echo form_error('password_baru','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                        <div class="form-group">
                                        <input type="password" class="form-control " name="ulangi_password" 
                                            id="ulangi_password" placeholder="Ulangi Password"> 
                                            <?php echo form_error('ulangi_password','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>  
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                   		Ganti Password
                               			</button>
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                   
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('register') ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

