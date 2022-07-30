<?php

class Absensi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Absensi_model', 'absensi');
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
		$data['title'] = "Absensi";
		$now = date('H:i:s');
		$id_user = $this->session->userdata('id_pegawai');
		$data['absen'] = $this->absensi->jml_absenharian($id_user);		
		$data['absensi'] = $this->absensi->absenharian($id_user);
		$data['lokasi']= $this->db->query('SELECT * FROM lokasi where id=1')->row_array();

		$this->load->view('template_pegawai/header',$data);
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/absensi', $data);
		$this->load->view('template_pegawai/footer');
		$this->session->set_flashdata('response','');
	}

	public function absen() 
	{
        $keterangan = $this->input->get('ket');
		$id_user = $this->session->userdata('id_pegawai');
		$absensi = $this->absensi->absenharian($id_user);
		if($keterangan=='masuk')
		{
			$start = $this->jam->getstart(1);
			$fin = $this->jam->getfinish(1);
			$fin2 = $this->jam->getfinish(2);
			if(strtotime(date('H:i:s'))>=strtotime($start['start']) && strtotime(date('H:i:s'))<=strtotime($fin['finish']))
			{
				$ket="Masuk Awal";
				$data = [
					'tgl' => date('Y-m-d'),
					'jam_masuk' => date('H:i:s'),
					'jam_pulang' => '',
					'keterangan' => $ket,
					'id_pegawai' => $this->session->userdata('id_pegawai')
				];
				$result = $this->absensi->insert_data($data);
				if ($result) {
					$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Absensi Anda berhasil dicatat!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
				}
			}
			if(strtotime(date('H:i:s'))>=strtotime($fin['finish']) && strtotime(date('H:i:s'))<=strtotime($fin2['finish']))
			{
				$ket="Masuk Telat";
				$data = [
					'tgl' => date('Y-m-d'),
					'jam_masuk' => date('H:i:s'),
					'jam_pulang' => '',
					'keterangan' => $ket,
					'id_pegawai' => $this->session->userdata('id_pegawai')
				];
				$result = $this->absensi->insert_data($data);
				if ($result) {
					$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Absensi Anda berhasil dicatat!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
				}
			}
			if(strtotime(date('H:i:s'))<=strtotime($start['start'])||strtotime(date('H:i:s'))>=strtotime($fin2['finish']))
			{
				$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Absensi Anda gagal dicatat!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
			}
		}
		else {
			$idabsen= $absensi['id_absen'];
			$start = $this->jam->getstart(2);
			$fin = $this->jam->getfinish(2);
			if(strtotime(date('H:i:s'))>=strtotime($start['start']) && strtotime(date('H:i:s'))<=strtotime($fin['finish']))
			{
				$ket= $absensi['keterangan']." dan Pulang Awal";
				$this->db->set('jam_pulang', date('H:i:s'));
				$this->db->set('keterangan', $ket);
				$this->db->where('id_absen', $idabsen);
				$this->db->update('absensi');
			}
			if(strtotime(date('H:i:s'))>=strtotime($fin['finish']))
			{
				$ket= $absensi['keterangan']." dan Lembur";
				$this->db->set('jam_pulang', date('H:i:s'));
				$this->db->set('keterangan', $ket);
				$this->db->where('id_absen', $idabsen);
				$this->db->update('absensi');
			}
			
		}
		
        redirect('pegawai/absensi');
	}

	public function detail_absensi()
    {
		$data['title'] = "Absensi";

        $id_user = $this->session->userdata('id_pegawai');
		//$data['absensi'] = $this->absensi->semuaabsen($id_user);
        $bulan = $this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        $data['pegawai'] = $this->pegawai->find($id_user);
        $data['absensi'] = $this->absensi->get_absen($id_user,$bulan,$tahun);
        $data['jam_kerja'] = (array) $this->jam->get_all();
        $data['all_bulan'] = bulan();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

		$this->load->view('template_pegawai/header',$data);
		$this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/absensi_detail', $data);
		$this->load->view('template_pegawai/footer');
    }

	public function cetak(){
        $id_user = $this->session->userdata('id_pegawai');
		$data['title'] = "Cetak Data Absensi Pegawai";
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

			$data['lap_absensi'] = $this->absensi->get_absen($id_user,$bulan,$tahun);
			$data['pg']= $this->db->query('SELECT nama_pegawai, nik, jabatan FROM data_pegawai WHERE id_pegawai='.$id_user)->row_array();
			
			
	
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
				$this->load->view('pegawai/cetak_absensi', $data);
			}
			if($type=="excel")
			{
				$data['pdf']='';
				$time = date("d-m-Y");
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=data_absensi_".$time.".xls");
				$this->load->view('pegawai/cetak_absensi', $data);
			}
			
		}




}