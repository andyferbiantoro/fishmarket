<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
 public function proses_login(Request $request){
        //remember
        $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak gfalse
       
        if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $ingat)){
            
            //auth->user() untuk memanggil data user yang sudah login
           if(auth()->user()->role == "1"){
            return redirect()->route('admin-dashboard')->with('success', 'Anda Berhasil Login');
            }
    }else{
        
            return redirect()->route('login')->with('error', 'Username / Password anda salah'); //route itu isinya name dari route di web.php

        }
    }



    public function proses_register(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'same' => ':attribute harus sama dengan konfirmasi password',
        ];

            //validasi
        $this->validate($request, [
            //pasword validasinya repassword
            'password' => 'min:8|required_with:repassword|same:repassword',
            'repassword' => 'min:8'
        ], $messages);

        $cekemail = User::where('email', $request->email)->where('role_id',1)->first();

        if ($cekemail) {

            return redirect()->back()->with('error', 'Email Sudah Digunakan');
        }else{

         User::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'role_id' => $request['role_id']="1",
            'password' => Hash::make($request['password']),

        ]);


         return redirect('/login')->with('success', 'Anda Berhasil Register, Silakan Login');
     }       
 }

 public function logout(){

        auth()->logout(); //logout
        
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
        
    }
}
