<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h3>SMK MA'ARIF NU 03 LARANGAN</h3>
		<h4>Laporan Absensi Pegawai</h4>
	</center>

	<?php
	if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	?>
	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo $bulan?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo $tahun?></td>
		</tr>
	</table>

	<table class="table table-bordered table-triped" border="2" cellpadding="5" width="100%">
			<tr>
				<th class="text-center">No</th>
            	<th class="text-center">NIPY</th>
            	<th class="text-center">Nama Pegawai</th>
            	<th class="text-center">Tanggal</th>
            	<th class="text-center">Jam Masuk</th>
            	<th class="text-center">Jam Pulang</th>
            	<th class="text-center">Keterangan</th>
			</tr>
			<?php $no=1; foreach($lap_absensi as $a) : ?>
			<tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $a->nik ?></td>
              <td class="text-center"><?php echo $a->nama_pegawai ?></td>
              <td class="text-center"><?php echo date('d M Y', strtotime($a->tgl)) ?></td>
              <td class="text-center"><?php echo $a->jam_masuk ?></td>
              <td class="text-center"><?php echo $a->jam_pulang ?></td>
              <td class="text-center"><?php echo $a->keterangan ?></td>
            </tr>
			<?php endforeach ;?>
		</table>

</body>
</html>

<?=$pdf?>