<?php defined('BASEPATH') or exit('No direct script access allowed');

class Stock_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('stock');
        if ($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('stock');
    }

    public function get_stock_out()
    {
        $this->db->select('stock.stock_id, kategori, date, material.weight_coil, material.size, material.part_no,
        material.customer_name, material.type, weight_before, weight_after, coil_before, coil_after, qty_weight, qty_coil, material.material_id, user.name as username, time');
        $this->db->from('stock');
        $this->db->join('material', 'material.material_id = stock.material_id');
        $this->db->join('user', 'user.user_id = stock.user_id');
        $this->db->where('kategori', 'out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function get_stock_in()
    {
        $this->db->select('stock.stock_id, kategori, date, material.weight_coil, material.size, material.part_no,
        material.customer_name, material.type, weight_before, weight_after, coil_before, coil_after, qty_weight, qty_coil, material.material_id, user.name as username, time');
        $this->db->from('stock');
        $this->db->join('material', 'material.material_id = stock.material_id');
        $this->db->join('user', 'user.user_id = stock.user_id');
        $this->db->where('kategori', 'in');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_out($post)
    {
        $params = [
            'date' => $post['date'],
            'material_id' => $post['material_id'],
            'kategori' => 'out',
            'type' => $post['type'],
            'part_no' => $post['part_no'],
            'qty_weight' => $post['qty_weight'],
            'weight_before' => $post['weight_before'],
            'weight_after' => $post['weight_after'],
            'coil_before' => $post['coil_before'],
            'coil_after' => $post['coil_after'],
            'qty_coil' => $post['qty_coil'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }
    public function add_stock_in($post)
    {
        $params = [
            'date' => $post['date'],
            'material_id' => $post['material_id'],
            'kategori' => 'in',
            'type' => $post['type'],
            'part_no' => $post['part_no'],
            'qty_weight' => $post['qty_weight'],
            'weight_before' => $post['weight_before'],
            'weight_after' => $post['weight_after'],
            'coil_before' => $post['coil_before'],
            'coil_after' => $post['coil_after'],
            'qty_coil' => $post['qty_coil'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }
    public function get_stockin_pagination()
    {
        $post = $this->session->userdata('search');
        $this->db->select('stock.stock_id, kategori, date, material.weight_coil, material.size, material.part_no,
        material.customer_name, material.type, weight_before, weight_after, coil_before, coil_after, qty_weight, qty_coil, material.material_id, user.name as username, time');
        $this->db->from('stock');
        $this->db->join('material', 'material.material_id = stock.material_id');
        $this->db->join('user', 'user.user_id = stock.user_id');
        $this->db->where('kategori', 'in');
        $this->db->order_by('stock_id', 'desc');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("stock.date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['type'])) {
            if ($post['type'] == 'null') {
                $this->db->where("stock.material_id IS NULL");
            } else {
                $this->db->where("stock.material_id", $post['type']);
            }
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_stockout_pagination()
    {
        $post = $this->session->userdata('search');
        $this->db->select('stock.stock_id, kategori, date, material.weight_coil, material.size, material.part_no,
        material.customer_name, material.type, weight_before, weight_after, coil_before, coil_after, qty_weight, qty_coil, material.material_id, user.name as username, time');
        $this->db->from('stock');
        $this->db->join('material', 'material.material_id = stock.material_id');
        $this->db->join('user', 'user.user_id = stock.user_id');
        $this->db->where('kategori', 'out');
        $this->db->order_by('stock_id', 'desc');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("stock.date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['type'])) {
            if ($post['type'] == 'null') {
                $this->db->where("stock.material_id IS NULL");
            } else {
                $this->db->where("stock.material_id", $post['type']);
            }
        }
        $query = $this->db->get();
        return $query;
    }
}
