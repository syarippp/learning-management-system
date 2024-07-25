<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = "nilai";
    protected $primaryKey = "id_nilai";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_nilai', 'id_users', 'id_materi_mapel', 'nilai'];

    public function getNilai($id_users)
    {
        $id_mat = $_GET['id_mat'] ?? null;

        $query = $this->db->table('nilai')
                          ->where('id_materi_mapel', $id_mat)
                          ->where('id_users', $id_users)
                          ->get();
        return $query->getResult();
    }

    public function LihatNilai()
    { 

        $id_dm = $_GET['id_dm'] ?? null;

        $query = $this->db->table('nilai')
                          ->join('users', 'nilai.id_users = users.id_users')
                          ->join('materi_mapel', 'nilai.id_materi_mapel = materi_mapel.id_materi_mapel')
                          ->join('detail_mapel', 'materi_mapel.id_detail_mapel = detail_mapel.id_detail_mapel')
                          ->join('mapel', 'detail_mapel.id_mapel = mapel.id_mapel')
                          ->where('detail_mapel.id_detail_mapel', $id_dm)
                          ->get();
        return $query->getResult();
    }

    public function countAttemptTest($id_users)
    {
        $id_mat = $_GET['id_mat'] ?? null;

        return $this->db->table('nilai')
                          ->where('id_materi_mapel', $id_mat)
                          ->where('id_users', $id_users)
                          ->countAllResults();
    }

}