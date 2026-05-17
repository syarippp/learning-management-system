<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriMapelModel extends Model
{
    protected $table = "materi_mapel";
    protected $primaryKey = "id_materi_mapel";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_materi_mapel', 'id_detail_mapel', 'pertemuan', 'pendahuluan', 'materi', 'video_materi', 'post_test','waktu_post_test'];


    public function countMateriMapel($id_detail_mapel)
    {
        return $this->db->table('materi_mapel')
            ->where('id_detail_mapel', $id_detail_mapel)
            ->countAllResults();
    }

    public function getMateriMapelById($id_materi_mapel)
    {
        return $this->find($id_materi_mapel);
    }

    public function getMateriMapel()
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
}