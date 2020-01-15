<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_dokter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_dokter_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_dokter/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_dokter/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_dokter/index.html';
            $config['first_url'] = base_url() . 'data_dokter/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_dokter_model->total_rows($q);
        $data_dokter = $this->Data_dokter_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_dokter_data' => $data_dokter,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/header');
        $this->load->view('data_dokter/data_dokter_list', $data);
        $this->load->view('layout/footer');
    }

    public function read($id) 
    {
        $row = $this->Data_dokter_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dokter' => $row->id_dokter,
		'nama_dokter' => $row->nama_dokter,
		'nip_dokter' => $row->nip_dokter,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
        );
            $this->load->view('layout/header');
            $this->load->view('data_dokter/data_dokter_read', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_dokter'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_dokter/create_action'),
	    'id_dokter' => set_value('id_dokter'),
	    'nama_dokter' => set_value('nama_dokter'),
	    'nip_dokter' => set_value('nip_dokter'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
    );
        $this->load->view('layout/header');
        $this->load->view('data_dokter/data_dokter_form', $data);
        $this->load->view('layout/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dokter' => $this->input->post('nama_dokter',TRUE),
		'nip_dokter' => $this->input->post('nip_dokter',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Data_dokter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_dokter'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_dokter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_dokter/update_action'),
		'id_dokter' => set_value('id_dokter', $row->id_dokter),
		'nama_dokter' => set_value('nama_dokter', $row->nama_dokter),
		'nip_dokter' => set_value('nip_dokter', $row->nip_dokter),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
        );
        $this->load->view('layout/header');
            $this->load->view('data_dokter/data_dokter_form', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_dokter'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dokter', TRUE));
        } else {
            $data = array(
		'nama_dokter' => $this->input->post('nama_dokter',TRUE),
		'nip_dokter' => $this->input->post('nip_dokter',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Data_dokter_model->update($this->input->post('id_dokter', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_dokter'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_dokter_model->get_by_id($id);

        if ($row) {
            $this->Data_dokter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_dokter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_dokter'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_dokter', 'nama dokter', 'trim|required');
	$this->form_validation->set_rules('nip_dokter', 'nip dokter', 'trim|required|min_length[16]|max_length[16]|is_unique[data_dokter.nip_dokter]');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_dokter', 'id_dokter', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_dokter.php */
/* Location: ./application/controllers/Data_dokter.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 18:48:56 */
/* http://harviacode.com */