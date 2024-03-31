<?php

namespace App\Controllers;
use App\Models\UserModel;

class Siswa extends BaseController
{

	protected $session;
    protected $db;

    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
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
