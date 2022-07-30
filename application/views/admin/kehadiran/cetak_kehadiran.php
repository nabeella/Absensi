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
		<h4>Laporan Kehadiran Pegawai</h4>
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
				<th class="text-center">Jabatan</th>
				<th class="text-center">Hadir</th>
				<th class="text-center">Sakit</th>
				<th class="text-center">Alpha</th>
			</tr>
			<?php $no=1; foreach($lap_kehadiran as $l) : ?>
			<tr>
				<td class="text-center"><?php echo $no++ ?></td>
				<td class="text-center"><?php echo $l->nik ?></td>
				<td class="text-center"><?php echo $l->nama_pegawai ?></td>
				<td class="text-center"><?php echo $l->nama_jabatan ?></td>
				<td class="text-center"><?php echo $l->hadir ?></td>
				<td class="text-center"><?php echo $l->sakit ?></td>
				<td class="text-center"><?php echo $l->alpha ?></td>
			</tr>
			<?php endforeach ;?>
		</table>

</body>
</html>

<script type='text/javascript'>
			var css = '@page { size: landscape; margin: 2mm 2mm 2mm 2mm;}',
			head = document.head || document.getElementsByTagName('head')[0],
			style = document.createElement('style');
		
			style.type = 'text/css';
			style.media = 'print';
		
			if (style.styleSheet){
			style.styleSheet.cssText = css;
			} else {
			style.appendChild(document.createTextNode(css));
			}
		
			head.appendChild(style);
		
			window.print();
</script>