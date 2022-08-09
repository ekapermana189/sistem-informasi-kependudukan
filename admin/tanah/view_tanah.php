<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT p.id_tanah, p.id_pend, p.lokasi, p.no_tanah, p.pemanfaatan_tanah, p.tgl_tanah, k.nik, k.nama from tb_tanah p inner join tb_pdd k on p.id_pend=k.id_pend where id_tanah ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Data Tanah</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<tbody>
            <tr>
					<td style="width: 200px">
						<b>NIK</b>
					</td>
					<td>:
						<?php echo $data_cek['nik']; ?>
					</td>
				</tr>
                <tr>
					<td style="width: 200px">
						<b>Nama Pemilik</b>
					</td>
					<td>:
						<?php echo $data_cek['nama']; ?>
					</td>
				</tr>
            <tr>
					<td style="width: 200px">
						<b>Nomor Tanah</b>
					</td>
					<td>:
						<?php echo $data_cek['no_tanah']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 200px">
						<b>Lokasi Tanah</b>
					</td>
					<td>:
						<?php echo $data_cek['lokasi']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 200px">
						<b>Tanggal Pembelian Tanah</b>
					</td>
					<td>:
						<?php echo $data_cek['tgl_tanah']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 200px">
						<b>Pemanfaatan Tanah</b>
					</td>
					<td>:
						<?php echo $data_cek['pemanfaatan_tanah']; ?>
					</td>
				</tr>
				


			</tbody>
		</table>
		<div class="card-footer">
			<a href="?page=data-tanah" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>