<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }
    public function add($post)
    {
        $params = [
            'customer_name' => $post['customer_name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'description' => empty($post['desc']) ? null : $post['desc'],
        ];
        $this->db->insert('customer', $params);
    }
    public function edit($post)
    {
        $params = [
            'customer_name' => $post['customer_name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'description' => empty($post['desc']) ? null : $post['desc'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }
}
