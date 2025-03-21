<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Memuat model Jenis_beasiswa_model
        $this->load->model('JenisModel'); //Memuat form validation library
    }
    public function index()
    {
        $data['title'] = "Data Jenis Beasiswa | SIMDAWA-APP";
        $data['jenis'] = $this->JenisModel->get_jenis();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis_beasiswa/jenis_read');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if(isset($_POST['create'])){
            $this->JenisModel->insert_jenis();
            redirect('jenis');
        }else{
            $data['title'] = "Tambah Data Jenis Beasiswa | SIMDAWA-APP";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('jenis_beasiswa/jenis_tambah');
            $this->load->view('template/footer');
        }
    }

    public function ubah($id){
        if(isset($_POST['update'])){
            $this->JenisModel->update_jenis();
            redirect('jenis');
        }else{
            $data['title'] = "Perbaharui Data Jenis Beasiswa    |   SIMDAWA-APP";
            $data['jenis'] = $this->JenisModel->get_jenis_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('jenis_beasiswa/jenis_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id){
        if(isset($id)){
            $this->JenisModel->delete_jenis($id);
            redirect('jenis');
        }
    }

        public function cetak()
    {
        $data['jenis'] = $this->JenisModel->get_jenis();
        $this->load->view('jenis/jenis_print', $data);
    }
}