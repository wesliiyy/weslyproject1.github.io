<?php
defined('BASEPATH') or exit('No direct script access allowed');

class machine extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('machine_m');
    }
    public function index()
    {
        $data['row'] = $this->machine_m->get();
        $this->template->load('template', 'machine/machine_data', $data);
    }

    public function add()
    {
        $machine = new stdClass();
        $machine->machine_id = null;
        $machine->name = null;
        $machine->number = null;
        $machine->tonage = null;
        $data = array(
            'page' => 'add',
            'row' => $machine
        );
        $this->template->load('template', 'machine/machine_form', $data);
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->machine_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->machine_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('machine');
    }

    public function del($id)
    {
        $this->machine_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('machine');
    }
    public function edit($id)
    {
        $query = $this->machine_m->get($id);
        if ($query->num_rows() > 0) {
            $machine = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $machine
            );

            $this->template->load('template', 'machine/machine_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            redirect('machine');
        }
    }
}
