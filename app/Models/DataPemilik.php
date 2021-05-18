<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemilik extends Model
{
    use HasFactory;
    public $primaryKey = 'id_pemilik';
    protected $fillable = [
        'nama_pemilik','jenis_kelamin','alamat','no_telp','tgl_daftar'
    ];
}
