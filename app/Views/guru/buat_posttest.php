        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Buat Post Test</h4>
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

                            

                            <div class="col-xl-12">

                                <a href="<?= base_url('guru/akses_mapel?id_dm='.$id_dm) ?>"><button class="btn btn-primary mb-4">Kembali</button></a>

                                    <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasiltambahmaterimapel'); ?>
                                        <?php echo session()->getFlashdata('berhasilhapusmaterimapel'); ?>
                                    <?php endif; ?>
                                    <?php foreach ($per as $pert): ?>
                                    <form action="<?= base_url('guru/proses_posttest?id_mat='.$pert->id_materi_mapel.'&id_dm='.$pert->id_detail_mapel.'') ?>" method="post">
                                    <?php endforeach; ?>

                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Soal 1</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Masukkan Pertanyaan Soal 1</label>
                                                    <input type="text" name="pertanyaan1" class="form-control" placeholder="Pertanyaan Soal 1" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 1</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_1a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_1b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_1c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_1d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 1</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_1" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 2</label>
                                                    <input type="text" name="pertanyaan2" class="form-control" placeholder="Pertanyaan Soal 2" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 2</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_2a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_2b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_2c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_2d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 2</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_2" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 3</label>
                                                    <input type="text" name="pertanyaan3" class="form-control" placeholder="Pertanyaan Soal 3" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 3</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_3a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_3b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_3c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_3d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 3</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_3" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 4</label>
                                                    <input type="text" name="pertanyaan4" class="form-control" placeholder="Pertanyaan Soal 4" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 4</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_4a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_4b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_4c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_4d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 4</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_4" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 5</label>
                                                    <input type="text" name="pertanyaan5" class="form-control" placeholder="Pertanyaan Soal 5" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 5</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_5a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_5b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_5c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_5d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 5</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_5" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 6</label>
                                                    <input type="text" name="pertanyaan6" class="form-control" placeholder="Pertanyaan Soal 6" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 6</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_6a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_6b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_6c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_6d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 6</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_6" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 7</label>
                                                    <input type="text" name="pertanyaan7" class="form-control" placeholder="Pertanyaan Soal 7" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 7</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_7a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_7b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_7c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_7d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 7</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_7" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 8</label>
                                                    <input type="text" name="pertanyaan8" class="form-control" placeholder="Pertanyaan Soal 8" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 8</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_8a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_8b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_8c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_8d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 8</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_8" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 9</label>
                                                    <input type="text" name="pertanyaan9" class="form-control" placeholder="Pertanyaan Soal 9" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 9</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_9a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_9b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_9c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_9d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 9</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_9" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
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
                                                    <label class="text-label">Masukkan Pertanyaan Soal 10</label>
                                                    <input type="text" name="pertanyaan10" class="form-control" placeholder="Pertanyaan Soal 10" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Soal 10</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban A</label>
                                                    <input type="text" name="jawaban_10a" class="form-control" placeholder="Jawaban A" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban B</label>
                                                    <input type="text" name="jawaban_10b" class="form-control" placeholder="Jawaban B" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban C</label>
                                                    <input type="text" name="jawaban_10c" class="form-control" placeholder="Jawaban C" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Jawaban D</label>
                                                    <input type="text" name="jawaban_10d" class="form-control" placeholder="Jawaban D" required>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Jawaban Benar Untuk Soal 10</h4>
                                        <div class="basic-form">
                                            
                                                <div class="form-group">
                                                    <!-- <label class="text-label">Jawaban A</label> -->
                                                    <select class="form-control" name="jawabanbenar_10" required="">
                                                        <option selected disabled>Pilih Jawaban Benar</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
                                                    </select>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-success btn-block mt-4" style="margin-bottom: 5em; margin-top: 3em;">Simpan Pertanyaan Post Test</button>

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