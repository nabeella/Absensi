<div class="container-fluid">

  <!-- Page Heading -->
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
                  <h3>Izin Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h3>
                    <div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
                        <div class="dropdown d-inline">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                                Export Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprop-action">
                                <a href="<?= base_url('pegawai/izin/cetak/?type=pdf&bulan='.$bulan.'&tahun='.$tahun.'') ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                <a href="<?= base_url('pegawai/izin/cetak/?type=excel&bulan='.$bulan.'&tahun='.$tahun.'') ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a>
                            </div>
                          </div>
                      </div>
               </div>   
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <table class="table border-0">
                            <tr>
                                <th class="border-0 py-0">Nama</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?= $pegawai->nama_pegawai ?></th>
                            </tr>
                            <tr>
                                <th class="border-0 py-0">Jabatan</th>
                                <th class="border-0 py-0">:</th>
                                <th class="border-0 py-0"><?= $pegawai->status ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <h4 class="card-title mb-4">Detail Izin</h4>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Konfirmasi</th>
                    </thead>
                    <tbody>
                        <?php if($izin): $i=1;?>
                            <?php foreach($izin as $z): ?>
                                <tr>
                                    <td><?= ($i++) ?></td>
                                    <td><?= date('d M Y', strtotime($z['tanggal'])) ?></td>
                                    <td><?= $z['keterangan'] ?></td>
                                    <td><?= $z['konfirmasi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="bg-light" colspan="5" align="center">Tidak ada data izin</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
             </div>
            </div>
        </div>
    </div>
</div>
