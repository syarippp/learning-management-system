<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgressModel extends Model
{
    protected $table = "progress";
    protected $primaryKey = "id_progress";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_progress', 'id_users', 'id_materi_mapel', 'pendahuluan', 'video', 'materi', 'nilai_post_test'];

    public function getProgress($id_users, $id_mat)
    {
        $query = $this->db->table('progress')
                          ->where('id_materi_mapel', $id_mat)
                          ->where('id_users', $id_users)
                          ->get();
        return $query->getResult();
    }

    public function getNilai($id_users, $id_mat)
    {
        $query = $this->db->table('progress')
                          ->where('id_materi_mapel', $id_mat)
                          ->where('id_users', $id_users)
                          ->get();
        return $query->getRow(); // Menggunakan getRow() karena kita hanya ingin satu baris saja
    }

    public function insertIfNull($id_users, $id_mat)
    {
        // Check if record already exists
        $existingRecord = $this->getNilai($id_users, $id_mat);

        if (!$existingRecord) {
            // Insert new record
            $data = [
                'id_users' => $id_users,
                'id_materi_mapel' => $id_mat,
                'pendahuluan' => 0,
                'video' => 0,
                'materi' => 0,
                'nilai_post_test' => 0
            ];

            $this->insert($data);
        }
    }
}
