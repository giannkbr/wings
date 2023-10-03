<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');

        if(version_compare(PHP_VERSION, '7.4.0', '<') && get_magic_quotes_runtime()) {
            @set_magic_quotes_runtime(0);
        }
    }

    public function index()
    {
		$this->load->library('pdf');
		$head_user_data = $this->admin->getReportData();

		$items = [];
		foreach ($head_user_data as $item) {
			if(!isset($items[$item->document_code])){
				$items[$item->document_code] = [];
			}
			$item_ = $this->admin->getCheckouts($item->document_code);
			
			foreach ($item_ as $value) {
				array_push($items[$item->document_code],$value);
			}
		}
		
		
        $html = $this->load->view('report', ['data'=> $head_user_data, 'items'=>$items], true);
        $this->pdf->createPDF($html, 'report', false);
    }

	public function laporanuser($nama){
		$this->load->library('pdf');
		$head_user_data = $this->admin->getReportDataByUser($nama);

		$items = [];
		foreach ($head_user_data as $item) {
			if(!isset($items[$item->document_code])){
				$items[$item->document_code] = [];
			}
			$item_ = $this->admin->getCheckouts($item->document_code);
			
			foreach ($item_ as $value) {
				array_push($items[$item->document_code],$value);
			}
		}
		
		
        $html = $this->load->view('report', ['data'=> $head_user_data, 'items'=>$items], true);
        $this->pdf->createPDF($html, 'report', false);
	}

}
