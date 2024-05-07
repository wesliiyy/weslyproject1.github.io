<?php
defined('BASEPATH') or exit('No direct script access allowed');

class opname extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['material_m', 'opname_m', 'user_m']);
    }
    public function index()
    {
        $data['row'] = $this->opname_m->get_opname()->result();
        $this->template->load('template', 'opname/opname_data', $data);
    }

    public function add()
    {
        $material = $this->material_m->get()->result();
        $user = $this->user_m->get()->result();
        $data = ['user' => $user, 'material' => $material];
        $this->template->load('template', 'opname/opname_form', $data);
    }

    public function process()
    {
        if (isset($_POST['opname_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->opname_m->add_opname($post);
            $this->material_m->update_opname_1($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data opname berhasil disimpan');
            }
            redirect('opname');
        }
    }
    public function opname_del()
    {
        $opname_id = $this->uri->segment(3);
        $material_id = $this->uri->segment(4);
        $selisih_coil = $this->opname_m->get($opname_id)->row()->selisih_coil;
        $selisih_weight = $this->opname_m->get($opname_id)->row()->selisih_weight;
        $data = [
            'selisih_coil' => $selisih_coil, 'material_id' => $material_id,
            'selisih_weight' => $selisih_weight, 'material_id' => $material_id
        ];
        $this->material_m->update_opname_2($data);
        $this->opname_m->del($opname_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data opname berhasil dihapus');
        }
        redirect('opname');
    }
}
