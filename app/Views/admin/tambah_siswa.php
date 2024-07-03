        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Tambah Data Siswa</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah Data Siswa</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-5">
                        <div class="row">

                            

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <?php if (session()->getFlashKeys()): ?>
                                            <?php echo session()->getFlashdata('gagalbuatakun'); ?>
                                            <?php echo session()->getFlashdata('berhasilbuatakun'); ?>
                                        <?php endif; ?>
                                        <h4 class="card-title mb-4">Input Data Siswa</h4>
                                        <div class="basic-form">
                                            <form action="<?= base_url('admin/proses_tambah_siswa') ?>" method="post">
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan NISN</label>
                                                    <input type="text" name="nisn" class="form-control" placeholder="NISN" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan Kelas</label>
                                                    <select class="form-control" name="kelas" required="">
                                                        <option selected disabled>Pilih Kelas</option>
                                                        <option value="X TKJ A">X TKJ A</option>
                                                        <option value="X TKJ B">X TKJ B</option>
                                                        <option value="X TKJ C">X TKJ C</option>
                                                        <option value="X TKJ D">X TKJ D</option>
                                                        <option value="XI TKJ A">XI TKJ A</option>
                                                        <option value="XI TKJ B">XI TKJ B</option>
                                                        <option value="XI TKJ C">XI TKJ C</option>
                                                        <option value="XI TKJ D">XI TKJ D</option>
                                                        <option value="XII TKJ A">XII TKJ A</option>
                                                        <option value="XII TKJ B">XII TKJ B</option>
                                                        <option value="XII TKJ C">XII TKJ C</option>
                                                        <option value="XII TKJ D">XII TKJ D</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan No HP</label>
                                                    <input type="number" name="no_hp" class="form-control" placeholder="Contoh : 081234567890" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan Alamat</label>
                                                    <textarea name="alamat" class="form-control" placeholder="Contoh : Jl. Soekarno Hatta No. 11 Malang" style="min-height: 150px;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username Untuk Login Akun" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Password*</label>
                                                    <input type="password" name="password" class="form-control" placeholder="************" required>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="form-check">
                                                        <input id="checkbox1" class="form-check-input styled-checkbox" type="checkbox">
                                                        <label for="checkbox1" class="form-check-label">Check Me Out</label>
                                                    </div>
                                                </div> -->
                                                <button type="submit" class="btn btn-primary btn-form mr-2">Tambah Data Siswa</button>
                                                <button type="reset" class="btn btn-light text-dark btn-form">Reset</button>
                                            </form>
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