<?php

namespace App\Models;

use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_users";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nis', 'id_users', 'username', 'password', 'level', 'alamat', 'kelas', 'no_hp', 'nama_lengkap'];

    

    public function getDataUsers()
    {
        return $this->db->table('users')
            ->where('id_users', session('id_users'))
            ->get()
            ->getResult();
    }

    public function getSiswa(){
        return $this->db->table('users')
            ->where('level', 'siswa')
            ->get()
            ->getResult();
    }

    public function getSiswa10(){
        return $this->db->table('users')
            ->where('level', 'siswa')
            ->whereIn('kelas', ['X TKJ 1', 'X TKJ 2', 'X TKJ 3', 'X TKJ 4','X DKV 1', 'X DKV 2', 'X DKV 3', 'X DKV 4','X TKR 1', 'X TKR 2', 'X TKR 3', 'X TKR 4','X TSM 1', 'X TSM 2', 'X TSM 3','X OTR 1', 'X OTR 2', 'X OTR 3','X TP 1', 'X TP 2'])
            ->get()
            ->getResult();
    }

    public function getSiswa11(){
        return $this->db->table('users')
            ->where('level', 'siswa')
            ->whereIn('kelas', ['XI TKJ 1', 'XI TKJ 2', 'XI TKJ 3', 'XI TKJ 4','XI DKV 1', 'XI DKV 2', 'XI DKV 3', 'XI DKV 4','XI TKR 1', 'XI TKR 2', 'XI TKR 3', 'XI TKR 4','XI TSM 1', 'XI TSM 2', 'XI TSM 3','XI OTR 1', 'XI OTR 2', 'XI OTR 3','XI TP 1', 'XI TP 2'])
            ->get()
            ->getResult();
    }

    public function getSiswa12(){
        return $this->db->table('users')
            ->where('level', 'siswa')
            ->whereIn('kelas', ['XII TKJ 1', 'XII TKJ 2', 'XII TKJ 3', 'XII TKJ 4','XII DKV 1', 'XII DKV 2', 'XII DKV 3', 'XII DKV 4','XII TKR 1', 'XII TKR 2', 'XII TKR 3', 'XII TKR 4','XII TSM 1', 'XII TSM 2', 'XII TSM 3','XII OTR 1', 'XII OTR 2', 'XII OTR 3','XII TP 1', 'XII TP 2'])
            ->get()
            ->getResult();
    }

    public function getSiswaByKelas(){
        $kelas = $_GET['kelas'] ?? null;

        return $this->db->table('users')
            ->where('level', 'siswa')
            ->where('kelas', $kelas)
            ->get()
            ->getResult();
    }

    // public function getMapel()
    // {
    //     $id_mapel = $_GET['id'] ?? null;

    //     if ($id_mapel !== null && is_numeric($id_mapel)) {
    //         return $this->db->table('detail_mapel')
    //                     ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
    //                     ->where('detail_mapel.status', 'aktif')
    //                     ->where('detail_mapel.kelas_mapel', session('kelas'))
    //                     ->where('detail_mapel.id_mapel', $id_mapel)
    //                     ->get()
    //                     ->getResult();
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

    public function getMapel()
    {
        $id_mapel = $_GET['id'] ?? null;
        $session = session();

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('detail_mapel')
                        ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
                        ->where('detail_mapel.id_mapel', $id_mapel)
                        ->where('detail_mapel.kelas_mapel', session('kelas'))
                        ->join('users', 'detail_mapel.id_users = users.id_users')
                        ->where('detail_mapel.status', 'aktif')
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

    public function getDetailMateri()
    {
        $id_mat = $_GET['id_mat'] ?? null;

        if ($id_mat !== null && is_numeric($id_mat)) {
            return $this->db->table('materi_mapel')
                ->join('detail_mapel', 'materi_mapel.id_detail_mapel = detail_mapel.id_detail_mapel')
                ->join('mapel', 'detail_mapel.id_mapel = mapel.id_mapel')
                ->where('materi_mapel.id_materi_mapel', $id_mat)
                ->get()
                ->getResult();
        }
        else {
            return null;
        }
    }

    public function countActiveMapels()
    {
        return $this->db->table('mapel')
            ->countAllResults();
    }
}