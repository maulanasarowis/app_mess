<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_dashboard');
    }

    public function index()
    {
        $title  = 'Dashboard';
        $user   = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();

        $totalMess          = $this->M_dashboard->getTotalMess();
        $totalKamar         = $this->M_dashboard->getTotalKamar();
        $totalKaryawan      = $this->M_dashboard->getTotalKaryawan();
        $totalDepartemen    = $this->M_dashboard->getTotalDepartemen();
        $totalMessKeluarga  = $this->M_dashboard->getTotalMessKeluarga();
        $totalMessLajang    = $this->M_dashboard->getTotalMessLajang();
        $totalKamarTersedia    = $this->M_dashboard->getTotalKamarTersedia();

        // echo '<pre>';
        // print_r($totalMessKeluarga);
        // echo '</pre>';
        // die;


        $data = array(
            'total_mess'            => $totalMess,
            'total_kamar'           => $totalKamar,
            'total_karyawan'        => $totalKaryawan,
            'total_departemen'      => $totalDepartemen,
            'total_mess_keluarga'   => $totalMessKeluarga,
            'total_mess_lajang'     => $totalMessLajang,
            'total_kamar_tersedia'  => $totalKamarTersedia,
            'title'                 => $title,
            'user'                  => $user,

        );

        // echo '<pre>';
        // print_r($data['total_mess_lajang']['typeMessLajang']);
        // echo '</pre>';
        // die;

        // $totalMess = $this->db->query("SELECT COUNT(nama_mess) AS TotalMess FROM tbl_mst_mess  WHERE status=1;");
        // $totalKamar = $this->db->query("SELECT COUNT(nomor_kamar) FROM tbl_mst_kamar WHERE status=1;");
        // echo '<pre>';
        // var_dump($totalKamar);
        // echo '</pre>';
        // var_dump('total mess' . $totalMess);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
