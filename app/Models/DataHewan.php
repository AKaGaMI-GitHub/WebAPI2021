<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataHewan extends Model
{
    use HasFactory;
    public $primaryKey = 'id_hewan';
    protected $fillable = [
        'id_pemilik','nama_hewan','jenis_hewan','jenis_kelamin','nama_pemilik'
    ];
    static function get_11(){
        $return=DB::table('data_hewans')
        ->join('id_pemilik','data_hewans.nama_pemilik','=','data_pemiliks.id_pemilik')
    };
    return $return;
}
