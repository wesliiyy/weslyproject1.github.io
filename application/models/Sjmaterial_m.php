<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sjmaterial_m extends CI_Model
{

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        $params = array(
            'cart_id' => $car_no,
            'material_id' => $post['material_id'],
            'weight_coil' => $post['weight_coil'],
            'qty_coil' => $post['qty_coil'],
            'qty_weight' => ($post['qty_coil'] * $post['weight_coil']),
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('cart', $params);
    }
    public function get_cart($params = null)
    {
        $this->db->select('*, material.type as material_type, cart.weight_coil as cart_weight_coil');
        $this->db->from('cart');
        $this->db->join('material', 'cart.material_id = material.material_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata("userid"));
        $query = $this->db->get();
        return $query;
    }
    function update_cart_qty($post)
    {
        $sql = "UPDATE cart SET weight_coil = '$post[weight_coil]', 
                qty_coil = qty_coil + '$post[qty_coil]',
                qty_weight = '$post[weight_coil]' * qty_coil
                WHERE material_id = '$post[material_id]'";
        $this->db->query($sql);
    }
    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('cart');
    }
    public function edit_cart($post)
    {
        $params = array(
            'qty_coil' => $post['qty_coil'],
            'qty_weight' => $post['qty_weight'],
            'weight_coil' => $post['weight_coil'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('cart', $params);
    }
    public function add_sjmaterial($post)
    {
        $params = array(
            'supplier_id' => $post['supplier_id'],
            'total_coil' => $post['total_coil'],
            'total_weight' => $post['total_weight'],
            'no_po' => $post['no_po'],
            'no_do' => $post['no_do'],
            'no_kontrak' => $post['no_kontrak'],
            'do_date' => $post['do_date'],
            'in_date' => $post['in_date'],
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('sj_material', $params);
        return $this->db->insert_id();
    }
    function add_sjmaterial_detail($params)
    {
        $this->db->insert_batch('sj_material_detail', $params);
    }
    public function get_sjmaterial($id = null)
    {
        $this->db->select('*, supplier.supplier_name as supplier_name, user.username as user_name');
        $this->db->from('sj_material');
        $this->db->join('supplier', 'sj_material.supplier_id = supplier.supplier_id');
        $this->db->join('user', 'sj_material.user_id = user.user_id');
        if ($id != null) {
            $this->db->where('sjmaterial_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_sjmaterial_pagination()
    {
        $post = $this->session->userdata('search');
        $this->db->select('*, supplier.supplier_name as supplier_name, user.username as user_name');
        $this->db->from('sj_material');
        $this->db->join('supplier', 'sj_material.supplier_id = supplier.supplier_id');
        $this->db->join('user', 'sj_material.user_id = user.user_id');
        $this->db->order_by('sj_material.created', 'desc');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("sj_material.in_date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['supplier'])) {
            if ($post['supplier'] == 'null') {
                $this->db->where("sj_material.supplier_id IS NULL");
            } else {
                $this->db->where("sj_material.supplier_id", $post['supplier']);
            }
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_sjmaterial_detail($sjmaterial_id = null)
    {
        $this->db->from('sj_material_detail');
        $this->db->join('material', 'sj_material_detail.material_id = material.material_id');
        if ($sjmaterial_id != null) {
            $this->db->where('sj_material_detail.sjmaterial_id', $sjmaterial_id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del_sjmaterial($id)
    {
        $this->db->where('sjmaterial_id', $id);
        $this->db->delete('sj_material');
    }
}
