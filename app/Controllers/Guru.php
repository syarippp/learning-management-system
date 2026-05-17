<?php

namespace App\Controllers;
use App\Models\GuruModel;
use App\Models\UserModel;
use App\Models\DetailMapelModel;
use App\Models\MapelModel;
use App\Models\MateriMapelModel; 
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\NilaiModel;
use App\Models\ProgressModel;
use App\Models\GuruMapelModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    $session = session();
    $id_users = $session->get('id_users');

    $guruModel = new GuruModel();
    $guruMapelModel = new \App\Models\GuruMapelModel();

    // ✅ Hitung jumlah mapel yang di-assign ke guru login
    $jumlah_mapel = $guruMapelModel
        ->where('id_users', $id_users)
        ->countAllResults();

    $data['jumlah_mapel']    = $jumlah_mapel;
    $data['materi_mapel']    = $guruModel->countActiveMateriMapels();
    $data['total_kelas10']   = $guruModel->countActiveSiswaKelas10();
    $data['total_kelas11']   = $guruModel->countActiveSiswaKelas11();
    $data['total_kelas12']   = $guruModel->countActiveSiswaKelas12();

    $header = view('guru/template/header');
    $mainContent = view('guru/index', $data);
    $footer = view('guru/template/footer');
    $fullView = $header . $mainContent . $footer;

    return $this->response->setBody($fullView);
}


    public function export_pdf()
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

        $id_dm = $this->request->getGet('id_dm');
        $id_mat = $this->request->getGet('id_mat');
        $id_materi_mapel = $this->request->getGet('id_mat');
        $data['kelas'] = $this->request->getGet('kelas');
        $NilaiModel = new NilaiModel();
        $MateriMapelModel = new MateriMapelModel();
        $data['lihat_nilai'] = $NilaiModel->LihatNilai();
        $data['id_dm'] = $id_dm;
        $data['id_mat'] = $id_mat;
        $data['pertemuan'] = $MateriMapelModel->getMateriMapelById($id_materi_mapel);

        $html = view('guru/lihat_nilai_pdf', $data);

        $dompdfOptions = new Options();
        $dompdfOptions->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($dompdfOptions);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Lihat_Nilai.pdf', array('Attachment' => 0));
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
        if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumlogin', '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button> <strong>Belum Login</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to("login");
        }

        $session = session();
        $id_users = $session->get('id_users');

        $guruMapelModel = new \App\Models\GuruMapelModel();
        $data['mapel_user'] = $guruMapelModel->getDetailMapelByUser($id_users); // update di sini

        $data['id'] = $this->request->getGet('id');

        return view('guru/template/header')
            . view('guru/detail_mapel', $data)
            . view('guru/template/footer');
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
        $data['getsiswa'] = $UserModel->getSiswaByKelas();
        $data['kelas'] = $this->request->getGet('kelas');
        $data['id'] = $this->request->getGet('id');

        $header = view('guru/template/header');
        $mainContent = view('guru/data_siswa', $data);
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
        $data['id'] = $this->request->getGet('id');

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
        $MateriMapelModel = new MateriMapelModel();
        $data['detail_mapel'] = $guruModel->getDetailMapel();
        $data['pertemuan'] = $guruModel->getPertemuanMapel();
        $data['id_dm'] = $this->request->getGet('id_dm');
        $data['id'] = $this->request->getGet('id');

        $header = view('guru/template/header');
        $mainContent = view('guru/akses_mapel', $data);
        $footer = view('guru/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
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

    public function lihat_nilai()
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

        $NilaiModel = new NilaiModel();
        $ProgressModel = new ProgressModel();

        $data['lihat_nilai'] = $NilaiModel->LihatNilai();
        $data['lihat_progress'] = $ProgressModel->LihatProgress();
        $data['id_dm'] = $this->request->getGet('id_dm');
        $data['id_mat'] = $this->request->getGet('id_mat');

        $header = view('guru/template/header');
        $mainContent = view('guru/lihat_nilai', $data);
        $footer = view('guru/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    } 

    public function buat_posttest()
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
        $data['per'] = $guruModel->getPert();
        $data['id_dm'] = $this->request->getGet('id_dm');
        // print_r($data['detail_mapel']);

        $header = view('guru/template/header');
        $mainContent = view('guru/buat_posttest', $data);
        $footer = view('guru/template/footer');
        $fullView = $header . $mainContent . $footer;

        return $this->response->setBody($fullView);
    }

    public function proses_posttest() {
        $Pertanyaan = new Pertanyaan();
        $Jawaban = new Jawaban();
        $MateriMapelModel = new MateriMapelModel();
        $session = session();
        $id_mat = $this->request->getGet('id_mat');
        $id_dm = $this->request->getGet('id_dm');
        $update_ada_posttest = $MateriMapelModel->find($id_mat);

        // Inisialisasi variabel untuk menyimpan status hasil insert
        $insertPertanyaanSuccess = true;
        $pertanyaanIds = [];

        // Loop untuk menyisipkan setiap pertanyaan
        for ($i = 1; $i <= 10; $i++) {
            $pertanyaan = $this->request->getPost("pertanyaan$i");
            $result = $Pertanyaan->insert([
                'id_materi_mapel' => $id_mat,
                'pertanyaan' => $pertanyaan
            ]);

            // Jika ada kegagalan dalam insert, set flag menjadi false
            if ($result) {
                $pertanyaanIds[$i] = $Pertanyaan->insertID(); // Asumsi Pertanyaan->insertID() mengembalikan ID dari pertanyaan yang baru disisipkan
            } else {
                $insertPertanyaanSuccess = false;
                break;
            }
        }

        // Jika semua pertanyaan berhasil disisipkan, lanjut ke jawaban
        if ($insertPertanyaanSuccess) {
            $insertJawabanSuccess = true;
            $options = ['a', 'b', 'c', 'd']; // Huruf untuk opsi jawaban

            for ($p = 1; $p <= 10; $p++) {
                for ($i = 0; $i < 4; $i++) {
                    $option = $options[$i];
                    $jawaban = $this->request->getPost("jawaban_{$p}{$option}");
                    $value = ($this->request->getPost("jawabanbenar_$p") == ($i + 1)) ? TRUE : FALSE;

                    $result = $Jawaban->insert([
                        'id_pertanyaan' => $pertanyaanIds[$p],
                        'jawaban' => $jawaban,
                        'value' => $value
                    ]);

                    // Jika ada kegagalan dalam insert jawaban, set flag menjadi false dan break
                    if (!$result) {
                        $insertJawabanSuccess = false;
                        break 2; // Break kedua loop
                    }
                }
            }

            if ($insertJawabanSuccess) {
                // Update the fetched record's data and save it
                $update_ada_posttest->post_test = "Ada";
                $MateriMapelModel->save($update_ada_posttest);

                $session->setFlashdata('berhasilbuat_posttest', '<div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    aria-hidden="true">&times;</button> 
                                                    <strong>Selamat!</strong> Post Test berhasil dibuat.</div>');
                return redirect()->to("guru/akses_mapel?id_dm=".$id_dm);
            }
        }

        // Jika ada kegagalan, tampilkan pesan error
        $session->setFlashdata('gagalbuat_posttest', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Maaf! Post Test Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                        </div>');
        return redirect()->to("guru/mapel");
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
    $guruMapelModel = new \App\Models\GuruMapelModel(); // Pastikan model ini sudah ada

    $id_mapel = $this->request->getPost("id_mapel");
    $id_users = $this->request->getPost("id_users");
    $kelas_mapel = $this->request->getPost("kelas_mapel");
    $tahun_mapel = $this->request->getPost("tahun_mapel");

    $dataDetail = [
        'id_mapel'     => $id_mapel,
        'id_users'     => $id_users,
        'kelas_mapel'  => $kelas_mapel,
        'tahun_mapel'  => $tahun_mapel,
        'status'       => "aktif"
    ];

    $result = $detailmapelModel->insert($dataDetail);

    if ($result) {
        // Ambil ID detail mapel yang baru saja ditambahkan
        $id_detail_mapel = $detailmapelModel->getInsertID();

        // Simpan ke tabel guru_mapel
        $guruMapelModel->insert([
            'id_users' => $id_users,
            'id_detail_mapel' => $id_detail_mapel
        ]);

        $session = session();
        $session->setFlashdata('berhasiltambahdetailmapel', '
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
                <strong>Selamat!</strong> Mapel baru dan assign guru berhasil ditambahkan.
            </div>
        ');
        return redirect()->to($this->request->getServer('HTTP_REFERER'));
    } else {
        $session = session();
        $session->setFlashdata('gagalbuatakun', '
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon-line-lock"></i>Maaf! Gagal menambahkan data. Silakan coba lagi.
            </div>
        ');
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
    $waktu_post_test = $this->request->getPost('waktu_post_test'); // ✅ Ambil dari input form

    // Array untuk menyimpan data yang akan diupdate
    $data = [
        'pendahuluan' => $pendahuluan,
        'video_materi' => $video_materi,
        'waktu_post_test' => $waktu_post_test // ✅ Masukkan ke array untuk update
    ];

    // Periksa apakah ada file yang diupload
    if ($file_materi && $file_materi->isValid() && !$file_materi->hasMoved()) {
        // Validasi tipe file (misalnya hanya PDF)
        if ($file_materi->getClientMimeType() == 'application/pdf') {
            $newName = $file_materi->getRandomName();
            if ($file_materi->move(FCPATH . 'pdf', $newName)) {
                $data['materi'] = $newName;
            } else {
                log_message('error', 'Failed to move the file to destination');
                return redirect()->back()->with('error', 'Gagal memindahkan file.');
            }
        } else {
            return redirect()->back()->with('error', 'File harus berupa PDF.');
        }
    }

    // Update data di database
    if ($MateriMapelModel->update($id_mat, $data)) {
        session()->setFlashdata('berhasilupdatemapel', '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon-line-lock"></i><b>Selamat!</b> Materi pertemuan ini berhasil di update.
        </div>');
        return redirect()->back()->with('success', 'Materi berhasil diupdate.');
    } else {
        return redirect()->back()->with('error', 'Gagal mengupdate data.');
    }
}


    public function updateJawaban($dataJawaban)
    {
        // Model instance untuk Jawaban
        $Jawaban = new Jawaban();

        // Iterasi melalui array data jawaban
        foreach ($dataJawaban as $jawaban) {
            // Panggil metode update dari model Jawaban
            $result = $Jawaban->update(
                // ID jawaban yang akan diperbarui
                $jawaban['id_jawaban'],
                // Data jawaban baru yang akan diupdate
                [
                    'jawaban' => $jawaban['jawaban'], // teks jawaban baru
                    'value' => $jawaban['value'] // nilai jawaban baru
                ]
            );

            // Periksa apakah pembaruan berhasil
            if (!$result) {
                // Jika gagal, keluarkan pesan kesalahan
                echo "Gagal memperbarui jawaban dengan ID: " . $jawaban['id_jawaban'];
                exit;
            }
        }
    }

    

    public function edit_posttest()
    {
        // Model instances
        $Pertanyaan = new Pertanyaan();
        $Jawaban = new Jawaban();

        $id_dm = $this->request->getGet('id_dm');
        $id_mat = $this->request->getGet('id_mat');

        // Array untuk menyimpan data pertanyaan dan jawaban
        $pertanyaanData = [];
        $jawabanData = [];

        // Kumpulkan dan validasi data pertanyaan (10 pertanyaan)
        for ($i = 0; $i < 10; $i++) {
            $idPertanyaan = $this->request->getPost('idp' . $i);
            $pertanyaanText = $this->request->getPost('pertanyaan' . $i);

            if ($idPertanyaan && $pertanyaanText) {
                $pertanyaanData[] = [
                    'id_pertanyaan' => $idPertanyaan,
                    'pertanyaan' => $pertanyaanText
                ];
            }
        }

        // Kumpulkan dan validasi data jawaban (40 jawaban, 4 jawaban untuk setiap 10 pertanyaan)
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $idJawaban = $this->request->getPost('idj' . ($i * 4 + $j));
                $jawabanText = $this->request->getPost('jawaban_' . $i . chr(97 + $j)); // chr(97) adalah 'a', chr(98) adalah 'b', dst.
                $isCorrect = ($this->request->getPost('jawabanbenar_' . $i) == $j) ? 1 : 0;

                if ($idJawaban && $jawabanText) {
                    $jawabanData[] = [
                        'id_jawaban' => $idJawaban,
                        'jawaban' => $jawabanText,
                        'value' => $isCorrect
                    ];
                }
            }
        }

        // Update pertanyaan di database
        foreach ($pertanyaanData as $data) {
            $updateResult = $Pertanyaan->update($data['id_pertanyaan'], ['pertanyaan' => $data['pertanyaan']]);
            if (!$updateResult) {
                echo "Gagal memperbarui pertanyaan dengan ID: " . $data['id_pertanyaan'];
                exit;
            }
        }

        // Update jawaban di database
        $this->updateJawaban($jawabanData);

        $session = session();
        $session->setFlashdata('berhasileditposttest', '<div class="alert alert-success alert-dismissible fade show">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
            <strong>Berhasil!</strong> Soal berhasil diperbarui.
        </div>');


        // Redirect setelah update berhasil
        return redirect()->to("guru/lihat_posttest?id_mat=".$id_mat."&id_dm=".$id_dm);
    }

    public function hapus_posttest()
    {
        // Ambil nilai id_materi_mapel dari request
        $id_materi_mapel = $this->request->getGet('id_mat');
        $id_dm = $this->request->getGet('id_dm');

        // Buat instance dari model Pertanyaan
        $Pertanyaan = new Pertanyaan();
        $MateriMapelModel = new MateriMapelModel();

        // Cari semua pertanyaan yang memiliki id_materi_mapel
        $pertanyaanList = $Pertanyaan->where('id_materi_mapel', $id_materi_mapel)->findAll();

        $update_ada_posttest = $MateriMapelModel->find($id_materi_mapel);

        $data = [
            'post_test' => "Tidak Ada"
        ];

        if (!empty($pertanyaanList)) {
            // Hapus semua pertanyaan yang memiliki id_materi_mapel
            $Pertanyaan->where('id_materi_mapel', $id_materi_mapel)->delete();

            $MateriMapelModel->update($id_materi_mapel, $data);

            $update_ada_posttest->post_test = "Tidak Ada";
            // $MateriMapelModel->save($update_ada_posttest);

            // Set session flashdata untuk menampilkan pesan sukses
            $session = session();
            $session->setFlashdata('berhasilhapusposttest', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Selamat!</strong> Post Test berhasil di hapus.</div>');

            return redirect()->to("guru/akses_mapel?id_dm=".$id_dm);
        } else {
            // Jika tidak ada pertanyaan yang ditemukan, arahkan kembali ke halaman sebelumnya
            $referer = $this->request->getServer('HTTP_REFERER');
            return redirect()->to($referer);
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

//     public function buatkan_soal()
// {
//     $materi = $this->request->getPost('materi');
//     $prompt = $prompt = "Buatkan 1 soal pilihan ganda tentang materi berikut:\n\n" . strip_tags($materi) . "\n\n" .
//     "Format soal:\n" .
//     "1. Pertanyaan?\n" .
//     "A. Pilihan A\n" .
//     "B. Pilihan B\n" .
//     "C. Pilihan C\n" .
//     "D. Pilihan D\n" .
//     "Jawaban: A\n\n" .
//     "Pastikan hanya ada 4 pilihan A-D saja, tanpa E atau F.";

//     $payload = json_encode([
//         "model" => "gemma3:1b",
//         "prompt" => $prompt,
//         "stream" => false
//     ]);

//     $ch = curl_init('http://localhost:11434/api/generate');
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//         'Content-Type: application/json',
//         'Content-Length: ' . strlen($payload)
//     ]);

//     $result = curl_exec($ch);
//     curl_close($ch);

//     $response = json_decode($result, true);

//     return $this->response->setJSON([
//         'soal' => $response['response'] ?? 'Gagal menghasilkan soal'
//     ]);
// }

public function buatkan_soal()
{
    helper('groq');

    try {
        $materi        = $this->request->getPost('materi');
        $id_mat        = $this->request->getPost('id_mat');
        $jumlah_soal   = $this->request->getPost('jumlah_soal') ?? 5;
        $waktu_post_test = $this->request->getPost('waktu_post_test') ?? 30; // 🆕 Ambil input waktu pengerjaan

        if (empty($materi) || empty($id_mat)) {
            return $this->response->setJSON([
                'jumlah' => 0,
                'error' => 'Materi atau ID materi kosong.'
            ]);
        }

        $output = generateSoalDariGroq($materi, $jumlah_soal, $waktu_post_test);
        file_put_contents(WRITEPATH . 'logs/output_terbaru.txt', $output);
        $jumlah = count($this->parseSoal($output, $id_mat));

        // 🆕 Simpan waktu pengerjaan ke tabel materi_mapel
        $db = \Config\Database::connect();
        $db->table('materi_mapel')
           ->where('id_materi_mapel', $id_mat)
           ->update([
               'post_test' => 'Ada',
               'waktu_post_test' => $waktu_post_test // ✅ hanya ini ditambahkan
           ]);

        return $this->response->setJSON([
            'jumlah'  => $jumlah,
            'message' => "$jumlah soal berhasil dibuat dan disimpan ke database.",
            'preview' => substr($output, 0, 300)
        ]);

    } catch (\Throwable $e) {
        return $this->response->setJSON([
            'jumlah' => 0,
            'error'  => $e->getMessage(),
            'line'   => $e->getLine(),
            'file'   => $e->getFile()
        ]);
    }
}




private function parseSoal($text, $id_mat)
{
    $db = \Config\Database::connect();
    $pertanyaanModel = $db->table('pertanyaan');
    $jawabanModel = $db->table('jawaban');

    $soal_blocks = preg_split('/\n(?=\d+\.\s)/', trim($text));
    $inserted = [];

    foreach ($soal_blocks as $block) {
        $lines = explode("\n", trim($block));
        if (count($lines) < 3) continue;

        $pertanyaan = '';
        $opsi = [];
        $jawaban_benar_huruf = '';
        $jawaban_benar_isi = '';

        // Ambil pertanyaan (baris pertama)
        $pertanyaan = trim(preg_replace('/^\d+\.\s*/', '', array_shift($lines)));
        
        // Proses sisa baris
        foreach ($lines as $line) {
            if (preg_match('/^([A-D])\)\s+(.*)/', trim($line), $match)) {
                $opsi[$match[1]] = trim($match[2]);
            } elseif (preg_match('/^Jawaban:\s*([A-D])\)\s+(.*)/', trim($line), $match)) {
                $jawaban_benar_huruf = $match[1];
                $jawaban_benar_isi = trim($match[2]);
            }
        }
        file_put_contents(WRITEPATH . 'logs/soal.txt', $pertanyaan.'---'.count($opsi).$jawaban_benar_huruf);
        
        if ($pertanyaan && count($opsi) >= 2 && $jawaban_benar_huruf && isset($opsi[$jawaban_benar_huruf])) {
            // Simpan pertanyaan
            $pertanyaanModel->insert([
                'id_materi_mapel' => $id_mat,
                'pertanyaan' => $pertanyaan
            ]);

            $id_pertanyaan = $db->insertID();

            // Simpan jawaban
            foreach ($opsi as $huruf => $isi) {
                $jawabanModel->insert([
                    'id_pertanyaan' => $id_pertanyaan,
                    'jawaban' => $isi,
                    'value' => ($huruf == $jawaban_benar_huruf) ? 1 : 0
                ]);
            }

            $inserted[] = $pertanyaan;
        }
    }
    return $inserted;
}


    // public function hapus_mapel()
    // {
    //     $id_mapel = $this->request->getGet('id_mapel');

    //     $MapelModel = new MapelModel();
    //     $mm = $MapelModel->find($id_mapel);

    //     if ($mm) {
    //         $MapelModel->delete($id_mapel);
    //         $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
    //         return redirect()->to($referer); // Arahkan kembali ke URL referer
    //     } else {
    //         // Service not found, redirect or display an error message
    //         return redirect()->to('guru/index')->with('error', 'Service not found');
    //     }
    // }

    
    public function goBack()
    {
        $referer = $this->request->getServer('HTTP_REFERER'); // Simpan URL referer
            return redirect()->to($referer); // Arahkan kembali ke URL referer
    }
}