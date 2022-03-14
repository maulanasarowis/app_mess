<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_pindahmess extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_approval');
        $this->load->model('M_transaksi');
        $this->load->model('M_kamar');
        $this->load->helper('url');
		is_logged_in();
    }

    public function index()
    {
		$data['title'] = 'Pindah Mess';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['approval'] = $this->M_approval->getApprove();
		
		$this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
		$this->load->view('admin/pindahmess/index', $data);
        $this->load->view('templates/footer');
    }
	
    public function detail()
    {
		$data1['title'] = 'Detail';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['approval'] = $this->M_approval->getApprove();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
        $this->load->view('admin/pindahmess/V_detail', $data);
		$this->load->view('templates/footer');
    }
	
    public function edit($id_trx_mess)
	{
		$data1['title'] = 'Pindah Mess';
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
		$this->load->view('admin/pindahmess/V_edit', $data);
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
		$getNameSession 	= $data['user']['nama'];

		$id_trx_mess 		= $this->input->post('id_trx_mess');
		$id_karyawan 		= $this->input->post('id_karyawan');
		$id_mess_keluarga 	= $this->input->post('id_mess_keluarga');
		$id_mess_lajanglk 	= $this->input->post('id_mess_lajanglk');
		$id_mess_lajangpr 	= $this->input->post('id_mess_lajangpr');
		$id_kamar 			= $this->input->post('id_kamar');
		$type_mess 			= $this->input->post('type_mess');
		$jkelamin 			= $this->input->post('jkelamin');
		$old_keluarga 		= $this->input->post('old_keluarga');
		$old_kamar 			= $this->input->post('old_kamar');

		if ($type_mess == 'Lajang') {
			if ($jkelamin == 'Laki-laki') {
				$data = array(
					'id_karyawan' 		=> $id_karyawan,
					'id_mess' 			=> $id_mess_lajanglk,
					'id_kamar' 			=> $id_kamar,
                    'complate_stat'     => 1,
                    'approve_status'    => 0,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'created_by' 		=> $getNameSession,
				);
			} else if ($jkelamin == 'Perempuan') {
				$data = array(
					'id_karyawan' 		=> $id_karyawan,
					'id_mess' 			=> $id_mess_lajangpr,
					'id_kamar' 			=> $id_kamar,
                    'complate_stat'     => 1,
                    'approve_status'    => 0,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'created_by' 		=> $getNameSession,
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
		} else if ($type_mess == 'Keluarga') {
			$data = array(
				'id_karyawan' 		=> $id_karyawan,
				'id_mess' 			=> $id_mess_keluarga,
				'id_kamar' 			=> 0,
                'complate_stat'     => 1,
                'approve_status'    => 0,
				'created_at' 		=> date('Y-m-d H:i:s'),
				'created_by' 		=> $getNameSession,
			);
		}

		$where = array(
			'id_kamar' => $old_kamar,
		);

		$data2 = array(
			'is_available' 	=> 1,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $getNameSession,
		);

		$sql = $this->M_transaksi->setKamarUse($where, $data2);

		$where = array(
			'id_trx_mess'	=> $id_trx_mess,
		);

		$sql = $this->M_transaksi->updateTrx($where, $data, 'tbl_trx_mess');

		echo $sql == true ? 'success' : 'failed';
		redirect('admin/pindahmess/index');
	}
}