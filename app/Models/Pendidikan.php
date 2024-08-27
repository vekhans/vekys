<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table      = 'pendidikans';
	protected $primaryKey = 'id';
    protected $fillable   = [
        'nama','tahun_masuk','tahun_keluar','gelar'         
    ];
//membuat relasi dengan tabel user    
	public function iduser()
    {
        return $this->hasMany('App\models\User','id_user');
    }
}
