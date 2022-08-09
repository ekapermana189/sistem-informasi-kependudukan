<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-3">

					<!-- $options = array('Comedy', 'Adventure', 'Drama', 'Crime', 'Adult');
					echo '<select name="jekel" id="jekel" class="form-control">';
					echo "<option>- Pilih Penduduk -</option>";
					
					foreach ($options as $option) {
						// echo "<option>- Pilih -</option>";
						echo "<option value='$option'>$option</option>";
					}

					echo "</select>"; -->

					<select name="id_pdd" id="id_pdd" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Penduduk -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_pdd where status='Ada'";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_pend'] ?>">
								<?php echo $row['nik'] ?>
								-
								<?php echo $row['nama'] ?>
							</option>
						<?php
						}
						?>
					</select>

				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" required autofocus>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor tanah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_tanah" name="no_tanah" placeholder="Nomor tanah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Pembelian tanah</label>

				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal pembelian tanah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pemanfaatan tanah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pt" name="pt" placeholder="Pemanfaatan tanah" required>
				</div>
			</div>


			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-tanah" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_tanah (id_pend, lokasi, no_tanah, pemanfaatan_tanah, tgl_tanah) VALUES (
            '" . $_POST['id_pdd'] . "',
            '" . $_POST['lokasi'] . "',
			'" . $_POST['no_tanah'] . "',
			'" . $_POST['pt'] . "',
            '" . $_POST['tgl_lh'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-tanah';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-tanah';
          }
      })</script>";
	}
}
     //selesai proses simpan data
