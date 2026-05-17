<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Test extends Controller
{
    public function ping()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Controller Test::ping berhasil dipanggil.'
        ]);
    }
}
