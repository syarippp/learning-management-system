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

    public function getActiveMapels()
    {
        // Menambahkan alias unik untuk menghindari konflik
        return $this->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
                    ->join('users', 'detail_mapel.id_users = users.id_users')
                    ->where('detail_mapel.kelas_mapel', session('kelas'))
                    ->where('detail_mapel.status', 'aktif')
                    ->get() 
                    ->getResult();
    }

    public function getActiveMapels_count()
    {
        return $this->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
                    ->where('detail_mapel.kelas_mapel', session('kelas'))
                    ->where('detail_mapel.status', 'aktif')
                    ->countAllResults();
    }

    public function update_status_mapel($iddetailmapel, $data)
    {
        // Menggunakan method yang tepat untuk update
        return $this->where('id_detail_mapel', $iddetailmapel)
                    ->set('status', $data['status'])
                    ->update();
    }

    public function deleteMapel($id_detail_mapel)
    {
        // Menggunakan parameter yang benar untuk delete
        return $this->delete($id_detail_mapel);
    }
}
