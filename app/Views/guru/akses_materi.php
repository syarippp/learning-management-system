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
                            <li class="breadcrumb-item active">Akses Materi</li>
                        </ol>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-8 col-xxl-12">
                        <div class="pricing-wrapper" style="margin-top: -3%;">

                            <div class="pricing-heading-text">
                                <h2><?php foreach ($detail_mapel as $dm): ?><?php echo "Materi ".$dm->nama_mapel; endforeach; ?><span class="text-primary"><?php foreach ($detail_mapel as $dm): ?><?php echo "Kelas ".$dm->kelas_mapel; endforeach; ?><?php foreach ($materi as $mat): echo " - Pertemuan ".$mat->pertemuan."";?><?php endforeach; ?></span></h2>
                            </div>

                            <a href="<?= base_url('guru/akses_mapel?id_dm='.$id_dm) ?>"><button type="button" class="btn btn-primary">Kembali<span class="btn-icon-right"><i class="fa fa-arrow-left "></i></span></button></a>

                                    <div class="mt-3"></div>

                                    <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasiltambahmaterimapel'); ?>
                                        <?php echo session()->getFlashdata('berhasilhapusmaterimapel'); ?>
                                <?php endif; ?>

                            <form onsubmit="convertNewlines()" method="POST" enctype="multipart/form-data" action="<?= base_url('guru/edit_materi') ?> ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Pendahuluan</h4>
                                            <textarea id="myTextarea" name="myTextarea" class="form-control" rows="10"><?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->pendahuluan; endforeach; ?>
                                            </textarea>
                                            <input type="text" name="id_mat" value="<?= $id_mat; ?>" hidden>
                                            <input type="text" name="id_dm" value="<?= $id_dm; ?>" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">File Materi</h4>
                                            <div class="mb-2">
                                                <strong>File saat ini:</strong> <span id="current-file"><?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->materi; endforeach; ?>.pdf</span>
                                            </div>
                                            <input type="file" name="file_materi" class="form-control" id="file_materi">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Link Video Materi</h4>
                                            <h6>*Tinggalkan jika pertemuan ini tidak menggunakan link video.</h6>
                                            <input type="input" name="video_materi" class="form-control" value="<?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->video_materi; endforeach; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" name="">
                        </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->