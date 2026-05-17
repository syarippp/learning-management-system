<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Lihat Post Test</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Akses Mapel</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-10 mx-auto">
                <?php if (session()->getFlashdata('berhasileditposttest')): ?>
                    <?= session()->getFlashdata('berhasileditposttest'); ?>
                <?php endif; ?>

                <div class="pricing-heading-text mb-3">
                    <h2>
                        <?php foreach ($detail_mapel as $dm): ?>
                            Post Test Mapel <?= $dm->nama_mapel ?> - 
                            <span class="text-primary">Kelas <?= $dm->kelas_mapel ?></span>
                        <?php endforeach; ?>
                    </h2>
                </div>

                <form action="<?= base_url('guru/edit_posttest?id_mat=' . $id_mat . '&id_dm=' . $id_dm) ?>" method="post">

                    <?php foreach ($lihat_pertanyaan as $index => $pertanyaan): ?>
                        <div class="card forms-card mt-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Soal <?= $index + 1 ?></h4>
                                <div class="form-group">
                                    <label>Pertanyaan</label>
                                    <input type="text" name="pertanyaan<?= $index ?>" class="form-control" value="<?= htmlspecialchars($pertanyaan->pertanyaan) ?>" readonly required>
                                    <input type="hidden" name="idp<?= $index ?>" value="<?= $pertanyaan->id_pertanyaan ?>">
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="card-title mb-3">Jawaban</h4>
                                <?php
                                    $start = $index * 4;
                                    $jawabanSet = array_slice($lihat_jawaban, $start, 4);
                                    $abjad = ['a', 'b', 'c', 'd'];
                                ?>
                                <?php foreach ($jawabanSet as $jIdx => $jawab): ?>
                                    <div class="form-group">
                                        <label>Jawaban <?= strtoupper($abjad[$jIdx]) ?></label>
                                        <input type="text" name="jawaban_<?= $index . $abjad[$jIdx] ?>" class="form-control" value="<?= htmlspecialchars($jawab->jawaban) ?>" readonly required>
                                        <input type="hidden" name="idj<?= ($start + $jIdx) ?>" value="<?= $jawab->id_jawaban ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="card-body">
                                <h4 class="card-title mb-2">Jawaban Benar</h4>
                                <div class="form-group">
                                    <select class="form-control" name="jawabanbenar_<?= $index ?>" disabled>
                                        <option disabled selected>Pilih Jawaban Benar</option>
                                        <?php foreach ($jawabanSet as $jIdx => $jawab): ?>
                                            <option value="<?= $jIdx + 1 ?>" <?= ($jawab->value == '1') ? 'selected' : '' ?>>
                                                <?= strtoupper($abjad[$jIdx]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Tombol Action -->
                    <div class="mt-5 mb-3 text-center">
                        <a href="<?= base_url("guru/hapus_posttest?id_mat=$id_mat&id_dm=$id_dm") ?>" class="btn btn-danger w-100 mt-3" onclick="return confirm('Apakah anda yakin ingin menghapus post test ini?')">
                            <i class="fa fa-trash"></i> Hapus Post Test
                        </a>
                    </div>

                    <!-- Tombol Fixed di pojok -->
                    <div style="position: fixed; bottom: 20px; right: 20px; z-index: 999;">
                        <button type="button" id="btnEdit" class="btn btn-warning mb-2">
                            <i class="fa fa-edit"></i> Edit Soal
                        </button>
                        <br>
                        <button type="submit" id="btnSimpan" class="btn btn-success" style="display: none;">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk tombol Edit -->
<script>
    document.getElementById("btnEdit").addEventListener("click", function () {
        document.querySelectorAll('input[readonly]').forEach(el => el.removeAttribute('readonly'));
        document.querySelectorAll('select[disabled]').forEach(el => el.removeAttribute('disabled'));
        document.getElementById("btnSimpan").style.display = "inline-block";
        this.style.display = "none";
    });
</script>
