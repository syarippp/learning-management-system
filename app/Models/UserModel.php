<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_users";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_users', 'username', 'password', 'level', 'alamat', 'kelas', 'no_hp'];

     public function getActiveMapels()
    {
        return $this->db->table('mapel')
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

    public function getMapel()
    {
        $id_mapel = $_GET['id'] ?? null;

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('detail_mapel')
                        ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
                        ->where('detail_mapel.status', 'aktif')
                        ->where('detail_mapel.kelas_mapel', session('kelas'))
                        ->where('detail_mapel.id_mapel', $id_mapel)
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