<div class="container-fluid">
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/data_jabatan/tambah_data') ?>"><i class="fas fa-plus"></i> Tambah Jabatan</a>
  <?php echo $this->session->flashdata('pesan')?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Jabatan</th>
              <th class="text-center">Aksi</th>
           </tr>
         </thead>
         <tbody>
           <?php $no=1; foreach($jabatan as $j) : ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $j->nama_jabatan ?></td>
              
              <td>
                <center>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/data_jabatan/update_data/'.$j->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_jabatan/delete_data/'.$j->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
                </center>
              </td>
            </tr>
          <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>