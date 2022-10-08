<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kendali extends Controller
{
    //
    public function index(Request $request){
        if($request->session()->has('user')){
            $opr = $request->session()->get('user');
            $kasir = DB::table('kasir')->where('kode',$opr)->get();
            echo "<a href=/logout>Logout</a> <br>";
            echo "Selamat datang ".$kasir[0]->nama;
            echo "<br><a href=/jual>Jual</a>";
        }else{
            return redirect('/login');
        }
    }

    public function login(){
        return view('login');
    }

    public function prosesLogin(Request $request){
        $data = DB::table('kasir')
            ->where('kode',$request->kode)
            ->where('sandi',$request->sandi)->count();

        if($data!=0){
            $request->session()->put('user',$request->kode);
            return redirect('/');
        }else{
            return redirect('/');
        }

    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/');
    }

    public function jual(Request $request){
        $request->session()->forget('nmrStruk');
        if($request->session()->has('user')){
            $opr = $request->session()->get('user');
            $tgl = date("dmY");
            $data = DB::table('struk')->where('user',$opr)->count();
            $ke = $data+1;
            $nmrStruk = $tgl."/".$opr."/".$ke;

            DB::table('struk')->insert([
                'user'=>$opr,
                'nmrStruk'=>$nmrStruk,
                'total'=>0,
                'bayar'=>0,
                'sisa'=>0
            ]);
            $request->session()->put('nmrStruk',$nmrStruk);
            return redirect('/keranjang');
        }else{
            return redirect('/');
        }
    }

    public function keranjang(Request $request){
        $struk = $request->session()->get('nmrStruk');
        $isi = DB::table('jual')
            ->join('barang','jual.kdBarang','=','barang.kode')
            ->select('jual.kdBarang', 'barang.nama','barang.harga','jual.jml')
            ->where('jual.nmrStruk',$struk)
            ->get();
        return view('keranjang',['barang'=>$isi]);
    }

}
