<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;
    protected $table      = 'pengalamans';
	protected $primaryKey = 'id';
    protected $fillable   = [
        'nama','tempat','deskripsi'         
    ];
//membuat relasi dengan tabel user    
	public function iduser()
    {
        return $this->hasMany('App\models\User','id_user');
    }
}
