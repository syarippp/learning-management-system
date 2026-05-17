<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = "nilai";
    protected $primaryKey = "id_nilai";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_nilai', 'id_users', 'id_materi_mapel', 'nilai'];

    // Mengambil semua nilai berdasarkan user dan materi
    public function getNilaiByMateri($id_users, $id_materi_mapel)
    {
        return $this->where('id_users', $id_users)
                    ->where('id_materi_mapel', $id_materi_mapel)
                    ->orderBy('id_nilai', 'ASC')
                    ->findAll();
    }

    // Menghitung jumlah attempt berdasarkan user dan materi
    public function countAttemptTestByMateri($id_users, $id_materi_mapel)
    {
        return $this->where('id_users', $id_users)
                    ->where('id_materi_mapel', $id_materi_mapel)
                    ->countAllResults();
    }

    // Menampilkan nilai maksimal per siswa untuk ditampilkan di halaman guru
    public function LihatNilai()
    {
        $id_dm = $_GET['id_dm'] ?? null;
        $id_mat = $_GET['id_mat'] ?? null;

        $subquery = $this->db->table('nilai')
            ->select('id_users, MAX(nilai) as max_nilai')
            ->where('id_materi_mapel', $id_mat)
            ->groupBy('id_users')
            ->getCompiledSelect();

        $query = $this->db->query("
            SELECT n.*, u.nama_lengkap, mm.*, dm.*, m.*
            FROM nilai n
            JOIN (
                SELECT sub.id_users, sub.max_nilai, MIN(n2.id_nilai) as min_id_nilai
                FROM ($subquery) as sub
                JOIN nilai n2 ON n2.id_users = sub.id_users AND n2.nilai = sub.max_nilai
                GROUP BY sub.id_users, sub.max_nilai
            ) sub ON n.id_users = sub.id_users AND n.nilai = sub.max_nilai AND n.id_nilai = sub.min_id_nilai
            JOIN users u ON n.id_users = u.id_users
            JOIN materi_mapel mm ON n.id_materi_mapel = mm.id_materi_mapel
            JOIN detail_mapel dm ON mm.id_detail_mapel = dm.id_detail_mapel
            JOIN mapel m ON dm.id_mapel = m.id_mapel
            WHERE dm.id_detail_mapel = ?
        ", [$id_dm]);

        return $query->getResult();
    }
}
