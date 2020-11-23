<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class OtentikasiController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function login(Request $request)
    {
       $data = Pengguna::where('username',$request->username)->firstOrFail();
       if($data){
            // if(Hash::check($request->password, $data->password)){
            //     return redirect('/dasbort');
            // }
            if(md5($request->password)== $data->password){
                session(['admin' => true]);
                return redirect('/dasbort');
            }else{
                return redirect('/')->with('massage','Password Salah');
            }
       }
       return redirect('/')->with('massage','Email dan Password Salah');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
