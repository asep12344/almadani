<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id = $_GET['id'];

		//query ke database SELECT tabel mahasiswa berdasarkan id = $id
		$select = mysqli_query($koneksi, "SELECT * FROM guru WHERE id='$id'") or die(mysqli_error($koneksi));

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

		$nik			 	= $_POST['nik'];
		$nama				= $_POST['nama'];
		$tempat_lahir		= $_POST['tempat_lahir'];
		$tanggal_lahir		= $_POST['tanggal_lahir'];
		$no_hp				= $_POST['no_hp'];
		$mapel			  	= $_POST['mapel'];

		$sql = mysqli_query($koneksi, "UPDATE guru SET  nik='$nik', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_hp='$no_hp', mapel='$mapel' WHERE id='$id'") or die(mysqli_error($koneksi));


		if ($sql) {
			echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_gru";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		}
	}
	?>

	<form action="index.php?page=edit_gru&id=<?php echo $id; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="id" class="form-control" size="7" value="<?php echo $data['id']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">nik</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" required>
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
				<a href="index.php?page=tampil_gru" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>