<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilikKosModel extends Model
{
    protected $table = 'pemilik_kos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true; // Aktifkan soft deletes
    protected $allowedFields = [
        'nama', 
        'email', 
        'password', 
        'nomor_telepon', 
        'alamat', 
        'nama_tempat_kos'
    ];

    protected $useTimestamps = true; // Benar, useTimestamps
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'nama' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[pemilik_kos.email]',
        'password' => 'required|min_length[6]',
        'nomor_telepon' => 'required',
        'alamat' => 'required'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email sudah terdaftar.',
        ],
    ];

    protected $skipValidation = false;
}
