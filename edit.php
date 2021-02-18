<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['nis'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$nis = $_GET['nis'];

		//query ke database SELECT tabel mahasiswa berdasarkan id = $id
		$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nis='$nis'") or die(mysqli_error($koneksi));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">id tidak ada dalam database.</div>';
			exit();
			//jika hasil query > 0
		} else {
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {

		$nisn			  = $_POST['nisn'];
		$nama	= $_POST['nama'];
		$tempat_lahir	= $_POST['tempat_lahir'];
		$tanggal_lahir	= $_POST['tanggal_lahir'];
		$no_hp	= $_POST['no_hp'];
		$jurusan	= $_POST['jurusan'];

		$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET  nisn='$nisn', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_hp='$no_hp', jurusan='$jurusan' WHERE nis='$nis'") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		}
	}
	?>

	<form action="index.php?page=edit_mhs&nis=<?php echo $nis; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nis" class="form-control" size="4" value="<?php echo $data['nis']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nisn" class="form-control" value="<?php echo $data['nisn']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">TEMPAT_LAHIR</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">TANGGAL LAHIR</label>
			<div class="col-md-6 col-sm-6">
				<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NO_HP</label>
			<div class="col-md-6 col-sm-6">
				<input type="no_hp" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" required>
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
				<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>