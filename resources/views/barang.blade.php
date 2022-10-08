<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
    <div class="contanier">
<h3><a href="/tambahBarang">Tambah</a> Data Barang</h3>
<table class="table table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Harga Satuan</th>
		<th>Jumlah</th>
		<th>Aksi</th>
	</tr>
	@foreach($barang as $isi)
	<tr>
		<td></td>
		<td>{{$isi->kode}}</td>
		<td>{{$isi->nama}}</td>
		<td>{{$isi->harga}}</td>
		<td>{{$isi->jml}}</td>
		<td>
			<a href="/hapusBarang/{{$isi->kode}}" class="btn btn-danger">Hapus</a>
			||
			<a href="/editBarang/{{$isi->kode}}" class="btn btn-warning">Edit</a>
		</td>
	</tr>
	@endforeach
</table>
</div>
</body>
</html>
