<?php

namespace App\Controllers;
use App\Models\GuruModel;
use App\Models\UserModel;
use App\Models\DetailMapelModel;
use App\Models\MapelModel;
use App\Models\MateriMapelModel;

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

        $guruModel = new GuruModel();
        $data['data_users'] = $guruModel->getDataUsers();

        $header = view('guru/template/header');
        $mainContent = view('guru/profil', $data);
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

        // $session = session();
        // print_r($session->level == "guru");

        $guruModel = new GuruModel();
        $data['mapel_aktif'] = $guruModel->getMapel();
        // $data['nama_pengajar'] = $guruModel->getNamaPengajar();
        $data['mapel_nama'] = $guruModel->getMapelNama();

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

    public function akses_materi()
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

        $data['id_mat'] = $this->request->getGet('id_mat');
        $data['id_dm'] = $this->request->getGet('id_dm');


        $guruModel = new GuruModel();
        $data['detail_mapel'] = $guruModel->getDetailMapel();
        $data['pertemuan'] = $guruModel->getPertemuanMapel();
        $data['isi_materimapel'] = $guruModel->getMateriMapel();

        $materiModel = new MateriMapelModel();
        $data['materi'] = $materiModel->getMateriMapel();

        $header = view('guru/template/header');
        $mainContent = view('guru/akses_materi', $data);
        $footer = view('guru/template/footer');
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
        $guruModel = new GuruModel();
        $guru = $guruModel->find($id_users);

        if ($guru) {

            if (!empty($password)) {
                $guru->password = password_hash($password, PASSWORD_DEFAULT);
            }

            // Update the user's profile data
            $guru->alamat = $alamat;
            $guru->no_hp = $no_hp;

            // Save the updated user data
            $guruModel->save($guru);
            
            // Redirect to the profile page
            $session = session();
            $session->setFlashdata('berhasilupdate', '<div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Data Berhasil Di Update.</div>');
            return redirect()->to("guru/profil");
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("guru/index");
        }
    }

    public function tambah_mapel() {
      $mapelModel = new MapelModel();

      $result = $mapelModel->insert([
         'nama_mapel'=>$this->request->getPost("nama_mapel")
      ]);

      if($result==true) {
            $session = session();
            $session->setFlashdata('berhasiltambahmapel', '<div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Mapel baru berhasil ditambahkan.</div>');
            return redirect()->to("guru/mapel");
        }else{
            $session = session();
            $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                        </div>');
            return redirect()->to("guru/index");
        }

   }

   public function tambah_detail_mapel() {
      $detailmapelModel = new DetailMapelModel();

      $result = $detailmapelModel->insert([
         'id_mapel'=>$this->request->getPost("id_mapel"),
         'id_users'=>$this->request->getPost("id_users"),
         'kelas_mapel'=>$this->request->getPost("kelas_mapel"),
         'tahun_mapel'=>$this->request->getPost("tahun_mapel"),
         'status'=>"aktif"
      ]);

      if($result==true) {
            $session = session();
            $session->setFlashdata('berhasiltambahdetailmapel', '<div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Mapel baru berhasil ditambahkan.</div>');
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        }else{
            $session = session();
            $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                        </div>');
            return redirect()->to("guru/index");
        }

   }

   public function tambah_materi_mapel() {
      $materimapelModel = new MateriMapelModel();

      $id_detail_mapel = $this->request->getGet('id_dm');
      $pertemuan_materi = $this->request->getPost('pertemuan_materi');

      $result = $materimapelModel->insert([
         'id_detail_mapel'=> $id_detail_mapel,
         'pertemuan'=>$pertemuan_materi,
         'pendahuluan'=>"Belum Ada Pendahuluan",
         'materi'=>"Belum Ada Materi",
         'video_materi'=>"Tidak Ada",
         'post_test'=>"Tidak Ada"
      ]);

      if($result==true) {
            $session = session();
            $session->setFlashdata('berhasiltambahmaterimapel', '<div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Pertemuan baru berhasil dibuat, jangan lupa edit materi di pertemuan baru nya.</div>');
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        }else{
            $session = session();
            $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                        </div>');
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        }

   }

   public function edit_materi()
    {
        $MateriMapelModel = new MateriMapelModel();

        $id_mat = $this->request->getPost('id_mat');
        $pendahuluan = $this->request->getPost('myTextarea');
        $file_materi = $this->request->getFile('file_materi');
        $video_materi = $this->request->getPost('video_materi');

        // Array untuk menyimpan data yang akan diupdate
        $data = [
            'pendahuluan' => $pendahuluan,
            'video_materi' => $video_materi,
        ];

        // Periksa apakah ada file yang diupload
        if ($file_materi && $file_materi->isValid() && !$file_materi->hasMoved()) {
            // Validasi tipe file (misalnya hanya PDF)
            if ($file_materi->getClientMimeType() == 'application/pdf') {
                // Tentukan nama file baru (misalnya menggunakan nama asli atau generate nama unik)
                $newName = $file_materi->getRandomName();

                // Pindahkan file ke folder tujuan (misalnya 'public/pdf')
                if ($file_materi->move(FCPATH . 'pdf', $newName)) {
                    // Simpan nama file ke array data
                    $data['materi'] = $newName;
                } else {
                    // Handle error jika file gagal dipindahkan
                    log_message('error', 'Failed to move the file to destination');
                    return redirect()->back()->with('error', 'Gagal memindahkan file.');
                }
            } else {
                // Handle error jika tipe file tidak sesuai
                return redirect()->back()->with('error', 'File harus berupa PDF.');
            }
        }

        // Update data di database
        if ($MateriMapelModel->update($id_mat, $data)) {
            return redirect()->back()->with('success', 'Materi berhasil diupdate.');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data.');
        }
    }

   public function hapus_materi_mapel()
    {
        $id_mat = $this->request->getGet('id_mat');

        $MateriMapelModel = new MateriMapelModel();
        $mmm = $MateriMapelModel->find($id_mat);

        if ($mmm) {
            $MateriMapelModel->delete($id_mat);

            $session = session();
            $session->setFlashdata('berhasilhapusmaterimapel', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Pertemuan berhasil di hapus.</div>');

            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        } else {
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        }
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

    public function hapus_detail_mapel()
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

    public function hapus_mapel()
    {
        $id_mapel = $this->request->getGet('id_mapel');

        $MapelModel = new MapelModel();
        $mm = $MapelModel->find($id_mapel);

        if ($mm) {
            $MapelModel->delete($id_mapel);
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        } else {
            // Service not found, redirect or display an error message
            return redirect()->to('guru/index')->with('error', 'Service not found');
        }
    }

    public function goBack()
    {
        $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
    }
}