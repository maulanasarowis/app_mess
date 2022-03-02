<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_approval extends CI_Model
{
    private $_table = "tbl_trx_mess";

    public function getNoApprove()
    {
        return $this->db->query('SELECT *
                                    FROM tbl_trx_mess a 
                                    JOIN tbl_mst_karyawan b
                                    ON a.id_karyawan = b.id_karyawan
                                    JOIN tbl_mst_mess c
                                    ON a.id_mess = c.id_mess
                                    LEFT JOIN tbl_mst_kamar d
                                    ON a.id_kamar = d.id_kamar
                                    WHERE a.status = 1 AND a.complate_stat = 1 AND a.approve_status = 0')->result();
    }

    public function getApprove()
    {
        return $this->db->query('SELECT *
                                    FROM tbl_trx_mess a 
                                    JOIN tbl_mst_karyawan b
                                    ON a.id_karyawan = b.id_karyawan 
                                    JOIN tbl_mst_mess c
                                    ON a.id_mess = c.id_mess
                                    LEFT JOIN tbl_mst_kamar d
                                    ON a.id_kamar = d.id_kamar
                                    WHERE a.status = 1 AND a.approve_status = 1 AND a.complate_stat = 1')->result();
    }

    public function getReject()
    {
        return $this->db->query('SELECT *
                                    FROM tbl_trx_mess a 
                                    JOIN tbl_mst_karyawan b
                                    ON a.id_karyawan = b.id_karyawan
                                    JOIN tbl_mst_mess c
                                    ON a.id_mess = c.id_mess
                                    LEFT JOIN tbl_mst_kamar d
                                    ON a.id_kamar = d.id_kamar
                                    WHERE a.status = 1 AND a.complate_stat = 1 AND a.approve_status = 2')->result();
    }

    function approv_stat($where, $data, $_table)
    {
        $this->db->where($where);
        $this->db->update($_table, $data);
    }
}
