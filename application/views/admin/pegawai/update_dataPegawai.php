<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

</div>
<!-- /.container-fluid -->

<div class="card" style="width: 60% ; margin-bottom: 100px">
	<div class="card-body">

		<?php foreach ($pegawai as $p)  : ?>
		<form method="POST" action="<?php echo base_url('admin/data_pegawai/update_data_aksi')?>" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>NIPY</label>
				<input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $p->id_pegawai?>">
				<input type="number" name="nik" class="form-control" value="<?php echo $p->nik?>">
				<?php echo form_error('nik', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Nama Pegawai</label>
				<input type="text" name="nama_pegawai" class="form-control" value="<?php echo $p->nama_pegawai?>">
				<?php echo form_error('nama_pegawai', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $p->username?>">
				<?php echo form_error('username', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
				<?php echo form_error('password', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jenis_kelamin" class="form-control" value="<?php echo $p->id_pegawai?>">
					<option value="<?php echo $p->jenis_kelamin?>"><?php echo $p->jenis_kelamin?></option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
				<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Jabatan</label>
				<select name="jabatan" class="form-control">
					<option value="<?php echo $p->jabatan?>"><?php echo $p->jabatan?></option>
					<?php foreach($jabatan as $j) :?>
					<option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>No Rekening</label>
				<select name="rek" class="form-control">
					<option value="<?php $rek = preg_replace("/[^a-zA-Z]+/", "", $p->no_rekening); echo $rek; ?>"><?php echo $rek;?></option>
					<option value="">--Pilih Bank--</option>
					<option value="BNI">BNI</option>
					<option value="BCA">BCA</option>
					<option value="BRI">BRI</option>
					<option value="PERMATA">Permata</option>
					<option value="CIMB">CIMB</option>
					<option value="JATENG">JATENG</option>
					<option value="MANDIRI">Mandiri</option>
					<option value="BRI">BRI</option>
				</select>
				<input type="text" name="norek" class="form-control" Placeholder="No Rekening" value="<?php echo (int)$p->no_rekening;?>">
				<?php echo form_error('no_rekening', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Tanggal Masuk</label>
				<input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $p->tanggal_masuk?>">
				<?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value="<?php echo $p->status?>"><?php echo $p->status?></option>
					<option value="Karyawan Tetap">Karyawan Tetap</option>
					<option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
				</select>
				<?php echo form_error('status', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Hak Akses</label>
				<select name="hak_akses" class="form-control">
					<option value="<?php echo $p->hak_akses?>">
						<?php if ($p->hak_akses=='1') {
							echo "Admin";
						} else {
							echo "Pegawai";
						}?>
					</option>
					<option value="1">Admin</option>
					<option value="2">Pegawai</option>
					<option value="3">bendahara</option>
				</select>
			</div>

			<div class="form-group">
				<label>Photo</label>
				<input type="file" name="photo" class="form-control">
			</div>

			<button type="submit" class="btn btn-success" >Simpan</button>
			<a href="<?php echo base_url('admin/data_pegawai')?>" class="btn btn-warning">Kembali</a>

		</form>
	<?php endforeach; ?>
	</div>
</div>