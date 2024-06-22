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
                                        <?php echo session()->getFlashdata('berhasilbuat_posttest'); ?>
                                        <?php echo session()->getFlashdata('gagalbuat_posttest'); ?>
                                        <?php echo session()->getFlashdata('berhasilhapusposttest'); ?>
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
                                
                                <style>
                                    .btn-card {
                                        display: block;
                                        width: 100%;
                                        margin-bottom: 10px;
                                    }
                                </style>

                                <?php foreach ($pertemuan as $pert): ?>
                                <div class="col-lg-6 mt-4">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h3 class="card-title">Pertemuan <?php echo $pert->pertemuan; ?></h3>
                                            <p class="card-text">Jangan lupa edit materi setelah menambah pertemuan baru.</p>
                                            <div class="row">
                                                <div class="col-4 p-1">
                                                    <a href="<?= base_url('guru/akses_materi?id_mat='.$pert->id_materi_mapel.'&id_dm='.$pert->id_detail_mapel.'') ?>" class="btn btn-warning btn-sm w-100"><i class="fa fa-pencil"></i> Edit</a>
                                                </div>
                                                <div class="col-4 p-1">
                                                    <?php
                                                        if ($pert->post_test == "Tidak Ada") {
                                                            echo '<a href="' . base_url("guru/buat_posttest?id_mat=" . $pert->id_materi_mapel . "&id_dm=" . $pert->id_detail_mapel) . '" class="btn btn-info btn-sm w-100"><i class="fa fa-pencil"></i> Buat</a>';
                                                        } else {
                                                            echo '<a href="' . base_url("guru/lihat_posttest?id_mat=" . $pert->id_materi_mapel . "&id_dm=" . $pert->id_detail_mapel).'" class="btn btn-primary btn-sm w-100"><i class="fa fa-list"></i> Lihat</a>';
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-4 p-1">
                                                    <a href="<?= base_url('guru/hapus_materi_mapel?id_mat='.$pert->id_materi_mapel.'') ?>" class="btn btn-danger btn-sm w-100" onclick="return confirm('Apakah anda yakin ingin menghapus pertemuan?')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                            <input type="text" name="id_dm" value="<?php echo $pert->id_materi_mapel; ?>" hidden>
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