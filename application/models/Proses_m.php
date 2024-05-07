<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('proses');
        if ($id != null) {
            $this->db->where('proses_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('proses_id', $id);
        $this->db->delete('proses');
    }
    public function add($post)
    {
        $params = [
            'proses_name' => $post['proses_name'],
            'code' => $post['code'],
            'remark' => empty($post['remark']) ? null : $post['remark'],
        ];
        $this->db->insert('proses', $params);
    }
    public function edit($post)
    {
        $params = [
            'proses_name' => $post['proses_name'],
            'code' => $post['code'],
            'remark' => empty($post['remark']) ? null : $post['remark'],
        ];
        $this->db->where('proses_id', $post['id']);
        $this->db->update('proses', $params);
    }
}
