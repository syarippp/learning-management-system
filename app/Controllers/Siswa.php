<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\NilaiModel;
use App\Models\ProgressModel;
use App\Models\DetailMapelModel;

class Siswa extends BaseController
{

	protected $session;
    protected $db;
    protected $Pertanyaan; // Properti Pertanyaan ditambahkan di sini
    protected $Jawaban; // Properti Jawaban ditambahkan di sini

    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->Pertanyaan = new Pertanyaan(); // Inisialisasi model Pertanyaan
        $this->Jawaban = new Jawaban(); // Inisialisasi model Jawaban
    }

    public function getJawabanByPertanyaan($id_pertanyaan)
    {
        $jawaban = $this->Jawaban->getJawabanByPertanyaan($id_pertanyaan);
        return $this->response->setJSON($jawaban);
    }

    public function post_test()
{
    if (!$this->isLoggedIn()) {
        $this->session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
        return redirect()->to("login");
    }

    $userModel = new UserModel();
    $data['materi_mapel'] = $userModel->getDetailMateri();
    $data['id_mat'] = $this->request->getGet('id_mat');
    $data['id_dm'] = $this->request->getGet('id_dm');

    $Pertanyaan = new Pertanyaan();
    $id_mat = $data['id_mat'];
    $data['pertanyaan'] = $Pertanyaan->getPertanyaan($id_mat);

    $ProgressModel = new ProgressModel();
    $id_users = $this->session->get('id_users');
    $data['check_progress'] = $ProgressModel->getProgress($id_users, $id_mat);

    foreach ($data['pertanyaan'] as $p) {
        $data['jawaban'][$p->id_pertanyaan] = $Pertanyaan->getJawabanByPertanyaan($p->id_pertanyaan);
    }

    // ✅ Ambil waktu_post_test dari database
    $materiModel = new \App\Models\MateriMapelModel();
    $materi = $materiModel->find($id_mat);
    $data['waktu_post_test'] = isset($materi->waktu_post_test) ? $materi->waktu_post_test : 30;

    // ✅ Render view
    $header = view('siswa/template/header');
    $mainContent = view('siswa/post_test', $data);
    $footer = view('siswa/template/footer');

    return $this->response->setBody($header . $mainContent . $footer);
}


