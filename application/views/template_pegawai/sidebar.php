<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <div class="img">
                  <img src="<?php echo base_url(); ?>assets/img/logosekolah.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>
                <span class="brand-text font-weight-light">Absensi</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('pegawai/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-fw fa-database"></i>
                                <p>
                                    Absensi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('pegawai/absensi') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Absen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pegawai/absensi/detail_absensi') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Detail Absensi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-fw fa-database"></i>
                                <p>
                                    Izin
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('pegawai/izin') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Izin Absen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pegawai/izin/detail_izin') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Detail Izin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url('pegawai/ganti_password') ?>" class="nav-link">
                              <i class="nav-icon fas fa-fw fa-lock"></i>
                                <p>
                                    Ubah Password
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
                              <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                                <p>
                                   Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?php echo $title?></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo $title?></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->