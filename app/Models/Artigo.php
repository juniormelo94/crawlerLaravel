<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    public $table = 'artigos';
	/**
    * fillable fields
    *
    * @var array
    */
    public $fillable = [
        'user_id',
        'titulo',
        'link'
    ];
}
