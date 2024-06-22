<?php

namespace App\Models;

use CodeIgniter\Model;

class Jawaban extends Model
{
    protected $table = "jawaban";
    protected $primaryKey = "id_jawaban";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_jawaban', 'id_pertanyaan', 'jawaban', 'value'];


}