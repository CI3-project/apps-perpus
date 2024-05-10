<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_buku');
		$this->load->library('form_validation');
	}

	public function index(){
		$data = [
			'title' => 'Data Buku',
		]; 
    $data['buku'] = $this->M_buku->Getdata('buku')->result();
    $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('buku', $data);
		$this->load->view('template/footer');
  }

  public function _rules(){
    $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required', array(
        'required' => '%s Harus diisi!!'
    ));
    $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required', array(
        'required' => '%s Harus diisi!!'
    ));
    $this->form_validation->set_rules('penerbit', 'Penerbit', 'required', array(
        'required' => '%s Harus diisi!!'
    ));  
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
        'required' => '%s Harus diisi!!'
    ));  
}

public function tambah(){
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->index();
    } else {
        $data = array(
            'kode_buku' => $this->input->post('kode_buku'),
            'nama_buku' => $this->input->post('nama_buku'),
            'penerbit' => $this->input->post('penerbit'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->M_buku->insert_data($data, 'buku');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
																									Data Berhasil di tambahkan cuyy</div>');
				redirect('buku');
    }
    
}

public function edit(){
  $this->_rules();
  
  if ($this->form_validation->run() == FALSE) {
      $this->index();
  } else {
      $data = array(
          'id_buku' => $id_buku,
        'kode_buku' => $this->input->post('kode_buku'),
        'nama_buku' => $this->input->post('nama_buku'),
        'penerbit' => $this->input->post('penerbit'),
        'deskripsi' => $this->input->post('deskripsi'),
      );
      $this->M_buku->update_data($data, 'buku');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
												Data Berhasil di ubah cuyy</div>');
				redirect('buku');
  }
  
}

public function delete($id_buku){
  $where = array('id_buku' => $id_buku);
  $this->M_buku->delete($where, 'buku');
  $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                            Data Berhasil di hapus cuyy</div>');
  redirect('buku');
}

    
}