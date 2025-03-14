<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Memuat model prodi_model
        $this->load->model('ProdiModel'); //Memuat form validation library
    }
    public function index()
    {
        $data['title'] = "Data Prodi | SIMDAWA-APP";
        $data['prodi'] = $this->ProdiModel->get_prodi();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('prodi/prodi_read');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if(isset($_POST['create'])){
            $this->ProdiModel->insert_prodi();
            redirect('prodi');
        }else{
            $data['title'] = "Tambah Data Prodi | SIMDAWA-APP";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('prodi/prodi_tambah');
            $this->load->view('template/footer');
        }
    }

    public function ubah($id){
        if(isset($_POST['update'])){
            $this->ProdiModel->update_prodi();
            redirect('prodi');
        }else{
            $data['title'] = "Perbaharui Data Prodi    |   SIMDAWA-APP";
            $data['prodi'] = $this->ProdiModel->get_prodi_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('prodi/prodi_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id){
        if(isset($id)){
            $this->ProdiModel->delete_prodi($id);
            redirect('prodi');
        }
    }

    public function cetak()
    {
        $data['prodi'] = $this->ProdiModel->get_prodi();
        $this->load->view('prodi/prodi_print', $data);
    }
}