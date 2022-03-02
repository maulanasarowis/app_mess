<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan');
		$this->load->model('M_departemen');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] = 'Karyawan';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$data['karyawan'] = $this->M_karyawan->getAll();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/karyawan/index', $data);
        $this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Tambah Data Karyawan';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$data['departemen'] = $this->M_departemen->getAll();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/karyawan/V_create', $data);
        $this->load->view('templates/footer');
	}

	public function save()
	{
		$nik 			= $this->input->post('nik_karyawan');
		$nama 			= $this->input->post('nama_karyawan');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$jkelamin 		= $this->input->post('jkelamin');
		$alamat 		= $this->input->post('alamat');
		$id_departemen 	= $this->input->post('id_departemen');


		$data = array(
			'id_departemen' => $id_departemen,
			'nik' 			=> $nik,
			'nama_karyawan' => ucwords($nama),
			'tgl_lahir' 	=> $tgl_lahir,
			'jenis_kelamin'	=> ucwords($jkelamin),
			'alamat' 		=> ucwords($alamat),
			'created_at'	=> date('Y-m-d H:i:s'),
			'created_by'	=> 'admin',
		);

		$sql = $this->M_karyawan->save($data, 'tbl_mst_karyawan');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_karyawan/index');
	}

	public function edit($id_karyawan)
	{
		$data1['title'] = 'Ubah Data Karyawan';
		$data1['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$dept		= $this->M_departemen->getAll();
		$karyawan	= $this->M_karyawan->getById($id_karyawan);

		$data = array(
			'karyawan'		=> $karyawan,
			'departemen'	=> $dept
		);

		$this->load->view('templates/header',$data1);
        $this->load->view('templates/sidebar',$data1);
        $this->load->view('templates/topbar',$data1);
		$this->load->view('admin/karyawan/V_edit',$data);
        $this->load->view('templates/footer');
	}

	function update()
	{
		$id_karyawan 	= $this->input->post('id_karyawan');
		$nik 			= $this->input->post('nik_karyawan');
		$nama 			= $this->input->post('nama_karyawan');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$jkelamin 		= $this->input->post('jkelamin');
		$alamat 		= $this->input->post('alamat');
		$id_departemen 	= $this->input->post('id_departemen');

		$data = array(
			'id_karyawan' 	=> $id_karyawan,
			'id_departemen' => $id_departemen,
			'nik' 			=> $nik,
			'nama_karyawan' => ucwords($nama),
			'tgl_lahir' 	=> $tgl_lahir,
			'jenis_kelamin' => ucwords($jkelamin),
			'alamat' 		=> ucwords($alamat),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> 'admin',
		);

		$where = array(
			'id_karyawan'	=> $id_karyawan,
		);

		$sql = $this->M_karyawan->update_data($where, $data, 'tbl_mst_karyawan');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_karyawan/index');
	}

	function delete($id_karyawan)
	{

		$data = array(
			'id_karyawan' 	=> $id_karyawan,
			'status' 		=> 0,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> 'admin',
		);

		$where = array(
			'id_karyawan'	=> $id_karyawan,
		);

		$sql = $this->M_karyawan->delete_data($where, $data, 'tbl_mst_karyawan');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_karyawan/index');
	}
}
