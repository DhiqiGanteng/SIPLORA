<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
	protected $table = 'districts';
    protected $primarykey = 'id';
    protected $fillable =['id','regency_id','name'];
}
