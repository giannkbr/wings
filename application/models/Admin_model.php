<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getProduct()
    {
        return $this->db->get('product')->result_array();
    }

	public function getUsers(){
		return $this->db->get('user')->result_array();		
	}

	function getProductByCode($code){
        $query = $this->db->get_where('product', ['product_code' => $code]);
        return $query->row();
    }

	function getCheckouts($document_code){
        $query = "SELECT transaction_detail.*, product.product_name FROM `transaction_detail` JOIN 
        product ON product.product_code = transaction_detail.product_code 
        WHERE transaction_detail.document_code = " . $document_code;

        return $this->db->query($query)->result();
    }

	public function insert_tran($code, $doc_code){
        $prod = $this->getProductByCode($code);
		
        $price = $prod->price;
        if($prod->disc != 0){
            $price = $price - ($price * $prod->disc / 100);
        }

        $data = array(
            'document_code'=>$doc_code,
            'product_code'=>$code,
            'price'=>$price,
            'quantity'=> 1,
            'unit'=> $prod->unit,
            'sub_total'=>$price,
            'currency'=> $prod->currency
        );

        $this->db->insert('transaction_detail',$data);
    }

    function getHeader($doc_code){
        $query = $this->db->get_where('transaction_header', ['document_code' => $doc_code]);
        return $query->row();
    }


    function getDetail($code, $doc_code){
        $query = $this->db->get_where('transaction_detail', [
            'document_code' => $doc_code,
            'product_code' => $code
        ]);
        return $query->row();
    }

    function insert_header($doc_code){
        $data = array(
            'document_code'=>$doc_code,
            'user'=> $this->session->userdata('login_session')['username'],
            'total'=>0,
            'date'=> date('Y-m-d')
        );
        $this->db->insert('transaction_header',$data);
    }

    function update_header($doc_code, $total){
        $data = $this->getHeader($doc_code);
        $query = "UPDATE `transaction_header` SET `total` = $total WHERE `transaction_header`.`document_code` = $doc_code;";
        $this->db->query($query);
    }

    function update_detail($code, $doc_code, $qty, $sub_total){
        $data = $this->getDetail($code, $doc_code);

        $query = "UPDATE `transaction_detail` SET `quantity` = $qty WHERE `transaction_detail`.`document_number` = $data->document_number;";
        $this->db->query($query);
        $query = "UPDATE `transaction_detail` SET `sub_total` = $sub_total WHERE `transaction_detail`.`document_number` = $data->document_number;";
        $this->db->query($query);
    }

    function getReportData(){
        $query = "SELECT transaction_header.*, user.nama from transaction_header
        JOIN user on user.nama = transaction_header.user;";

        return $this->db->query($query)->result();
    }

	function getReportDataByUser($user){
        $query = "SELECT transaction_header.*, user.nama from transaction_header
        JOIN user on user.nama = transaction_header.user WHERE transaction_header.user = ?;";

        return $this->db->query($query, array($user))->result();
    }
}
