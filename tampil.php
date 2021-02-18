<?php
//memasukkan file config.php
include('config.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Siswa</font>
	</center>
	<hr>
	<a href="index.php?page=tambah_mhs"><button class="btn btn-dark right">Tambah Data</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIS</th>
					<th>NISN</th>
					<th>NAMA</th>
					<th>TEMPAT LAHIR</th>
					<th>TANGGAL LAHIR</th>
					<th>NO HP</th>
					<th>JURUSAN</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nis DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['nis'] . '</td>
							<td>' . $data['nisn'] . '</td>
							<td>' . $data['nama'] . '</td>
							<td>' . $data['tempat_lahir'] . '</td>
							<td>' . $data['tanggal_lahir'] . '</td>
							<td>' . $data['no_hp'] . '</td>
							<td>' . $data['jurusan'] . '</td>
							<td>
								<a href="index.php?page=edit_mhs& nis=' . $data['nis'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?nis=' . $data['nis'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
</div>