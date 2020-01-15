<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_kia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Data_kia_model','Data_anak_model','Data_orangtua_model', 'Data_agama_model','Data_darah_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_kia/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_kia/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_kia/index.html';
            $config['first_url'] = base_url() . 'data_kia/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_kia_model->total_rows($q);
        $data_kia = $this->Data_kia_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_kia_data' => $data_kia,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/header');
        $this->load->view('data_kia/data_kia_list', $data);
        $this->load->view('layout/footer');
    }

    public function read($id) 
    {
        $row = $this->Data_kia_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_kis' => $row->id_kis,
            'kode_anak' => $row->kode_anak,
            'id_orangtua' => $row->id_orangtua,
            'nik_bayi' => $row->nik_bayi,
            'agama' => $row->agama,
            'gol_darah' => $row->gol_darah,
            'photo_anak' => $row->photo_anak,
            'photo_kk' => $row->photo_kk,
            'photo_akta_kelahiran' => $row->photo_akta_kelahiran,
            'photo_ktp_ayah' => $row->photo_ktp_ayah,
            'photo_ktp_ibu' => $row->photo_ktp_ibu,
	    );
            $this->load->view('layout/header');
            $this->load->view('data_kia/data_kia_read', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_kia'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_kia/create_action'),
            'id_kis' => set_value('id_kis'),
            'data_anak' =>  $this->Data_anak_model->get_all(),
            'data_orangtua' =>  $this->Data_orangtua_model->get_all(),
            'data_agama' =>  $this->Data_agama_model->get_all(),
            'data_darah' =>  $this->Data_darah_model->get_all(),
            'kode_anak' => set_value('kode_anak'),
            'id_orangtua' => set_value('id_orangtua'),
            'nik_bayi' => set_value('nik_bayi'),
            'agama' => set_value('agama'),
            'gol_darah' => set_value('gol_darah'),
            'photo_anak' => set_value('photo_anak'),
            'photo_kk' => set_value('photo_kk'),
            'photo_akta_kelahiran' => set_value('photo_akta_kelahiran'),
            'photo_ktp_ayah' => set_value('photo_ktp_ayah'),
            'photo_ktp_ibu' => set_value('photo_ktp_ibu'),
        );
        $this->load->view('layout/header');
        $this->load->view('data_kia/data_kia_form', $data);
        $this->load->view('layout/footer');
    }
    
    public function create_action() 
    {
        $config['upload_path']        = './assets/kia';
        $config['allowed_types']    = 'jpg|png|gif|jpeg';
        $config['max_size']            = 40000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload("photo_anak");
        $data1 = $this->upload->data();
        $photo_anak = $data1['file_name'];

        $this->upload->do_upload("photo_kk");
        $data2 = $this->upload->data();
        $photo_kk = $data2['file_name'];

        $this->upload->do_upload("photo_akta_kelahiran");
        $data3 = $this->upload->data();
        $photo_akta_kelahiran = $data3['file_name'];

        $this->upload->do_upload("photo_ktp_ayah");
        $data4 = $this->upload->data();
        $photo_ktp_ayah = $data4['file_name'];

        $this->upload->do_upload("photo_ktp_ibu");
        $data5 = $this->upload->data();
        $photo_ktp_ibu = $data5['file_name'];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'kode_anak' => $this->input->post('kode_anak',TRUE),
            'id_orangtua' => $this->input->post('id_orangtua',TRUE),
            'nik_bayi' => $this->input->post('nik_bayi',TRUE),
            'agama' => $this->input->post('agama',TRUE),
            'gol_darah' => $this->input->post('gol_darah',TRUE),
            'photo_anak' =>  $photo_anak,
            'photo_kk' => $photo_kk,
            'photo_akta_kelahiran' => $photo_akta_kelahiran,
            'photo_ktp_ayah' => $photo_ktp_ayah,
            'photo_ktp_ibu' => $photo_ktp_ibu
	        );
            
            
            $this->Data_kia_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_kia'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_kia_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'data_anak' =>  $this->Data_anak_model->get_all(),
                 'data_orangtua' =>  $this->Data_orangtua_model->get_all(),
                 'data_agama' =>  $this->Data_agama_model->get_all(),
                'action' => site_url('data_kia/update_action'),
                'id_kis' => set_value('id_kis', $row->id_kis),
                'kode_anak' => set_value('kode_anak', $row->kode_anak),
                 'data_agama' =>  $this->Data_agama_model->get_all(),
            'data_darah' =>  $this->Data_darah_model->get_all(),
                'id_orangtua' => set_value('id_orangtua', $row->id_orangtua),
                'nik_bayi' => set_value('nik_bayi', $row->nik_bayi),
                'agama' => set_value('agama', $row->agama),
                'gol_darah' => set_value('gol_darah', $row->gol_darah),
                'photo_anak' => set_value('photo_anak', $row->photo_anak),
                'photo_kk' => set_value('photo_kk', $row->photo_kk),
                'photo_akta_kelahiran' => set_value('photo_akta_kelahiran', $row->photo_akta_kelahiran),
                'photo_ktp_ayah' => set_value('photo_ktp_ayah', $row->photo_ktp_ayah),
                'photo_ktp_ibu' => set_value('photo_ktp_ibu', $row->photo_ktp_ibu),
	    );
            $this->load->view('layout/header');
            $this->load->view('data_kia/data_kia_form', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_kia'));
        }
    }
    
    public function update_action() 
    {
        $photo_anak =$this->input->post('photo_anak_lama');
        $photo_kk = $this->input->post('photo_kk_lama');
        $photo_akta_kelahiran =$this->input->post('photo_akta_kelahiran_lama');
        $photo_ktp_ayah =$this->input->post('photo_ktp_ayah_lama');
        $photo_ktp_ibu =$this->input->post('photo_ktp_ibu_lama');
        
        $config['upload_path']        = './assets/kia';
        $config['allowed_types']    = 'jpg|png|gif|jpeg';
        $config['max_size']            = 40000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload("photo_anak");
        $data1 = $this->upload->data();
        if ($this->upload->do_upload("photo_anak")){
            $photo_anak = $data1['file_name'];
        }
        

        $this->upload->do_upload("photo_kk");
        $data2 = $this->upload->data();
        if ($this->upload->do_upload("photo_kk")){
             $photo_kk = $data2['file_name'];
        }

        $this->upload->do_upload("photo_akta_kelahiran");
        $data3 = $this->upload->data();
        if ($this->upload->do_upload("photo_akta_kelahiran")){
             $photo_akta_kelahiran = $data3['file_name'];
        }

        $this->upload->do_upload("photo_ktp_ayah");
        $data4 = $this->upload->data();
        if ($this->upload->do_upload("photo_ktp_ayah")){
             $photo_ktp_ayah = $data4['file_name'];
        }

        $this->upload->do_upload("photo_ktp_ibu");
        $data5 = $this->upload->data();
        if ($this->upload->do_upload("photo_ktp_ibu")){
              $photo_ktp_ibu = $data5['file_name'];
        }
        
        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kis', TRUE));
        } else {
            $data = array(
		'kode_anak' => $this->input->post('kode_anak',TRUE),
		'id_orangtua' => $this->input->post('id_orangtua',TRUE),
		'nik_bayi' => $this->input->post('nik_bayi',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'photo_anak' => $photo_anak,
		'photo_kk' => $photo_kk,
		'photo_akta_kelahiran' => $photo_akta_kelahiran,
		'photo_ktp_ayah' => $photo_ktp_ayah,
		'photo_ktp_ibu' => $photo_ktp_ibu
	    );
            
            //var_dump($data); exit;

            $this->Data_kia_model->update($this->input->post('id_kis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_kia'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_kia_model->get_by_id($id);

        if ($row) {
            $this->Data_kia_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_kia'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_kia'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_anak', 'kode anak', 'trim|required');
	$this->form_validation->set_rules('id_orangtua', 'id orangtua', 'trim|required');
    if($this->uri->segment(2) == 'update_action'){
        $this->form_validation->set_rules('nik_bayi', 'nik bayi', 'trim|required|min_length[16]|max_length[16]');
        }else{
	$this->form_validation->set_rules('nik_bayi', 'nik bayi', 'trim|required|min_length[16]|max_length[16]|is_unique[data_kia.nik_bayi]');
    }
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('gol_darah', 'gol darah', 'trim|required');
	// $this->form_validation->set_rules('photo_anak', 'photo anak', 'trim|required');
	// $this->form_validation->set_rules('photo_kk', 'photo kk', 'trim|required');
	// $this->form_validation->set_rules('photo_akta_kelahiran', 'photo akta kelahiran', 'trim|required');
	// $this->form_validation->set_rules('photo_ktp_ayah', 'photo ktp ayah', 'trim|required');
	// $this->form_validation->set_rules('photo_ktp_ibu', 'photo ktp ibu', 'trim|required');

	$this->form_validation->set_rules('id_kis', 'id_kis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_kia.php */
/* Location: ./application/controllers/Data_kia.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-11 15:29:54 */
/* http://harviacode.com */