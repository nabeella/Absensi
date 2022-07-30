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
		<h4>Absensi Pegawai</h4>
		<hr style="width: 50%; border-width: 5px; color: black">
	</center>

	<br><br>
    


	<table style="width: 100%">
		<tr>
			<td width="20%">Nama Pegawai</td>
			<td width="2%">:</td>
			<td><?php echo $pg['nama_pegawai'];?></td>
		</tr>
		<tr>
			<td>NIPY</td>
			<td>:</td>
			<td><?php echo $pg['nik'];?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?php echo $pg['jabatan'];?></td>
		</tr>
		<tr>
			<td>Bulan, Tahun</td>
			<td>:</td>
			<td><?php echo $bulan.", ".$tahun?></td>
		</tr>
	</table>

	<br>
	<table class="table table-bordered table-triped" border="2" cellpadding="5" width="100%">
	
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center" >Tanggal</th>
			<th class="text-center" >Jam Masuk</th>
			<th class="text-center" >Jam Pulang</th>
			<th class="text-center" >Keterangan</th>
		</tr>
		<?php $no=0; ?>
	    <?php foreach($lap_absensi as $ps) : ?>
		<tr>
			<td class="text-center"><?= $no++; ?></td>
			<td class="text-center"><?= $ps['tgl'] ?></td>
			<td class="text-center"><?= $ps['jam_masuk'] ?></td>
			<td class="text-center"><?= $ps['jam_pulang'] ?></td>
			<td class="text-center"><?= $ps['keterangan'] ?></td>
		</tr>
		<?php endforeach ;?>
	</table>

	<br><br><br>

	

</body>
</html>

<?php if($pdf){
    echo $pdf;
} else
{
    echo '';
}
?>