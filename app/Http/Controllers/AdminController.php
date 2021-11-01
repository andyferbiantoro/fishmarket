<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokisIkan;

class AdminController extends Controller
{
   
    public function index(){
       

        return view('admin.dashboard.index');
    }

    public function kelola_seafood(){
       
       $data = StokisIkan::orderBy('id','DESC')->get();
       
        return view('admin.seafood.index',compact('data'));
    }


    public function kelola_seafood_add(Request $request){

        
        $Add_ikan = new StokisIkan();
        

        $Add_ikan->jenis_ikan = $request->input('jenis_ikan');
        $Add_ikan->harga_jual  = $request->input('harga_jual');
       
    
        $Add_ikan->save();

        return redirect('/admin-kelola_seafood')->with('success', 'Data Ikan Berhasil Ditambahkan');
    }
}
