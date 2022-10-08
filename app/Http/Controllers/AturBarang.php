<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AturBarang extends Controller
{
    //
    public function tambahBarang(){
        return view('/tambahBarang');
    }

    public function simpanBarang(Request $request)
    {
        DB::table('barang')->insert([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'jml'=>$request->jml
        ]);

        return view('tambahBarang');
    }

    public function dataBarang(){
        $data = DB::table('barang')->get();
        return view('barang',['barang'=>$data]);
    }

    public function hapusBarang($kode){
        DB::table('barang')->where('kode',$kode)->delete();
        return redirect('/barang');
    }

    public function editBarang($kode){
        $data = DB::table('barang')->where('kode',$kode)->get();
        return view('editBarang',['barang'=>$data]);
    }
}
