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

                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-success">Tambah Materi Baru <span class="btn-icon-right"><i class="fa fa-plus "></i></span></button>
                                </div>

                                <?php foreach ($pertemuan as $pert): ?>
                                <div class="col-lg-6 mt-4">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h3 class="card-title">Pertemuan <?php echo $pert->pertemuan; ?></h3>
                                            <p class="card-text">Klik tombol dibawah untuk mengakses materi pertemuan <?php echo $pert->pertemuan; ?></p>
                                                <a href="#" class="btn btn-card btn-warning">Edit Materi</a>
                                                <a href="#" class="btn btn-card btn-danger">Hapus Pertemuan</a>
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