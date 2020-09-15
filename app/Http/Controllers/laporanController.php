<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\laporan;
use App\province;
use App\regency;
use App\district;
use App\village;
use App\pelapor;
use DB;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $provinces = Db::table('provinces')->orderBy('provinces.name')->pluck("name","id")->all();

        return view('pelaporan.pelaporan2',compact('provinces'));
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

    public function lacakLaporan(){
        return view('pelacakan.pelacakan1');
    }

    public function lacakLaporanKode(Request $request){
        $data = laporan::with('get_pelapor')->where('kode_laporan',$request->kode_laporan)->first();

        if(laporan::with('get_pelapor')->where('kode_laporan',$request->kode_laporan)->first() == null){
            return redirect('/lacakLaporan')->with('alert','Kode Laporan Tidak Ditemukan');
        } else {
            return view('pelacakan.statusPage',compact('data'));
        }
    }


    public function lacakLaporanNama(Request $request){
        $pelapor = pelapor::where('nama',$request->nama)->first();
        if(pelapor::where('nama',$request->nama)->first() != null){
            if ($pelapor->nohp == $request->nohp) {
                $data = laporan::with('get_pelapor')->where('pelapor',$pelapor->id_pelapor)->first();
                return view('pelacakan.statusPage',compact('data'));
            } else {
                return redirect('/lacakLaporan')->with('alert','Nama Atau No Hp Tidak Ditemukan');
            }

        } else {
            return redirect('/lacakLaporan')->with('alert','Nama Tidak Ditemukan');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {
        $data = new pelapor();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->save();



        $data1 = new laporan();
        $data1->kode_laporan = base_convert(microtime(false), '5', '36');
        $data1->jenis_bencana = $request->jenis_bencana;
        $data1->provinsi = $request->id_province;
        $data1->kota = $request->id_regencies;
        $data1->kecamatan = $request->id_districts;
        $data1->kelurahan = $request->id_villages;
        $data1->deskripsi = $request->deskripsi;
        $data1->status = "Terkirim";

        //menambah gamabar
        if($request->file('gambar') != null){
            $input = $request->file('gambar');
            $inputName = $input->getClientOriginalName();
            $input->move("gambar/", $inputName);
            $data1->foto = $inputName;
        }

        $data1->pelapor = pelapor::pluck('id_pelapor')->last();
        $data1->save();

        }else {
            return redirect('/buatLaporan')->with('alert','file terlalu besar atau format tidak benar');
        }
        Session::put('kode_laporan',$data1->kode_laporan);
        return redirect('/buatLaporan')->with('alert-success','Kamu Berhasil Melapor Dengan Kode Laporan : ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
