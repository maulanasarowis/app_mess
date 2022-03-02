<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_mess extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mess');
		$this->load->model('M_kamar');
	}

	public function index()
	{
		$data['title'] = 'Mess';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$data['mess'] = $this->M_mess->cekKamar();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/mess/index',$data);
        $this->load->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Tambah Data Mess';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/mess/V_create', $data);
        $this->load->view('templates/footer');
	}

	public function save()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

		$nama_mess 		= $this->input->post('nama_mess');
		$alamat 		= $this->input->post('alamat');
		$jumlah_kamar 	= $this->input->post('jkamar');
		$qty_per_kamar  = $this->input->post('qty');
		$type_mess		= $this->input->post('type_mess');
		$kategori_mess		= $this->input->post('kategori_mess');

		$data = array(
			'nama_mess' 	=> ucwords($nama_mess),
			'alamat' 		=> ucwords($alamat),
			'jumlah_kamar' 	=> $jumlah_kamar,
			'type_mess'		=> ucwords($type_mess),
			'kategori_mess'	=> ucwords($kategori_mess),
			'status' 		=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'created_by'	=> 'admin',
		);

		$sql = $this->M_mess->save($data, 'tbl_mst_mess');

		$lastID = $this->db->insert_id();

		for ($i = 1; $i <= $jumlah_kamar; $i++) {
			$data = array(
				'id_mess' 		=> $lastID,
				'nomor_kamar' 	=> $i,
				'kapasitas' 	=> $qty_per_kamar,
				'created_at' 	=> date('Y-m-d H:i:s'),
				'created_by' 	=> 'admin',
			);

			$sql_save_kamar = $this->M_kamar->save($data);
		}

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_mess/index');
	}

	public function edit($id_mess)
	{
		$data['title'] = 'Ubah Data Mess';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$where['id_mess'] 	= $id_mess;
		$data['mess'] 		= $this->M_mess->edit($where, 'tbl_mst_mess')->result();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/mess/V_edit', $data);
        $this->load->view('templates/footer');
	}

	function update()
	{
		$id_mess 	= $this->input->post('id_mess');
		$nama_mess 	= $this->input->post('nama_mess');
		$alamat 	= $this->input->post('alamat');

		$data = array(
			'id_mess' 	=> $id_mess,
			'nama_mess' => ucwords($nama_mess),
			'alamat' 	=> ucwords($alamat)
		);

		$where = array(
			'id_mess'	=> $id_mess,
		);

		$sql = $this->M_mess->update_data($where, $data, 'tbl_mst_mess');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_mess/index');
	}

	function delete($id_departemen)
	{

		$data = array(
			'id_departemen'	=> $id_departemen,
			'status' 		=> 0,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> 'admin',
		);

		$where = array(
			'id_departemen'	=> $id_departemen,
		);

		$sql = $this->M_departemen->delete_data($where, $data, 'tbl_mst_departemen');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_departemen/index');
	}

	public function detail($id_mess)
	{
		$data['title'] = 'Detail Mess & Kamar';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

		$where['id_mess'] = $id_mess;
		$data['kamar'] = $this->M_kamar->getAllKamarByIdMess($where, 'tbl_mst_kamar')->result();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/mess/V_detail', $data);
        $this->load->view('templates/footer');
	}
}
