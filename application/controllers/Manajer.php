<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if ($this->session->userdata('role') != 'manajer') redirect('auth');
    }

    private function _render($view, $data) {
        $this->load->view('layout/manajer/header', $data);
        $this->load->view('layout/manajer/sidebar');
        $this->load->view('layout/manajer/topbar');
        $this->load->view($view, $data);
        $this->load->view('layout/manajer/footer');
    }

    public function index() {
        $data['title'] = "Dashboard Manajer";
        $data['total_produk']   = $this->M_admin->count_products();
        $data['stok_limit']     = $this->M_admin->count_low_stock();
        $data['total_supplier'] = $this->M_admin->count_suppliers();
        $data['masuk_hari_ini'] = $this->M_admin->count_in_today();
        
        $this->_render('manajer/index', $data);
    }

    public function laporan_masuk() {
        $data['title'] = "Laporan Masuk";
        $data['ins'] = $this->M_admin->get_all_transaction_in();
        $this->_render('manajer/laporan_masuk', $data);
    }

    public function stok_barang() {
        $data['title'] = "Stok Real-time";
        $data['products'] = $this->M_admin->get_all_products();
        $this->_render('manajer/stok_barang', $data);
    }
}