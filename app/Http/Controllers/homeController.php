<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan;
use App\province;

class homeController extends Controller
{
    public function index(){
    	$data = homeController::getDataChart();

    	return view('beranda.beranda',compact('data'));
    }

    public static function getDataChart(){
    	
    	$series[0]['name'] = "Laporan Masuk" ;
    	$series[1]['name'] = "Laporan Terlaksana" ;
    	$series[2]['name'] = "Laporan Ditolak" ;

    	$provinces = province::all();
    	$category = [];
    	foreach($provinces as $province){
            if($province->id != "0"){
        		$category[] = $province->name;

        		$series[0]['data'][] = laporan::where('status',"Terkirim")->where('provinsi',$province->id)->count();
                $series[1]['data'][] = laporan::where('status',"Terlaksana")->where('provinsi',$province->id)->count();
                $series[2]['data'][] = laporan::where('status',"Ditolak")->where('provinsi',$province->id)->count();
            }
    	}
    	return ['category' => $category, 'series' => $series];
    }
    public function buatLaporan(){
    	return view('pelaporan.pelaporan2');
    }
    public function lacakLaporan(){
    	return view('pelacakan.pelacakan1');
    }

}
