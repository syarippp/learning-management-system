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

    public function getPertanyaan($id_mat)
    {
        $query = $this->db->table('pertanyaan')
                          ->where('id_materi_mapel', $id_mat)
                          ->orderBy('RAND()') // Mengacak urutan pertanyaan
                          ->get();

        return $query->getResult();
    }

    public function getJawabanByPertanyaan($id_pertanyaan)
    {
        $query = $this->db->table('jawaban')
                          ->where('id_pertanyaan', $id_pertanyaan)
                          ->orderBy('RAND()') // Mengacak urutan jawaban
                          ->get();

        return $query->getResultArray();
    }

    public function getNilaiJawaban($selectedValue)
    {
        $query = $this->db->table('jawaban')
                          ->select('value')
                          ->where('id_jawaban', $selectedValue)
                          ->get();

        $result = $query->getRow();

        if ($result) {
            return $result->value;
        } else {
            return 0; // Atau nilai default sesuai kebutuhan, misalnya 0
        }
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