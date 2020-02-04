<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_orangtua extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Data_orangtua_model','Data_agama_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_orangtua/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_orangtua/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_orangtua/index.html';
            $config['first_url'] = base_url() . 'data_orangtua/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_orangtua_model->total_rows($q);
        $data_orangtua = $this->Data_orangtua_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_by_user' => $this->Data_orangtua_model->get_by_ktp(),
            'data_orangtua_data' => $data_orangtua,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/header');
        $this->load->view('data_orangtua/data_orangtua_list', $data);
        $this->load->view('layout/footer');
    }

    public function read($id) 
    {
        $row = $this->Data_orangtua_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_orangtua' => $row->id_orangtua,
        'email' => $this->session->userdata('ses_email'),
		'nik_ayah' => $row->nik_ayah,
		'nama_ayah' => $row->nama_ayah,
		'nik_ibu' => $row->nik_ibu,
		'nama_ibu' => $row->nama_ibu,
		'alamat_lengkap' => $row->alamat_lengkap,
		'pekerjaan' => $row->pekerjaan,
		'agama' => $row->agama,
        );
        $this->load->view('layout/header');
            $this->load->view('data_orangtua/data_orangtua_read', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_orangtua'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_orangtua/create_action'),
        'id_orangtua' => set_value('id_orangtua'),
        'email' => $this->session->userdata('ses_email'),
	    'nik_ayah' => set_value('nik_ayah'),
        'data_agama' =>  $this->Data_agama_model->get_all(),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nik_ibu' => set_value('nik_ibu'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'alamat_lengkap' => set_value('alamat_lengkap'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'agama' => set_value('agama'),
    );
        $this->load->view('layout/header');
        $this->load->view('data_orangtua/data_orangtua_form', $data);
        $this->load->view('layout/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'email' => $this->session->userdata('ses_email'),
		'nik_ayah' => $this->input->post('nik_ayah',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nik_ibu' => $this->input->post('nik_ibu',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_lengkap' => $this->input->post('alamat_lengkap',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
	    );

            $this->Data_orangtua_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_orangtua'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_orangtua_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_orangtua/update_action'),
        'id_orangtua' => set_value('id_orangtua', $row->id_orangtua),
        'email' => $this->session->userdata('ses_email'),
        'data_agama' =>  $this->Data_agama_model->get_all(),
		'nik_ayah' => set_value('nik_ayah', $row->nik_ayah),
		'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
		'nik_ibu' => set_value('nik_ibu', $row->nik_ibu),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'alamat_lengkap' => set_value('alamat_lengkap', $row->alamat_lengkap),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'agama' => set_value('agama', $row->agama),
        );
        $this->load->view('layout/header');
            $this->load->view('data_orangtua/data_orangtua_form', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_orangtua'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_orangtua', TRUE));
        } else {
            $data = array(
        'email' => $this->session->userdata('ses_email'),
		'nik_ayah' => $this->input->post('nik_ayah',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nik_ibu' => $this->input->post('nik_ibu',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_lengkap' => $this->input->post('alamat_lengkap',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
	    );

            $this->Data_orangtua_model->update($this->input->post('id_orangtua', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_orangtua'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_orangtua_model->get_by_id($id);

        if ($row) {
            $this->Data_orangtua_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_orangtua'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_orangtua'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|required|min_length[16]|max_length[16]|is_unique[data_orangtua.nik_ayah]');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|required|min_length[16]|max_length[16]|is_unique[data_orangtua.nik_ibu]');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('alamat_lengkap', 'alamat lengkap', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');

	$this->form_validation->set_rules('id_orangtua', 'id_orangtua', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_orangtua.php */
/* Location: ./application/controllers/Data_orangtua.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 18:48:57 */
/* http://harviacode.com */