<!--**********************************
    Content body start
***********************************-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .swal2-popup {
        font-size: 1.5rem !important; /* Ukuran font untuk seluruh modal */
    }

    .swal-custom-title {
        font-size: 2rem; /* Ukuran font untuk judul */
    }

    .swal-custom-content {
        font-size: 1.25rem; /* Ukuran font untuk konten */
    }

    .swal-custom-button {
        font-size: 1.25rem; /* Ukuran font untuk tombol */
        padding: 10px 20px; /* Tambah padding pada tombol */
    }
</style>

<style type="text/css">
    .no-select {
        user-select: none; /* Nonaktifkan pemilihan teks */
        -webkit-user-select: none; /* Nonaktifkan pemilihan teks di Webkit (Safari, Chrome) */
        -moz-user-select: none; /* Nonaktifkan pemilihan teks di Firefox */
        -ms-user-select: none; /* Nonaktifkan pemilihan teks di Internet Explorer/Edge */
    }
    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
    .navigation-buttons {
        margin-bottom: 20px;
        text-align: center;
    }
    .navigation-buttons button {
        margin: 2px;
        padding: 5px 10px;
        font-size: 14px;
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

                    <div class="alert alert-warning text-center">
                     <strong>Sisa Waktu:</strong> <span id="timer" style="font-weight:bold;"></span>
                    </div>

                    <div id="quiz-container">
                        <?php foreach ($check_progress as $cp): ?>
    <form id="quiz-form" method="post" action="<?= base_url('siswa/submit_test?id_mat_test='.$mm->id_materi_mapel.'&id_progress='.$cp->id_progress.'&id_dm='.$id_dm) ?>" onsubmit="clearLocalStorage()">
        <?php endforeach; ?> 

        <!-- Navigation buttons for questions -->
        <div class="navigation-buttons">
            <?php for ($i = 0; $i < count($pertanyaan); $i++): ?>
                <button type="button" class="btn btn-outline-primary" onclick="showQuestion(<?= $i ?>)"><?= $i + 1 ?></button>
            <?php endfor; ?>
        </div>

        <?php $jaw = 0; ?>
        <?php $soal = 1; ?>
        <?php foreach ($pertanyaan as $index => $p) : ?>
        <div class="question" id="question<?= $index ?>" style="<?= $index === 0 ? 'display:block;' : 'display:none;' ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body no-select">
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
            <div class="button-group">
                <?php if ($index > 0): ?>
                <button type="button" class="prev-btn btn btn-secondary" onclick="showPreviousQuestion(<?= $index ?>)">Previous</button>
                <?php endif; ?>
                <?php if ($index + 1 < count($pertanyaan)): ?>
                <button type="button" class="next-btn btn btn-primary" onclick="showNextQuestion(<?= $index ?>)">Next</button>
                <?php else: ?>
                <button type="submit" class="submit-btn btn btn-success">Submit</button>
                <?php endif; ?>
            </div>
        </div>
        <?php $soal += 1; ?>
        <?php endforeach; ?>
    </form>
</div>

<script>
    document.querySelector('.submit-btn').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah submit langsung

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to submit your answers?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            allowOutsideClick: false,
            customClass: {
                popup: 'animated bounceIn',
                title: 'swal-custom-title',
                content: 'swal-custom-content',
                confirmButton: 'swal-custom-button',
                cancelButton: 'swal-custom-button'
            },
            width: '600px', // Menambah lebar pop-up
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('quiz-form').submit(); // Lanjutkan submit jika user mengkonfirmasi
            }
        });
    });
</script>

<script>
    function clearLocalStorage() {
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(radio => {
            localStorage.removeItem(radio.name);
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const radioButtons = document.querySelectorAll('input[type="radio"]');

        radioButtons.forEach(radio => {
            // Load saved value from local storage on page load
            const savedAnswer = localStorage.getItem(radio.name);
            if (savedAnswer && radio.value === savedAnswer) {
                radio.checked = true;
            }

            // Save answer to local storage when a radio button is selected
            radio.addEventListener('change', function() {
                localStorage.setItem(this.name, this.value);
            });
        });
    });
</script>

<script>
    const totalQuestions = <?= count($pertanyaan) ?>;

    function showQuestion(index) {
        for (let i = 0; i < totalQuestions; i++) {
            document.getElementById('question' + i).style.display = 'none';
        }
        document.getElementById('question' + index).style.display = 'block';
    }

    function showNextQuestion(index) {
        document.getElementById('question' + index).style.display = 'none';
        if (index + 1 < totalQuestions) {
            document.getElementById('question' + (index + 1)).style.display = 'block';
        } 
    }

    function showPreviousQuestion(index) {
        document.getElementById('question' + index).style.display = 'none';
        if (index > 0) {
            document.getElementById('question' + (index - 1)).style.display = 'block';
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const questions = document.querySelectorAll('.question .card-body');

        questions.forEach(question => {
            question.addEventListener('copy', (e) => {
                e.preventDefault();
                alert('Copying text is not allowed.');
            });

            question.addEventListener('paste', (e) => {
                e.preventDefault();
                alert('Pasting text is not allowed.');
            });

            question.addEventListener('cut', (e) => {
                e.preventDefault();
                alert('Cutting text is not allowed.'); 
            });
        });
    });
</script>

<script>
    let waktuUjian = <?= $waktu_post_test ?> * 60; // waktu dalam detik dari PHP
    let timerElement = document.getElementById("timer");

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${minutes}m ${secs < 10 ? '0' : ''}${secs}s`;
    }

    function startTimer() {
        timerElement.innerText = formatTime(waktuUjian);

        const countdown = setInterval(() => {
            waktuUjian--;

            if (waktuUjian <= 0) {
                clearInterval(countdown);
                timerElement.innerText = "Waktu Habis!";
                Swal.fire({
                    icon: 'info',
                    title: 'Waktu Habis!',
                    text: 'Jawaban akan otomatis disubmit.',
                    allowOutsideClick: false,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    document.getElementById('quiz-form').submit();
                }, 2000);
            } else {
                timerElement.innerText = formatTime(waktuUjian);
            }
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', startTimer);
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