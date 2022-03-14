<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_departemen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_departemen');
		$this->load->helper('url');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Departemen';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$data['departemen'] = $this->M_departemen->getAll();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/departemen/index', $data);
        $this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Tambah Data Departemen';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/departemen/V_create');
        $this->load->view('templates/footer');
	}

	public function save()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$nama_dept 		= $this->input->post('nama_departemen');
		$singkatan_dept	= $this->input->post('singkatan_departemen');

		$data = array(
			'nama_departemen' 		=> ucwords($nama_dept),
			'singkatan_departemen' 	=> strtoupper($singkatan_dept),
			'created_at' 			=> date('Y-m-d H:i:s'),
			'created_by' 			=> $getNameSession,
		);
		$this->M_departemen->save($data, 'tbl_mst_departemen');
		// echo $sql == true ? 'success' : 'failed';
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sukses, data telah disimpan</div>');
		redirect('admin/C_departemen/index');

	}

	public function edit($id_departemen)
	{
		$data['title'] = 'Ubah Data Departemen';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$where['id_departemen'] = $id_departemen;
		$data['departemen'] 	= $this->M_departemen->edit_data($where, 'tbl_mst_departemen')->row();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('admin/departemen/V_edit', $data);
		$this->load->view('templates/footer');
	}

	function update()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$id_dept 		= $this->input->post('id_departemen');
		$nama_dept 		= $this->input->post('nama_departemen');
		$singkatan_dept = $this->input->post('singkatan_departemen');

		$data = array(
			'nama_departemen' 		=> ucwords($nama_dept),
			'singkatan_departemen' 	=> strtoupper($singkatan_dept),
			'updated_at' 			=> date('Y-m-d H:i:s'),
			'updated_by'			=> $getNameSession,
		);
		$where = array(
			'id_departemen'	=> $id_dept,
		);

		$this->M_departemen->update_data($where, $data, 'tbl_mst_departemen');
		// echo $sql == true ? 'success' : 'failed';
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sukses, data telah diupdate</div>');
		redirect('admin/C_departemen/index');
	}

	function delete($id_departemen)
	{

		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];
		
		$data = array(
			'id_departemen' => $id_departemen,
			'status' 		=> 0,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $getNameSession,
		);

		$where = array(
			'id_departemen'	=> $id_departemen,
		);

		$this->M_departemen->delete_data($where, $data, 'tbl_mst_departemen');
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sukses, data telah dihapus</div>');
		// echo $sql == true ? 'success' : 'failed';
		redirect('admin/C_departemen/index');
	}
}
