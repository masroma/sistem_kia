<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public $table = 'data_kia';
    // public $id = 'id_donasi';
    public $order = 'DESC';
    public $status = 'status';

    function __construct()
    {
        parent::__construct();
    }

	function get_by_date($tanggal_awal, $tanggal_akhir, $status)
    {
    	$this->db->select('*');
    	$this->db->from('data_kia a'); 
    	$this->db->join('data_anak b', 'b.kode_unik=a.kode_anak', 'left');
    	$this->db->join('data_orangtua c', 'c.id_orangtua=a.id_orangtua', 'left');
        // $this->db->where('a.tanggal_pengajuan >=', $tanggal_awal);
        // $this->db->where('a.tanggal_pengajuan <=', $tanggal_awal);
        $this->db->where('a.status', $status);
        return $this->db->get($this->table)->result();
    }

}