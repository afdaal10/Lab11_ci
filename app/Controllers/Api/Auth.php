<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Auth extends ResourceController
{
    protected $format = 'json';

    public function login()
    {
        // Tambahkan header CORS langsung di controller
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE');

        // Handle preflight OPTIONS request
        if (strtoupper($this->request->getMethod()) === 'OPTIONS') {
            header('HTTP/1.1 200 OK');
            exit();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $model = new UserModel();

        $user = $model->where('username', $username)
                      ->orWhere('useremail', $username)
                      ->first();

        if ($user) {
            if ($password === $user['userpassword'] ||
                password_verify($password, $user['userpassword'])) {

                return $this->respond([
                    'status'   => 200,
                    'error'    => null,
                    'messages' => 'Login Berhasil',
                    'data'     => [
                        'id'       => $user['id'],
                        'username' => $user['username'],
                        'token'    => base64_encode("TOKEN-SECRET-" . $user['username'])
                    ]
                ], 200);
            }
        }

        return $this->failUnauthorized('Username atau Password yang Anda masukkan salah.');
    }
}