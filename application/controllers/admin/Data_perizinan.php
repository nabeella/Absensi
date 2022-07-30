<?php

class Data_Perizinan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Jam_model', 'jam');
        $this->load->helper('Tanggal');
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
		$data['title'] = "Data Izin Kehadiran Pegawai";

		$bulan = $this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');

		$data['izin'] = $this->db->query('SELECT *, data_pegawai.nama_pegawai FROM izin,data_pegawai WHERE izin.nik=data_pegawai.nik and DATE_FORMAT(izin.tanggal, "%m%Y") = '.$bulan.$tahun)->result();
		$data['jam_kerja'] = (array) $this->jam->get_all();
        $data['all_bulan'] = bulan();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/perizinan/data_perizinan', $data);
		$this->load->view('template_admin/footer');
		$this->session->set_flashdata('pesan','');
	}

	public function update_data_aksi() 
	{
		$nik =$this->input->get('nik');
		$ket =$this->input->get('ket');
		$data['izin'] = $this->db->query("SELECT * FROM izin WHERE izin.nik=".$nik)->row_array();
		if($ket=="izin")
		{
			$konfirmasi= "Diizinkan";
			$this->db->set('konfirmasi', $konfirmasi);
			$this->db->where('nik', $nik);
			$this->db->update('izin');
		}
		if($ket=="tolak")
		{
			$konfirmasi= "Ditolak";
			$this->db->set('konfirmasi', $konfirmasi);
			$this->db->where('nik', $nik);
			$this->db->update('izin');
		}
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Izin Pegawai sudah dikonfirmasi</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_perizinan');
		
	}

	public function cetak(){

		$data['title'] = "Cetak Data Perizinan Pegawai";
			if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$bulantahun = $bulan.$tahun;
			}else{
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan.$tahun;
			}

			$data['lap_izin'] = $this->db->query('SELECT *, data_pegawai.nama_pegawai FROM izin,data_pegawai WHERE izin.nik=data_pegawai.nik and DATE_FORMAT(izin.tanggal, "%m%Y") = '.$bulan.$tahun)->result();

			
	
			$type=$this->input->get('type');
			if($type=="pdf")
			{
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
				$this->load->view('admin/perizinan/cetak_izin', $data);
			}
			if($type=="excel")
			{
				$data['pdf']='';
				$time = date("d-m-Y");
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=data_penggajian_".$time.".xls");
				$this->load->view('admin/perizinan/cetak_izin', $data);
			}
			
		}

}
?>