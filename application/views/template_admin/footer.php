<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?date('Y');?> <a href="https://adminlte.io">Nabila Rahmah</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url('assets2/')?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets2/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets2/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets2/')?>dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url('assets2/')?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url('assets2/')?>plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets2/')?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url('assets2/')?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets2/')?>plugins/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script type="text/javascript">
    // Pie Chart Example
    var donutChartCanvas = $('#myPieChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Karyawan Tetap',
          'Karyawan Tidak Tetap',
      ],
      datasets: [
        {
          data: [<?php echo $this->db->query("select status from data_pegawai where status='Karyawan Tetap'")->num_rows(); ?>,
        <?php echo $this->db->query("select status from data_pegawai where status='Karyawan Tidak Tetap'")->num_rows(); ?>,],
          backgroundColor : ['#f39c12', '#3c8dbc'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
    
    </script>

    <script type="text/javascript">
    // Area Chart Example

    var barChartCanvas = $('#myBarChart').get(0).getContext('2d')

    var barData        = {
        labels: ["Laki-laki", "Perempuan"],
        datasets : [{
        label: "Berdasarkan Jenis Kelamin",
        backgroundColor: 'rgb(23, 162, 184)',
        borderColor: 'rgb(23, 162, 184)',
        data: [<?php echo $this->db->query("select jenis_kelamin from data_pegawai where jenis_kelamin='Laki-laki'")->num_rows(); ?>,
        <?php echo $this->db->query("select jenis_kelamin from data_pegawai where jenis_kelamin='Perempuan'")->num_rows(); ?>,
        ],
        }],
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barData,
      options: barChartOptions
    })
    </script>

</body>

</html>