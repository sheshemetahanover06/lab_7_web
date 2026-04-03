<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    // Menampilkan daftar user
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();

        return view('user/index', [
            'title' => $title,
            'users' => $users
        ]);
    }

    // Login user
    public function login()
    {
        helper(['form']);

        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Jika belum submit form
        if (!$email) {
            return view('user/login');
        }

        // Cek user berdasarkan email
        $login = $model->where('useremail', $email)->first();

        if ($login) {
            // Verifikasi password
            if (password_verify($password, $login['userpassword'])) {

                // Set session
                $session->set([
                    'user_id'    => $login['id'],
                    'user_name'  => $login['username'],
                    'user_email' => $login['useremail'],
                    'logged_in'  => true,
                ]);

                return redirect()->to('/admin/artikel');
            } else {
                $session->setFlashdata('flash_msg', 'Password salah.');
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata('flash_msg', 'Email tidak terdaftar.');
            return redirect()->to('/user/login');
        }
    }
}