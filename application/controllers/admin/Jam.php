<?php

class Jam extends CI_Controller {

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
        $this->load->model('Jam_model', 'jam');
    }

    public function index()
    {
        $data['preloader']='<div class="preloader flex-column justify-content-center align-items-center">
		<div class="img">
		  <img  class="animation__wobble" src="'. base_url().'assets/img/logosekolah.png" width="60px">
		</div>
		</div>';
        $data['title'] = "Jam Kerja";
        $data['jam'] = $this->jam->get_all();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jam', $data);
        $this->load->view('template_admin/footer');
        $this->session->set_flashdata('pesan','');
    }
    
    public function update()
    {
        $id = $this->input->get('id');
        $start = $this->input->post('start');
        $finish = $this->input->post('finish');
            $data = [
                'start' => $start,
                'finish' => $finish
            ];
        

        $result = $this->jam->update_data($id, $data);
        if ($result) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Jam berhasil diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Jam gagal diubah!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        }

        return $this->index();
    }

}