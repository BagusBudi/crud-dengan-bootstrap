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
			<a class="navbar-brand" href="#">CRDU PHP MySQLi</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Mahasiswa</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			$fakultas		= $_POST['fakultas'];
			
			$sql = mysqli_query($koneksi, "UPDATE data SET nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', fakultas='$fakultas' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" value="<?php echo $data['nim']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" <?php if($data['jenis_kelamin'] == 'LAKI-LAKI'){ echo 'checked'; } ?> required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" <?php if($data['jenis_kelamin'] == 'PEREMPUAN'){ echo 'checked'; } ?> required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="TEKNIK INFORMATIKA" <?php if($data['jurusan'] == 'TEKNIK INFORMATIKA'){ echo 'selected'; } ?>>TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL" <?php if($data['jurusan'] == 'TEKNIK SIPIL'){ echo 'selected'; } ?>>TEKNIK SIPIL</option>
						<option value="PERTANIAN" <?php if($data['jurusan'] == 'PERTANIAN'){ echo 'selected'; } ?>>PERTANIAN</option>
					</select>
				</div>
			</div>
			<label class="col-sm-2 col-form-label">FAKULTAS</label>
				<div class="col-sm-10">
					<select name="fakultas" class="form-control" required>
						<option value="">PILIH FAKULTAS</option>
						<option value="TEKNIK KEDOKTERAN" <?php if($data['fakultas'] == 'TEKNIK KEDOKTERAN'){ echo 'selected'; } ?>>TEKNIK KEDOKTERAN</option>
						<option value="TEKNIK KEGURUAN" <?php if($data['fakultas'] == 'TEKNIK KEGURUAN'){ echo 'selected'; } ?>>TEKNIK KEGURUAN</option>
						<option value="KEROHANIAN" <?php if($data['fakultas'] == 'KEROHANIAN'){ echo 'selected'; } ?>>KEROHANIAN</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/popper.min.js"></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>