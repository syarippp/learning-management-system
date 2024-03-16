<?php

namespace App\Controllers;
use App\Models\GuruModel;
use App\Models\DetailMapelModel;
use App\Models\MapelModel;

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

        $guruModel = new GuruModel();
        $data['mapel_aktif'] = $guruModel->getActiveMapels();
        // print_r($data['jumlah_mapel']);

        $header = view('guru/template/header');
        $mainContent = view('guru/mapel', $data);
        $footer = view('guru/template/footer');
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

        $guruModel = new GuruModel();
        $data['mapel_aktif'] = $guruModel->getMapel();

        $header = view('guru/template/header');
        $mainContent = view('guru/detail_mapel', $data);
        $footer = view('guru/template/footer');
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

        $guruModel = new GuruModel();
        $data['detail_mapel'] = $guruModel->getDetailMapel();
        $data['pertemuan'] = $guruModel->getPertemuanMapel();
        // print_r($data['detail_mapel']);

        $header = view('guru/template/header');
        $mainContent = view('guru/akses_mapel', $data);
        $footer = view('guru/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function update_status_mapel_ketidakaktif()
    {
        $iddetailmapel = $this->request->getGet('iddetailmapel');
        
        // Retrieve the user data from the database
        $DetailMapelModel = new DetailMapelModel();
        $dmm = $DetailMapelModel->find($iddetailmapel);

        if ($dmm) {

            $dmm->status = "tidak aktif";

            // Save the updated user data
            $DetailMapelModel->save($dmm);
            
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("guru/index");
        }
    }

    public function update_status_mapel_keaktif()
    {
        $iddetailmapel = $this->request->getGet('iddetailmapel');
        
        // Retrieve the user data from the database
        $DetailMapelModel = new DetailMapelModel();
        $dmm = $DetailMapelModel->find($iddetailmapel);

        if ($dmm) {

            $dmm->status = "aktif";

            // Save the updated user data
            $DetailMapelModel->save($dmm);
            
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("guru/index");
        }
    }

    public function hapus_mapel()
    {
        $id_detail_mapel = $this->request->getGet('id_detail_mapel');

        $DetailMapelModel = new DetailMapelModel();
        $dmm = $DetailMapelModel->find($id_detail_mapel);

        if ($dmm) {
            $DetailMapelModel->delete($id_detail_mapel);
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        } else {
            // Service not found, redirect or display an error message
            return redirect()->to('guru/index')->with('error', 'Service not found');
        }
    }
}