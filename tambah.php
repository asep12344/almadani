<?php include('config.php'); ?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$nis			= $_POST['nis'];
	$nisn			= $_POST['nisn'];
	$nama	= $_POST['nama'];
	$tempat_lahir		= $_POST['tempat_lahir'];
	$tanggal_lahir			= $_POST['tanggal_lahir'];
	$no_hp			= $_POST['no_hp'];
	$jurusan			= $_POST['jurusan'];



	$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nis='$nis'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nis, nisn, nama, tempat_lahir, tanggal_lahir, no_hp, jurusan) VALUES('$nis', '$nisn', '$nama', '$tempat_lahir', '$tanggal_lahir', '$no_hp', '$jurusan')") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
	}
}
?>

<form action="index.php?page=tambah_mhs" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="nis" class="form-control" size="6" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="nisn" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="nama" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">TEMPAT LAHIR</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="tempat_lahir" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">TANGGAL LAHIR</label>
		<div class="col-md-6 col-sm-6">
			<input type="date" name="tanggal_lahir" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
		<div class="col-md-6 col-sm-6 ">
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
				</label>
				<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
				</label>
			</div>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NO HP</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="no_hp" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">JURUSAN</label>
		<div class="col-md-6 col-sm-6">
			<select name="jurusan" class="form-control" required>
				<option value="">Pilih Jurusan</option>
				<option value="(PH)">PERHOTELAN</option>
				<option value="(RPL)">REKAYASA PERANGKAT LUNAK</option>
				<option value="(OTKP)">OTOMATISASI TATA KELOLA PERUSAHAAN</option>



			</select>
		</div>
	</div>

	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
		</div>
</form>
</div>