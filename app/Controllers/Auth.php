<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Auth extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        if (check_login(session('userID'))) return redirect()->to('/');
        return view('auth/index');
    }

    public function login()
    {
        if (check_login(session('userID'))) return redirect()->to('/');

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password') ? $this->request->getPost('password') : '';

        // dd($this->anggotaModel->where(['username' => $username, 'password' => sha1($password), 'aktif' => 1])->find());

        $user = $this->anggotaModel->where(['username' => $username, 'password' => sha1($password), 'aktif' => 1])->find();

        if ($user) {
            $session = [
                'userID' => $user[0]->id
            ];

            session()->set($session);

            return redirect()->to('/');
        } else {
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
