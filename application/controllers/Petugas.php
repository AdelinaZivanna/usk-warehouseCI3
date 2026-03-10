<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['M_admin', 'M_petugas']); 

        if (!$this->session->userdata('email') || $this->session->userdata('role') != 'petugas') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = "Dashboard Petugas";
        $data['total_produk'] = $this->M_admin->count_products();
        $data['stok_limit']   = $this->M_petugas->count_low_stock();
        $data['stok_produk']  = $this->M_admin->get_all_products(); 

        $this->render_page('petugas/index', $data);
    }

    public function barang_masuk() {
        $data['title'] = "Data Barang Masuk";
        $data['ins'] = $this->M_petugas->get_transaction_in();
        $this->render_page('petugas/barang_masuk', $data);
    }

    public function in_create() {
        $data['title'] = "Input Barang Masuk";
        $data['products'] = $this->M_admin->get_all_products(); 
        $data['suppliers'] = $this->M_petugas->get_suppliers();
        $this->render_page('petugas/in_create', $data);
    }

    public function in_add() {
        $id_barang = $this->input->post('product_id');
        $qty_masuk = $this->input->post('qty');

        $data = [
            'id_barang'   => $id_barang,
            'supplier_id' => $this->input->post('supplier_id'),
            'id_user'     => $this->session->userdata('user_id'),
            'qty'         => $qty_masuk,
            'datetime'    => date('Y-m-d H:i:s')
        ];

        $this->M_petugas->insert_transaction_in($data);

        $this->db->set('stok_saat_ini', 'stok_saat_ini + ' . (int)$qty_masuk, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Stok barang berhasil ditambahkan!</div>');
        redirect('petugas/barang_masuk');
    }

    public function barang_keluar() {
        $data['title'] = "Data Barang Keluar";
        $data['outs'] = $this->M_petugas->get_transaction_out();
        $this->render_page('petugas/barang_keluar', $data);
    }

    public function out_create() {
        $data['title'] = "Input Barang Keluar";
        $data['products'] = $this->M_admin->get_all_products(); 
        $this->render_page('petugas/out_create', $data);
    }

    public function out_add() {
        $id_barang  = $this->input->post('product_id');
        $qty_keluar = $this->input->post('qty');
        $destination = $this->input->post('destination'); 

        $product = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();

        if ($product['stok_saat_ini'] < $qty_keluar) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal! Stok tidak cukup. Sisa: '.$product['stok_saat_ini'].'</div>');
            redirect('petugas/barang_keluar');
        } else {
            $data = [
                'id_barang'   => $id_barang,
                'id_user'     => $this->session->userdata('user_id'),
                'qty'         => $qty_keluar,
                'destination' => $destination,
                'datetime'    => date('Y-m-d H:i:s')
            ];

            $this->M_petugas->insert_transaction_out($data);

            $this->db->set('stok_saat_ini', 'stok_saat_ini - ' . (int)$qty_keluar, FALSE);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Barang Berhasil Dikeluarkan!</div>');
            redirect('petugas/barang_keluar');
        }
    }

    public function stock_opname() {
        $data['title'] = "Penyesuaian Stok (Opname)";
        $data['products'] = $this->M_admin->get_all_products();
        $this->render_page('petugas/stock_opname', $data);
    }

    public function stock_opname_update() {
        $id_barang = $this->input->post('id_barang');
        $stok_fisik = $this->input->post('stok_fisik');
        $keterangan = $this->input->post('keterangan');

        $this->db->set('stok_saat_ini', $stok_fisik);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');

        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Stok telah disesuaikan dengan kondisi fisik. Keterangan: '.$keterangan.'</div>');
        redirect('petugas/index'); 
    }
    private function render_page($view, $data) {
        $this->load->view('layout/petugas/header', $data);
        $this->load->view('layout/petugas/sidebar');
        $this->load->view('layout/petugas/topbar');
        $this->load->view($view, $data);
        $this->load->view('layout/petugas/footer');
    }
}