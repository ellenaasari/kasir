<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiJual extends Controller
{
    //
    public function isiKeranjang(Request $request)
    {
        $data = DB::table('jual')
            ->where('kdBarang',$request->kode)
            ->where('nmrStruk',$request->session()->get('nmrStruk'))
            ->count();

        if($data==0){
            DB::table('jual')->insert([
                'tgl'=>$request->tgl,
                'nmrStruk'=>$request->session()->get('nmrStruk'),
                'kdBarang'=>$request->kode,
                'jml'=>$request->jml,
                'opr'=>$request->session()->get('user')
            ]);
        }else{
            $data = DB::table('jual')
                ->where('nmrStruk',$request->session()->get('nmrStruk'))
                ->where('kdBarang',$request->kode)->get();
            $jml = $data[0]->jml;
            DB::table('jual')
                ->where('kdBarang',$request->kode)->update([
                'jml'=>$request->jml+$jml
            ]);
        }
        //kurangi stok barang
        $barang = DB::table('barang')->where('kode',$request->kode)->get();
            DB::table('barang')->where('kode',$request->kode)->update([
                'jml' => $barang[0]->jml-$request->jml
            ]);
        return redirect('/keranjang');
    }

    public function hapusKeranjang(Request $request, $kode){
        $struk = $request->session()->get('nmrStruk');

        //kembalikan jumlah barang terjual
        $barang = DB::table('barang')->where('kode',$kode)->get();
        $terjual = DB::table('jual')
            ->where('kdBarang',$kode)
            ->where('nmrStruk',$struk)->get();

        DB::table('barang')
            ->where('kode',$kode)->update([
                'jml' => $barang[0]->jml+$terjual[0]->jml
            ]);

        //hapus barang terjual
        DB::table('jual')
            ->where('kdBarang',$kode)
            ->where('nmrStruk',$struk)
            ->delete();
            return redirect('/keranjang');
    }

    public function bayar(Request $request){
        $struk = $request->session()->get('nmrStruk');
        DB::table('struk')->where('nmrStruk',$struk)->update([
            'total'=>$request->total,
            'bayar'=>$request->bayar,
            'sisa'=>$request->sisa
        ]);
        $dataStruk = DB::table('jual')
            ->join('barang','barang.kode','=','jual.kdBarang')
            ->join('struk','struk.nmrStruk','=','jual.nmrStruk')
            ->select('barang.nama','barang.harga','jual.jml','jual.nmrStruk','struk.total','struk.bayar','struk.sisa')
            ->where('jual.nmrStruk',$struk)->get();

            return view('cetakStruk',['dataStruk'=>$dataStruk]);
    }
}
