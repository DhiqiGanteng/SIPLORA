<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $primarykey = 'id';
    protected $fillable =['kode_laporan','jenis_bencana','provinsi','kota','kecamatan','kelurahan','deskripsi','foto' => 'array','status','pemerintah','pelapor'];

    public function get_pemerintah(){
        return $this->belongsTo('App\\pemerintah','pemerintah','id_pemerintah');
    }
    public function get_pelapor(){
        return $this->belongsTo('App\\pelapor','pelapor','id_pelapor');
    }
    public function get_province(){
    	return $this->belongsTo('App\\province','provinsi','id');
    }
    public function get_district(){
    	return $this->belongsTo('App\\district','kecamatan','id');
    }
    public function get_regency(){
    	return $this->belongsTo('App\\regency','kota','id');
    }
    public function get_village(){
    	return $this->belongsTo('App\\village','kelurahan','id');
    }
}
