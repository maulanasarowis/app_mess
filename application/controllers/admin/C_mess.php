<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_mess extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mess');
		$this->load->model('M_kamar');
		is_logged_in();
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
		$getNameSession = $data['user']['nama'];
		// echo "<pre>";
		// print_r($data['user']['nama']);
		// echo "</pre>";
		// die;

		$nama_mess 		= $this->input->post('nama_mess');
		$alamat 		= $this->input->post('alamat');
		$kapasitas	    = $this->input->post('kapasitas');
		$type_mess		= $this->input->post('type_mess');
		$kategori_mess	= $this->input->post('kategori_mess');
		$jumlah_kamar	= $this->input->post('jmlh_kamar');
		$this->input->post();		

		if ($type_mess == "lajang")
		{
			$data = array(
				'nama_mess' 	=> ucwords($nama_mess),
				'alamat' 		=> ucwords($alamat),
				'type_mess'		=> ucwords($type_mess),
				'kategori_mess'	=> ucwords($kategori_mess),
				'jumlah_kamar'	=> $jumlah_kamar,
				'status' 		=> 1,
				'created_at' 	=> date('Y-m-d H:i:s'),
				'created_by'	=> $getNameSession,
			);

			$sql = $this->M_mess->save($data, 'tbl_mst_mess');

			$no = 1;
			$lastID = $this->db->insert_id();
			foreach($kapasitas as $v){
				
				$data = array(
					'id_mess'		=> $lastID,
					'nomor_kamar' 	=> $no++,
					'kapasitas' 	=> $v,
					'is_available' 	=> 1,
					'created_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> $getNameSession,
				);

				$sql_save_kamar = $this->M_kamar->save($data);
			}

		} else {

			$data = array(
				'nama_mess' 	=> ucwords($nama_mess),
				'alamat' 		=> ucwords($alamat),
				'jumlah_kamar' 	=> 2,
				'type_mess'		=> ucwords($type_mess),
				'kategori_mess'	=> ucwords($kategori_mess),
				'status' 		=> 1,
				'created_at' 	=> date('Y-m-d H:i:s'),
				'created_by'	=> $getNameSession,
			);
			$sql = $this->M_mess->save($data, 'tbl_mst_mess');

			$no = 1;
			$getJmlhKamar = $data['jumlah_kamar'];
			var_dump($getJmlhKamar);
			$lastID = $this->db->insert_id();
			for ($i = 1; $i <= $getJmlhKamar; $i++) {
				$data = array(
					'id_mess' 		=> $lastID,
					'nomor_kamar' 	=> $no++,
					'kapasitas' 	=> 1,
					'created_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> $getNameSession,
				);

				$sql_save_kamar = $this->M_kamar->save($data);
			}
		}
		

		echo $sql == true ? 'success' : 'failed';
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sukses, data telah disimpan</div>');
		redirect('admin/C_mess/index');
	}


	public function edit($id_mess)
	{
		$data['title'] 	= 'Ubah Data Mess';
		$data['user'] 	= $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$where['id_mess'] 	= $id_mess;
		$data['mess'] 		= $this->M_mess->edit($where, 'tbl_mst_mess')->row_array();
		$data['kamar']		= $this->M_kamar->getAllKamarByIdMess($where, 'tbl_mst_kamar')->result();

		// echo '<pre>';
		// print_r($data['kamar']);
		// echo '</pre>';
		// die;

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/mess/V_edit', $data);
        $this->load->view('templates/footer');
	}

	function update()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$id_mess 		= $this->input->post('id_mess');
		$nama_mess 		= $this->input->post('nama_mess');
		$alamat 		= $this->input->post('alamat');
		$type_mess		= $this->input->post('type_mess');
		$kapasitas	    = $this->input->post('kapasitas');
		$kategori_mess	= $this->input->post('kategori_mess');
		$jumlah_kamar	= $this->input->post('jmlh_kamar');
		$this->input->post();		

		if ($type_mess == "Keluarga") {

			$data = array(
				'id_mess' 		=> $id_mess,
				'nama_mess' 	=> ucwords($nama_mess),
				'alamat' 		=> ucwords($alamat),
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $getNameSession,
			);
	
			$where = array(
				'id_mess'	=> $id_mess,
			);
	
			$sql = $this->M_mess->update_data($where, $data, 'tbl_mst_mess');
			
		} else {
			// ------------
			$data = array(
				'id_mess' 		=> $id_mess,
				'nama_mess' 	=> ucwords($nama_mess),
				'alamat' 		=> ucwords($alamat),
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $getNameSession,
			);
	
			$where = array(
				'id_mess'	=> $id_mess,
			);
	
			$sql = $this->M_mess->update_data($where, $data, 'tbl_mst_mess');

			echo '<pre>';
			print_r($data);
			echo '</pre>';
			
				$no = 1;
				// var_dump($no);
				foreach($kapasitas as $v){
					
					$data = array(
						'id_mess'		=> $id_mess,
						'nomor_kamar' 	=> $no++,
						'kapasitas' 	=> $v,
						'is_available' 	=> 1,
						'created_at' 	=> date('Y-m-d H:i:s'),
						'created_by' 	=> $getNameSession,
					);

					$where = array(
						'id_mess'	=> $id_mess,
					);
					
					$sql_save_kamar = $this->M_kamar->update_data($where, $data, 'tbl_mst_kamar');
					echo '<pre>';
					print_r($data);
					echo '</pre>';
					// die;
					
				}
			die;
			// ================
		}
			
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sukses, data telah diupdate</div>');
			
			echo $sql == true ? 'success' : 'failed';

			redirect('admin/C_mess/index');
	}

	function delete($id_mess)
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$data = array(
			'id_mess'	=> $id_mess,
			'status' 		=> 0,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $getNameSession,
		);

		$where = array(
			'id_mess'	=> $id_mess,
		);

		$this->M_departemen->delete_data($where, $data, 'tbl_mst_departemen');
		// echo $sql == true ? 'success' : 'failed';
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sukses, data telah dihapus</div>');
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