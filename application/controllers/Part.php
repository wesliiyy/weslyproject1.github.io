<?php
defined('BASEPATH') or exit('No direct script access allowed');

class part extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['part_m', 'customer_m', 'proses_m']);
    }
    public function index()
    {
        $data['row'] = $this->part_m->get();
        $this->template->load('template', 'part/part_data', $data);
    }

    public function add()
    {
        $part = new stdClass();
        $part->part_id = null;
        $part->part_no = null;
        $part->part_name = null;
        $part->customer_name = null;
        $part->proses_name = null;
        $part->standar = null;
        $customer = $this->customer_m->get();
        $proses = $this->proses_m->get();
        $data = array(
            'page' => 'add',
            'row' => $part,
            'customer' => $customer,
            'proses' => $proses
        );
        $this->template->load('template', 'part/part_form', $data);
    }
    public function process()
    {
        $config['upload_path']    = './uploads/part/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = 2048;
        $config['file_name']      = 'part-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->part_m->check_part_no($post['part_no'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor Part $post[part_no] telah digunakan");
                redirect('part/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->part_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('part');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('part/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->part_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('part');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->part_m->check_part_no($post['part_no'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor Part $post[part_no] telah digunakan");
                redirect('part/edit');
                redirect('part/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->part_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('part');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('part/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->part_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('part');
                }
            }
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('part');
    }

    public function del($id)
    {
        $part = $this->part_m->get($id)->row();
        if ($part->image != null) {
            $target_file = './uploads/part/' . $part->image;
            unlink($target_file);
        }

        $this->part_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('part');
    }

    public function edit($id)
    {
        $query = $this->part_m->get($id);
        if ($query->num_rows() > 0) {
            $part = $query->row();
            $customer = $this->customer_m->get();
            $proses = $this->proses_m->get();
            $data = array(
                'page' => 'edit',
                'row' => $part,
                'customer' => $customer,
                'proses' => $proses
            );

            $this->template->load('template', 'part/part_form', $data);
        } else {
            echo "<script>alert('Data tidak dpartukan');";
            echo "window.location='" . site_url('part') . "'; </script>";
        }
    }
}
