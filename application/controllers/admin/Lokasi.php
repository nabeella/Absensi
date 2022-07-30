<?php

class Lokasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('ModelPenggajian', 'lokasi');
		$this->load->model('Pegawai_model', 'pegawai');
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
		$data['title'] = "Lokasi";
		$now = date('H:i:s');
		$id_user = $this->session->userdata('id_pegawai');
		$data['lok'] = $this->db->query("SELECT * FROM lokasi WHERE id=1")->row_array();	

        $this->form_validation->set_rules('name','Nama Tempat','required');
		$this->form_validation->set_rules('lat','Latitude Lokasi','required');
		$this->form_validation->set_rules('long','Longitude Lokasi','required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('template_admin/header',$data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('admin/lokasi', $data);
			$this->load->view('template_admin/footer');
			$this->session->set_flashdata('response','');
		} else {
			$this->lokasi();
		}
		
	}

	public function lokasi() 
	{
		$id_user = $this->session->userdata('id_pegawai');
		$data['lok'] = $this->db->query("SELECT * FROM lokasi WHERE id=1")->row_array();
		$id = $this->input->post('id');

        $name = $this->input->post('name');
		$lat=$this->input->post('lat');
		$long=$this->input->post('long');
		$data = [
					'nama' => $name,
					'latitude' => $lat,
					'longitude' => $long
				];
		$where = [
		        'id' => $id
		    ];
		$this->db->update('lokasi', $data, $where);
		
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Lokasi berhasil diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
		
		
        redirect('admin/lokasi');
		
	}
}