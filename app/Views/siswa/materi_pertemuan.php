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
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">PENDAHULUAN</h4>
                                            <div class="card-content">
                                                <p style="color: black;"><?php foreach ($materi_mapel as $mm): echo $mm->pendahuluan."<br><br>Proin pharetra ut ex vitae aliquet. Phasellus pharetra eleifend sapien, vel luctus erat faucibus vitae. Nam ultricies dolor augue, ut vestibulum nulla ornare non. Duis at quam quis turpis egestas viverra. Vestibulum eu condimentum lectus. Cras fermentum justo vitae bibendum pretium. Cras augue arcu, tincidunt in nisl ut, viverra gravida mi. Integer convallis odio a est mattis, venenatis maximus felis cursus. Proin facilisis quis felis quis convallis.";?><?php endforeach; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">VIDEO MATERI</h4>
                                            <div class="card-content">
                                                
                                                <div class="embed-responsive embed-responsive-16by9">
                                                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body widget-file-container">
                                            <h4 class="card-title">Materi (1)<a class="float-right text-info" href="javascript:void()"><!-- <small>Show All (25)</small> --></a></h4>
                                            <div class="d-flex flex-wrap">
                                                <div class="file-container">
                                                    <a href="<?= base_url('pdf/')?>tes.pdf" download><img src="<?= base_url(); ?>assets/images/icons/35.png" alt="">
                                                    <p><small>Materi 1.pdf</small>
                                                    </p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card ribbons-card ribbon-bookmarked">
                                        <div class="card-body pl-0">
                                            <div class="ribbon ribbon-style-8">Post Test</div>
                                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                                regelialia. It is a paradisematic country.</p>
                                                <button type="button" class="btn btn-sl-sm btn-danger">Kerjakan</button>
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