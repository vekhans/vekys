<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	use HasFactory;
    protected $table = 'slides';
    protected $dates      = ['created_at','updated_at'];
	protected $primaryKey = 'id';
    protected $fillable = [
        'Caption',
        'file',
        'sumber',
        'deskripsi',
    ];
}
