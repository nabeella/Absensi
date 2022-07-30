<?php

class Izin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Izin_model', 'izin');
		$this->load->model('Pegawai_model', 'pegawai');
		$this->load->model('Jam_model', 'jam');
        $this->load->helper('Tanggal');
		$this->load->helper('Check_absen');

		if($this->session->userdata('hak_akses') != '2'){
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
		$data['title'] = "Izin";
		$now = date('H:i:s');
		$id_user = $this->session->userdata('id_pegawai');
		$nik = $this->db->query("SELECT data_pegawai.nik FROM data_pegawai WHERE id_pegawai='$id_user'")->row_array();
		$data['all'] = $this->izin->jml_izinharian($nik['nik']);		
		$data['izin'] = $this->izin->izinharian($nik['nik']);		

        $this->form_validation->set_rules('date','Tanggal Izin','required');
		$this->form_validation->set_rules('ket','Keterangan','required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('template_pegawai/header',$data);
			$this->load->view('template_pegawai/sidebar');
			$this->load->view('pegawai/izin', $data);
			$this->load->view('template_pegawai/footer');
			$this->session->set_flashdata('response','');
		} else {
			$this->izin();
		}
		
	}

	public function izin() 
	{
		$id_user = $this->session->userdata('id_pegawai');
		$nik = $this->db->query("SELECT data_pegawai.nik FROM data_pegawai WHERE id_pegawai='$id_user'")->row_array();
		$start = $this->jam->getstart(1);
		$fin = $this->jam->getfinish(1);

        $date = $this->input->post('date');
		$ket=$this->input->post('ket');
		$data = [
		        	'nik' => $nik['nik'],
					'tanggal' => $date,
					'keterangan' => $ket,
					'konfirmasi' => 'Belum Dikonfirmasi'
				];
		$result = $this->izin->insert_data($data);
		if ($result) {
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Izin Anda berhasil dicatat! Tunggu konfirmasi dari Admin</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
		}
		
        redirect('pegawai/izin');
		
	}

	public function detail_izin()
    {
		$data['title'] = "Izin";

        $id_user = $this->session->userdata('id_pegawai');
		//$data['absensi'] = $this->absensi->semuaabsen($id_user);
        $bulan = $this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        $data['pegawai'] = $this->pegawai->find($id_user);
		$nik = $this->db->query("SELECT data_pegawai.nik FROM data_pegawai WHERE id_pegawai='$id_user'")->row_array();
        $data['izin'] = $this->izin->get_izin($nik['nik'],$bulan,$tahun);
        $data['jam_kerja'] = (array) $this->jam->get_all();
        $data['all_bulan'] = bulan();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

		$this->load->view('template_pegawai/header',$data);
		$this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/izin_detail', $data);
		$this->load->view('template_pegawai/footer');
    }

	public function cetak(){
        $id_user = $this->session->userdata('id_pegawai');
		$data['title'] = "Cetak Data Izin Pegawai";
			if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$bulantahun = $bulan.$tahun;
			}else{
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan.$tahun;
			}
			$data['bulan'] = $bulan;
            $data['tahun'] = $tahun;

            
			$data['pg']= $this->db->query('SELECT nama_pegawai, nik, jabatan FROM data_pegawai WHERE id_pegawai='.$id_user)->row_array();
			$data['lap_izin'] = $this->izin->get_izin($data['pg']['nik'],$bulan,$tahun);
			
			
	
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
				$this->load->view('pegawai/cetak_izin', $data);
			}
			if($type=="excel")
			{
				$data['pdf']='';
				$time = date("d-m-Y");
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=data_absensi_".$time.".xls");
				$this->load->view('pegawai/cetak_izin', $data);
			}
			
		}


}