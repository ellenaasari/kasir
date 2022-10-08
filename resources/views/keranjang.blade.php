<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body onload="siap()">
<div class="contanier">
    <script>
        function siap(){
            document.getElementById('kode').focus()
        }
    </script>
    <h1>TOTAL BELANJA :</h1>
	<h3>Transaksi penjualan #{{Session::get('nmrStruk')}}</h3>
	<form action="/isiKeranjang" method="POST">
		@csrf
		<div class="form-group">
            Tanggal :
		    <input type="text" name="tgl" value="{{date('d/m/Y')}}" readonly class="form-control">
        </div>
        <div class="form-group">
            Kode :
		    <input type="text" name="kode" id="kode" class="form-control">
        </div>
        <div class="form-group">
            Jumlah :
		    <input type="text" name="jml" value="1" class="form-control">
        </div>
        <button type="submit" class="btn btn-info">OK</button>
	</form>

    <h3>DATA BARANG BELANJA</h3>
	<table class="table table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			<th>Aksi</th>
		</tr>
		<?php
        $grandTot = 0;

        $nomer = 1;
        ?>
		@foreach($barang as $barang)
		<tr>
			<td>{{$nomer++}}</td>
			<td>{{$barang->nama}}</td>
			<td align="right">{{$barang->harga}}</td>
			<td align="center">{{$barang->jml}}</td>
			<td align="right">
                {{ $barang->jml*$barang->harga }}
            </td>
			<td>
				<a href="/hapusKeranjang/{{$barang->kdBarang}}">
				HAPUS
				</a>
			</td>
		</tr>
        <?php
            $grandTot = $grandTot + ($barang->jml*$barang->harga) ;
        ?>
		@endforeach
        <form action="/bayar" method="POST">
            @csrf
        <tr>
            <td colspan="4" align="right">Total Harga</td>
            <td>
                <input type="text" value="{{$grandTot}}" name="total" id="total" readonly>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">Bayar</td>
            <td>
                <script>
                    function hitung(){
                        total = document.getElementById('total').value;
                        document.getElementById('sisa').value = document.getElementById('bayar').value-total;
                    }
                </script>
                <input type="text" name="bayar" id="bayar" onkeyup="hitung()">
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">Sisa bayar</td>
            <td>
                <input type="text" name="sisa" id="sisa" readonly>
            </td>
            <td><button type="submit" class="btn btn-success">OK</button></td>
        </tr>
    </form>
	</table>
</div>
</body>
</html>
