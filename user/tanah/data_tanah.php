<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Tanah
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-tanah" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Lokasi</th>
						<th>No Tanah</th>
						<th>Pemanfaatan Tanah</th>

					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_tanah, p.id_pend, p.lokasi, p.no_tanah, p.pemanfaatan_tanah, k.nik, k.nama from tb_tanah p inner join tb_pdd k on p.id_pend=k.id_pend");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['lokasi']; ?>
							</td>
							<td>
								<?php echo $data['no_tanah']; ?>
							</td>
							<td>
								<?php echo $data['pemanfaatan_tanah']; ?>

							</td>


						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script>
		$('.btn-del').on('click', function(e) {
			e.preventDefault();
			const href = $(this).attr('href')

			Swal.fire({
				title: 'Apa Kamu Yakin!',
				text: 'Data ini akan dihapus',
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Hapus Data',
			}).then((result) => {
				if (result.value) {
					document.location.href = href;
				} else {
					Swal.fire('Terima Kasih atas konfirmasinya', 'Silahkan kembali ke halaman data', 'error');

				}
			})
		})
	</script>
	<!-- onclick="return confirm('Apakah anda yakin hapus data ini ?')" -->