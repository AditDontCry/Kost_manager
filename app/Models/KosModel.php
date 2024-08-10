<?php

namespace App\Models;

use CodeIgniter\Model;


namespace App\Models;

use CodeIgniter\Model;


class KosModel extends Model
{
    protected $table = 'tempat_kos'; // The name of the database table
    protected $primaryKey = 'id';    // The primary key of the table

    // Fields that can be set by the model
    protected $allowedFields = [
        'nama_tempat_kos',
        'kamar',
        'alamat',
        'deskripsi',
        'harga',
        'status',
        'user_id'
    ];

    // Validation rules for data
    protected $validationRules = [
        'nama_tempat_kos' => 'required|min_length[3]|max_length[255]',
        'alamat' => 'required|min_length[5]',
        'deskripsi' => 'permit_empty|string'
    ];

    // Custom validation messages
    protected $validationMessages = [
        'nama_tempat_kos' => [
            'required' => 'Nama tempat kos harus diisi.',
            'min_length' => 'Nama tempat kos harus lebih dari 3 karakter.',
            'max_length' => 'Nama tempat kos tidak boleh lebih dari 255 karakter.'
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi.',
            'min_length' => 'Alamat harus lebih dari 5 karakter.'
        ],
        'deskripsi' => [
            'string' => 'Deskripsi harus berupa string.'
        ]
    ];

    protected $skipValidation = false; // Set to true if you want to skip validation
}
