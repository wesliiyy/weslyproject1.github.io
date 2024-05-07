<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['material_m', 'stock_m', 'user_m']);
    }
    public function stock_out_data()
    {
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'stock_out/stock_out_data', $data);
    }
    public function stock_in_data()
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'stock_in/stock_in_data', $data);
    }
    public function stock_out_add()
    {
        $material = $this->material_m->get()->result();
        $user = $this->user_m->get()->result();
        $data = ['user' => $user, 'material' => $material];
        $this->template->load('template', 'stock_out/stock_out_form', $data);
    }
    public function stock_in_add()
    {
        $material = $this->material_m->get()->result();
        $user = $this->user_m->get()->result();
        $data = ['user' => $user, 'material' => $material];
        $this->template->load('template', 'stock_in/stock_in_form', $data);
    }

    public function process()
    {
        if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->material_m->update_stock_out($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data material keluar berhasil disimpan');
            }
            redirect('stock/out');
        }
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->material_m->update_stock_in($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data material keluar berhasil disimpan');
            }
            redirect('stock/in');
        }
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $material_id = $this->uri->segment(5);
        $qty_weight = $this->stock_m->get($stock_id)->row()->qty_weight;
        $qty_coil = $this->stock_m->get($stock_id)->row()->qty_coil;
        $data = [
            'qty_weight' => $qty_weight, 'material_id' => $material_id,
            'qty_coil' => $qty_coil, 'material_id' => $material_id
        ];
        $this->material_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data material keluar berhasil dihapus');
        }
        redirect('stock/out');
    }
    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $material_id = $this->uri->segment(5);
        $qty_weight = $this->stock_m->get($stock_id)->row()->qty_weight;
        $qty_coil = $this->stock_m->get($stock_id)->row()->qty_coil;
        $data = [
            'qty_weight' => $qty_weight, 'material_id' => $material_id,
            'qty_coil' => $qty_coil, 'material_id' => $material_id
        ];
        $this->material_m->update_stock_out($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data material keluar berhasil dihapus');
        }
        redirect('stock/in');
    }
}
