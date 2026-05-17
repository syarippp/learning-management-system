        <style>
            body {
                background-image: url('<?= base_url('assets/db/siswa.jpeg'); ?>');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-5">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="card">
                                    <div class="card-body widget-school-stat bg-1 rounded">
                                        <div class="text">
                                            <h2><?php echo $jumlah_mapel; ?></h2>
                                            <p>Mata Pelajaran</p>
                                        </div>
                                        <div class="icon">
                                            <span><i class="fa fa-book"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>