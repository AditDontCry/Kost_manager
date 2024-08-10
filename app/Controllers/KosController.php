<?php
namespace App\Controllers;

use App\Models\KosModel;
use CodeIgniter\Controller;

class KosController extends Controller
{
    public function index()
    {
        return view('dashboard/tambah_kost');
    }

    public function store()
{
    $model = new KosModel();

    // Mengambil user_id dari session
    $userId = session()->get('user_id'); 

    $data = [
        'nama_tempat_kos' => $this->request->getPost('nama_tempat_kos'),
        'kamar' => $this->request->getPost('kamar'),
        'alamat' => $this->request->getPost('alamat'),
        'user_id' => $userId, // Mengisi user_id dengan data dari session
        'deskripsi' => $this->request->getPost('deskripsi') ?? null,
        'harga' => $this->request->getPost('harga'),
        'status' => $this->request->getPost('status')
    ];

    if (!$this->validate($model->validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    if ($model->save($data)) {
        return redirect()->to('/list_kost')->with('message', 'Data kos berhasil ditambahkan.');
    } else {
        return redirect()->back()->withInput()->with('errors', $model->errors());
    }
}


    public function list_kost()
{
    $model = new KosModel();

    // Mengambil user_id dari session
    $userId = session()->get('user_id');

    // Mengambil data kos yang hanya dibuat oleh pengguna yang sedang login
    $data['tempat_kos'] = $model->where('user_id', $userId)->findAll();

    return view('dashboard/list_kost', $data);
}


    public function edit($id = null)
    {
        $model = new KosModel();
        $data['kos'] = $model->find($id);

        if (!$data['kos']) {
            return redirect()->to('/list_kost')->with('error', 'Kos tidak ditemukan.');
        }

        return view('dashboard/edit_kost', $data);
    }

    public function update($id = null)
    {
        $model = new KosModel();
        $kos = $model->find($id);

        if (!$kos) {
            return redirect()->to('/list_kost')->with('error', 'Kos tidak ditemukan.');
        }

        $data = [
            'id' => $id,
            'nama_tempat_kos' => $this->request->getPost('nama_tempat_kos'),
            'kamar' => $this->request->getPost('kamar'),
            'alamat' => $this->request->getPost('alamat'),
            'deskripsi' => $this->request->getPost('deskripsi') ?? null,
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status')
        ];

        if (!$this->validate($model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($model->save($data)) {
            return redirect()->to('/list_kost')->with('message', 'Data kos berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function delete($id = null)
    {
        $model = new KosModel();

        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to('/list_kost')->with('message', 'Data kos berhasil dihapus.');
        } else {
            return redirect()->to('/list_kost')->with('error', 'Kos tidak ditemukan.');
        }
    }
}
