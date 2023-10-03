<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	public function __construct()
  {
        parent::__construct();
        // cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
  }

	
	public function index(){
		return $this->list();
	}

	public function list()
	{
		// $data = $this->admin->getList();
		$data['title'] = 'Transaction';
		$data['products'] = $this->admin->getProduct();
    $this->template->load('templates/dashboard', 'transactions/list', $data);
	}


	public function checkout($document_code)
	{
		$dataProduct = $this->admin->getCheckouts($document_code);
		
		$data = [
			'title' => 'Checkout',
			'products'=> $dataProduct,
			'document_code'=> $document_code
		];

		// var_dump($data);
		// exit;
    $this->template->load('templates/dashboard', 'transactions/checkout', $data);
	}


	public function done($document_code)
	{			
		$data = [
			'header'=> $this->admin->getHeader($document_code),
			'title' => 'Done checkout'
		];
		$this->template->load('templates/dashboard', 'transactions/done', $data);
	}

	public function save_tran_header($doc_code){
		$this->admin->insert_header($doc_code);
	}

	public function save_tran_detail($code, $doc_code){
		// var_dump($code, $doc_code);
		// exit();
		$this->admin->insert_tran($code, $doc_code);
	}
	
	public function get_detail($code){
		$res = $this->admin->getProductByCode($code);
		// var_dump($res);
		$data = array(
			'product_code'=> $res->product_code,
			'product_name'=> $res->product_name,
			'price'=> $res->price,
			'currency'=> $res->currency,
			'discount'=> $res->discount,
			'dimension'=> $res->dimension,
			'unit'=> $res->unit
		);
		echo json_encode($data);
	}

	function update_tran_detail($code, $doc_code, $qty, $sub_total){
		// var_dump($code, $doc_code, $qty, $sub_total);
		$this->admin->update_detail($code, $doc_code, $qty, $sub_total);

	}

	function update_tran_header($doc_code, $total){
		$this->admin->update_header($doc_code, $total);
	}

}

/* End of file Transaction.php */
