<?php
class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }
    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata("userid");
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }
    function countCustomer()
    {
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
    }
    function countMaterial()
    {
        $this->ci->load->model('material_m');
        return $this->ci->material_m->get()->num_rows();
    }
    function countSupplier()
    {
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }
    function countPart()
    {
        $this->ci->load->model('part_m');
        return $this->ci->part_m->get()->num_rows();
    }
    function countProses()
    {
        $this->ci->load->model('proses_m');
        return $this->ci->proses_m->get()->num_rows();
    }
    function countUser()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }
}
