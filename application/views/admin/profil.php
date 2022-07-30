<div class="alert alert-success font-weight-bold mb-4 ml-3" style="width: 65%">Selamat datang, Anda login sebagai Admin</div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">

                            <!-- Profile Image -->
							<?php foreach($pegawai as $p) : ?>
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
										<img class="profile-user-img img-fluid img-circle" style="width: 128px" src="<?php echo base_url('photo/'.$p->photo) ?>">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo $p->nama_pegawai?></h3>

                                    <p class="text-muted text-center"><?php echo $p->jabatan?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Tanggal Masuk</b> <a class="float-right"><?php echo date('d M Y', strtotime($p->tanggal_masuk))?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right"><?php echo $p->status?></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
							<?php endforeach; ?>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->