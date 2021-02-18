<?php include('config.php'); ?>

<center>
	<font size="6">Tambah Data Guru</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$id				= $_POST['id'];
	$nik			= $_POST['nik'];
	$nama			= $_POST['nama'];
	$tempat_lahir	= $_POST['tempat_lahir'];
	$tanggal_lahir	= $_POST['tanggal_lahir'];
	$no_hp			= $_POST['no_hp'];
	$mapel			= $_POST['mapel'];



	$cek = mysqli_query($koneksi, "SELECT * FROM guru WHERE id='$id'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($koneksi, "INSERT INTO guru(id, nik, nama, tempat_lahir, tanggal_lahir, no_hp, mapel) VALUES('$id', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$no_hp', '$mapel')") or die(mysqli_error($koneksi));

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

<form action="index.php?page=tambah_gru" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="id" class="form-control" size="7" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="nik" class="form-control" required>
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
		<label class="col-form-label col-md-3 col-sm-3 label-align">NO HP</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="no_hp" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">MAPEL</label>
		<div class="col-md-6 col-sm-6">
			<select name="mapel" class="form-control" required>
				<option value="">Pilih Mata Pelajaran</option>
				<option value="(PAI)">Pelajaran Agama Islam</option>
				<option value="(PEMEROGRAMAN)">Pemeograman</option>
				<option value="(BASDAT)">Basis Data</option>
				<option value="(PBO)">Pemerograman Berorientasi Objek</option>
				<option value="(PKK)">Program kreatif kewirausahaan</option>
				<option value="(PPL)">Pemodelan Perangkat Lunak</option>
				<option value="(B.INDO)">Bahasa Indonesia)</option>
				<option value="(B.INGGRIS)">Bahasa Inggris</option>
				<option value="(PKN)">Pelajaran Kewarga Negaraan</option>
				<option value="(MTK)">Matematika</option>
				<option value="(PJOK)">pembelajaran Jasmani Dan Olahraga</option>


			</select>
		</div>
	</div>


	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
		</div>
</form>
</div>