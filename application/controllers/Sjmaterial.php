<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sjmaterial extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['sjmaterial_m']);
    }
    public function index()
    {
        $this->load->model(['supplier_m', 'material_m', 'sjmaterial_m']);
        $supplier = $this->supplier_m->get()->result();
        $material = $this->material_m->get()->result();
        $cart = $this->sjmaterial_m->get_cart();
        $data = array(
            'supplier' => $supplier,
            'cart' => $cart,
            'material' => $material,
        );
        $this->template->load('template', 'sjmaterial/sjmaterial_form', $data);
    }
    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            $material_id = $this->input->post('material_id');
            $check_cart = $this->sjmaterial_m->get_cart(['cart.material_id' => $material_id])->num_rows();
            if ($check_cart > 0) {
                $this->sjmaterial_m->update_cart_qty($data);
            } else {
                $this->sjmaterial_m->add_cart($data);
            }
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['edit_cart'])) {
            $this->sjmaterial_m->edit_cart($data);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['simpan'])) {
            $sjmaterial_id = $this->sjmaterial_m->add_sjmaterial($data);
            $cart = $this->sjmaterial_m->get_cart()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push(
                    $row,
                    array(
                        'sjmaterial_id' => $sjmaterial_id,
                        'material_id' => $value->material_id,
                        'weight_coil' => $value->weight_coil,
                        'qty_coil'  => $value->qty_coil,
                        'qty_weight'  => $value->qty_weight,
                    )
                );
            }
            $this->sjmaterial_m->add_sjmaterial_detail($row);
            $this->sjmaterial_m->del_cart(['user_id' => $this->session->userdata('userid')]);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "sjmaterial_id" => $sjmaterial_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }
    function cart_data()
    {
        $cart = $this->sjmaterial_m->get_cart();
        $data['cart'] = $cart;
        $this->load->view('sjmaterial/cart_data', $data);
    }
    public function cart_del()
    {
        if (isset($_POST['cancel_material'])) {
            $this->sjmaterial_m->del_cart(['user_id' => $this->session->userdata('userid')]);
        } else {
            $cart_id = $this->input->post('cart_id');
            $this->sjmaterial_m->del_cart(['cart_id' => $cart_id]);
        }

        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }
    public function cetak($id)
    {
        $data = array(
            'sjmaterial' => $this->sjmaterial_m->get_sjmaterial($id)->row(),
            'sjmaterial_detail' => $this->sjmaterial_m->get_sjmaterial_detail($id)->result(),
        );
        $this->load->view('sjmaterial/sj_print', $data);
    }
    public function del($id)
    {
        $this->sjmaterial_m->del_sjmaterial($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('report/sjmaterial');
    }
}
