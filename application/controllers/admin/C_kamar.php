<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_kamar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kamar');
	}

	public function index()
	{
		$data['kamar'] = $this->M_kamar->getAll();

		$this->load->view('templates/admin/header');
		$this->load->view('admin/kamar/index', $data);
		$this->load->view('templates/admin/footer');
	}
	public function create()
	{
		$this->load->view('templates/admin/header');
		$this->load->view('admin/kamar/create');
		$this->load->view('templates/admin/footer');
	}

	public function save()
	{
		$nomor_kamar 	= $this->input->post('nomor_kamar');
		$kapasitas 		= $this->input->post('kapasitas');

		$data = array(
			'nomor_kamar' 	=> $nomor_kamar,
			'kapasitas' 	=> $kapasitas,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'created_by' 	=> 'admin',
		);

		$sql = $this->M_kamar->save($data, 'tbl_mst_kamar');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/kamar/index');
	}
}
