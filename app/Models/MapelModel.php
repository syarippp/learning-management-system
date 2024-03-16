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

    public function deleteMapel($id_mapel)
    {
        return $this->delete($id_mapel);
    }
}