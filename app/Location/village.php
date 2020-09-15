<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class village extends Model
{
	protected $table = 'villages';
    protected $primarykey = 'id';
    protected $fillable =['district_id','name'];
}
