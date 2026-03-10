<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

    public function get_transaction_in() {
        $this->db->select('barang_masuk.*, barang.nama_barang as product_name, supplier.name as supplier_name, users.name as user_name');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
        $this->db->join('supplier', 'supplier.id = barang_masuk.supplier_id', 'left');
        $this->db->join('users', 'users.id = barang_masuk.id_user', 'left');
        $this->db->order_by('barang_masuk.datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insert_transaction_in($data) {
        return $this->db->insert('barang_masuk', $data);
    }

    public function get_transaction_out() {
        $this->db->select('barang_keluar.*, barang.nama_barang as product_name, users.name as user_name');
        $this->db->from('barang_keluar'); 
        $this->db->join('barang', 'barang.id_barang = barang_keluar.id_barang', 'left');
        $this->db->join('users', 'users.id = barang_keluar.id_user', 'left');
        $this->db->order_by('barang_keluar.datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insert_transaction_out($data) {
        return $this->db->insert('barang_keluar', $data); 
    }

    public function get_suppliers() {
        return $this->db->get('supplier')->result_array();
    }

    public function count_low_stock() {
        $this->db->where('stok_saat_ini <=', 5); 
        return $this->db->count_all_results('barang');
    }
}