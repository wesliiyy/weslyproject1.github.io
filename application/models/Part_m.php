<?php
defined('BASEPATH') or exit('No direct script access allowed');

class part_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('part');
        $this->db->select('part.*, customer.customer_name as customer_name, proses.proses_name as proses_name');
        $this->db->join('customer', 'customer.customer_name = part.customer_name');
        $this->db->join('proses', 'proses.proses_name = part.proses_name');
        if ($id != null) {
            $this->db->where('part_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('part_id', $id);
        $this->db->delete('part');
    }
    public function add($post)
    {
        $params = [
            'part_name' => $post['part_name'],
            'part_no' => $post['part_no'],
            'customer_name' => $post['customer_name'],
            'proses_name' => $post['proses_name'],
            'standar' => $post['standar'],
            'image' => $post['image'],

        ];
        $this->db->insert('part', $params);
    }
    public function edit($post)
    {
        $params = [
            'part_name' => $post['part_name'],
            'part_no' => $post['part_no'],
            'customer_name' => $post['customer_name'],
            'proses_name' => $post['proses_name'],
            'standar' => $post['standar'],
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('part_id', $post['id']);
        $this->db->update('part', $params);
    }
    function check_part_no($code, $id = null)
    {
        $this->db->from('part');
        $this->db->where('part_no', $code);
        if ($id != null) {
        }
        $this->db->where('part_id !=', $id);
        $query = $this->db->get();
        return $query;
    }
}
