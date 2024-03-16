<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
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

        if ($id_mapel !== null && is_numeric($id_mapel)) {
            return $this->db->table('detail_mapel')
                        ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
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
}