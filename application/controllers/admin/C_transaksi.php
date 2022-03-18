<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_approval');
		$this->load->model('M_kamar');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Transaksi';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$data['trx_mess'] = $this->M_transaksi->getAll();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/transaksi/index', $data);
        $this->load->view('templates/footer');
	}
	
	public function create()
	{
		$data['title'] = 'Tambah Transaksi Mess';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/transaksi/V_create', $data);
        $this->load->view('templates/footer');
	}

	public function save()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$id_karyawan 	= $this->input->post('id_karyawan');
		$id_mess 		= $this->input->post('id_mess');
		$id_kamar 		= $this->input->post('id_kamar');
		$type_mess 		= $this->input->post('type_mess');

		if ($type_mess == 'Lajang') {
			$data = array(
				'id_karyawan' 		=> 	$id_karyawan,
				'id_mess' 			=>	$id_mess,
				'id_kamar' 			=>	$id_kamar,
				'created_at' 		=> 	date('Y-m-d H:i:s'),
				'created_by' 		=> 	$getNameSession,
			);
		} else {
			$data = array(
				'id_karyawan' 		=> 	$id_karyawan,
				'id_mess' 			=>	$id_mess,
				'created_at' 		=> 	date('Y-m-d H:i:s'),
				'created_by' 		=> 	$getNameSession,
			);
		}

		$check_id_karyawan['cekidkaryawan'] = $this->db->query("SELECT id_karyawan FROM tbl_trx_mess WHERE id_karyawan = '" . $id_karyawan . "' ")->row();

		if ($check_id_karyawan['cekidkaryawan']->id_karyawan == $id_karyawan) {
			echo "<script>
				alert('Maaf data yang anda inputkan sudah terdaftar');
				window.location.href='" . base_url('admin/C_transaksi/index') . "';
				</script>";
		} else {

			$check_penghuni['cekpenghuni'] = $this->db->query("SELECT penghuni from tbl_mst_kamar WHERE id_kamar = '" .$id_kamar. "' ")->row();
			$get_data_kapasitas['getkapasitas'] = $this->db->query("SELECT kapasitas from tbl_mst_kamar WHERE id_kamar = '" .$id_kamar. "' ")->row();
			// var_dump($check_penghuni['cekpenghuni']);
			// var_dump($get_data_kapasitas['getkapasitas']);
			$last_penghuni = $check_penghuni['cekpenghuni']->penghuni;
			// var_dump($last_penghuni);

			$sql = $this->M_transaksi->save($data, 'tbl_trx_mess');

			// insert penghuni 1
			// jalankan jika kapasitas sama dengan penghuni
			$data = array(
				'penghuni' 		=> $last_penghuni+1,
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $getNameSession,
			);

			$where = array(
				'id_kamar' => $id_kamar,
			);

			// $data = array(
			// 	'penghuni' 		=> +1,
			// 	'updated_at' 	=> date('Y-m-d H:i:s'),
			// 	'updated_by' 	=> $getNameSession,
			// );

			$sql = $this->M_transaksi->setKamarUse($where, $data);

			$check_last_penghuni['cekpenghuni'] = $this->db->query("SELECT penghuni from tbl_mst_kamar WHERE id_kamar = '" .$id_kamar. "' ")->row();

			if ($check_last_penghuni['cekpenghuni']->penghuni == $get_data_kapasitas['getkapasitas']->kapasitas) {
				$data = array(
					'is_available' 	=> 0,
					'updated_at' 	=> date('Y-m-d H:i:s'),
					'updated_by' 	=> $getNameSession,
				);

				$where = array(
					'id_kamar' => $id_kamar,
				);

				$sql = $this->M_transaksi->setKamarUse($where, $data);
	
			}
			// -----------
			echo $sql == true ? 'success' : 'failed';

			redirect('admin/C_transaksi/index');
		}
	}

	function search()
	{
		$data1['title'] = 'Transaksi Mess';
		$data1['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
	
		$keyword 				= $this->input->get('keyword');
		$data_option_lajang_pr 	= $this->M_transaksi->getMessLajangPr();
		$data_option_lajang_lk 	= $this->M_transaksi->getMessLajangLk();
		$data_option_keluarga 	= $this->M_transaksi->getMessKeluarga();
		$data_option_kamar 		= $this->M_kamar->getAll();
		$data 					= $this->M_transaksi->ambil_data($keyword);

		$data = array(
			'keyword'			=> $keyword,
			'data'				=> $data,
			'data_option_kamar' => $data_option_kamar,
			'option_lajang_pr' 	=> $data_option_lajang_pr,
			'option_lajang_lk' 	=> $data_option_lajang_lk,
			'option_keluarga' 	=> $data_option_keluarga
		);

		// Validasi jika tidak ada nik 
		$check_nik	= $this->db->query("SELECT * FROM tbl_mst_karyawan WHERE nik = '" . $keyword . "' ")->row();

		if ($check_nik == null) {
			echo "<script>
				alert('NIK tidak ditemukan');
				window.location.href='" . base_url('admin/C_transaksi/create') . "';
				</script>";
		} else {
			$this->load->view('templates/header',$data1);
			$this->load->view('templates/sidebar',$data1);
			$this->load->view('templates/topbar',$data1);
			$this->load->view('admin/transaksi/V_create', $data);
			$this->load->view('templates/footer');
		}
	}

	function getKamarAvailble()
	{
		$id_mess	= $this->input->get('id_mess');
		$data 		= $this->M_transaksi->getKamarAvailble($id_mess);

		echo "<option selected disabled>Pilih Kamar</option>";
		foreach ($data as $v) {
			echo "<option value=" . $v->id_kamar . ">Kamar " . $v->nomor_kamar . "</option>";
		}
	}

	function getKamarAvailbleUpdate()
	{
		$id_mess	= $this->input->get('id_mess');
		$id_kamar 	= $this->input->get('old_kamar');
		$data 		= $this->M_transaksi->getKamarAvailbleUpadate($id_mess, $id_kamar);

		echo "<option disabled>Pilih Kamar</option>";
		// echo "<option selected>$id_kamar</option>";

		foreach ($data as $v) :
			echo "<option value=" . $v->id_kamar . " $v->id_kamar == 26 ? 'selected' : ''>Kamar " . $v->nomor_kamar . "</option>";
		endforeach;
	}

	function delete($id_trx_mess)
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$data = array(
			'id_trx_mess' 	=> $id_trx_mess,
			// 'id_kamar'	=> $get_id_kamar->id_kamar,
			'status' 		=> 0,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $getNameSession,
		);

		$where = array(
			'id_trx_mess'	=> $id_trx_mess,
		);

		$sql = $this->M_transaksi->delete_data($where, $data, 'tbl_trx_mess');

		$get_id_kamar = $this->db->query("SELECT id_kamar FROM tbl_trx_mess WHERE id_trx_mess = '" . $id_trx_mess . "' ")->row();

		$where = array(
			'id_kamar'	=> $get_id_kamar->id_kamar,
		);

		$data = array(
			'is_available' 	=> 1,
			'updated_at' 	=> 	date('Y-m-d H:i:s'),
			'updated_by' 	=> $getNameSession,
		);

		$updateIsavailableKamar = $this->M_transaksi->update_data($where, $data, 'tbl_mst_kamar');

		echo $updateIsavailableKamar == true ? 'success' : 'failed';

		redirect('admin/C_transaksi/index');
	}

	public function edit($id_trx_mess)
	{
		$data1['title'] = 'Ubah Transaksi Mess';
		$data1['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		
		$transaksi_mess					= $this->M_transaksi->edit_data($id_trx_mess);
		$data_option_keluarga 			= $this->M_transaksi->getMessKeluarga();
		$update_data_option_keluarga 	= $this->M_transaksi->getMessKeluargaUpdate($id_trx_mess);
		$get_departemen_by_nik 			= $this->M_transaksi->ambil_data($transaksi_mess->nik);
		$data_option_lajang_pr 			= $this->M_transaksi->getMessLajangPr();
		$data_option_lajang_lk 			= $this->M_transaksi->getMessLajangLk();
		$data_option_kamar 				= $this->M_kamar->getAll();
		$data_option_type				= $this->M_transaksi->getAll();

		$data = array(
			'transaksi_mess' 			=> $transaksi_mess,
			'get_departemen_by_nik' 	=> $get_departemen_by_nik,
			'data_option_kamar' 		=> $data_option_kamar,
			'option_lajang_pr' 			=> $data_option_lajang_pr,
			'option_lajang_lk' 			=> $data_option_lajang_lk,
			'option_keluarga' 			=> $data_option_keluarga,
			'option_keluarga_update' 	=> $update_data_option_keluarga,
			'option_type'				=> $data_option_type
		);

		$this->load->view('templates/header',$data1);
        $this->load->view('templates/sidebar',$data1);
        $this->load->view('templates/topbar',$data1);
		$this->load->view('admin/transaksi/V_edit', $data);
        $this->load->view('templates/footer');
	}

	function update()
	{
		// echo '<pre>';
		// print_r($this->input->post());
		// echo '<pre>';
		// echo 'halamann update';
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$id_trx_mess 			= $this->input->post('id_trx_mess');
		$id_karyawan 			= $this->input->post('id_karyawan');
		$id_mess_keluarga 		= $this->input->post('id_mess_keluarga');
		$id_mess_lajanglk 		= $this->input->post('id_mess_lajanglk');
		$id_mess_lajangpr 		= $this->input->post('id_mess_lajangpr');
		$id_kamar 				= $this->input->post('id_kamar');
		$type_mess 				= $this->input->post('type_mess');
		$jkelamin 				= $this->input->post('jkelamin');
		$old_keluarga 			= $this->input->post('old_keluarga');
		$old_kamar 				= $this->input->post('old_kamar');

		if ($type_mess == 'Lajang') {
			if ($jkelamin == 'Laki-laki') {
				$data = array(
					'id_karyawan' 		=> 	$id_karyawan,
					'id_mess' 			=>	$id_mess_lajanglk,
					'id_kamar' 			=>	$id_kamar,
					'created_at' 		=> 	date('Y-m-d H:i:s'),
					'created_by' 		=> 	$getNameSession,
				);
			} else if ($jkelamin == 'Perempuan') {
				$data = array(
					'id_karyawan' 		=> 	$id_karyawan,
					'id_mess' 			=>	$id_mess_lajangpr,
					'id_kamar' 			=>	$id_kamar,
					'created_at' 		=> 	date('Y-m-d H:i:s'),
					'created_by' 		=> 	$getNameSession,
				);
			}


			$where = array(
				'id_kamar' => $id_kamar,
			);

			$data3 = array(
				'is_available' 	=> 0,
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'updated_by' 	=> $getNameSession,
			);

			$sql = $this->M_transaksi->setKamarUse($where, $data3);

			// ----------------------------------
			// $check_penghuni['cekpenghuni'] = $this->db->query("SELECT penghuni from tbl_mst_kamar WHERE id_kamar = '" .$id_kamar. "' ")->row();
			// $get_data_kapasitas['getkapasitas'] = $this->db->query("SELECT kapasitas from tbl_mst_kamar WHERE id_kamar = '" .$id_kamar. "' ")->row();
			// $last_penghuni = $check_penghuni['cekpenghuni']->penghuni;

			// // $sql = $this->M_transaksi->save($data, 'tbl_trx_mess');

			// // insert penghuni 1
			// // jalankan jika kapasitas sama dengan penghuni
			// $data3 = array(
			// 	'penghuni' 		=> $last_penghuni+1,
			// 	'updated_at' 	=> date('Y-m-d H:i:s'),
			// 	'updated_by' 	=> $getNameSession,
			// );

			// $where = array(
			// 	'id_kamar' => $id_kamar,
			// );

			// $sql = $this->M_transaksi->setKamarUse($where, $data3);

			// $check_last_penghuni['cekpenghuni'] = $this->db->query("SELECT penghuni from tbl_mst_kamar WHERE id_kamar = '" .$id_kamar. "' ")->row();

			// if ($check_last_penghuni['cekpenghuni']->penghuni == $get_data_kapasitas['getkapasitas']->kapasitas) {
			// 	$data = array(
			// 		'is_available' 	=> 0,
			// 		'updated_at' 	=> date('Y-m-d H:i:s'),
			// 		'updated_by' 	=> $getNameSession,
			// 	);

			// 	$where = array(
			// 		'id_kamar' => $id_kamar,
			// 	);

			// 	$sql = $this->M_transaksi->setKamarUse($where, $data);
	
			// }
			// ------------------------------------
		} else if ($type_mess == 'Keluarga') {
			$data = array(
				'id_karyawan' 		=> 	$id_karyawan,
				'id_mess' 			=>	$id_mess_keluarga,
				'id_kamar' 			=>	0,
				'created_at' 		=> 	date('Y-m-d H:i:s'),
				'created_by' 		=> $getNameSession,
			);
		}

		// ---------

		$where = array(
			'id_kamar' => $old_kamar,
		);

		$data2 = array(
			'is_available' 	=> 1,
			'updated_at' 	=> 	date('Y-m-d H:i:s'),
			'updated_by' 	=> $getNameSession,
		);

		$sql = $this->M_transaksi->setKamarUse($where, $data2);

		// ------------

		// --------
		// $check_penghuni['cekpenghuni'] = $this->db->query("SELECT penghuni from tbl_mst_kamar WHERE id_kamar = '" .$old_kamar. "' ")->row();
		// $get_data_kapasitas['getkapasitas'] = $this->db->query("SELECT kapasitas from tbl_mst_kamar WHERE id_kamar = '" .$old_kamar. "' ")->row();
		// $last_penghuni = $check_penghuni['cekpenghuni']->penghuni;

		// 	$sql = $this->M_transaksi->save($data, 'tbl_trx_mess');

		// 	// insert penghuni 1
		// 	// jalankan jika kapasitas sama dengan penghuni
		// 	$data2 = array(
		// 		'penghuni' 		=> $last_penghuni-1,
		// 		'updated_at' 	=> date('Y-m-d H:i:s'),
		// 		'updated_by' 	=> $getNameSession,
		// 	);

		// 	$where = array(
		// 		'id_kamar' => $old_kamar,
		// 	);

		// 	$sql = $this->M_transaksi->setKamarUse($where, $data2);

		// 	$check_last_penghuni['cekpenghuni'] = $this->db->query("SELECT penghuni from tbl_mst_kamar WHERE id_kamar = '" .$old_kamar. "' ")->row();
		// 	// var_dump($check_last_penghuni['cekpenghuni']);
		// 	// die;

		// 	if ($check_last_penghuni['cekpenghuni']->penghuni == $get_data_kapasitas['getkapasitas']->kapasitas) {
		// 		$data = array(
		// 			'is_available' 	=> 1,
		// 			'updated_at' 	=> date('Y-m-d H:i:s'),
		// 			'updated_by' 	=> $getNameSession,
		// 		);

		// 		$where = array(
		// 			'id_kamar' => $old_kamar,
		// 		);

		// 		$sql = $this->M_transaksi->setKamarUse($where, $data);
				
		// 	}
			// ---------
		$where = array(
			'id_trx_mess'	=> $id_trx_mess,
		);

		$sql = $this->M_transaksi->updateTrx($where, $data, 'tbl_trx_mess');
		
		echo $sql == true ? 'success' : 'failed';
		redirect('admin/C_transaksi/index');
		
	}

	function complate($id_trx_mess)
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
		$getNameSession = $data['user']['nama'];

		$data = array(
			'id_trx_mess' => $id_trx_mess,
			'complate_stat'  => 1,
			'updated_at' 	 => date('Y-m-d H:i:s'),
			'updated_by'  	 => $getNameSession,
		);

		$where = array(
			'id_trx_mess'	=> $id_trx_mess,
		);

		$sql = $this->M_transaksi->complate_stat($where, $data, 'tbl_trx_mess');

		echo $sql == true ? 'success' : 'failed';

		redirect('admin/C_transaksi/index');
	}
}