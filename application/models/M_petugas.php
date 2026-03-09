<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

    // Fungsi ini yang tadi dianggap "Undefined" atau tidak ada
    public function get_transaction_in() {
        $this->db->select('transaction_ins.*, products.name as product_name, suppliers.name as supplier_name, users.name as user_name');
        $this->db->from('transaction_ins');
        $this->db->join('products', 'products.id = transaction_ins.product_id', 'left');
        $this->db->join('suppliers', 'suppliers.id = transaction_ins.supplier_id', 'left');
        $this->db->join('users', 'users.id = transaction_ins.user_id', 'left');
        $this->db->order_by('transaction_ins.datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insert_transaction_in($data) {
        $this->db->insert('transaction_ins', $data);
        $this->db->set('stock', 'stock + ' . (int)$data['qty'], FALSE);
        $this->db->where('id', $data['product_id']);
        return $this->db->update('products');
    }

    public function get_suppliers() {
        return $this->db->get('suppliers')->result_array();
    }

    // Sekalian tambahkan fungsi Barang Keluar supaya tidak error nanti
    public function get_transaction_out() {
        // Tambahkan destination di select
        $this->db->select('transaction_outs.*, products.name as product_name, users.name as user_name');
        $this->db->from('transaction_outs');
        $this->db->join('products', 'products.id = transaction_outs.product_id', 'left');
        $this->db->join('users', 'users.id = transaction_outs.user_id', 'left');
        $this->db->order_by('transaction_outs.datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insert_transaction_out($data) {
        $this->db->insert('transaction_outs', $data);
        $this->db->set('stock', 'stock - ' . (int)$data['qty'], FALSE);
        $this->db->where('id', $data['product_id']);
        return $this->db->update('products');
    }
}