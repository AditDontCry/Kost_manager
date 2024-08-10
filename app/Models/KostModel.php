<?php namespace App\Models;

use CodeIgniter\Model;

class KostModel extends Model
{
    protected $table = 'tempat_kos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['pemilik_kos_id', 'nama_tempat_kos', 'alamat'];

    // Optionally, you can add validation rules here
    protected $validationRules = [
        'pemilik_kos_id' => 'required|integer',
        'nama_tempat_kos' => 'required|string|max_length[100]',
        'alamat' => 'required|string'
    ];

    protected $validationMessages = [
        'pemilik_kos_id' => [
            'required' => 'Pemilik Kos ID is required',
            'integer' => 'Pemilik Kos ID must be an integer'
        ],
        'nama_tempat_kos' => [
            'required' => 'Nama Tempat Kos is required',
            'max_length' => 'Nama Tempat Kos cannot exceed 100 characters'
        ],
        'alamat' => [
            'required' => 'Alamat is required'
        ]
    ];
}