public function submit_test()
{
    if (!$this->isLoggedIn()) {
        return redirect()->to("login");
    }

    $Pertanyaan    = new Pertanyaan();
    $ProgressModel = new ProgressModel();

    $id_mat_test = $this->request->getGet('id_mat_test');
    $id_user     = $this->session->get('id_users');
    $id_dm       = $this->request->getGet('id_dm');
    $id_progress = $this->request->getGet('id_progress');
    $id_mat      = $this->request->getGet('id_mat');

    $jawaban    = $this->request->getPost('jawaban');
    $pertanyaan = $Pertanyaan->getPertanyaan($id_mat_test);

    $jumlah_soal  = count($pertanyaan);
    $jumlah_benar = 0;

    foreach ($pertanyaan as $p) {
        if (isset($jawaban[$p->id_pertanyaan]) && $jawaban[$p->id_pertanyaan] == "1") {
            $jumlah_benar++;
        }
    }

    // Hitung nilai secara proporsional skala 100
    $nilai = ($jumlah_soal > 0) ? round(($jumlah_benar / $jumlah_soal) * 100) : 0;

    // Tetapkan nilai KKM
    $kkm = 80;

    // Simpan ke tabel nilai (setiap percobaan disimpan)
    $this->db->table('nilai')->insert([
        'id_users'        => $id_user,
        'id_materi_mapel' => $id_mat_test,
        'nilai'           => $nilai,
    ]);

    // Update progress jika pertama kali lulus
    $progress = $ProgressModel->find($id_progress);
    if ($nilai >= $kkm && $progress && $progress->nilai_post_test != 1) {
        $progress->nilai_post_test = 1;
        $ProgressModel->save($progress);
    }

    return redirect()->to(base_url('siswa/materi_pertemuan?id_mat=' . $id_mat_test . '&id_dm=' . $id_dm));
}

    public function lihat_posttest()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $data['id_dm'] = $this->request->getGet('id_dm');
        $data['id_mat'] = $this->request->getGet('id_mat');

        $guruModel = new GuruModel();
        $Pertanyaan = new Pertanyaan();
        $data['detail_mapel'] = $guruModel->getDetailMapel();
        $data['pertemuan'] = $guruModel->getPertemuanMapel();
        $data['per'] = $guruModel->getPert();

        $data['lihat_jawaban'] = $Pertanyaan->LihatJawaban();
        $data['lihat_pertanyaan'] = $Pertanyaan->LihatPertanyaan();

        $header = view('guru/template/header');
        $mainContent = view('guru/lihat_posttest', $data);
        $footer = view('guru/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    private function isLoggedIn()
    {
        $session = session();

        // Check if the 'logged_in' session variable exists and is true
        if ($session->logged_in == TRUE && $session->level == "siswa") {
            return true;
        }

        return false;
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $DetailMapelModel = new DetailMapelModel();
        $data['jumlah_mapel'] = $DetailMapelModel->getActiveMapels_count(); // Ensure this method exists and returns an integer

        $header = view('siswa/template/header');
        $mainContent = view('siswa/index', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function mapel()
    {
        // Cek login
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }
    
        $session = session();
        $kelas = $session->get('kelas');
    
        // Ambil data mapel berdasarkan kelas user dari model
        $detailMapelModel = new DetailMapelModel();
        $mapel_aktif = $detailMapelModel->getActiveMapels();
    
        // Tampilkan view dan kirim data
        $data = [
            'mapel_aktif' => $mapel_aktif
        ];
    
        echo view('siswa/template/header');
        echo view('siswa/detail_mapel', $data); // Data dikirim ke view
        echo view('siswa/template/footer');
    }


    public function detail_mapel()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $userModel = new UserModel();
        $data['mapel_aktif'] = $userModel->getMapel();
        $data['mapel_nama'] = $userModel->getMapelNama();
        $data['id'] = $this->request->getGet('id');

        $header = view('siswa/template/header');
        $mainContent = view('siswa/detail_mapel', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function akses_mapel()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        //check progress ini 
        $ProgressModel = new ProgressModel();
        $id_users = $this->session->get('id_users');
        $id_mat = $this->request->getGet('id_mat');
        $data['check_progress'] = $ProgressModel->getProgress($id_users, $id_mat);

        $userModel = new UserModel();
        $data['detail_mapel'] = $userModel->getDetailMapel();
        $data['pertemuan'] = $userModel->getPertemuanMapel();
        $data['id_dm'] = $this->request->getGet('id_dm');
        // print_r($data['detail_mapel']);

        $header = view('siswa/template/header');
        $mainContent = view('siswa/akses_mapel', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function tambah_prog_pendahuluan(){
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $ProgressModel = new ProgressModel();
        $id_progress = $this->request->getGet('id_progress');
        $id_mat = $this->request->getGet('id_mat');
        $user = $ProgressModel->find($id_progress);

        if ($user) {
            // Update the user's profile data
            $user->pendahuluan = 1;

            // Save the updated user data
            $ProgressModel->save($user);
            
            // Redirect to the profile page
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat);
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat);
        }

    }

    public function tambah_prog_video(){
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $ProgressModel = new ProgressModel();
        $id_progress = $this->request->getGet('id_progress');
        $id_mat = $this->request->getGet('id_mat');
        $user = $ProgressModel->find($id_progress);

        if ($user) {
            // Update the user's profile data
            $user->video = 1;

            // Save the updated user data
            $ProgressModel->save($user);
            
            // Redirect to the profile page
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat);
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat);
        }

    }

    public function tambah_prog_materi(){
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $ProgressModel = new ProgressModel();
        $id_progress = $this->request->getGet('id_progress');
        $id_mat = $this->request->getGet('id_mat');
        $user = $ProgressModel->find($id_progress);

        if ($user) {
            // Update the user's profile data
            $user->materi = 1;

            // Save the updated user data
            $ProgressModel->save($user);
            
            // Redirect to the profile page
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat);
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat);
        }

    }

    public function buat_progress(){
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $ProgressModel = new ProgressModel();
        $id_users = $this->session->get('id_users');
        $id_mat = $this->request->getGet('id_mat');
        $id_dm = $this->request->getGet('id_dm');

        $check_progress = $ProgressModel->getNilai($id_users, $id_mat);

        if($check_progress == NULL){
            $ProgressModel->insertIfNull($id_users, $id_mat);

            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat."&id_dm=".$id_dm);
        }
        else{
            return redirect()->to("siswa/materi_pertemuan?id_mat=".$id_mat."&id_dm=".$id_dm);
        }

    }

    public function materi_pertemuan()
{
    if (!$this->isLoggedIn()) {
        $session = session();
        $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span>
            </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
        return redirect()->to("login");
    }

    $userModel = new UserModel();
    $NilaiModel = new NilaiModel();
    $ProgressModel = new ProgressModel();

    $id_users = $this->session->get('id_users');
    $id_mat   = $this->request->getGet('id_mat');
    $id_dm    = $this->request->getGet('id_dm');

    // Ambil data materi
    $data['materi_mapel'] = $userModel->getDetailMateri();

    // Ambil semua nilai berdasarkan user dan materi
    $data['list_nilai'] = $NilaiModel->getNilaiByMateri($id_users, $id_mat);

    // Hitung jumlah attempt berdasarkan user dan materi
    $data['attempt_test'] = $NilaiModel->countAttemptTestByMateri($id_users, $id_mat);

    // Ambil progress
    $data['check_progress'] = $ProgressModel->getProgress($id_users, $id_mat);

    // Kirim ID untuk kebutuhan view
    $data['id_mat'] = $id_mat;
    $data['id_dm'] = $id_dm;

    $header = view('siswa/template/header');
    $mainContent = view('siswa/materi_pertemuan', $data);
    $footer = view('siswa/template/footer');

    return $this->response->setBody($header . $mainContent . $footer);
}


    public function profil()
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $userModel = new UserModel();
        $data['data_users'] = $userModel->getDataUsers(); 

        $header = view('siswa/template/header');
        $mainContent = view('siswa/profil', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function update_profil()
    {
        $id_users = $this->request->getPost('id_users');
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');
        $password = $this->request->getPost('password');
        
        // Retrieve the user data from the database
        $userModel = new UserModel();
        $user = $userModel->find($id_users);

        if ($user) {

            if (!empty($password)) {
                $user->password = password_hash($password, PASSWORD_DEFAULT);
            }

            // Update the user's profile data
            $user->alamat = $alamat;
            $user->no_hp = $no_hp;

            // Save the updated user data
            $userModel->save($user);
            
            // Redirect to the profile page
            return redirect()->to("siswa/profil");
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("siswa/index");
        }
    }
}
