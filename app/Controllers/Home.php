<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
	protected $session;
    protected $db;

    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function daftar(): string
    {
        return view('daftar');
    }

    public function create() {
      $usermodel = new UserModel();

      $plainPassword = $this->request->getPost("password");
      $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

      $result = $usermodel->insert([
         'username'=>$this->request->getPost("username"),
         'password'=> $hashedPassword,
         'level' => 'siswa'
      ]);

      if($result==true) {
            $session = session();
            $session->setFlashdata('berhasilbuatakun', '<div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Selamat! Akun Berhasil Dibuat.<br>Silahkan Login.</a>
                        </div>');
            return redirect()->to("login");
        }else{
            $session = session();
            $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                        </div>');
            return redirect()->to("login");
        }

   }

   public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('login'));
    }

    public function masuk()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                if ($dataUser->level == 'admin') {
                    session()->set([
                        'username' => $dataUser->username,
                        'level' => $dataUser->level,
                        'id_users' => $dataUser->id_users,
                        'nama_lengkap' => $dataUser->nama_lengkap,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('admin/index'));
                } elseif ($dataUser->level == 'guru') {
                    session()->set([
                        'username' => $dataUser->username,
                        'level' => $dataUser->level,
                        'id_users' => $dataUser->id_users,
                        'nama_lengkap' => $dataUser->nama_lengkap,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('guru/index'));
                } elseif ($dataUser->level == 'siswa') {
                    session()->set([
                        'username' => $dataUser->username,
                        'level' => $dataUser->level,
                        'id_users' => $dataUser->id_users,
                        'nama_lengkap' => $dataUser->nama_lengkap,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('siswa/index'));
                }
                 else {
                    $session = session();
                    // Invalid user level
                    session()->setFlashdata('error', 'Invalid user level');
                    return redirect()->to(base_url('login'));
                }
            } else {
                $session = session();
                $session->setFlashdata('salahpw', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Username / Password Salah!</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
                return redirect()->to(base_url('login'));
            }
        } else {
            $session = session();
            $session->setFlashdata('salahpw', '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                        </button> <strong>Username / Password Salah!</strong> <br><font style="font-size: 12px;">Silahkan Masukkan Username & Password Yang Benar.</font></div>');
            return redirect()->to(base_url('login'));
        }        
    }
}
