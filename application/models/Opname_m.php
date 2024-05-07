<?php
defined('BASEPATH') or exit('No direct script access allowed');

class opname_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('opname');
        if ($id != null) {
            $this->db->where('opname_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('opname_id', $id);
        $this->db->delete('opname');
    }
    public function get_opname()
    {
        $this->db->select('opname.opname_id,  material.weight_coil, material.size, material.part_no,
        material.type, weight_system, weight_actual, coil_system, coil_actual, selisih_weight, selisih_coil, material.material_id, user.name as username, time');
        $this->db->from('opname');
        $this->db->join('material', 'material.material_id = opname.material_id');
        $this->db->join('user', 'user.user_id = opname.user_id');
        $this->db->order_by('opname_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_opname($post)
    {
        $params = [
            'material_id' => $post['material_id'],
            'type' => $post['type'],
            'size' => $post['size'],
            'selisih_weight' => $post['selisih_weight'],
            'weight_system' => $post['weight_system'],
            'weight_actual' => $post['weight_actual'],
            'coil_system' => $post['coil_system'],
            'coil_actual' => $post['coil_actual'],
            'selisih_coil' => $post['selisih_coil'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('opname', $params);
    }
}
