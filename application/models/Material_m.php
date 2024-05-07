<?php
defined('BASEPATH') or exit('No direct script access allowed');

class material_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('material');
        if ($id != null) {
            $this->db->where('material_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('material_id', $id);
        $this->db->delete('material');
    }
    public function add($post)
    {
        $params = [
            'type' => $post['type'],
            'size' => $post['size'],
            'part_no' => $post['part_no'],
            'part_name' => $post['part_name'],
            'weight_coil' => $post['weight_coil'],
            'customer_name' => $post['customer_name'],

        ];
        $this->db->insert('material', $params);
    }
    public function edit($post)
    {
        $params = [
            'type' => $post['type'],
            'size' => $post['size'],
            'part_no' => $post['part_no'],
            'weight_coil' => $post['weight_coil'],
            'customer_name' => $post['customer_name'],
            'part_name' => $post['part_name'],
        ];
        $this->db->where('material_id', $post['id']);
        $this->db->update('material', $params);
    }
    function update_stock_out($data)
    {
        $qty_coil = $data['qty_coil'];
        $qty_weight = $data['qty_weight'];
        $id = $data['material_id'];
        $sql = "UPDATE material SET coil = coil - '$qty_coil', weight = weight - '$qty_weight' WHERE material_id = '$id'";
        $this->db->query($sql);
    }
    function update_stock_in($data)
    {
        $qty_coil = $data['qty_coil'];
        $qty_weight = $data['qty_weight'];
        $id = $data['material_id'];
        $sql = "UPDATE material SET coil = coil + '$qty_coil', weight = weight + '$qty_weight' WHERE material_id = '$id'";
        $this->db->query($sql);
    }
    function update_opname_1($data)
    {
        $selisih_coil = $data['selisih_coil'];
        $selisih_weight = $data['selisih_weight'];
        $id = $data['material_id'];
        $sql = "UPDATE material SET coil = coil - '$selisih_coil', weight = weight - '$selisih_weight' WHERE material_id = '$id'";
        $this->db->query($sql);
    }
    function update_opname_2($data)
    {
        $selisih_coil = $data['selisih_coil'];
        $selisih_weight = $data['selisih_weight'];
        $id = $data['material_id'];
        $sql = "UPDATE material SET coil = coil + '$selisih_coil', weight = weight + '$selisih_weight' WHERE material_id = '$id'";
        $this->db->query($sql);
    }
}
