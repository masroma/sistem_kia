<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_anak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Data_anak_model','Data_dokter_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_anak/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_anak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_anak/index.html';
            $config['first_url'] = base_url() . 'data_anak/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_anak_model->total_rows($q);
        $data_anak = $this->Data_anak_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_anak_data' => $data_anak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('layout/header');
        $this->load->view('data_anak/data_anak_list', $data);
         $this->load->view('layout/footer');
    }

    public function read($id) 
    {
        $row = $this->Data_anak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anak' => $row->id_anak,
		'id_dokter' => $row->id_dokter,
		'nama_klinik' => $row->nama_klinik,
		'nama_anak' => $row->nama_anak,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'usia' => $row->usia,
		'kode_unik' => $row->kode_unik,
	    );
            $this->load->view('layout/header');
            $this->load->view('data_anak/data_anak_read', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_anak'));
        }
    }

    public function create() 
    {
        $data['data_dokter'] = $this->Data_dokter_model->get_all();
        $data = array(
        'button' => 'Create',
        'data_dokter' =>  $this->Data_dokter_model->get_all(),
        'action' => site_url('data_anak/create_action'),
	    'id_anak' => set_value('id_anak'),
	    'id_dokter' => set_value('id_dokter'),
	    'nama_klinik' => set_value('nama_klinik'),
	    'nama_anak' => set_value('nama_anak'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'usia' => set_value('usia'),
	    'kode_unik' => set_value('kode_unik'),
	);
        $this->load->view('layout/header');
        $this->load->view('data_anak/data_anak_form', $data);
        $this->load->view('layout/footer');
    }
    
    public function create_action() 
    {
        $kode = rand(0,10000000);
       
       // echo $kode; exit;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dokter' => $this->input->post('id_dokter',TRUE),
		'nama_klinik' => $this->input->post('nama_klinik',TRUE),
		'nama_anak' => $this->input->post('nama_anak',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'usia' => $this->input->post('usia',TRUE),
		'kode_unik' =>  $kode,
        );
        
        $this->load->library('ciqrcode'); 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/barcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name= $kode.'.png';
        $params['data'] = $kode; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); //

            $this->Data_anak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_anak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_anak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'data_dokter' =>  $this->Data_dokter_model->get_all(),
                'action' => site_url('data_anak/update_action'),
		'id_anak' => set_value('id_anak', $row->id_anak),
		'id_dokter' => set_value('id_dokter', $row->id_dokter),
		'nama_klinik' => set_value('nama_klinik', $row->nama_klinik),
		'nama_anak' => set_value('nama_anak', $row->nama_anak),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'usia' => set_value('usia', $row->usia),
		'kode_unik' => set_value('kode_unik', $row->kode_unik),
	    );
            $this->load->view('layout/header');
            $this->load->view('data_anak/data_anak_form', $data);
            $this->load->view('layout/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('data_anak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anak', TRUE));
        } else {
            $data = array(
		'id_dokter' => $this->input->post('id_dokter',TRUE),
		'nama_klinik' => $this->input->post('nama_klinik',TRUE),
		'nama_anak' => $this->input->post('nama_anak',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'usia' => $this->input->post('usia',TRUE),
		'kode_unik' => $this->input->post('kode_unik',TRUE),
	    );

            $this->Data_anak_model->update($this->input->post('id_anak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_anak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_anak_model->get_by_id($id);

        if ($row) {
            $this->Data_anak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_anak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_anak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_dokter', 'id dokter', 'trim|required');
	$this->form_validation->set_rules('nama_klinik', 'nama klinik', 'trim|required');
	$this->form_validation->set_rules('nama_anak', 'nama anak', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('usia', 'usia', 'trim|required');
	

	$this->form_validation->set_rules('id_anak', 'id_anak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_anak.php */
/* Location: ./application/controllers/Data_anak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 18:48:55 */
/* http://harviacode.com */