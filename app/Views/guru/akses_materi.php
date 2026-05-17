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
                            <li class="breadcrumb-item active">Akses Materi</li>
                        </ol>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-8 col-xxl-12">
                        <div class="pricing-wrapper" style="margin-top: -3%;">

                            <div class="pricing-heading-text">
                                <h2><?php foreach ($detail_mapel as $dm): ?><?php echo "Materi ".$dm->nama_mapel; endforeach; ?><span class="text-primary"><?php foreach ($detail_mapel as $dm): ?><?php echo "Kelas ".$dm->kelas_mapel; endforeach; ?><?php foreach ($materi as $mat): echo " - Pertemuan ".$mat->pertemuan."";?><?php endforeach; ?></span></h2>
                            </div>

                            <a href="<?= base_url('guru/akses_mapel?id_dm='.$id_dm) ?>"><button type="button" class="btn btn-primary">Kembali<span class="btn-icon-right"><i class="fa fa-arrow-left "></i></span></button></a>

                                    <div class="mt-3"></div>

                                    <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasilupdatemapel'); ?>
                                        <?php echo session()->getFlashdata('berhasilhapusmaterimapel'); ?>
                                <?php endif; ?>

                            <form onsubmit="convertNewlines()" method="POST" enctype="multipart/form-data" action="<?= base_url('guru/edit_materi') ?> "> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Teks Materi</h4>
                                            <textarea id="myTextarea" name="myTextarea" class="form-control" rows="10"><?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->pendahuluan; endforeach; ?></textarea>
                                            <input type="text" name="id_mat" value="<?= $id_mat; ?>" hidden>
                                            <input type="text" name="id_dm" value="<?= $id_dm; ?>" hidden>
                                        </div>

                                        <div class="card-body">
    <!-- Materi tetap -->
    <!-- <h4 class="card-title">Pendahuluan</h4>
    <textarea id="myTextarea" name="myTextarea" class="form-control" rows="10">
        <?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->pendahuluan; endforeach; ?>
    </textarea> -->

    <!-- ID materi dan detail mapel -->
    <input type="hidden" name="id_mat" value="<?= $id_mat; ?>">
    <input type="hidden" name="id_dm" value="<?= $id_dm; ?>">
    
    <!-- Input waktu pengerjaan -->
    <div class="form-group mt-3">
    <label for="waktu_post_test">Waktu Pengerjaan (Menit)</label>
    <input type="number" id="waktu_post_test" name="waktu_post_test" class="form-control" 
        value="<?= isset($isi_materimapel[0]->waktu_post_test) ? $isi_materimapel[0]->waktu_post_test : 30 ?>" 
        min="1" required>
</div>


    <div class="form-group mt-3">
    <label for="jumlah_soal">Jumlah Soal yang Ingin Digenerate<span style="font-size: x-small;display: block;">Soal akan ditambahkan pada bank soal yang ada</span></label>
    <input type="number" name="jumlah_soal" id="jumlah_soal" class="form-control" min="1" max="50" value="10" required>
    </div>


                                        <button type="button" class="btn btn-success" onclick="buatkanSoal()">Buatkan Soal Otomatis</button>
                                        <div id="hasilSoal" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tambahkan CKEditor di bawah -->
                            <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                            <script>
                                if (document.getElementById('myTextarea')) {
                                    CKEDITOR.replace('myTextarea');
                                    }

                            </script>

<script>
function buatkanSoal() {
    const materi          = encodeURIComponent(CKEDITOR.instances['myTextarea'].getData());
    const id_mat          = encodeURIComponent(document.querySelector('input[name="id_mat"]').value);
    const jumlah_soal     = encodeURIComponent(document.querySelector('#jumlah_soal').value);
    const waktu_post_test = encodeURIComponent(document.querySelector('#waktu_post_test').value);

    const bodyData = `materi=${materi}&id_mat=${id_mat}&jumlah_soal=${jumlah_soal}&waktu_post_test=${waktu_post_test}`;

    fetch("<?= base_url('guru/buatkan_soal') ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: bodyData,
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.error) {
            document.getElementById("hasilSoal").innerHTML =
                `<span style='color:red'>${data.error}</span>`;
        } else {
            document.getElementById("hasilSoal").innerHTML =
                `<b>${data.message}</b>`;
        }
    })
    .catch(error => {
        console.error("Error:", error);
        document.getElementById("hasilSoal").innerHTML =
            "<span style='color:red'>Terjadi kesalahan saat menghubungi server.</span>";
    });
}
</script>



                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">File Materi</h4>
                                            <div class="mb-2">
                                                <strong>File saat ini:</strong> <span id="current-file"><?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->materi; endforeach; ?>.pdf</span>
                                            </div>
                                            <input type="file" name="file_materi" class="form-control" id="file_materi">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Link Video Materi</h4>
                                            <h6>*Tinggalkan jika pertemuan ini tidak menggunakan link video.</h6>
                                            <input type="input" name="video_materi" class="form-control" value="<?php foreach ($isi_materimapel as $imm): ?><?php echo $imm->video_materi; endforeach; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary mb-4" name="">
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