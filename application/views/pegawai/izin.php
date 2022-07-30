<div class="container-fluid">

  <!-- Page Heading -->
  <?= $this->session->flashdata('response')?>
  <?php echo form_error('ket', '<div class="text-small text-danger"> </div>')?>
  
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengajuan Izin atau Cuti Harian</h4>
            </div>
            <div class="card-body">
                <table class="table w-100">
                    <thead>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(is_weekend()): ?>
                                <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu mengambil izin atau cuti</td>
                            <?php else: ?>
                                <td><i class="ml-3 fas fa-<?php if ($all==0|$all==null) {
                                    echo "exclamation-circle text-warning";
                                 } else {
                                    if($izin['konfirmasi'] == "Belum Dikonfirmasi")
                                    {echo "exclamation-circle text-warning";}
                                    else{
                                        echo "check-circle text-success";
                                    }
                                 } ?>"></i><?php if ($all==0|$all==null) {
                                    echo "";
                                 } else {
                                    echo " ".$izin['konfirmasi'];
                                 } ?></td>
                                <td>
                                    <?php if ($all==0|$all==null) {
                                    ?>
                                    <form method="POST" action="<?= base_url("pegawai/izin"); ?>">
                                    <input type="date" name="date" class="form-control">
                                    <?php } else {
                                    echo $izin['tanggal'];
                                 } ?>
                                </td> 
                                <td>
                                <?php if ($all==0|$all==null) {
                                    echo '
                                    <input type="text" name="ket" class="form-control" Placeholder="Alasan Izin">
                                    </td>';
                                 } else {
                                    echo $izin['keterangan'];
                                 } ?>
                                
                                <td>
                                <button type="submit" class="btn btn-primary btn-sm btn-fill col-12 <?= ($all == 1 ||$all != null) ? ' disabled style="cursor:not-allowed"' : '' ?>">Izin</button>
                                 </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>