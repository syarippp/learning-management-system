<?php

namespace App\Models;

use CodeIgniter\Model;

class Pertanyaan extends Model
{
    protected $table = "pertanyaan";
    protected $primaryKey = "id_pertanyaan";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_pertanyaan', 'id_materi_mapel', 'pertanyaan'];

    public function getPertanyaan()
    {
        $id_mat = $_GET['id_mat'] ?? null;

        return $this->db->table('pertanyaan')
            ->where('id_materi_mapel', $id_mat)
            ->get()
            ->getResult();
    }

    public function getJawabanByMateriMapel()
    {

        $id_mat = $_GET['id_mat'] ?? null;
        
        $query = $this->db->table('jawaban')
                        ->select('jawaban.id_jawaban, jawaban.id_pertanyaan, jawaban.jawaban, jawaban.value')
                        ->join('pertanyaan', 'jawaban.id_pertanyaan = pertanyaan.id_pertanyaan')
                        ->where('pertanyaan.id_materi_mapel', $id_mat)
                        ->get();

        return $query->getResultArray();
    }

    public function LihatJawaban()
    {
        $id_mat = $_GET['id_mat'] ?? null;

        return $this->db->table('pertanyaan')
            ->select('*')
            ->join('jawaban', 'pertanyaan.id_pertanyaan = jawaban.id_pertanyaan')
            ->where('pertanyaan.id_materi_mapel', $id_mat)
            ->get()
            ->getResult();
    }

    public function LihatPertanyaan()
    {
        $id_mat = $_GET['id_mat'] ?? null;

        return $this->db->table('pertanyaan')
            ->select('*')
            ->where('pertanyaan.id_materi_mapel', $id_mat)
            ->get()
            ->getResult();
    }

    public function updatePertanyaan($id, $data)
    {
        return $this->update($id, $data);
    }
}