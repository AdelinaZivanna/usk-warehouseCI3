<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_all_products() {
        return $this->db->get('barang')->result_array();
    }

    public function get_suppliers() {
        // Gunakan 'supplier' sesuai nama tabel terbaru
        return $this->db->get('supplier')->result_array();
    }

    public function count_suppliers() {
        return $this->db->count_all('supplier');
    }

    public function get_all_transaction_in() {
        $this->db->select('barang_masuk.*, barang.nama_barang, supplier.name as supplier_name, users.name as user_name');
        $this->db->from('barang_masuk');
        // PASTIKAN: barang.id_barang
        $this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
        $this->db->join('supplier', 'supplier.id = barang_masuk.supplier_id', 'left');
        $this->db->join('users', 'users.id = barang_masuk.id_user', 'left');
        $this->db->order_by('barang_masuk.datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_all_transaction_out() {
        $this->db->select('barang_keluar.*, barang.nama_barang, users.name as user_name');
        $this->db->from('barang_keluar');
        // UBAH: barang.id menjadi barang.id_barang
        $this->db->join('barang', 'barang.id_barang = barang_keluar.id_barang', 'left');
        $this->db->join('users', 'users.id = barang_keluar.id_user', 'left');
        $this->db->order_by('barang_keluar.datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function count_products() {
        return $this->db->count_all('barang');
    }

    public function count_low_stock() {
        $this->db->where('stok_saat_ini <=', 5); 
        return $this->db->count_all_results('barang');
    }

    public function count_in_today() {
        $this->db->where('DATE(datetime)', date('Y-m-d'));
        return $this->db->count_all_results('barang_masuk');
    }

    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }
}