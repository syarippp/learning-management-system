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
        return $this->db->table('detail_mapel')
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
        	->where('kelas', '10')
            ->countAllResults();
    }

    public function countActiveSiswaKelas11()
    {
        return $this->db->table('users')
        	->where('kelas', '11')
            ->countAllResults();
    }

    public function countActiveSiswaKelas12()
    {
        return $this->db->table('users')
        	->where('kelas', '12')
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