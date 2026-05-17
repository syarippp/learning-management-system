<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_users";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_users', 'nisn', 'username', 'nama_lengkap', 'password', 'level', 'nama_lengkap', 'alamat', 'kelas', 'no_hp', 'profil_picture'];

    public function getGuru(){
        return $this->db->table('users')
            ->where('level', 'guru')
            ->get()
            ->getResult();
    }

    public function getActiveMapels()
    {
        return $this->db->table('mapel')
            ->get()
            ->getResult();
    }

    public function getGuruWithID()
    {
        $id_users = $_GET['id_users'] ?? null;

        return $this->db->table('users')
            ->where('id_users', $id_users)
            ->get()
            ->getResult();
    }

    public function getSiswaWithID()
    {
        $id_users = $_GET['id_users'] ?? null;

        return $this->db->table('users')
            ->where('id_users', $id_users)
            ->get()
            ->getResult();
    }

    public function getDataUsers()
    {
        return $this->db->table('users')
            ->where('id_users', session('id_users'))
            ->get()
            ->getResult();
    }

    public function countActiveMapels()
    {
        return $this->db->table('mapel')
            ->countAllResults();
    }

    public function countActiveMateriMapels()
    {
        return $this->db->table('materi_mapel')
            ->countAllResults();
    }

    public function countActiveSiswaKelas10()
    {
        return $this->db->table('users')
            ->groupStart()
                ->where('kelas', 'X TKJ 1')
                ->orWhere('kelas', 'X TKJ 2')
                ->orWhere('kelas', 'X TKJ 3')
                ->orWhere('kelas', 'X TKJ 4')
                ->orWhere('kelas', 'X DKV 1')
                ->orWhere('kelas', 'X DKV 2')
                ->orWhere('kelas', 'X DKV 3')
                ->orWhere('kelas', 'X DKV 4')
                ->orWhere('kelas', 'X TKR 1')
                ->orWhere('kelas', 'X TKR 2')
                ->orWhere('kelas', 'X TKR 3')
                ->orWhere('kelas', 'X TKR 4')
                ->orWhere('kelas', 'X TSM 1')
                ->orWhere('kelas', 'X TSM 2')
                ->orWhere('kelas', 'X TSM 3')
                ->orWhere('kelas', 'X OTR 1')
                ->orWhere('kelas', 'X OTR 2')
                ->orWhere('kelas', 'X OTR 3')
                ->orWhere('kelas', 'X TP 1')
                ->orWhere('kelas', 'X TP 2')
                
            ->groupEnd()
            ->countAllResults();
    }

    public function countActiveSiswaKelas11()
    {
        return $this->db->table('users')
            ->groupStart()
                ->where('kelas', 'XI TKJ 1')
                ->orWhere('kelas', 'XI TKJ 2')
                ->orWhere('kelas', 'XI TKJ 3')
                ->orWhere('kelas', 'XI TKJ 4')
                ->orWhere('kelas', 'XI DKV 1')
                ->orWhere('kelas', 'XI DKV 2')
                ->orWhere('kelas', 'XI DKV 3')
                ->orWhere('kelas', 'XI DKV 4')
                ->orWhere('kelas', 'XI TKR 1')
                ->orWhere('kelas', 'XI TKR 2')
                ->orWhere('kelas', 'XI TKR 3')
                ->orWhere('kelas', 'XI TKR 4')
                ->orWhere('kelas', 'XI TSM 1')
                ->orWhere('kelas', 'XI TSM 2')
                ->orWhere('kelas', 'XI TSM 3')
                ->orWhere('kelas', 'XI OTR 1')
                ->orWhere('kelas', 'XI OTR 2')
                ->orWhere('kelas', 'XI OTR 3')
                ->orWhere('kelas', 'XI TP 1')
                ->orWhere('kelas', 'XI TP 2')
            ->groupEnd()
            ->countAllResults();
    }

    public function countActiveSiswaKelas12()
    {
        return $this->db->table('users')
            ->groupStart()
                ->where('kelas', 'XII TKJ 1')
                ->orWhere('kelas', 'XII TKJ 2')
                ->orWhere('kelas', 'XII TKJ 3')
                ->orWhere('kelas', 'XII TKJ 4')
                ->orWhere('kelas', 'XII DKV 1')
                ->orWhere('kelas', 'XII DKV 2')
                ->orWhere('kelas', 'XII DKV 3')
                ->orWhere('kelas', 'XII DKV 4')
                ->orWhere('kelas', 'XII TKR 1')
                ->orWhere('kelas', 'XII TKR 2')
                ->orWhere('kelas', 'XII TKR 3')
                ->orWhere('kelas', 'XII TKR 4')
                ->orWhere('kelas', 'XII TSM 1')
                ->orWhere('kelas', 'XII TSM 2')
                ->orWhere('kelas', 'XII TSM 3')
                ->orWhere('kelas', 'XII OTR 1')
                ->orWhere('kelas', 'XII OTR 2')
                ->orWhere('kelas', 'XII OTR 3')
                ->orWhere('kelas', 'XII TP 1')
                ->orWhere('kelas', 'XII TP 2')
            ->groupEnd()
            ->countAllResults();
    }

    public function getMapel()
    {
        $id_mapel = $_GET['id'] ?? null;
        $session = session();

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('detail_mapel')
                        ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
                        ->where('detail_mapel.id_mapel', $id_mapel)
                        ->join('users', 'detail_mapel.id_users = users.id_users')
                        ->where('users.id_users', $session->id_users)
                        ->get()
                        ->getResult();
        } else {
            return null;
        }
    }

    // public function getNamaPengajar()
    // {
    //     $id_mapel = $_GET['id'] ?? null;
    //     $session = session();
        
    //     if ($id_mapel !== null && is_numeric($id_mapel)) {
    //         return $this->db->table('detail_mapel')
    //                     ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
    //                     ->where('detail_mapel.id_mapel', $id_mapel)
    //                     ->join('users', 'detail_mapel.id_users = users.id_users')
    //                     ->where('users.id_users', $session->id_users)
    //                     ->get()
    //                     ->getFirstRow(); // Mengambil hanya satu hasil
    //     } else {
    //         return null;
    //     }
    // }

    public function getMapelNama()
    {
        $id_mapel = $_GET['id'] ?? null;

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('mapel')
                        ->where('id_mapel', $id_mapel)
                        ->get()
                        ->getResult();
        } else {
            return null;
        }
    }

    public function getDetailMapel()
    {
        $id_mapel = $_GET['id_dm'] ?? null;

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('detail_mapel')
                ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
                ->where('detail_mapel.id_detail_mapel', $id_mapel)
                ->get()
                ->getResult();
        } else {
            return null;
        }
    }

    public function getPertemuanMapel()
    {
        $id_mapel = $_GET['id_dm'] ?? null;

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('materi_mapel')
                ->where('id_detail_mapel', $id_mapel)
                ->get()
                ->getResult();
        } else {
            return null;
        }
    }

    public function getPert()
    {
        $id_mat = $_GET['id_mat'] ?? null;

        if ($id_mat !== null && is_numeric($id_mat)) {
            return $this->db->table('materi_mapel')
                ->where('id_materi_mapel', $id_mat)
                ->get()
                ->getResult();
        } else {
            return null;
        }
    }

    public function getOnlyGuru()
    {
    return $this->where('level', 'guru')->findAll();  // Ambil semua user yang level-nya guru
    }


    public function getMateriMapel()
    {
        $id_mapel = $_GET['id_dm'] ?? null;
        $id_mat = $_GET['id_mat'] ?? null;

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('materi_mapel')
                ->where('id_detail_mapel', $id_mapel)
                ->where('id_materi_mapel', $id_mat)
                ->get()
                ->getResult();
        } else {
            return null;
        }
    }
}