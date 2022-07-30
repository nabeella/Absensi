<?php

class Laporan_Absensi extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('login');
		}
		
	}

	public function index() 
	{	
		$data['preloader']='<div class="preloader flex-column justify-content-center align-items-center">
		<div class="img">
		  <img  class="animation__wobble" src="'. base_url().'assets/img/logosekolah.png" width="60px">
		</div>
		</div>';
		$data['title'] = "Laporan Absensi Pegawai";

		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/absensi/laporan_absensi');
		$this->load->view('template_admin/footer');
	}

	public function cetak_laporan_absensi()
	{
		$data['preloader']='';
		$data['pdf']="<script type='text/javascript'>
				var css = '@page { size: landscape; margin: 2mm 2mm 2mm 2mm;}',
				head = document.head || document.getElementsByTagName('head')[0],
				style = document.createElement('style');
			
				style.type = 'text/css';
				style.media = 'print';
			
				if (style.styleSheet){
				style.styleSheet.cssText = css;
				} else {
				style.appendChild(document.createTextNode(css));
				}
			
				head.appendChild(style);
			
				window.print();
				</script>";
		$data['title'] = "Cetak Laporan Absensi Pegawai";
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$bulantahun = $bulan.$tahun;
			}else{
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan.$tahun;
			}
		$data['lap_absensi'] = $this->db->query('SELECT *, DATE_FORMAT(absensi.tgl, "%d-%m-%Y") AS tgl, absensi.jam_masuk, absensi.jam_pulang, absensi.keterangan, data_pegawai.nama_pegawai, data_pegawai.nik  from absensi INNER JOIN data_pegawai ON absensi.id_pegawai= data_pegawai.id_pegawai where DATE_FORMAT(absensi.tgl, "%m%Y") = '.$bulantahun)->result();
		$this->load->view('admin/absensi/cetak_absensi', $data);
	}

	public function cetak_laporan_absensi_harian(){
		$data['preloader']='';
		$data['pdf']="<script type='text/javascript'>
				var css = '@page { size: landscape; margin: 2mm 2mm 2mm 2mm;}',
				head = document.head || document.getElementsByTagName('head')[0],
				style = document.createElement('style');
			
				style.type = 'text/css';
				style.media = 'print';
			
				if (style.styleSheet){
				style.styleSheet.cssText = css;
				} else {
				style.appendChild(document.createTextNode(css));
				}
			
				head.appendChild(style);
			
				window.print();
				</script>";
		$data['title'] = "Cetak Laporan Absensi Pegawai Harian";

		$data['lap_absensi'] = $this->db->query('SELECT *, DATE_FORMAT(absensi.tgl, "%d-%m-%Y") AS tgl, absensi.jam_masuk, absensi.jam_pulang, absensi.keterangan, data_pegawai.nama_pegawai, data_pegawai.nik, data_pegawai.jabatan   from absensi INNER JOIN data_pegawai ON absensi.id_pegawai= data_pegawai.id_pegawai where DATE_FORMAT(absensi.tgl, "%d%m%Y") = '.date('dmY'))->result();
		$this->load->view('admin/absensi/cetak_absensi', $data);
		}
}

?>