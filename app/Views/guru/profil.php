        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Akses Profil</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Akses Profil</li>
                        </ol>
                    </div>
                </div>

                

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-8 col-xxl-12">
                        <div class="pricing-wrapper" style="margin-top: -3%;">

                            <div class="pricing-heading-text">
                                <h2>Profil</span></h2>
                            </div>

                            <!-- DISINI GETFLASHKEY NYA -->
                            <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasilupdate'); ?>
                                <?php endif; ?>

                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-center">FOTO PROFIL</h4>
                                            <div class="card-content">
                                                <p style="color: black;">
                                                    <div class="card-body user-details-contact text-center">
                                                        
                                                        <div class="user-details-image mb-3">
                                                            <img class="rounded-circle" src="<?= base_url(); ?>profil_picture/pp.jpg" alt="image">
                                                        </div>
                                                        <div class="user-intro">
                                                            <h4 class="text-primary card-intro-title mb-0"><?php echo session('nama_lengkap'); ?></h4>
                                                            <!-- <p><small>@ Druid Wensleydale</small>
                                                            </p> -->
                                                        </div>


                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="card forms-card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4 text-center">INFORMASI PRIBADI</h4>
                                            <div class="basic-form">
                                                <form method="post" action="<?php echo base_url('guru/update_profil'); ?>">
                                                    
                                                    <input type="text" name="id_users" value="<?php foreach ($data_users as $du): ?><?php echo $du->id_users; endforeach; ?>" hidden>

                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-3 col-form-label text-label">Nama Lengkap</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input type="text" value="<?php foreach ($data_users as $du): ?><?php echo $du->nama_lengkap; endforeach; ?>" class="form-control" name="nama_lengkap" id="validationDefaultUsername4" readonly aria-describedby="validationDefaultUsername4">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label text-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <textarea class="form-control" id="textarea1" name="alamat" rows="6" required=""><?php foreach ($data_users as $du): ?><?php echo $du->alamat; endforeach; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-3 col-form-label text-label">Nomor HP</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="validationDefaultUsername2" name="no_hp" value="<?php foreach ($data_users as $du): ?><?php echo $du->no_hp; endforeach; ?>" aria-describedby="validationDefaultUsername2" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <h4 class="card-title mb-4 text-center">GANTI PASSWORD</h4> -->

                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-3 col-form-label text-label">Username</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input type="text" value="<?php foreach ($data_users as $du): ?><?php echo $du->username; endforeach; ?>" class="form-control" id="validationDefaultUsername4" name="username" readonly aria-describedby="validationDefaultUsername4">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-3 col-form-label text-label">Masukkan Password Baru</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input type="password" name="password" class="form-control" id="validationDefaultUsername3" placeholder="Password Baru" aria-describedby="validationDefaultUsername3">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button style="width: 100%;" type="submit" class="btn btn-rounded btn-ft btn-warning">Update Profil Saya</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->