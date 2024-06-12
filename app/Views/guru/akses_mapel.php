        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Akses Mata Pelajaran</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Akses Mapel</li>
                        </ol>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-8 col-xxl-12">
                        <div class="pricing-wrapper" style="margin-top: -3%;">

                            <div class="pricing-heading-text">
                                <h2><?php foreach ($detail_mapel as $dm): ?><?php echo "Materi ".$dm->nama_mapel; endforeach; ?><span class="text-primary"><?php foreach ($detail_mapel as $dm): ?><?php echo "Kelas ".$dm->kelas_mapel; endforeach; ?></span></h2>
                            </div>

                            <div class="mt-3"></div>

                                    <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasiltambahmaterimapel'); ?>
                                        <?php echo session()->getFlashdata('berhasilhapusmaterimapel'); ?>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                                        data-whatever="@mdo">Tambah Pertemuan Baru<span class="btn-icon-right"><i class="fa fa-plus "></i></span>
                                    </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan Baru</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('guru/tambah_materi_mapel?id_dm='.$dm->id_detail_mapel.'') ?>" method="post">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Pertemuan Ke:</label>
                                                            <input type="number" class="form-control" name="pertemuan_materi" min="1" max="20" required="">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Tambah</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <div class="row">
                                

                                <?php foreach ($pertemuan as $pert): ?>
                                <div class="col-lg-6 mt-4">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h3 class="card-title">Pertemuan <?php echo $pert->pertemuan; ?></h3>
                                            <p class="card-text">Jangan lupa edit materi setelah menambah pertemuan baru.</p>
                                                <a href="<?= base_url('guru/akses_materi?id_mat='.$pert->id_materi_mapel.'&id_dm='.$pert->id_detail_mapel.'') ?>" class="btn btn-card btn-warning">Edit Materi</a>
                                                <a href="#" class="btn btn-card btn-warning">Post Test</a>
                                                <a href="<?= base_url('guru/hapus_materi_mapel?id_mat='.$pert->id_materi_mapel.'') ?>" class="btn btn-card btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pertemuan?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

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