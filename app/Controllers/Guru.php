<?php

namespace App\Controllers;
use App\Models\GuruModel;

class Guru extends BaseController
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
        if ($session->logged_in && $session->level == "guru") {
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

        $guruModel = new GuruModel();
        $data['jumlah_mapel'] = $guruModel->countActiveMapels();
        $data['materi_mapel'] = $guruModel->countActiveMateriMapels();
        $data['total_kelas10'] = $guruModel->countActiveSiswaKelas10();
        $data['total_kelas11'] = $guruModel->countActiveSiswaKelas11();
        $data['total_kelas12'] = $guruModel->countActiveSiswaKelas12();

        $header = view('guru/template/header');
        $mainContent = view('guru/index', $data);
        $footer = view('guru/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }
}