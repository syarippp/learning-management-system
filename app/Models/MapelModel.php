<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = "mapel";
    protected $primaryKey = "id_mapel";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_mapel', 'nama_mapel'];

    public function getMapel()
    {
        return $this->db->table('mapel')
            ->get()
            ->getResult();
    }

    public function getMapelWithID()
    {
    	$id_mapel = $_GET['id_mapel'] ?? null;

        return $this->db->table('mapel')
            ->where('id_mapel', $id_mapel)
            ->get()
            ->getResult();
    }
    

    public function deleteMapel($id_mapel)
    {
        return $this->delete($id_mapel);
    }
}