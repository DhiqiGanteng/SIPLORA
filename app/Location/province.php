<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
	protected $table = 'provinces';
    protected $fillable =['id','name'];
}
