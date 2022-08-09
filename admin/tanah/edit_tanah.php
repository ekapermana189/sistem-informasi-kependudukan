<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.id_tanah, p.id_pend, p.lokasi, p.no_tanah, p.pemanfaatan_tanah, p.tgl_tanah, k.nik, k.nama from tb_tanah p inner join tb_pdd k on p.id_pend=k.id_pend WHERE id_tanah='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<input type="hidden" class="form-control" id="id_tanah" name="id_tanah" value="<?php echo $data_cek['id_tanah']; ?>" readonly />

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pemilik</label>
				<div class="col-sm-4">
					<select name="id_tanah" id="id_tanah" class="form-control select2bs4" disabled>

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
					<input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $data_cek['lokasi']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Tanah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_tanah" name="no_tanah" value="<?php echo $data_cek['no_tanah']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Pembelian Tanah</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_tanah']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pemanfaatan Tanah</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="pt" name="pt" value="<?php echo $data_cek['pemanfaatan_tanah']; ?>" />
				</div>
			</div>

		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-tanah" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_tanah SET 
		lokasi='" . $_POST['lokasi'] . "',
		no_tanah='" . $_POST['no_tanah'] . "',
		tgl_tanah='" . $_POST['tgl_lh'] . "',
		pemanfaatan_tanah='" . $_POST['pt'] . "'
		WHERE id_tanah='" . $_POST['id_tanah'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-tanah';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=edit-tanah';
        }
      })</script>";
	}
}
