<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable =[
        'judul',
        'kategori_id',
        'penerbit_id',
        'pengarang',
        'tahun_terbit',
        'isbn',
        'j_buku_baik',
        'j_buku_rusak',
        'foto',
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function penerbit(){
        return $this->belongsTo(penerbit::class);
    }
}
