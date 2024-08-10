<?php

namespace App\Controllers;

use App\Models\KosModel;
use App\Models\PemilikKosModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']); // Memuat helper form dan URL untuk keamanan CSRF dan routing
    }

    public function index()
    {
        $kosModel = new KosModel();

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Mengambil user_id dari session
        $userId = session()->get('user_id');

        // Menghitung total kos yang terkait dengan user_id yang sedang login
        $data['totalKos'] = $kosModel->where('user_id', $userId)->countAllResults();

        // Menghitung total kamar yang terkait dengan user_id yang sedang login
        $data['totalKamar'] = $kosModel->where('user_id', $userId)->selectSum('kamar')->get()->getRow()->kamar;

        // Menghitung pendapatan
        $data['pendapatan'] = $kosModel->where('user_id', $userId)->selectSum('harga')->get()->getRow()->harga;

        return view('dashboard/index', $data);
    }

    // Display user profile
    public function profile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $model = new PemilikKosModel();
        $user = $model->find($userId);

        if (!$user) {
            // Handle case where user is not found
            return redirect()->back()->with('error', 'User not found');
        }

        $data = [
            'nama' => $user['nama'],
            'nomor_telepon' => $user['nomor_telepon'],
            'alamat' => $user['alamat'],
        ];

        return view('dashboard/profile_view', $data);
    }

    // Display form for updating profile
    public function editProfile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $model = new PemilikKosModel();
        $user = $model->find($userId);

        $data = [
            'nama' => $user['nama'],
            'nomor_telepon' => $user['nomor_telepon'],
            'alamat' => $user['alamat'],
        ];

        return view('dashboard/profile_edit', $data);
    }

    // Handle profile update
    public function updateProfile()
    {
        $model = new PemilikKosModel();
        $userId = session()->get('user_id');

        $rules = [
            'nama' => 'required|min_length[3]',
            'nomor_telepon' => 'required',
            'alamat' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($model->update($userId, $data)) {
            return redirect()->to('/profile')->with('message', 'Profile updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
}
