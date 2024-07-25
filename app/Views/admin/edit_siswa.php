        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Edit Mapel</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Mapel</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-12">

                        <a href="<?= base_url('admin/data_guru') ?>"><button type="button" class="btn btn-primary btn-form mb-4">Kembali</button></a>

                        <div class="row">
                            <div class="col-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Edit Nama Mapel</h4>
                                        <div class="basic-form">
                                            <form method="post" action="<?= base_url('admin/update_guru'); ?>" enctype="multipart/form-data">
                                            <?php foreach ($siswa as $g): ?>
                                                <div class="form-group">
                                                    <label class="text-label">Nama Guru</label>
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
                                                    <label class="text-label">Profil Picture</label>
                                                    <input type="file" name="profil_picture" class="form-control">
                                                    <img class="mt-2" width="150" src="<?= base_url('profil_picture') ?>/<?= $g->profil_picture; ?>">
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