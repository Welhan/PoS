<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\RoleModel;
use App\Models\SubmenuModel;
use Exception;

class User extends BaseController
{
    protected $submenuModel;
    protected $anggotaModel;
    protected $roleModel;

    public function __construct()
    {
        $this->submenuModel = new SubmenuModel();
        $this->anggotaModel = new AnggotaModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {

        if (!check_login(session('userID'))) return redirect()->to('/login');

        // dd($this->anggotaModel->getAnggota());

        $data = [
            'title' => 'User',
            'active' => $this->submenuModel->find(2),
            'users' => $this->anggotaModel->getAnggota(),
        ];

        return view('user/index', $data);
    }

    public function getFormNew()
    {
        helper('text');
        if ($this->request->isAJAX()) {
            // Verify if user already Login
            if (!(check_login(session('userID')))) {
                $msg = [
                    'error' => ['logout' => base_url('logout')]
                ];
                echo json_encode($msg);
                return;
            }

            $data = [
                'levels' => $this->roleModel->find(),
                'password' => random_string('alnum', 8)
            ];

            $msg = [
                'data' => view('user/modals/new', $data)
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('user');
        }
    }

    public function saveUser()
    {
        if ($this->request->isAJAX()) {
            // Verify if user already Login
            if (!(check_login(session('userID')))) {
                $msg = [
                    'error' => ['logout' => base_url('logout')]
                ];
                echo json_encode($msg);
                return;
            }

            // Awal Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[anggota.username]|min_length[3]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'is_unique' => '{field} sudah terdaftar',
                        'min_length' => '{field} harus terdiri dari minimal 3 karakter',
                    ]
                ],
                'level' => [
                    'label' => 'Level',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => '{field} harus terdiri dari minimal 8 karakter',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'username' => $validation->getError('username'),
                        'level' => $validation->getError('level'),
                        'password' => $validation->getError('password'),
                    ]
                ];

                echo json_encode($msg);
                return;
            }
            // Akhir validasi

            $nama = $this->request->getPost('nama') ? $this->request->getPost('nama') : '';
            $username = $this->request->getPost('username') ? $this->request->getPost('username') : '';
            $password = $this->request->getPost('password') ? $this->request->getPost('password') : '';
            $level = $this->request->getPost('level') ? $this->request->getPost('level') : '';
            $aktif = $this->request->getPost('aktif') == 1 ? 1 : 0;

            $data = [
                'nama' => htmlspecialchars($nama, true),
                'username' => htmlspecialchars($username, true),
                'password' => password_hash(htmlspecialchars($password, true), PASSWORD_DEFAULT),
                'level' => htmlspecialchars($level, true),
                'aktif' => htmlspecialchars($aktif, true),
            ];

            try {
                if ($this->anggotaModel->save($data)) {
                    $alert = [
                        'message' => 'User Berhasil Ditambahkan',
                        'alert' => 'alert-info'
                    ];

                    $msg = [
                        'process' => 'Process Success'
                    ];
                }
            } catch (Exception $e) {
                $alert = [
                    'message' => 'User Tidak Berhasil Ditambahkan<br>' . $e->getMessage(),
                    'alert' => 'alert-danger'
                ];

                $msg = [
                    'process' => 'Process Terminated'
                ];
            } finally {
                session()->setFlashdata($alert);
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('user');
        }
    }
}
