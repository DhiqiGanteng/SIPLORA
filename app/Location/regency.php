<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regency extends Model
{
	protected $table = 'regencies';
    protected $primarykey = 'id';
    protected $fillable =['province_id','name'];
}
