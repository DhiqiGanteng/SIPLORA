<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemerintah extends Model
{	
	protected $primarykey = 'id_pemerintah';
    protected $fillable =['nama','email','nohp','hak','daerah','username','password'];
    protected $table = 'pemerintahs';

    public function get_province(){
    	return $this->belongsTo('App\\province','daerah','id');
    }
}
