<?php

namespace App\Controllers;
use App\Models\GuruModel;
use App\Models\UserModel;
use App\Models\DetailMapelModel;
use App\Models\MapelModel;
use App\Models\MateriMapelModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Admin extends BaseController
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
        if ($session->logged_in && $session->level == "admin") {
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

        $header = view('admin/template/header');
        $mainContent = view('admin/index', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function update_mapel()
    {
        $id_mapel = $this->request->getPost('id_mapel');
        $nama_sesudah = $this->request->getPost('nama_sesudah');
        
        // Retrieve the user data from the database
        $MapelModel = new MapelModel();
        $mm = $MapelModel->find($id_mapel);

        if ($mm) {

            if (!empty($password)) {
                $mm->password = password_hash($password, PASSWORD_DEFAULT);
            }

            // Update the user's profile data
            $mm->nama_mapel = $nama_sesudah;

            // Save the updated user data
            $MapelModel->save($mm);
            
            // Redirect to the profile page
            $session = session();
            $session->setFlashdata('berhasilupdate', '<div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Data Berhasil Di Update.</div>');
            return redirect()->to("admin/data_mapel");
        } else {
            // If user data not found, redirect to the index page
            return redirect()->to("admin/data_mapel");
        }
    }

    public function tambah_guru()
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

        $header = view('admin/template/header');
        $mainContent = view('admin/tambah_guru');
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function tambah_siswa()
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

        $header = view('admin/template/header');
        $mainContent = view('admin/tambah_siswa');
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function edit_siswa()
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

        $GuruModel = new GuruModel();
        $data['siswa'] = $GuruModel->getSiswaWithID();

        $header = view('admin/template/header');
        $mainContent = view('admin/edit_siswa', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function edit_guru()
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

        $GuruModel = new GuruModel();
        $data['guru'] = $GuruModel->getGuruWithID();

        $header = view('admin/template/header');
        $mainContent = view('admin/edit_guru', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function update_guru()
    {
        $guruModel = new GuruModel();
        
        // Ambil data dari form
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];

        // Proses upload gambar
        $profilPicture = $this->request->getFile('profil_picture');
        if ($profilPicture->isValid() && !$profilPicture->hasMoved()) {
            $newName = $profilPicture->getRandomName();
            $profilPicture->move('profil_picture', $newName);
            $data['profil_picture'] = $newName;
        }

        // Update data ke database
        $id_users = $this->request->getPost('id_users');
        $guruModel->update($id_users, $data);

        // Redirect ke halaman admin atau tampilkan pesan sukses
        return redirect()->to(base_url('admin/data_guru'))->with('message', 'Data guru berhasil diperbarui.');
    }

    public function edit_mapel()
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

        $MapelModel = new MapelModel();
        $data['mapel'] = $MapelModel->getMapelWithID();

        $header = view('admin/template/header');
        $mainContent = view('admin/edit_mapel', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function tambah_mapel() {
      $MapelModel = new MapelModel();

      $result = $MapelModel->insert([
         'nama_mapel'=>$this->request->getPost("nama_mapel")
      ]);

      if($result==true) {
            $session = session();
            $session->setFlashdata('berhasiltambahmapel', '<div class="alert alert-success alert-dismissible fade show">
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
            return redirect()->to("admin/data_mapel");
        }

   }

    public function proses_tambah_guru(){
    	// Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $usermodel = new UserModel();

	      $plainPassword = $this->request->getPost("password");
	      $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

	      $result = $usermodel->insert([
	         'username'=>$this->request->getPost("username"),
	         'password'=> $hashedPassword,
	         'nama_lengkap'=>$this->request->getPost("nama_lengkap"),
	         'no_hp'=>$this->request->getPost("no_hp"),
	         'alamat'=>$this->request->getPost("alamat"),
	         'kelas'=>"Guru",
	         'level' => 'guru'
	      ]);

	      if($result==true) {
	            $session = session();
	            $session->setFlashdata('berhasilbuatakun', '<div class="alert alert-success">
	                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                          <i class="icon-line-lock"></i>Selamat! Akun Berhasil Dibuat.<br>Silahkan Login.</a>
	                        </div>');
	            return redirect()->to("admin/data_guru");
	        }else{
	            $session = session();
	            $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
	                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                          <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
	                        </div>');
	            return redirect()->to("admin/data_guru");
	        }
    }

    public function proses_tambah_siswa(){
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $usermodel = new UserModel();

          $plainPassword = $this->request->getPost("password");
          $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

          $result = $usermodel->insert([
             'username'=>$this->request->getPost("username"),
             'password'=> $hashedPassword,
             'nama_lengkap'=>$this->request->getPost("nama_lengkap"),
             'nisn'=>$this->request->getPost("nisn"),
             'no_hp'=>$this->request->getPost("no_hp"),
             'alamat'=>$this->request->getPost("alamat"),
             'kelas'=>$this->request->getPost("kelas"),
             'level' => 'siswa'
          ]);

          if($result==true) {
                $session = session();
                $session->setFlashdata('berhasilbuatakun', '<div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon-line-lock"></i>Selamat! Akun Berhasil Dibuat.<br>Silahkan Login.</a>
                            </div>');
                return redirect()->to("admin/data_siswa");
            }else{
                $session = session();
                $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                            </div>');
                return redirect()->to("admin/data_siswa");
            }
    }

    public function data_mapel()
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

        $MapelModel = new MapelModel();
        $data['mapel'] = $MapelModel->getMapel();

        $header = view('admin/template/header');
        $mainContent = view('admin/data_mapel', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
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
            return redirect()->to('admin/data_mapel')->with('error', 'Service not found');
        }
    }

    public function data_guru()
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
        $data['guru'] = $guruModel->getGuru();

        $header = view('admin/template/header');
        $mainContent = view('admin/data_guru', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function data_siswa()
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

        $UserModel = new UserModel();
        $data['siswa'] = $UserModel->getSiswa();

        $header = view('admin/template/header');
        $mainContent = view('admin/data_siswa', $data);
        $footer = view('admin/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function hapus_guru()
    {
        $id_users = $this->request->getGet('id_users');

        $GuruModel = new GuruModel();
        $dmm = $GuruModel->find($id_users);

        if ($dmm) {
            $GuruModel->delete($id_users);
            $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
        } else {
            // Service not found, redirect or display an error message
            return redirect()->to('guru/index')->with('error', 'Service not found');
        }
    }

    public function importSiswa()
    {
        $file = $this->request->getFile('file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = $file->getTempName();

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            $userModel = new UserModel();

            foreach ($data as $key => $row) {
                // Skip header row
                if ($key == 0) {
                    continue;
                }

                $userData = [
                    'nisn' => $row[0],
                    'username' => $row[1],
                    'password' => password_hash($row[2], PASSWORD_BCRYPT), // Hash password
                    'nama_lengkap' => $row[3],
                    'kelas' => $row[4],
                    'alamat' => $row[5],
                    'no_hp' => $row[6],
                    'level' => 'siswa', // Set level manually
                ];

                $userModel->insert($userData);
            }

            return redirect()->to(base_url('admin/data_siswa'))->with('message', 'Data siswa berhasil diimport');
        } else {
            return redirect()->to(base_url('admin/data_siswa'))->with('error', 'Terjadi kesalahan saat mengunggah file');
        }
    }

}
?>