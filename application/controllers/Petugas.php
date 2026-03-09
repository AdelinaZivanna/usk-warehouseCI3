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
        $data['stok_limit']   = $this->M_admin->count_low_stock();
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
        $data = [
            'product_id'  => $this->input->post('product_id'),
            'supplier_id' => $this->input->post('supplier_id'),
            'user_id'     => $this->session->userdata('user_id'),
            'qty'         => $this->input->post('qty'),
            'datetime'    => date('Y-m-d H:i:s')
        ];

        $this->M_petugas->insert_transaction_in($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>');
        redirect('petugas/barang_masuk');
    }

    // Tambahkan fungsi-fungsi ini di dalam class Petugas

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
        $product_id = $this->input->post('product_id');
        $qty_keluar = $this->input->post('qty');

        // Cek Stok
        $product = $this->db->get_where('products', ['id' => $product_id])->row_array();

        if ($product['stock'] < $qty_keluar) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Stok tidak cukup! Sisa: '.$product['stock'].'</div>');
            redirect('petugas/barang_keluar');
        } else {
            $data = [
                'product_id'  => $product_id,
                'user_id'     => $this->session->userdata('user_id'),
                'qty'         => $qty_keluar,
                'destination' => $this->input->post('destination'), // Input tujuan
                'datetime'    => $this->input->post('datetime')    // Input waktu dari form
            ];

            $this->M_petugas->insert_transaction_out($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Barang Berhasil Dikeluarkan!</div>');
            redirect('petugas/barang_keluar');
        }
    }

    private function render_page($view, $data) {
        $this->load->view('layout/petugas/header', $data);
        $this->load->view('layout/petugas/sidebar');
        $this->load->view('layout/petugas/topbar');
        $this->load->view($view, $data);
        $this->load->view('layout/petugas/footer');
    }
}