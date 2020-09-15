<?php

namespace App\Http\Controllers;

use App\pemerintah;
use App\laporan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class pemerintahController extends Controller
{
    public function BDPB(){

        if((Session::get('hak') != 'BDPB') || (!Session::get('login')) ){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        } else {
            $data = pemerintahController::getDataChart();
            return view('Admin.BDPB.berandaBDPB',compact('data'));
        }
    }
    public static function getDataChart(){

        $series[0]['name'] = "Jumlah Laporan" ;

        $category = ['Laporan Masuk','Laporan Diterima','Laporan di Teruskan Ke BDPB','Laporan Tervalidasi','Laporan Diteruskan ke Dinas','Laporan Terlaksana','Laporan Ditolak'];
        $status = ['Terkirim','Diterima','Diteruskan Ke BDPB','Tervalidasi','Diteruskan ke Dinas','Terlaksana','Laporan Ditolak'];

        foreach($status as $status2){
                $series[0]['data'][] = laporan::where('status',$status2)->where('provinsi',Session::get('daerahid'))->count();
        }
        return ['category' => $category, 'series' => $series];
    }
    public function rekapitulasiBDPB(){

        if((Session::get('hak') != 'BDPB') || (!Session::get('login')) ){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        } else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('provinsi',Session::get('daerahid'))->get();
            return view('Admin.BDPB.rekapitulasiBDPB',compact('data'));
        }
    }


    public function instruksiBDPB(){

        if((!Session::get('login'))|| (Session::get('hak') != 'BDPB')){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        }
        else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('status',"Tervalidasi")->where('provinsi',Session::get('daerahid'))->get();
            return view('Admin.BDPB.instruksiPage',compact('data'));
        }
    }
    public function instruksi($id){

        $laporan = laporan::find($id);
        $laporan->status = "Diteruskan ke Dinas";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBDPB/instruksiBDPB')->with('alert-success', ' : Berhasil Diteruskan Kedinas');
    }
    public function tolakInstuksi($id){

        $laporan = laporan::find($id);
        $laporan->status = "Ditolak";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBDPB/instruksiBDPB')->with('alert',' : Ditolak BDPB');
    }


    public function validasiBDPB(){

        if((!Session::get('login'))|| (Session::get('hak') != 'BDPB')){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        } else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('status',"Diteruskan Ke BDPB")->where('provinsi',Session::get('daerahid'))->get();
            return view('Admin.BDPB.validasiPage',compact('data'));
        }

    }
    public function validasi($id){

        $laporan = laporan::find($id);
        $laporan->status = "Tervalidasi";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBDPB/validasiBDPB')->with('alert-success', ' : Berhasil Tervalidasi');
    }
    public function tolakValidasi($id){

        $laporan = laporan::find($id);
        $laporan->status = "Ditolak";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBDPB/validasiBDPB')->with('alert',' : Ditolak BDPB');
    }




    public function verifikasiBNPB(){
        if((!Session::get('login'))|| (Session::get('hak') != 'BNPB')){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        }
        else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('status',"Terkirim")->get();
            return view('Admin.BNPB.verifikasiPage',compact('data'));
        }

    }
    public function manajementBNPB(){
        if((!Session::get('login'))|| (Session::get('hak') != 'BNPB')){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        }
        else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('status',"Diterima")->get();
            return view('Admin.BNPB.manajemenPage',compact('data'));
        }

    }

    public function manajement($id){

        $laporan = laporan::find($id);
        $laporan->status = "Diteruskan Ke BDPB";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBNPB/manajement')->with('alert-success', ' : Berhasil Diteruskan ke BDPB');
    }
    public function tolakManajement($id){

        $laporan = laporan::find($id);
        $laporan->status = "Ditolak";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBNPB/manajement')->with('alert',' : Ditolak');
    }
    public function BNPB(Request $request){
        if((!Session::get('login'))|| (Session::get('hak') != 'BNPB')){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        }
        else {
            $provinces = Db::table('provinces')->get();
            if ($request->id == null) {
              $id = "0";
            } else {
              $id = $request->id;
            }
            $data = pemerintahController::getDataChartBNPB($id);
            $provinsiTable = Db::table('provinces')->where('id',$id)->first();
            return view('Admin.BNPB.berandaBNPB',compact('provinces','data','provinsiTable'));
        }

    }

    public function rekapitulasiBNPB(){

        if((Session::get('hak') != 'BNPB') || (!Session::get('login')) ){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        } else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->get();
            return view('Admin.BNPB.rekapitulasiBNPB',compact('data'));
        }
    }

    public static function getDataChartBNPB($id){

        $series[0]['name'] = "Jumlah Laporan" ;

        $category = ['Laporan Masuk','Laporan Diterima','Laporan di Teruskan Ke BDPB','Laporan Tervalidasi','Laporan Diteruskan ke Dinas','Laporan Terlaksana','Laporan Ditolak'];
        $status = ['Terkirim','Diterima','Diteruskan Ke BDPB','Tervalidasi','Diteruskan ke Dinas','Terlaksana','Laporan Ditolak'];

        foreach($status as $status2){
                if ($id == "0") {
                  $series[0]['data'][] = laporan::where('status',$status2)->count();
                } else {
                  $series[0]['data'][] = laporan::where('status',$status2)->where('provinsi',$id)->count();
                }
        }
        return ['category' => $category, 'series' => $series];
    }
    public function verifikasi($id){

        $laporan = laporan::find($id);
        $laporan->status = "Diterima";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);

        return redirect('/berandaBNPB/verifikasi')->with('alert-success', ' : Berhasil Diterima');
    }
    public function tolakVerifikasi($id){

        $laporan = laporan::find($id);
        $laporan->status = "Ditolak";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/berandaBNPB/verifikasi')->with('alert', ' : Ditolak');
    }



    public function dinas(){

        if((Session::get('hak') != 'Dinas') || (!Session::get('login')) ){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        } else {
            $data = pemerintahController::getDataChartDinas();
            return view('Admin.Dinas.berandaDinas',compact('data'));
        }
    }

    public function rekapitulasiDinas(){

        if((Session::get('hak') != 'Dinas') || (!Session::get('login')) ){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        } else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('provinsi',Session::get('daerahid'))->get();
            return view('Admin.Dinas.rekapitulasiDinas',compact('data'));
        }
    }
    public static function getDataChartDinas(){

        $series[0]['name'] = "Jumlah Laporan" ;

        $category = ['Laporan Masuk','Laporan Diterima','Laporan di Teruskan Ke BDPB','Laporan Tervalidasi','Laporan Diteruskan ke Dinas','Laporan Terlaksana','Laporan Ditolak'];
        $status = ['Terkirim','Diterima','Diteruskan Ke BDPB','Tervalidasi','Diteruskan ke Dinas','Terlaksana','Laporan Ditolak'];

        foreach($status as $status2){
                $series[0]['data'][] = laporan::where('status',$status2)->where('provinsi',Session::get('daerahid'))->count();
        }
        return ['category' => $category, 'series' => $series];
    }
    public function konfirmasiDinas(){
        if((!Session::get('login')) || (Session::get('hak') != 'Dinas')){
            return redirect()->back()->with('alert','Kamu harus login dulu');
        }
        else {
            $data = laporan::with('get_pelapor','get_province','get_regency','get_district','get_village','get_pemerintah')->where('status',"Diteruskan ke Dinas")->where('provinsi',Session::get('daerahid'))->get();
            return view('Admin.Dinas.konfirmasiTindakLanjut',compact('data'));
        }

    }
    public function terlaksana($id){

        $laporan = laporan::find($id);
        $laporan->status = "Terlaksana";
        $laporan->pemerintah = Session::get('id_pemerintah');
        $update = $laporan->update([$laporan->status,$laporan->pemerintah]);
        Session::put('kode_laporan',$laporan->kode_laporan);
        return redirect('/konfirmasiDinas')->with('alert-success', ' : Berhasil Terlaksana');
    }

     public function login(){
        if(Session::get('login')){
            if (Session::get('hak') == "BNPB"){
                return redirect('/berandaBNPB');
            }else if (Session::get('hak') == "BDPB"){
                 return redirect('/berandaBDPB');
            }else if (Session::get('hak') == "Dinas"){
                return redirect('/berandaDinas');
            }
        } else {
            return view('login');
        }
    }

    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = pemerintah::with('get_province')->where('username',$username)->first();
        if(count((array)$data) > 0){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_pemerintah',$data->id_pemerintah);
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('nohp',$data->nohp);
                Session::put('email',$data->email);
                Session::put('created_at',$data->created_at);
                Session::put('daerah',$data->get_province['name']);
                Session::put('daerahid',$data->daerah);
                Session::put('hak',$data->hak);
                Session::put('login',TRUE);

                if (Session::get('hak') == "BNPB"){
                    return redirect('/berandaBNPB');
                }else if (Session::get('hak') == "BDPB"){
                   return redirect('/berandaBDPB');
                }else if (Session::get('hak') == "Dinas"){
                   return redirect('/berandaDinas');
                }
            }
            else{
                return redirect('login')->with('alert','Password atau username, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('login')->with('alert','Password atau username, Salahaa!');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
