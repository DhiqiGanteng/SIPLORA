<?php

namespace App\Http\Controllers;

use App\pemerintah;
use App\province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class daftarController extends Controller
{   
    public function register(Request $request){

        $data = pemerintah::with('get_province')->get();
        $datas = province::All();
        return view('register',compact('data','datas'));
    }
    public function registerPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required',
            'nohp' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new pemerintah();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->hak = $request->hak;
        $data->daerah = $request->daerah;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('register')->with('alert-success','Kamu berhasil Register');
    }
}
