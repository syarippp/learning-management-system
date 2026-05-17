<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- Header -->
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Akses Mata Pelajaran</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Akses Materi</li>
                </ol>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <a href="<?= base_url('guru/akses_mapel?id_dm=' . $id_dm) ?>">
            <button type="button" class="btn btn-primary mb-3">
                Kembali <span class="btn-icon-right"><i class="fa fa-arrow-left"></i></span>
            </button>
        </a>

        <!-- Judul Halaman -->
        <div class="text-center mb-4">
            <h2>Data Progress & Nilai Siswa</h2>
        </div>

        <!-- Tombol Toggle -->
        <div class="text-center mb-4">
            <button id="btnProgress" class="btn btn-danger btn-sm mx-2">Lihat Data Progress</button>
            <button id="btnNilai" class="btn btn-info btn-sm mx-2">Lihat Data Nilai</button>
        </div>

        <!-- Tambahan CSS -->
        <style>
            #progressSection tbody td,
            #nilaiSection tbody td {
                color: #000 !important;
            }
            #progressSection thead th,
            #nilaiSection thead th {
                color: #fff !important;
                font-weight: bold;
                background-color: #343a40;
            }
        </style>

        <!-- Section Progress -->
        <div class="card mb-5" id="progressSection">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display table table-bordered table-striped text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Pendahuluan</th>
                                <th>Video</th>
                                <th>Materi</th>
                                <th>Test</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $prog = 0; ?>
                            <?php foreach ($lihat_progress as $ma): ?>
                                <tr class="text-dark">
                                    <td class="fw-bold"><?= $no++; ?></td>
                                    <td class="text-start fw-bold"><?= $ma->nama_lengkap; ?></td>
                                    <td><?= $ma->pendahuluan ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; $prog += $ma->pendahuluan ? 25 : 0; ?></td>
                                    <td><?= $ma->video ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; $prog += $ma->video ? 25 : 0; ?></td>
                                    <td><?= $ma->materi ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'; $prog += $ma->materi ? 25 : 0; ?></td>
                                    <td>
                                        <center>
                                            <?php if ($ma->nilai_post_test == 1): ?>
                                                <i class="fa fa-check text-success"></i>
                                                <?php $prog += 25; ?>
                                            <?php elseif (!is_null($ma->nilai_post_test)): ?>
                                                <i class="fa fa-exclamation-circle text-warning"></i>
                                            <?php else: ?>
                                                <i class="fa fa-times text-danger"></i>
                                            <?php endif; ?>
                                        </center>
                                    </td>
                                    <td class="fw-bold text-dark"><?= $prog; ?>%</td>
                                </tr>
                                <?php $prog = 0; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Section Nilai -->
        <div class="card mb-5" id="nilaiSection" style="display: none;">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($lihat_nilai as $ma): ?>
                                <tr class="text-dark">
                                    <td class="fw-bold"><?= $no++; ?></td>
                                    <td class="text-start fw-bold"><?= $ma->nama_lengkap; ?></td>
                                    <td>
                                        <?= is_null($ma->nilai)
                                            ? "<span class='text-danger fw-bold'>Belum Mengerjakan</span>"
                                            : "<span class='text-dark fw-bold'>{$ma->nilai}</span>"; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tombol Export PDF -->
        <div class="text-center mt-4" id="exportButton" style="display: none;">
            <?php if (!empty($lihat_nilai)): ?>
                <a href="<?= base_url('guru/export_pdf?id_dm=' . $id_dm . '&kelas=' . $lihat_nilai[0]->kelas_mapel . '&id_mat=' . $id_mat) ?>">
                    <button class="btn btn-danger w-100">Export Data Nilai ke PDF</button>
                </a>
            <?php else: ?>
                <button class="btn btn-danger w-100" disabled>Export Data Nilai ke PDF (Belum Ada Nilai)</button>
            <?php endif; ?>
        </div>
    </div>
</div>

<!--**********************************
    Content body end
***********************************-->

<!-- Toggle Script -->
<script>
    const progressSection = document.getElementById('progressSection');
    const nilaiSection = document.getElementById('nilaiSection');
    const exportButton = document.getElementById('exportButton');

    document.getElementById('btnProgress').addEventListener('click', function () {
        progressSection.style.display = 'block';
        nilaiSection.style.display = 'none';
        exportButton.style.display = 'none';
    });

    document.getElementById('btnNilai').addEventListener('click', function () {
        progressSection.style.display = 'none';
        nilaiSection.style.display = 'block';
        exportButton.style.display = 'block';
    });
</script>
