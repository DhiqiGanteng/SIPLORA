<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\province;
use App\regency;
use App\district;
use App\village;
use DB;

class coba extends Controller
{
    public function index(){
    	//$regencies = DB::table('regencies')->pluck("name","id")->all();
    	$provinces = Db::table('provinces')->orderBy('provinces.name')->pluck("name","id")->all();

    	return view('pelaporan.coba',compact('provinces','regencies'));
    }

    public function selectAjax(Request $request){
    	if ($request->ajax()) {
    		$regencies = DB::table('regencies')->where('province_id', $request->id_province)->pluck("name","id")->all();
    		$districts = DB::table('districts')->where('regency_id', $request->id_regencies)->pluck("name","id")->all();
    		$villages = DB::table('villages')->where('district_id', $request->id_districts)->pluck("name","id")->all();
    		$data = view('pelaporan.select-ajax',compact('regencies','districts','villages'))->render();
		return response()->json(['options'=>$data]);
    	}
    }
}
