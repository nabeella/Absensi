<div class="container-fluid">

  <!-- Page Heading -->
  <?= $this->session->flashdata('response')?>
  <?php echo form_error('name', '<div class="text-small text-danger"> </div>')?>
  <?php echo form_error('lat', '<div class="text-small text-danger"> </div>')?>
  <?php echo form_error('long', '<div class="text-small text-danger"> </div>')?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Lokasi Absensi</h4>
            </div>
            <div class="card-body">
                <table class="table w-100">
                    <thead>
                        <th>#</th>
                        <th>Nama Lokasi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                                <form method="POST" action="<?= base_url("admin/lokasi"); ?>">
                                <td><input type="hidden" name="id" value="<?= $lok['id'];?>"><?= $lok['id'];?></td>
                                <td>
                                    <input type="text" name="name" class="form-control" value="<?= $lok['nama'];?>">
                                </td>
                                <td>
                                    <input type="text" name="lat" class="form-control" value="<?= $lok['latitude'];?>">
                                </td> 
                                <td>
                                    <input type="text" name="long" class="form-control" value="<?= $lok['longitude'];?>">
                                </td> 
                                <td>
                                <button type="submit" class="btn btn-primary btn-sm btn-fill col-12">Update</button>
                                 
                                </td>
                                </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>