        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Edit Data</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Data</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-12">

                        <a href="<?= base_url('admin/data_siswa') ?>"><button type="button" class="btn btn-primary btn-form mb-4">Kembali</button></a>

                        <div class="row">
                            <div class="col-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Edit Data Siswa</h4>
                                        <div class="basic-form">
                                            <form method="post" action="<?= base_url('admin/update_guru'); ?>" enctype="multipart/form-data">
                                            <?php foreach ($siswa as $g): ?>
                                                <div class="form-group">
                                                    <label class="text-label">Nama Siswa</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" value="<?= $g->nama_lengkap; ?>">
                                                    <input type="hidden" name="id_users" class="form-control" value="<?= $g->id_users; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Alamat</label>
                                                    <input type="text" name="alamat" class="form-control" value="<?= $g->alamat; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">No HP</label>
                                                    <input type="text" name="no_hp" class="form-control" value="<?= $g->no_hp; ?>">
                                                </div>
                                                <div class="form-group">
                                            <label class="text-label">Edit Kelas</label>
                                            <select class="form-control" name="kelas">
                                                <option disabled>Pilih Kelas</option>
                                                <option value="X TKJ 1" <?= ($g->kelas == 'X TKJ 1') ? 'selected' : ''; ?>>X TKJ 1</option>
                                                <option value="X TKJ 2" <?= ($g->kelas == 'X TKJ 2') ? 'selected' : ''; ?>>X TKJ 2</option>
                                                <option value="X TKJ 3" <?= ($g->kelas == 'X TKJ 3') ? 'selected' : ''; ?>>X TKJ 3</option>
                                                <option value="X TKJ 4" <?= ($g->kelas == 'X TKJ 4') ? 'selected' : ''; ?>>X TKJ 4</option>
                                                <option value="XI TKJ 1" <?= ($g->kelas == 'XI TKJ 1') ? 'selected' : ''; ?>>XI TKJ 1</option>
                                                <option value="XI TKJ 2" <?= ($g->kelas == 'XI TKJ 2') ? 'selected' : ''; ?>>XI TKJ 2</option>
                                                <option value="XI TKJ 3" <?= ($g->kelas == 'XI TKJ 3') ? 'selected' : ''; ?>>XI TKJ 3</option>
                                                <option value="XI TKJ 4" <?= ($g->kelas == 'XI TKJ 4') ? 'selected' : ''; ?>>XI TKJ 4</option>
                                                <option value="XII TKJ 1" <?= ($g->kelas == 'XII TKJ 1') ? 'selected' : ''; ?>>XII TKJ 1</option>
                                                <option value="XII TKJ 2" <?= ($g->kelas == 'XII TKJ 2') ? 'selected' : ''; ?>>XII TKJ 2</option>
                                                <option value="XII TKJ 3" <?= ($g->kelas == 'XII TKJ 3') ? 'selected' : ''; ?>>XII TKJ 3</option>
                                                <option value="XII TKJ 4" <?= ($g->kelas == 'XII TKJ 4') ? 'selected' : ''; ?>>XII TKJ 4</option>
                                            </select>
                                        </div>

                                                <div class="form-group">
                                                    <label class="text-label">Profil Picture</label>
                                                    <input type="file" name="profil_picture" class="form-control">
                                                    <img class="mt-2" width="150" src="<?= base_url('profil_picture') ?>/<?= $g->profil_picture; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?= $g->username; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Password</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            <?php endforeach; ?>
                                            <button type="submit" class="btn btn-warning btn-form mr-2">Edit</button>
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