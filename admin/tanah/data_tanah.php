<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
						<th>Aksi</th>
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

							<td>
								<a href="?page=view-tanah&kode=<?php echo $data['id_tanah']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-user"></i> </a> <a href="?page=edit-tanah&kode=<?php echo $data['id_tanah']; ?>" title="Ubah" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-tanah&kode=<?php echo $data['id_tanah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" id="delete_id" title="Hapus" class="btn btn-danger btn-sm" type="submit">
									<i class="fa fa-trash"></i>
									</>
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

	<!-- onclick="return confirm('Apakah anda yakin hapus data ini ?')" -->