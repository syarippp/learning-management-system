        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Lihat Post Test</h4>
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
                                <h2><?php foreach ($detail_mapel as $dm): ?><?php echo "Post Test Mapel ".$dm->nama_mapel; endforeach; ?><span class="text-primary"><?php foreach ($detail_mapel as $dm): ?><?php echo "Kelas ".$dm->kelas_mapel; endforeach; ?></span></h2>
                            </div>

                            <div class="mt-3"></div>

                            <?php if (session()->getFlashKeys()): ?> 
                                <?php echo session()->getFlashdata('berhasiltambahmaterimapel'); ?>
                                <?php echo session()->getFlashdata('berhasilhapusmaterimapel'); ?>
                            <?php endif; ?>
                            <?php foreach ($per as $pert): ?>
                            <form action="<?= base_url('guru/edit_posttest?id_mat='.$pert->id_materi_mapel.'&id_dm='.$pert->id_detail_mapel.'') ?>" method="post">
                            <?php endforeach; ?>

                            <div class="col-xl-12">

                                <a href="<?= base_url('guru/akses_mapel?id_dm='.$id_dm) ?>"><button type="button" class="btn btn-primary">Kembali<span class="btn-icon-right"><i class="fa fa-arrow-left "></i></span></button></a>

                                 <div class="mt-3"></div>

                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 1</h4>
                                        <div class="basic-form">

                                                <div class="form-group">
                                                    <label class="text-label">Pertanyaan Soal 1</label>
                                                    <input type="text" name="pertanyaan0" class="form-control" placeholder="Pertanyaan Soal 1" value="<?php echo htmlspecialchars($lihat_pertanyaan[0]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp0" value="<?php echo htmlspecialchars($lihat_pertanyaan[0]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 1</h4>
                                        <div class="basic-form">
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_0a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[0]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj0" value="<?php echo htmlspecialchars($lihat_jawaban[0]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_0b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[1]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj1" value="<?php echo htmlspecialchars($lihat_jawaban[1]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_0c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[2]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj2" value="<?php echo htmlspecialchars($lihat_jawaban[2]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_0d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[3]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj3" value="<?php echo htmlspecialchars($lihat_jawaban[3]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 1</h4>
                                        <div class="basic-form">
                                            
                                            <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[0]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[1]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[2]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[3]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_1" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 2</h4>
                                        <div class="basic-form">
                                            

                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 2</label>
                                                    <input type="text" name="pertanyaan1" class="form-control" placeholder="Pertanyaan Soal 2" value="<?php echo htmlspecialchars($lihat_pertanyaan[1]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp1" value="<?php echo htmlspecialchars($lihat_pertanyaan[1]->id_pertanyaan); ?>" hidden>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 2</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_1a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[4]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj4" value="<?php echo htmlspecialchars($lihat_jawaban[4]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_1b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[5]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj5" value="<?php echo htmlspecialchars($lihat_jawaban[5]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_1c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[6]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj6" value="<?php echo htmlspecialchars($lihat_jawaban[6]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_1d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[7]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj7" value="<?php echo htmlspecialchars($lihat_jawaban[7]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 2</h4>
                                        <div class="basic-form">
                                            
                                            <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[4]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[5]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[6]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[7]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_2" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 3</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 3</label>
                                                    <input type="text" name="pertanyaan2" class="form-control" placeholder="Pertanyaan Soal 3" value="<?php echo htmlspecialchars($lihat_pertanyaan[2]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp2" value="<?php echo htmlspecialchars($lihat_pertanyaan[2]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 3</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_2a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[8]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj8" value="<?php echo htmlspecialchars($lihat_jawaban[8]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_2b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[9]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj9" value="<?php echo htmlspecialchars($lihat_jawaban[9]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_2c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[10]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj10" value="<?php echo htmlspecialchars($lihat_jawaban[10]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_2d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[11]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj11" value="<?php echo htmlspecialchars($lihat_jawaban[11]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 3</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[8]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[9]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[10]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[11]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_3" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 4</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 4</label>
                                                    <input type="text" name="pertanyaan3" class="form-control" placeholder="Pertanyaan Soal 4" value="<?php echo htmlspecialchars($lihat_pertanyaan[3]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp3" value="<?php echo htmlspecialchars($lihat_pertanyaan[3]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 4</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_3a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[12]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj12" value="<?php echo htmlspecialchars($lihat_jawaban[12]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_3b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[13]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj13" value="<?php echo htmlspecialchars($lihat_jawaban[13]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_3c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[14]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj14" value="<?php echo htmlspecialchars($lihat_jawaban[14]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_3d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[15]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj15" value="<?php echo htmlspecialchars($lihat_jawaban[15]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 4</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[12]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[13]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[14]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[15]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_4" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 5</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 5</label>
                                                    <input type="text" name="pertanyaan4" class="form-control" placeholder="Pertanyaan Soal 5" value="<?php echo htmlspecialchars($lihat_pertanyaan[4]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp4" value="<?php echo htmlspecialchars($lihat_pertanyaan[4]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 5</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_4a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[16]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj16" value="<?php echo htmlspecialchars($lihat_jawaban[16]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_4b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[17]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj17" value="<?php echo htmlspecialchars($lihat_jawaban[17]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_4c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[18]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj18" value="<?php echo htmlspecialchars($lihat_jawaban[18]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_4d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[19]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj19" value="<?php echo htmlspecialchars($lihat_jawaban[19]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 5</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[16]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[17]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[18]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[19]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_5" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 6</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 6</label>
                                                    <input type="text" name="pertanyaan5" class="form-control" placeholder="Pertanyaan Soal 6" value="<?php echo htmlspecialchars($lihat_pertanyaan[5]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp5" value="<?php echo htmlspecialchars($lihat_pertanyaan[5]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 6</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_5a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[20]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj20" value="<?php echo htmlspecialchars($lihat_jawaban[20]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_5b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[21]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj21" value="<?php echo htmlspecialchars($lihat_jawaban[21]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_5c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[22]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj22" value="<?php echo htmlspecialchars($lihat_jawaban[22]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_5d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[23]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj23" value="<?php echo htmlspecialchars($lihat_jawaban[23]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 6</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[20]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[21]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[22]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[23]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_6" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 7</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 7</label>
                                                    <input type="text" name="pertanyaan6" class="form-control" placeholder="Pertanyaan Soal 7" value="<?php echo htmlspecialchars($lihat_pertanyaan[6]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp6" value="<?php echo htmlspecialchars($lihat_pertanyaan[6]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 7</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_6a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[24]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj24" value="<?php echo htmlspecialchars($lihat_jawaban[24]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_6b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[25]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj25" value="<?php echo htmlspecialchars($lihat_jawaban[25]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_6c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[26]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj26" value="<?php echo htmlspecialchars($lihat_jawaban[26]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_6d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[27]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj27" value="<?php echo htmlspecialchars($lihat_jawaban[27]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 7</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[24]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[25]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[26]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[27]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_7" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 8</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 8</label>
                                                    <input type="text" name="pertanyaan7" class="form-control" placeholder="Pertanyaan Soal 8" value="<?php echo htmlspecialchars($lihat_pertanyaan[7]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp7" value="<?php echo htmlspecialchars($lihat_pertanyaan[7]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 8</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_7a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[28]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj28" value="<?php echo htmlspecialchars($lihat_jawaban[28]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_7b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[29]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj29" value="<?php echo htmlspecialchars($lihat_jawaban[29]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_7c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[30]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj30" value="<?php echo htmlspecialchars($lihat_jawaban[30]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_7d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[31]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj31" value="<?php echo htmlspecialchars($lihat_jawaban[31]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 8</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[28]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[29]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[30]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[31]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_8" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 9</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 9</label>
                                                    <input type="text" name="pertanyaan8" class="form-control" placeholder="Pertanyaan Soal 9" value="<?php echo htmlspecialchars($lihat_pertanyaan[8]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp8" value="<?php echo htmlspecialchars($lihat_pertanyaan[8]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 9</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_8a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[32]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj32" value="<?php echo htmlspecialchars($lihat_jawaban[32]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_8b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[33]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj33" value="<?php echo htmlspecialchars($lihat_jawaban[33]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_8c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[34]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj34" value="<?php echo htmlspecialchars($lihat_jawaban[34]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_8d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[35]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj35" value="<?php echo htmlspecialchars($lihat_jawaban[35]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 9</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[32]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[33]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[34]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[35]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_9" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 10</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label"> Pertanyaan Soal 10</label>
                                                    <input type="text" name="pertanyaan9" class="form-control" placeholder="Pertanyaan Soal 10" value="<?php echo htmlspecialchars($lihat_pertanyaan[9]->pertanyaan); ?>" required readonly>
                                                    <input type="text" name="idp9" value="<?php echo htmlspecialchars($lihat_pertanyaan[9]->id_pertanyaan); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 10</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_9a" class="form-control" placeholder="Jawaban A" value="<?php echo htmlspecialchars($lihat_jawaban[36]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj36" value="<?php echo htmlspecialchars($lihat_jawaban[36]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_9b" class="form-control" placeholder="Jawaban B" value="<?php echo htmlspecialchars($lihat_jawaban[37]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj37" value="<?php echo htmlspecialchars($lihat_jawaban[37]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_9c" class="form-control" placeholder="Jawaban C" value="<?php echo htmlspecialchars($lihat_jawaban[38]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj38" value="<?php echo htmlspecialchars($lihat_jawaban[38]->id_jawaban); ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_9d" class="form-control" placeholder="Jawaban D" value="<?php echo htmlspecialchars($lihat_jawaban[39]->jawaban); ?>" required readonly>
                                                    <input type="text" name="idj39" value="<?php echo htmlspecialchars($lihat_jawaban[39]->id_jawaban); ?>" hidden>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 10</h4>
                                        <div class="basic-form">
                                            
                                                <?php 
                                            $jb1 = htmlspecialchars($lihat_jawaban[36]->value); 
                                            $jb2 = htmlspecialchars($lihat_jawaban[37]->value); 
                                            $jb3 = htmlspecialchars($lihat_jawaban[38]->value); 
                                            $jb4 = htmlspecialchars($lihat_jawaban[39]->value); 
                                            $a1 = "";
                                            $b1 = "";
                                            $c1 = "";
                                            $d1 = "";

                                                if($jb1 == "1"){
                                                    $a1 = "selected";
                                                }
                                                else if($jb2 == "1"){
                                                    $b1 = "selected";
                                                }
                                                else if($jb3 == "1"){
                                                    $c1 = "selected";
                                                }
                                                else if($jb4 == "1"){
                                                    $d1 = "selected";
                                                }

                                            ?>

                                                <div class="form-group">
                                                    <label class="text-label">Jawaban</label>
                                                    <select class="form-control" name="jawabanbenar_10" disabled="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1" <?= $a1; ?>>A</option>
                                                        <option value="2" <?= $b1; ?>>B</option>
                                                        <option value="3" <?= $c1; ?>>C</option>
                                                        <option value="4" <?= $d1; ?>>D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <button class="btn btn-warning btn-block mt-4" style="margin-bottom: 5em; margin-top: 3em;" onclick="return confirm('Apakah anda yakin ingin melakukan perubahan ini?')">Simpan Perubahan</button> -->

                            <a href="<?= base_url("guru/hapus_posttest?id_mat=" . $id_mat . "&id_dm=" . $id_dm) ?>" class="btn btn-danger btn-sm w-100" style="margin-bottom: 5em;" onclick="return confirm('Apakah anda yakin ingin menghapus post test ini?')"><i class="fa fa-trash"></i> Hapus Post Test</a>

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