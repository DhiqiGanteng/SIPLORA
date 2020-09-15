<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelapor extends Model
{
	protected $table = 'pelapors';
    protected $primarykey = 'id_pelapor';
    protected $fillable =['id_pelapor','nama','email','nohp'];
}
