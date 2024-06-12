<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailMapelModel extends Model
{
    protected $table = "detail_mapel";
    protected $primaryKey = "id_detail_mapel";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_detail_mapel', 'id_mapel', 'id_users', 'kelas_mapel', 'tahun_mapel', 'status'];

    public function update_status_mapel($iddetailmapel, $data)
    {
        // Lakukan update berdasarkan ID pengguna
        $this->db->where('iddetailmapel', $iddetailmapel);
        $this->db->update('status', 'tidak aktif');
        
        // Return nilai boolean untuk menandakan apakah update berhasil atau tidak
        return $this->db->affected_rows() > 0;
    }

    public function deleteMapel($id_detail_mapel)
    {
        return $this->delete($id_mapel);
    }
}