<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Product";
        $data['products'] = $this->admin->getProduct();
        $this->template->load('templates/dashboard', 'product/data', $data);
    }

	private function _validasi()
	{
		$this->form_validation->set_rules('product_code', 'Product Code', 'required|trim');
		$this->form_validation->set_rules('product_name', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		$this->form_validation->set_rules('currency', 'Currency', 'required|trim');
		$this->form_validation->set_rules('disc', 'Discount', 'required|numeric');
		$this->form_validation->set_rules('dimension', 'Dimension', 'required|trim');
		$this->form_validation->set_rules('unit', 'Unit', 'required|trim');
	}
	

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Product";
            $this->template->load('templates/dashboard', 'product/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('product', $input);

            if ($insert) {
                set_pesan('data saved successfully!');
                redirect('product');
            } else {
                set_pesan('failed to save data!');
                redirect('product/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Product";
            $data['product'] = $this->admin->get('product', ['product_code' => $id]);
            $this->template->load('templates/dashboard', 'product/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            
            $update = $this->admin->update('product', 'product_code', $id, $input);
          
            if ($update) {
                set_pesan('data edited successfully!');
                redirect('product');
            } else {
                set_pesan('failed to save data!');
                redirect('product/edit/' . $id);
            }
            
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('product', 'product_code', $id)) {
            set_pesan('data deleted successfully!');
        } else {
            set_pesan('failed to deleted data!', false);
        }
        redirect('product');
    }

    
}
