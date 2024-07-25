        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Akses Materi</h4>
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
                                <h2><?php foreach ($materi_mapel as $mm): ?><?php echo "Materi ".$mm->nama_mapel; endforeach; ?><span class="text-primary"><?php foreach ($materi_mapel as $mm): ?><?php echo "Kelas ".$mm->kelas_mapel.' Pertemuan '.$mm->pertemuan; endforeach; ?></span></h2>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <a href="<?= base_url('siswa/akses_mapel?id_dm='.$id_dm) ?>"><button class="btn btn-primary mb-4">Kembali</button></a>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">PENDAHULUAN</h4>
                                            <div class="card-content">
                                                <p style="color: black;"><?php foreach ($materi_mapel as $mm): echo $mm->pendahuluan;?><?php endforeach; ?></p>
                                                
                                                <?php foreach ($check_progress as $cp): ?>

                                                <?php if ($cp->pendahuluan == 0) {
                                                    # code...
                                                ?>
                                                <a href="<?= base_url('siswa/tambah_prog_pendahuluan?id_progress='.$cp->id_progress."&id_mat=".esc($id_mat)) ?>">
                                                    <button class="btn btn-success"><i class="fa fa-check "></i></button>
                                                </a>
                                                <?php  }else if ($cp->pendahuluan == 1) {
                                                    # code...
                                                ?>
                                                <button class="btn btn-primary" style="cursor: default;" disabled=""><i class="fa fa-check "></i></button>
                                                <?php } ?>


                                                <?php endforeach; ?> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">VIDEO MATERI</h4>
                                            <div class="card-content" style="color: black;">     
                                                <?php
                                                    foreach ($materi_mapel as $mm_item) {
                                                        if ($mm_item->video_materi == "Tidak Ada") {
                                                            echo 'Belum ada video materi';
                                                        } else {
                                                            // Mengubah link video YouTube menjadi link embed
                                                            $video_url = $mm_item->video_materi;
                                                            $embed_url = str_replace('watch?v=', 'embed/', $video_url);
                                                            
                                                            echo '
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="' . $embed_url . '" allowfullscreen></iframe>
                                                            </div>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                            </div>

                                            <?php foreach ($check_progress as $cp): ?>

                                                <?php if ($cp->video == 0) {
                                                    # code...
                                                ?>
                                                <a href="<?= base_url('siswa/tambah_prog_video?id_progress='.$cp->id_progress."&id_mat=".esc($id_mat)) ?>">
                                                    <button class="btn btn-success"><i class="fa fa-check "></i></button>
                                                </a>
                                                <?php  }else if ($cp->video == 1) {
                                                    # code...
                                                ?>
                                                <button class="btn btn-primary" style="cursor: default;" disabled=""><i class="fa fa-check "></i></button>
                                                <?php } ?>


                                                <?php endforeach; ?> 

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body widget-file-container">
                                            <h4 class="card-title">Materi (1)<a class="float-right text-info" href="javascript:void()"><!-- <small>Show All (25)</small> --></a></h4>
                                            <div class="d-flex flex-wrap">
                                                <div class="file-container">
                                                    <?php foreach ($materi_mapel as $mm): ?>
                                                        <a href="<?= base_url('pdf/' . $mm->materi) ?>" download>
                                                            <img src="<?= base_url('assets/images/icons/35.png') ?>" alt="">
                                                            <p><small><?= $mm->materi ?></small></p>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>

                                            <?php foreach ($check_progress as $cp): ?>

                                                <?php if ($cp->materi == 0) {
                                                    # code...
                                                ?>
                                                <a href="<?= base_url('siswa/tambah_prog_materi?id_progress='.$cp->id_progress."&id_mat=".esc($id_mat)) ?>">
                                                    <button class="btn btn-success"><i class="fa fa-check "></i></button>
                                                </a>
                                                <?php  }else if ($cp->materi == 1) {
                                                    # code...
                                                ?>
                                                <button class="btn btn-primary" style="cursor: default;" disabled=""><i class="fa fa-check "></i></button>
                                                <?php } ?>


                                                <?php endforeach; ?> 

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card ribbons-card ribbon-bookmarked">
                                        <div class="card-body pl-0">
                                            <div class="ribbon ribbon-style-8">Post Test</div>
                                                <p style="color: black;">

                                                    <h4>List Nilai Post Test (<?= $attempt_test; ?>x Percobaan)</h4>
                                                    <?php $no = 1; foreach ($list_nilai as $ln): ?>
                                                        <?php 
                                                        echo "<h5>Percobaan ".$no." :". $ln->nilai."<br></h5>";
                                                         ?>
                                                    <?php $no++; endforeach; ?>
                                                </p>
                                                <?php foreach ($check_progress as $cp): ?>
                                                    <a href="post_test?id_mat=<?= esc($id_mat); ?>&id_progress=<?= $cp->id_progress; ?>">
                                                <?php endforeach; ?> 

                                                <?php
                                                if($attempt_test >= 3){
                                                    echo"<button type='button' class='btn btn-warning' style='cursor: default;' disabled>Tidak Bisa Lebih Dari 3x Percobaan</button>";
                                                }
                                                else{
                                                    echo"<button type='button' class='btn btn-sl-sm btn-danger'>Kerjakan</button>";
                                                    
                                                }
                                                ?>

                                                
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <?php foreach ($check_progress as $cp): ?>

                                    <?php
                                    $progress = 0;
                                    if ($cp->pendahuluan == 1) {
                                        $progress += 25;
                                    }
                                    if ($cp->video == 1) {
                                            $progress += 25;
                                            
                                    }
                                    if($cp->materi == 1){
                                                $progress += 25;
                                    }
                                    if ($cp->nilai_post_test) {
                                       $progress += 25; 
                                    }

                                    ?>


                                <!-- INI PROGRESS BAR -->
                                <div class="col-lg-12">
                                    <div class="card ribbons-card">
                                        <div class="card-body pl-0">
                                            <div class="card-body">
                                            <h4 class="card-intro-title">Progress Pertemuan <?= $mm->pertemuan ?></h4>
                                            <p>Silahkan memenuhi setiap aktivitas yang telah diberikan untuk mendapatkan 100% pada progress di setiap pertemuan.</p>
                                            <div class="mt-4">
                                                <div class="d-flex justify-content-between progress-label">
                                                    <h3>Progress</h3>
                                                    <h3><?= $progress; ?>%</h3>
                                                </div>
                                                <div class="progress bg-danger-rgba1">
                                                    <div class="progress-bar bg-success" style="width: <?= $progress; ?>%;"
                                                        role="progressbar"><span class="sr-only">25% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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