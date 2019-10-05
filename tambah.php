<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD dengan Bootstrap</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">CRUD PHP Tambah</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Siswa</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nim			= $_POST['nim'];
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			$fakultas		= $_POST['fakultas'];

			
			$cek = mysqli_query($koneksi, "SELECT * FROM data WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO data(nim, nama, jenis_kelamin, jurusan, fakultas) VALUES('$nim', '$nama', '$jenis_kelamin', '$jurusan', '$fakultas')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL">TEKNIK SIPIL</option>
						<option value="PERTANIAN">PERTANIAN</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">FAKULTAS</label>
				<div class="col-sm-10">
					<select name="fakultas" class="form-control" required>
						<option value="">PILIH FAKULTAS</option>
						<option value="FAKULTAS KEDOKTERAN">FAKULTAS KEDOKTERAN</option>
						<option value="FAKULTAS SIPIL">FAKULTAS SIPIL</option>
						<option value="KEROHANIAN">KEROHANIAN</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/popper.min.js"></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>