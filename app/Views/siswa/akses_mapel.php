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

                            <div class="row">

                                <?php foreach ($pertemuan as $pert): ?>
                                <div class="col-lg-6">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h3 class="card-title">Pertemuan <?php echo $pert->pertemuan; ?></h3>
                                            <p class="card-text">Klik tombol dibawah untuk mengakses materi pertemuan <?php echo $pert->pertemuan; ?></p>
                                                <!-- <a href="<?= base_url('siswa/materi_pertemuan?id_mat='.$pert->id_materi_mapel.''); ?>" class="btn btn-card btn-dark">Akses Materi</a> -->
                                                <a href="<?= base_url('siswa/buat_progress?id_mat='.$pert->id_materi_mapel.'&id_dm='.$id_dm); ?>" class="btn btn-card btn-dark">Akses Materi</a>
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