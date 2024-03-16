<?php

namespace App\Controllers;

class Login extends BaseController
{

	protected $session;
    protected $db;

    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        return view('login');
    }
}
