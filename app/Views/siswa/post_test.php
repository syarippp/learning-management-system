<!--**********************************
    Content body start
***********************************-->

<style type="text/css">
    .timer {
    font-size: 24px; /* Ukuran font lebih besar */
    font-weight: bold; /* Teks tebal */
    color: white; /* Warna teks putih */
    background-color: #ff0000; /* Warna latar belakang merah */
    padding: 10px; /* Padding untuk memberi ruang sekitar teks */
    border-radius: 5px; /* Sudut melengkung */
    width: 100px; /* Lebar tetap */
    text-align: center; /* Teks di tengah */
    margin: 10px auto; /* Margin untuk memberi ruang di atas dan bawah, serta tengah */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Bayangan untuk memberi efek 3D */
}

</style>

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
                    <div id="quiz-container">
    <form id="quiz-form" method="post" action="<?= base_url('siswa/submit_test?id_mat_test='.$mm->id_materi_mapel) ?>">
        <?php $jaw = 0; ?>
        <?php $soal = 1; ?>
        <?php foreach ($pertanyaan as $index => $p) : ?>
        <div class="question" id="question<?= $index ?>" style="<?= $index === 0 ? 'display:block;' : 'display:none;' ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?= $soal.". "; ?><?= $p->pertanyaan ?></h4>
                            <div class="card-content">
                                <?php foreach ($jawaban[$p->id_pertanyaan] as $opt => $jawab) { ?>
                                <div>
                                    <input name="jawaban[<?= $p->id_pertanyaan ?>]" type="radio" class="filled-in chk-col-primary" id="jawaban<?= $jaw; ?>_option<?= $opt; ?>" value="<?= $jawab['value']; ?>">
                                    <label for="jawaban<?= $jaw; ?>_option<?= $opt; ?>"><?= $jawab['jawaban']; ?></label>
                                </div>
                                <?php } ?>
                                <?php $jaw += 1; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="timer" id="timer<?= $index ?>">60</div>
            <button type="button" class="next-btn" onclick="showNextQuestion(<?= $index ?>)">Next</button>
        </div>
        <?php $soal += 1; ?>
        <?php endforeach; ?>
    </form>
</div>

<script>
    let currentQuestion = 0;
    const totalQuestions = <?= count($pertanyaan) ?>;
    const baseUrl = '<?= base_url('siswa/mapel') ?>';

    function startTimer(duration, display, callback) {
        let timer = duration, minutes, seconds;
        const interval = setInterval(() => {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = seconds;

            if (--timer < 0) {
                clearInterval(interval);
                callback();
            }
        }, 1000);
    }

    function showNextQuestion(index) {
        document.getElementById('question' + index).style.display = 'none';
        if (index + 1 < totalQuestions) {
            document.getElementById('question' + (index + 1)).style.display = 'block';
            startTimer(60, document.getElementById('timer' + (index + 1)), () => showNextQuestion(index + 1));
        } else {
            document.getElementById('quiz-form').submit();
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        startTimer(60, document.getElementById('timer0'), () => showNextQuestion(0));
    });
</script>



                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
