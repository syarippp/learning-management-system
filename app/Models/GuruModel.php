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
}