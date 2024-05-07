<?php
defined('BASEPATH') or exit('No direct script access allowed');

class proses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('proses_m');
    }
    public function index()
    {
        $data['row'] = $this->proses_m->get();
        $this->template->load('template', 'proses/proses_data', $data);
    }

    public function add()
    {
        $proses = new stdClass();
        $proses->proses_id = null;
        $proses->proses_name = null;
        $proses->code = null;
        $proses->remark = null;
        $data = array(
            'page' => 'add',
            'row' => $proses
        );
        $this->template->load('template', 'proses/proses_form', $data);
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->proses_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->proses_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('proses');
    }

    public function del($id)
    {
        $this->proses_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('proses');
    }
    public function edit($id)
    {
        $query = $this->proses_m->get($id);
        if ($query->num_rows() > 0) {
            $proses = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $proses
            );

            $this->template->load('template', 'proses/proses_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            redirect('proses');
        }
    }
}
