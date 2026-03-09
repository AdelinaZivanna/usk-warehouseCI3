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
        $data['stok_limit']     = $this->M_admin->count_low_stock();
        $data['masuk_hari_ini'] = $this->M_admin->count_in_today();
        $this->_render('admin/dashboard', $data);
    }

    public function categories() {
        $data['title'] = "Kategori Barang";
        $data['categories'] = $this->M_admin->get_categories();
        $this->_render('admin/categories/index', $data);
    }

    public function category_create() {
        $data['title'] = "Tambah Kategori";
        $this->_render('admin/categories/create', $data);
    }

    public function category_store() {
        $this->db->insert('categories', ['name' => $this->input->post('name')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Kategori berhasil ditambah!</div>');
        redirect('admin/categories');
    }

    public function category_edit($id) {
        $data['title'] = "Edit Kategori";
        $data['category'] = $this->db->get_where('categories', ['id' => $id])->row_array();
        if (!$data['category']) show_404();
        $this->_render('admin/categories/edit', $data);
    }

    public function category_update() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('categories', ['name' => $this->input->post('name')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Kategori berhasil diupdate!</div>');
        redirect('admin/categories');
    }

    public function category_delete($id) {
        $cek_produk = $this->db->get_where('products', ['category_id' => $id])->num_rows();
        if ($cek_produk > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Gagal! Kategori masih digunakan oleh produk.</div>');
        } else {
            $this->db->delete('categories', ['id' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Kategori berhasil dihapus!</div>');
        }
        redirect('admin/categories');
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
        $this->db->insert('suppliers', $data);
        redirect('admin/suppliers');
    }

    public function supplier_edit($id) {
        $data['title'] = "Edit Supplier";
        $data['supplier'] = $this->db->get_where('suppliers', ['id' => $id])->row_array();
        if (!$data['supplier']) show_404();
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
        $this->db->update('suppliers', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Supplier diperbarui!</div>');
        redirect('admin/suppliers');
    }

    public function supplier_delete($id) {
        $cek = $this->db->get_where('transaction_ins', ['supplier_id' => $id])->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Gagal! Supplier masih terikat data transaksi.</div>');
        } else {
            $this->db->delete('suppliers', ['id' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Supplier dihapus!</div>');
        }
        redirect('admin/suppliers');
    }

    public function products() {
        $data['title'] = "Data Barang";
        $data['products'] = $this->M_admin->get_all_products();
        $this->_render('admin/products/index', $data);
    }

    public function product_create() {
        $data['title'] = "Tambah Produk";
        $data['categories'] = $this->M_admin->get_categories();
        $this->_render('admin/products/create', $data);
    }

    public function product_store() {
        $data = [
            'category_id' => $this->input->post('category_id'),
            'sku'         => $this->input->post('sku'),
            'name'        => $this->input->post('name'),
            'stock'       => $this->input->post('stock'), 
            'unit'        => $this->input->post('unit'),
            'min_stock'   => $this->input->post('min_stock')
        ];
        $this->db->insert('products', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Produk berhasil ditambahkan!</div>');
        redirect('admin/products');
    }

    public function product_edit($id) {
        $data['title'] = "Edit Produk";
        $data['categories'] = $this->M_admin->get_categories();
        $data['product'] = $this->db->get_where('products', ['id' => $id])->row_array();
        if (!$data['product']) show_404();
        $this->_render('admin/products/edit', $data);
    }

    public function product_update() {
        $id = $this->input->post('id');
        $data = [
            'category_id' => $this->input->post('category_id'),
            'sku'         => $this->input->post('sku'),
            'name'        => $this->input->post('name'),
            'unit'        => $this->input->post('unit'),
            'min_stock'   => $this->input->post('min_stock')
        ];
        $this->db->where('id', $id);
        $this->db->update('products', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Produk berhasil diperbarui!</div>');
        redirect('admin/products');
    }

    public function product_delete($id) {
        $cek_in = $this->db->get_where('transaction_ins', ['product_id' => $id])->num_rows();
        $cek_out = $this->db->get_where('transaction_outs', ['product_id' => $id])->num_rows();

        if ($cek_in > 0 || $cek_out > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Gagal! Produk sudah punya riwayat transaksi.</div>');
        } else {
            $this->db->delete('products', ['id' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Produk dihapus!</div>');
        }
        redirect('admin/products');
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

    public function report_out() {
        $data['title'] = "Cetak Laporan Barang Keluar";
        $data['outs'] = $this->M_admin->get_all_transaction_out();
        $this->load->view('admin/reports/print_out', $data);
    }

    public function users() {
        $data['title'] = "Data Pengguna";
        $data['users'] = $this->M_admin->get_all_users();
        $this->_render('admin/users/index', $data);
    }

    public function user_create() {
        $data['title'] = "Tambah User";
        $this->_render('admin/users/create', $data);
    }

    public function user_edit($id) {
        $data['title'] = "Edit Pengguna";
        $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();
        if (!$data['user']) show_404();
        $this->_render('admin/users/edit', $data);
    }

    public function user_update() {
        $id = $this->input->post('id');
        $password = $this->input->post('password');

        $data = [
            'name'  => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'role'  => $this->input->post('role')
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data user berhasil diperbarui!</div>');
        redirect('admin/users');
    }

    public function user_delete($id) {
        if ($id == $this->session->userdata('id')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Tidak bisa menghapus akun sendiri!</div>');
        } else {
            $this->db->delete('users', ['id' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">User berhasil dihapus!</div>');
        }
        redirect('admin/users');
    }

    public function report_in() {
        $data['title'] = "Cetak Laporan Barang Masuk";
        $data['ins'] = $this->M_admin->get_all_transaction_in(); 
        $this->load->view('admin/reports/print_in', $data);
    }
}