<div class="container-fluid">
  <?php echo $this->session->flashdata('pesan')?>
</div>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-xs-12 col-sm-6 ml-auto text-right">
        <form action="" method="get">
            <div class="row">
                <div class="col">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="" disabled selected>-- Pilih Bulan --</option>
                        <?php foreach($all_bulan as $bn => $bt): ?>
                            <option value="<?= $bn ?>" <?= ($bn == $bulan) ? 'selected' : '' ?>><?= $bt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col ">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="" disabled selected>-- Pilih Tahun</option>
                        <?php for($i = date('Y'); $i >= (date('Y') - 5); $i--): ?>
                            <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                  <h3>Absen Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h3>
                    <div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
                        <div class="dropdown d-inline">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                                Export Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprop-action">
                                <a href="<?= base_url('admin/data_absensi/cetak/?type=pdf&bulan='.$bulan.'&tahun='.$tahun.'') ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                <a href="<?= base_url('admin/data_absensi/cetak/?type=excel&bulan='.$bulan.'&tahun='.$tahun.'') ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a>
                            </div>
                          </div>
                      </div>
               </div>   
           </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead class="thead-dark">
          <tr>
              <th class="text-center">No</th>
              <th class="text-center">NIPY</th>
              <th class="text-center">Nama Pegawai</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Jam Masuk</th>
              <th class="text-center">Jam Pulang</th>
              <th class="text-center">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php if($absensi): $i=1;?>
            <?php $no=1; foreach($absensi as $a) : ?>
              <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td class="text-center"><?php echo $a->nik ?></td>
                  <td class="text-center"><?php echo $a->nama_pegawai ?></td>
                  <td class="text-center"><?php echo $a->tgl ?></td>
                  <td class="text-center"><?php echo $a->jam_masuk ?></td>
                  <td class="text-center"><?php echo $a->jam_pulang ?></td>
                  <td class="text-center"><?php echo $a->keterangan ?></td>
              </tr>
              <?php endforeach; ?>
              <?php else: ?>
              <tr>
                  <td class="bg-light" colspan="7" align="center">Tidak ada data absen</td>
              </tr>
              <?php endif; ?>
          </tbody>
       </table>
     </div>
   </div>
  </div>
</div>