<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
</head>
<body>
    <h3>Edit data barang</h3>
    <form action="/simpanBarang" method="POST">
		@csrf

		<div class="form-group">
        Kode barang :<input type="text" name="kode" class="form-control" class="form-control" readonly ></div>
        <div class="form-group">
		Nama Barang : <input type="text" name="nama" class="form-control"></div>
        <div class="form-group">
		Jumlah : <input type="text" name="jml" class="form-control"></div>
        <div class="form-group">
		Harga : <input type="harga" name="harga" class="form-control"></div>
		<button type="submit">SIMPAN</button>
	</form>
</body>
</html>
