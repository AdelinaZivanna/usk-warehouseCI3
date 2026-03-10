<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['M_admin']); 
        if ($this->session->userdata('role') != 'manajer') redirect('auth');
    }

    public function index() {
        $data['title'] = "Dashboard Manajer";
        $data['total_produk'] = $this->M_admin->count_products();
        $data['stok_limit'] = $this->M_admin->count_low_stock();
        $data['total_supplier'] = $this->M_admin->count_suppliers();
        $data['masuk_hari_ini'] = $this->M_admin->count_in_today();

        $this->db->where('stok_saat_ini <=', 5);
        $data['barang_limit'] = $this->db->get('barang')->result_array();

        $this->_render('manajer/index', $data);
    }

    public function laporan_stok() {
        $data['title'] = "Laporan Stok Menipis";
        $this->db->where('stok_saat_ini <=', 5);
        $data['products'] = $this->db->get('barang')->result_array();
        $this->_render('manajer/laporan_stok', $data);
    }

    public function laporan_transaksi() {
        $data['title'] = "Laporan Transaksi";
        
        $this->db->select('transaction_ins.*, barang.nama_barang, suppliers.name as supplier_name');
        $this->db->from('transaction_ins');
        $this->db->join('barang', 'barang.id = transaction_ins.barang_id');
        $this->db->join('suppliers', 'suppliers.id = transaction_ins.supplier_id');
        $data['ins'] = $this->db->get()->result_array();

        $this->_render('manajer/laporan_transaksi', $data);
    }

    private function _render($view, $data) {
        $this->load->view('layout/manajer/header', $data);
        $this->load->view('layout/manajer/sidebar');
        $this->load->view('layout/manajer/topbar');
        $this->load->view($view, $data);
        $this->load->view('layout/manajer/footer');
    }

    public function cetak_laporan() {
        $data['ins'] = $this->db->get('transaction_ins')->result_array(); 
        $this->load->view('manajer/cetak_transaksi', $data);
    }
}