<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="<?php echo base_url('register') ?>">
                                <div class="form-group">
                                        <input type="text" class="form-control " id="nama" name="nama_customer" 
                                            placeholder="Nama">
                                            <?php echo form_error('nama_customer','<div class="text-small 
                                            text-danger">','</div>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " id="username" name="username" 
                                            placeholder="Username">
                                            <?php echo form_error('username','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control " name="password" 
                                            id="password" placeholder="Password"> 
                                            <?php echo form_error('password','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>   
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="alamat" name="alamat" 
                                        placeholder="Alamat">
                                        <?php echo form_error('alamat','<div class="text-small 
                                            text-danger">','</div>') ?>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">    
                                        <select name="gender" class="form-control ">
                                            <option value="">-- Tentukan Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <?php echo form_error('gender','<div class="text-small 
                                            text-danger">','</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" 
                                        placeholder="No. Telepon">
                                        <?php echo form_error('no_telp','<div class="text-small 
                                            text-danger">','</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" 
                                        placeholder="No. KTP">
                                        <?php echo form_error('no_ktp','<div class="text-small 
                                            text-danger">','</div>') ?>
                                </div>
                                


                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login') ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>