<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    private $_table_mess        = "tbl_mst_mess";
    private $_table_kamar       = "tbl_mst_kamar";
    private $_table_karyawan    = "tbl_mst_karyawan";
    private $_table_departemen  = "tbl_mst_departemen";

    public function getTotalMess()
    {
        return $this->db->count_all($this->_table_mess);
    }

    public function getTotalMessLajang()
    {
        return $this->db->query("SELECT COUNT(type_mess) as typeMessLajang FROM tbl_mst_mess  WHERE type_mess='Lajang'")->row_array();
    }

    public function getTotalMessKeluarga()
    {
        return $this->db->query("SELECT COUNT(type_mess) as typeMessKeluarga FROM tbl_mst_mess  WHERE type_mess='Keluarga';")->row_array();
    }

    public function getTotalKamar()
    {
        return $this->db->count_all($this->_table_kamar);
    }

    public function getTotalKamarTersedia()
    {
        return $this->db->query("SELECT COUNT(is_available) as totalKamarTersedia FROM tbl_mst_kamar  WHERE is_available=1;")->row_array();
    }

    public function getTotalKaryawan()
    {
        return $this->db->count_all($this->_table_karyawan);
    }

    public function getTotalDepartemen()
    {
        return $this->db->count_all($this->_table_departemen);
    }
}
