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
                                                    <label class="text-label">Masukkan NIS</label>
                                                    <input type="text" name="nis" class="form-control" placeholder="NIS" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan Kelas</label>
                                                    <select class="form-control" name="kelas" required="">
                                                        <option selected disabled>Pilih Kelas</option>
                                                        <option value="X TKJ 1">X TKJ 1</option>
                                                        <option value="X TKJ 2">X TKJ 2</option>
                                                        <option value="X TKJ 3">X TKJ 3</option>
                                                        <option value="X TKJ 4">X TKJ 4</option>
                                                        <option value="XI TKJ 1">XI TKJ 1</option>
                                                        <option value="XI TKJ 2">XI TKJ 2</option>
                                                        <option value="XI TKJ 3">XI TKJ 3</option>
                                                        <option value="XI TKJ 4">XI TKJ 4</option>
                                                        <option value="XII TKJ 1">XII TKJ 1</option>
                                                        <option value="XII TKJ 2">XII TKJ 2</option>
                                                        <option value="XII TKJ 3">XII TKJ 3</option>
                                                        <option value="XII TKJ 4">XII TKJ 4</option>
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