<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body onload="siap()">
	<script type="text/javascript">
		function siap() {
			document.getElementById('kode').focus();
		}

		function tiru(){
			document.getElementById('kdBarang').value = document.getElementById('kode').value;
		}
	</script>
<h3>Tambah <a href="/barang">Data</a> Barang</h3>
	<div class="form-group">
    Kode Barang : <input type="text" name="" id="kode" onkeyup="tiru()" class="form-control"></div>
	<form action="/simpanBarang" method="POST">
		@csrf
		<input type="hidden" name="kode" id="kdBarang">
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
