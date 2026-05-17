<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruMapelModel extends Model
{
    protected $table = "guru_mapel";
    protected $primaryKey = "id_guru_mapel";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_guru_mapel', 'id_users', 'id_detail_mapel'];

    public function getByUserId($id_users)
    {
        return $this->where('id_users', $id_users)->findAll();
    }

    public function getDetailMapelByUser($id_users)
    {
        return $this->db->table('guru_mapel')
            ->select('guru_mapel.*, detail_mapel.kelas_mapel, detail_mapel.tahun_mapel, mapel.nama_mapel, detail_mapel.status')
            ->join('detail_mapel', 'guru_mapel.id_detail_mapel = detail_mapel.id_detail_mapel')
            ->join('mapel', 'detail_mapel.id_mapel = mapel.id_mapel')
            ->where('guru_mapel.id_users', $id_users)
            ->get()
            ->getResult();
    }

    public function getAssignedGuru()
{
    return $this->db->table('guru_mapel')
        ->join('users', 'guru_mapel.id_users = users.id_users')
        ->join('detail_mapel', 'guru_mapel.id_detail_mapel = detail_mapel.id_detail_mapel')
        ->join('mapel', 'detail_mapel.id_mapel = mapel.id_mapel')
        ->select('guru_mapel.*, users.nama_lengkap, mapel.nama_mapel, detail_mapel.kelas_mapel, detail_mapel.tahun_mapel')
        ->get()
        ->getResult();
}

    public function countMapelByGuru($id_users)
{
    return $this->db->table('guru_mapel')
        ->where('id_users', $id_users)
        ->countAllResults();
}


}   