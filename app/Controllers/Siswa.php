<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Pertanyaan;
use App\Models\Jawaban;

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

        $Pertanyaan = new Pertanyaan();
        $id_mat = $this->request->getGet('id_mat');
        $data['pertanyaan'] = $Pertanyaan->getPertanyaan($id_mat);

        foreach ($data['pertanyaan'] as $p) {
            $data['jawaban'][$p->id_pertanyaan] = $Pertanyaan->getJawabanByPertanyaan($p->id_pertanyaan);
        }

        $header = view('siswa/template/header');
        $mainContent = view('siswa/post_test', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function submit_test()
{
    if (!$this->isLoggedIn()) {
        // Handle jika pengguna belum login
        return redirect()->to("login");
    }

    $Pertanyaan = new Pertanyaan();
    $id_mat_test = $this->request->getGet('id_mat_test');
    $id_user = $this->session->get('id_users');

    $pertanyaan = $Pertanyaan->getPertanyaan($id_mat_test);
    $jawaban = $this->request->getPost('jawaban');

    $nilai = 0;
    foreach ($pertanyaan as $p) {
        // Pastikan jawaban untuk pertanyaan ini ada dalam $_POST
        if (isset($jawaban[$p->id_pertanyaan])) {
            $selectedValue = $jawaban[$p->id_pertanyaan];

            $nilai_jawaban = $selectedValue;

            if ($nilai_jawaban == "1") {
                $nilai += 10;
            }
        }
    }


    // Insert nilai ke database
    $data = [
        'id_users' => $id_user,
        'id_materi_mapel' => $id_mat_test,
        'nilai' => $nilai,
    ];

    $this->db->table('nilai')->insert($data);

    return redirect()->to(base_url('siswa/mapel'));
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

        $userModel = new UserModel();
        $data['jumlah_mapel'] = $userModel->countActiveMapels();

        $header = view('siswa/template/header');
        $mainContent = view('siswa/index', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function mapel()
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
        $data['mapel_aktif'] = $userModel->getActiveMapels();
        $data['jumlah_mapel'] = $userModel->countActiveMapels();
        // print_r($data['jumlah_mapel']);

        $header = view('siswa/template/header');
        $mainContent = view('siswa/mapel', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
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

        $userModel = new UserModel();
        $data['detail_mapel'] = $userModel->getDetailMapel();
        $data['pertemuan'] = $userModel->getPertemuanMapel();
        // print_r($data['detail_mapel']);

        $header = view('siswa/template/header');
        $mainContent = view('siswa/akses_mapel', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function materi_pertemuan()
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
        $data['materi_mapel'] = $userModel->getDetailMateri();
        $data['id_mat'] = $this->request->getGet('id_mat');

        $header = view('siswa/template/header');
        $mainContent = view('siswa/materi_pertemuan', $data);
        $footer = view('siswa/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
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
