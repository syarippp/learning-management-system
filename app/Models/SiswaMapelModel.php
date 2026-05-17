<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaMapelModel extends Model
{
    protected $table = 'siswa_mapel';
    protected $primaryKey = 'id_siswa_mapel';
    protected $returnType = 'object';
    protected $allowedFields = ['id_siswa_mapel', 'id_users', 'id_detail_mapel'];

    public function getByUserId($id_users)
    {
        return $this->db->table($this->table)
            ->select('siswa_mapel.*, users.nama_lengkap, detail_mapel.kelas_mapel, detail_mapel.tahun_mapel, detail_mapel.status, mapel.nama_mapel')
            ->join('users', 'users.id_users = siswa_mapel.id_users')
            ->join('detail_mapel', 'detail_mapel.id_detail_mapel = siswa_mapel.id_detail_mapel')
            ->join('mapel', 'mapel.id_mapel = detail_mapel.id_mapel')
            ->where('siswa_mapel.id_users', $id_users)
            ->get()
            ->getResult();
    }

    public function getDetailMapelByUser($id_users)
    {
        return $this->db->table('siswa_mapel')
            ->select('siswa_mapel.*, detail_mapel.kelas_mapel, detail_mapel.tahun_mapel, mapel.nama_mapel, detail_mapel.status')
            ->join('detail_mapel', 'siswa_mapel.id_detail_mapel = detail_mapel.id_detail_mapel')
            ->join('mapel', 'detail_mapel.id_mapel = mapel.id_mapel')
            ->where('siswa_mapel.id_users', $id_users)
            ->get()
            ->getResult();
    }
}
