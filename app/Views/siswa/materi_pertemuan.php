<style>
    .check-box {
        display: inline-block;
        width: 24px;
        height: 24px;
        text-align: center;
        vertical-align: middle;
        font-size: 24px;
        color: #28a745;
    }
    .check-box.disabled {
        color: #007bff;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Akses Materi</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Akses Mapel</li>
                </ol>
            </div>
        </div>

        <?php $mm = $materi_mapel[0] ?? null; ?>
        <?php $cp = $check_progress[0] ?? null; ?>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-8 col-xxl-12">
                <div class="pricing-wrapper" style="margin-top: -3%;">

                    <div class="pricing-heading-text">
                        <h2>
                            Materi <?= $mm->nama_mapel ?? '' ?>
                            <span class="text-primary">
                                Kelas <?= $mm->kelas_mapel ?? '' ?> Pertemuan <?= $mm->pertemuan ?? '' ?>
                            </span>
                        </h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="<?= base_url('siswa/akses_mapel?id_dm=' . $id_dm) ?>">
                                <button class="btn btn-primary mb-4">Kembali</button>
                            </a>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Teks Materi</h4>
                                    <div class="card-content">
                                        <div style="max-height: 300px; overflow: auto; color: black; border: 1px solid #ddd; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
                                            <?= $mm->pendahuluan ?? '' ?>
                                        </div>

                                        <?php if ($cp): ?>
                                            <?php if ($cp->pendahuluan == 0): ?>
                                                <a href="<?= base_url('siswa/tambah_prog_pendahuluan?id_progress=' . $cp->id_progress . "&id_mat=" . esc($id_mat)) ?>">
                                                    <div class="check-box"><i class="far fa-square"></i></div>
                                                </a>
                                            <?php else: ?>
                                                <div class="check-box" style="cursor: default;">
                                                    <i class="far fa-check-square"></i>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">VIDEO MATERI</h4>
                                    <div class="card-content" style="color: black;">
                                        <?php
                                        if ($mm->video_materi == "Tidak Ada") {
                                            echo 'Belum ada video materi';
                                        } else {
                                            $embed_url = str_replace('watch?v=', 'embed/', $mm->video_materi);
                                            echo '<div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="' . $embed_url . '" allowfullscreen></iframe>
                                            </div>';
                                        }
                                        ?>
                                    </div>

                                    <?php if ($cp): ?>
                                        <?php if ($cp->video == 0): ?>
                                            <a href="<?= base_url('siswa/tambah_prog_video?id_progress=' . $cp->id_progress . "&id_mat=" . esc($id_mat)) ?>">
                                                <div class="check-box"><i class="far fa-square"></i></div>
                                            </a>
                                        <?php else: ?>
                                            <div class="check-box" style="cursor: default;">
                                                <i class="far fa-check-square"></i>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Materi PDF -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body widget-file-container">
                                    <h4 class="card-title">Materi (1)</h4>
                                    <div class="d-flex flex-wrap">
                                        <div class="file-container">
                                            <a href="<?= base_url('pdf/' . $mm->materi) ?>" download>
                                                <img src="<?= base_url('assets/images/icons/35.png') ?>" alt="">
                                                <p><small><?= $mm->materi ?></small></p>
                                            </a>
                                        </div>
                                    </div>

                                    <?php if ($cp): ?>
                                        <?php if ($cp->materi == 0): ?>
                                            <a href="<?= base_url('siswa/tambah_prog_materi?id_progress=' . $cp->id_progress . "&id_mat=" . esc($id_mat)) ?>">
                                                <div class="check-box"><i class="far fa-square"></i></div>
                                            </a>
                                        <?php else: ?>
                                            <div class="check-box" style="cursor: default;">
                                                <i class="far fa-check-square"></i>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Post Test -->
                        <div class="col-lg-6">
                            <div class="card ribbons-card ribbon-bookmarked">
                                <div class="card-body pl-0">
                                    <div class="ribbon ribbon-style-8">Post Test</div>
                                    <p style="color: black;">
                                        <h4>List Nilai Post Test (<?= $attempt_test; ?>x Percobaan)</h4>
                                        <?php $no = 1; foreach ($list_nilai as $ln): ?>
                                            <h5>Percobaan <?= $no++ ?>: <?= $ln->nilai ?></h5>
                                        <?php endforeach; ?>
                                    </p>

                                    <?php if ($cp): ?>
                                        <a href="<?= base_url('siswa/post_test?id_mat=' . esc($id_mat) . '&id_progress=' . $cp->id_progress . '&id_dm=' . $id_dm) ?>">
                                            <?php if ($attempt_test >= 3): ?>
                                                <button type='button' class='btn btn-warning' style='cursor: default;' disabled>
                                                    Tidak Bisa Lebih Dari 3x Percobaan
                                                </button>
                                            <?php else: ?>
                                                <button type='button' class='btn btn-sl-sm btn-danger'>Kerjakan</button>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="col-lg-12">
                            <div class="card ribbons-card">
                                <div class="card-body pl-0">
                                    <?php
                                    $progress = 0;
                                    if ($cp) {
                                        if ($cp->pendahuluan == 1) $progress += 25;
                                        if ($cp->video == 1) $progress += 25;
                                        if ($cp->materi == 1) $progress += 25;
                                        if ($cp->nilai_post_test == 1) $progress += 25;
                                    }
                                    ?>
                                    <h4 class="card-intro-title">Progress Pertemuan <?= $mm->pertemuan ?? '' ?></h4>
                                    <p>Silahkan memenuhi setiap aktivitas yang telah diberikan untuk mendapatkan 100% pada progress di setiap pertemuan.</p>
                                    <div class="mt-4">
                                        <div class="d-flex justify-content-between progress-label">
                                            <h3>Progress</h3>
                                            <h3><?= $progress ?>%</h3>
                                        </div>
                                        <div class="progress bg-danger-rgba1">
                                            <div class="progress-bar bg-success" style="width: <?= $progress ?>%;" role="progressbar">
                                                <span class="sr-only"><?= $progress ?>% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Progress -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!--**********************************
            Content body end
        ***********************************-->