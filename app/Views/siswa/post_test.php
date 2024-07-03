<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Akses Post Test</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Akses Post Test</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-8 col-xxl-12">
                <div class="pricing-wrapper" style="margin-top: -3%;">
                    <div class="pricing-heading-text">
                        <h2>
                            <?php foreach ($materi_mapel as $mm): ?>
                                <?php echo "Post Test " . $mm->nama_mapel; ?>
                            <?php endforeach; ?>
                            <span class="text-primary">
                                <?php foreach ($materi_mapel as $mm): ?>
                                    <?php echo "Kelas " . $mm->kelas_mapel . ' Pertemuan ' . $mm->pertemuan; ?>
                                <?php endforeach; ?>
                            </span>
                        </h2>
                    </div>
                    <?php $jaw = 0; ?>
                    <?php $soal = 1; ?>
                    <?php $a = 0; ?>
                    <?php $opt = 0; ?>
                    <?php foreach ($pertanyaan as $p) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $soal.". "; ?><?= $p->pertanyaan ?></h4>
                                    <div class="card-content">
                                        <form>

                                            <?php for ($j=$a; $j < $a+4; $j++) { ?>
                                            <div>
                                                <input name="jawaban<?= $jaw; ?>" type="radio" class="filled-in chk-col-primary" id="jawaban<?= $jaw; ?>_option<?= $opt; ?>" value="<?= $jawaban[$j]['value']; ?>">
                                                <label for="jawaban<?= $jaw; ?>_option<?= $opt; ?>"><?= $jawaban[$j]['jawaban']; ?></label>
                                            </div>
                                            <?php $opt += 1;  ?>
                                            <?php }  ?>
                                            <?php $jaw += 1; ?>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $opt = 0;  ?>
                    <?php $a += 4; ?>
                    <?php $soal += 1; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
