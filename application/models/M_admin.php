<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_categories() {
        return $this->db->get('categories')->result_array();
    }

    public function insert_category($data) {
        return $this->db->insert('categories', $data);
    }

    public function delete_category($id) {
        return $this->db->delete('categories', ['id' => $id]);
    }

    public function get_all_products() {
        $this->db->select('products.*, categories.name as category_name');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_all_transaction_in() {
        $this->db->select('transaction_ins.*, products.name as product_name, suppliers.name as supplier_name, users.name as user_name');
        $this->db->from('transaction_ins');
        $this->db->join('products', 'products.id = transaction_ins.product_id');
        $this->db->join('suppliers', 'suppliers.id = transaction_ins.supplier_id');
        $this->db->join('users', 'users.id = transaction_ins.user_id');
        return $this->db->get()->result_array();
    }

    public function insert_transaction_in($data) {
        $this->db->insert('transaction_ins', $data);
        $this->db->set('stock', 'stock + ' . (int)$data['qty'], FALSE);
        $this->db->where('id', $data['product_id']);
        return $this->db->update('products');
    }

    public function get_all_transaction_out() {
        $this->db->select('transaction_outs.*, products.name as product_name, users.name as user_name');
        $this->db->from('transaction_outs');
        $this->db->join('products', 'products.id = transaction_outs.product_id', 'left');
        $this->db->join('users', 'users.id = transaction_outs.user_id', 'left');
        $this->db->order_by('datetime', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insert_transaction_out($data) {
        $this->db->insert('transaction_outs', $data);
        $this->db->set('stock', 'stock - ' . (int)$data['qty'], FALSE);
        $this->db->where('id', $data['product_id']);
        return $this->db->update('products');
    }

    public function count_products() {
        return $this->db->count_all('products');
    }

    public function count_suppliers() {
        return $this->db->count_all('suppliers');
    }

    public function count_low_stock() {
        $this->db->where('stock <= min_stock');
        return $this->db->count_all_results('products');
    }

    public function count_in_today() {
        $this->db->where('DATE(datetime)', date('Y-m-d'));
        return $this->db->count_all_results('transaction_ins');
    }

    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }

    public function get_suppliers() {
        return $this->db->get('suppliers')->result_array();
    }

    public function insert_supplier($data) {
        return $this->db->insert('suppliers', $data);
    }

    public function update_supplier($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('suppliers', $data);
    }

    public function delete_supplier($id) {
        return $this->db->delete('suppliers', ['id' => $id]);
    }
}