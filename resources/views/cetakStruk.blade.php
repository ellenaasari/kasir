<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="window.print()">

    <div class="container">
        Bukti transaksi : {{Session::get('nmrStruk')}}
        <br>
        Tanggal : {{date('d/m/Y')}}
        <h4>Data barang dibeli </h4>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga satuan</th>
                <th>Jumlah</th>
                <th>Sub total</th>
            </tr>
            <?php $nomer = 1; ?>
            @foreach ($dataStruk as $isi)
            <tr>
                <td>{{$nomer++}}</td>
                <td>{{$isi->nama}}</td>
                <td align="right">{{number_format($isi->harga)}}</td>
                <td align="center">{{$isi->jml}}</td>
                <td align="right">{{number_format($isi->harga*$isi->jml)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right"><b>Total</b></td>
                <td align="right"><b>{{ number_format($isi->total)}}</b></td>
            </tr>
            <tr>
                <td colspan="4" align="right"><b>Bayar</b></td>
                <td align="right"><b>{{number_format($isi->bayar)}}</b></td>
            </tr>
            <tr>
                <td colspan="4" align="right"><b>Sisa</b></td>
                <td align="right"><b>{{number_format($isi->sisa)}}</b></td>
            </tr>
        </table>
    </div>
</body>
</html>
