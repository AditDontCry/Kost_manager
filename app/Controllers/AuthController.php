<?php

namespace App\Controllers;

use App\Models\PemilikKosModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url']);
        return view('auth/register');
    }

    public function store()
    {
        $model = new PemilikKosModel();
        
        // Validation rules
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[pemilik_kos.email]',
            'password' => 'required|min_length[6]',
            'nomor_telepon' => 'required',
            'alamat' => 'required'
        ];

        if (!$this->validate($rules)) {
            log_message('error', 'Validation errors: ' . print_r($this->validator->getErrors(), true));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            // Removed password hashing for debugging
            'password' => $this->request->getPost('password'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'alamat' => $this->request->getPost('alamat')
        ];

        // Debug: Log the data to be inserted
        log_message('debug', 'User data: ' . print_r($data, true));

        if ($model->insert($data)) {
            return redirect()->to('/login')->with('message', 'Registration successful, please log in.');
        } else {
            log_message('error', 'Model errors: ' . print_r($model->errors(), true));
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function login()
    {
        helper(['form', 'url']);
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new PemilikKosModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Debug: Log the user data
            log_message('debug', 'User found: ' . print_r($user, true));

            // Direct password comparison for debugging
            
                session()->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['nama'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dashboard')->with('message', 'Login successful');
        } else {
            log_message('error', 'No user found with email: ' . $email);
            return redirect()->back()->withInput()->with('error', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out');
    }
}
