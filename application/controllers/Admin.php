<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if ($this->session->userdata('role') != 'admin') redirect('auth');
    }

    private function _render($view, $data) {
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view($view, $data);
        $this->load->view('layout/admin/footer');
    }

    public function index() {
        $data['title'] = "Dashboard Admin";
        $data['total_produk']   = $this->M_admin->count_products();
        $data['total_supplier'] = $this->M_admin->count_suppliers();
        $data['masuk_hari_ini'] = $this->M_admin->count_in_today();
        $this->_render('admin/dashboard', $data);
    }

    public function products() {
        $data['title'] = "Data Barang";
        $data['products'] = $this->M_admin->get_all_products();
        $this->_render('admin/products/index', $data);
    }

    public function product_create() {
        $data['title'] = "Tambah Supplier";
        $this->_render('admin/products/create', $data);
        
    }

    public function product_store() {
        $stok_awal = $this->input->post('stok_awal');
        $data = [
            'nama_barang'   => $this->input->post('nama_barang'),
            'stok_awal'     => $stok_awal,
            'stok_saat_ini' => $stok_awal,
            'satuan'        => $this->input->post('satuan')
        ];
        
        $this->db->insert('barang', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Barang berhasil ditambahkan!</div>');
        redirect('admin/products');
    }

    public function product_edit($id) {
        $data['title'] = "Edit Produk";
        $data['product'] = $this->db->get_where('barang', ['id_barang' => $id])->row_array();
        $this->_render('admin/products/edit', $data);
    }

    public function product_update() {
        $id = $this->input->post('id_barang');
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan'      => $this->input->post('satuan'),
            'stok_saat_ini' => $this->input->post('stok_saat_ini')
        ];
        
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data barang berhasil diperbarui!</div>');
        redirect('admin/products');
    }

    public function product_delete($id) {
        $this->db->delete('barang', ['id_barang' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Barang berhasil dihapus!</div>');
        redirect('admin/products');
    }

    public function suppliers() {
        $data['title'] = "Data Supplier";
        $data['suppliers'] = $this->M_admin->get_suppliers();
        $this->_render('admin/suppliers/index', $data);
    }

    public function supplier_create() {
        $data['title'] = "Tambah Supplier";
        $this->_render('admin/suppliers/create', $data);
        
    }

    public function supplier_store() {
        $data = [
            'name'    => $this->input->post('name'),
            'phone'   => $this->input->post('phone'),
            'address' => $this->input->post('address')
        ];
        $this->db->insert('supplier', $data); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Supplier baru berhasil ditambahkan!</div>');
        redirect('admin/suppliers');
    }

    public function supplier_edit($id) {
        $data['title'] = "Edit Supplier";
        $data['supplier'] = $this->db->get_where('supplier', ['id' => $id])->row_array();        
        $this->_render('admin/suppliers/edit', $data);
    }

    public function supplier_update() {
        $id = $this->input->post('id');
        $data = [
            'name'    => $this->input->post('name'),
            'phone'   => $this->input->post('phone'),
            'address' => $this->input->post('address')
        ];
        
        $this->db->where('id', $id);
        $this->db->update('supplier', $data); 
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Supplier berhasil diperbarui!</div>');
        redirect('admin/suppliers');
    }

    public function supplier_delete($id) {
        $this->db->delete('supplier', ['id' => $id]); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Supplier berhasil dihapus!</div>');
        redirect('admin/suppliers');
    }
    public function transaction_in() {
        $data['title'] = "Laporan Barang Masuk";
        $data['ins'] = $this->M_admin->get_all_transaction_in();
        $this->_render('admin/transactions/in_index', $data);
    }

    public function transaction_out() {
        $data['title'] = "Laporan Barang Keluar";
        $data['outs'] = $this->M_admin->get_all_transaction_out();
        $this->_render('admin/transactions/out_index', $data);
    }

    public function users() {
        $data['title'] = "Data Pengguna";
        $data['users'] = $this->M_admin->get_all_users();
        $this->_render('admin/users/index', $data);
    }
}