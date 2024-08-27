<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table      = 'skills';
	protected $primaryKey = 'id';
    protected $fillable   = [
        'nama','persen'         
    ];
//membuat relasi dengan tabel user    
	public function iduser()
    {
        return $this->hasMany('App\models\User','id_user');
    }
}
