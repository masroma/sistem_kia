<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->model('Laporan_model');
        if((!$this->session->userdata('ses_email')) ){ 
            redirect('auth');
        } 
       
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('laporan/laporan');
        $this->load->view('layout/footer');
    }

    public function hasillaporan()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $status  = $this->input->post('status');

        //echo $status; exit;

       if($tanggal_awal == NULL && $tanggal_akhir == NULL && $status == NULL){
           redirect('Laporan');
       }
        $data = array(
           
            'data_kia' => $this->Laporan_model->get_by_date($tanggal_awal, $tanggal_akhir, $status),
            'start' => 0,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'status' => $status
        );

        //var_dump($data); exit;
        
        $this->load->view('layout/header',$data);
        $this->load->view('laporan/hasillaporan',$data);
        $this->load->view('layout/footer',$data);
    }

    public function cetak()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $status  = $this->input->post('status');
        $data = array(
           
            'data_kia' => $this->Laporan_model->get_by_date($tanggal_awal, $tanggal_akhir, $status),
            'start' => 0,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'status' => $status
        );
        $this->load->library('Pdf');
 

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-kia.pdf";
        $this->pdf->load_view('laporan/laporan_pdf',$data);
    }
}