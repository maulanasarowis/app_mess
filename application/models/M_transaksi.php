<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    private $_table_mess            = "tbl_mst_mess";
    private $_table_transaksi_mess  = "tbl_trx_mess";
    private $_table_kamar           = "tbl_mst_kamar";

    public function getAll()
    {
        return $this->db->query('SELECT *
                                    FROM tbl_trx_mess a 
                                    JOIN tbl_mst_karyawan b
                                    ON a.id_karyawan = b.id_karyawan 
                                    JOIN tbl_mst_mess c
                                    ON a.id_mess = c.id_mess
                                    LEFT JOIN tbl_mst_kamar d
                                    ON a.id_kamar = d.id_kamar
                                    WHERE a.status = 1 AND a.complate_stat = 0')->result();
    }

    function getMessKeluarga()
    {
        return $this->db->query('SELECT a.id_mess, a.nama_mess, b.id_trx_mess   
                                    FROM tbl_mst_mess a
                                    LEFT JOIN tbl_trx_mess b
                                    ON a.id_mess = b.id_mess
                                    WHERE a.type_mess = "Keluarga" AND b.id_trx_mess IS NULL')->result();
    }

    function getMessLajangLk()
    {
        return $this->db->query('SELECT * FROM tbl_mst_mess WHERE type_mess = "Lajang" AND kategori_mess = "Laki-laki";')->result();
    }

    function getMessLajangPr()
    {
        return $this->db->query('SELECT * FROM tbl_mst_mess WHERE type_mess = "Lajang" AND kategori_mess = "Perempuan";')->result();
    }

    function getMessKeluargaUpdate($id_trx_mess)
    {
        return $this->db->query("SELECT a.id_mess, a.nama_mess, b.id_trx_mess, a.type_mess   
                                    FROM tbl_mst_mess a
                                    LEFT JOIN tbl_trx_mess b
                                    ON a.id_mess = b.id_mess
                                    WHERE a.type_mess = 'Keluarga' AND (b.id_trx_mess ='$id_trx_mess' or b.id_trx_mess IS NULL)")->result();
    }

    // function getMessLajangLkUpdate($id_trx_mess)
    // {
    //     return $this->db->query("SELECT a.id_mess, a.nama_mess, b.id_trx_mess, a.type_mess   
    //                                 FROM tbl_mst_mess a
    //                                 LEFT JOIN tbl_trx_mess b
    //                                 ON a.id_mess = b.id_mess
    //                                 WHERE a.type_mess = 'Laki-laki' AND (b.id_trx_mess ='$id_trx_mess' or b.id_trx_mess IS NULL)")->result();
    // }

    // function getMessLajangPrUpdate($id_trx_mess)
    // {
    //     return $this->db->query("SELECT a.id_mess, a.nama_mess, b.id_trx_mess, a.type_mess   
    //                                 FROM tbl_mst_mess a
    //                                 LEFT JOIN tbl_trx_mess b
    //                                 ON a.id_mess = b.id_mess
    //                                 WHERE a.type_mess = 'Perempuan' AND (b.id_trx_mess ='$id_trx_mess' or b.id_trx_mess IS NULL)")->result();
    // }

    // function getKamarByIdMessTypeKeluarga($id_mess)
    // {
    //     return $this->db->query('SELECT b.id_mess FROM tbl_mst_mess a JOIN tbl_mst_kamar b ON b.id_mess = a.id_mess WHERE type_mess = "Keluarga" AND a.id_mess = ' . $id_mess)->result();
    // }

    function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_mst_karyawan a');
        $this->db->join('tbl_mst_departemen b', 'b.id_departemen = a.id_departemen');

        if (!empty($keyword)) {
            $this->db->where('a.nik', $keyword, 'a.status', 1);
        }

        return $this->db->get()->row();
        return $this->db->get($this->_table_mess)->row();
    }

    public function save($data)
    {
        $this->db->insert($this->_table_transaksi_mess, $data);
    }

    public function getKamarAvailble($id_mess)
    {
        return $this->db->query("SELECT * 
                                    FROM tbl_mst_kamar 
                                    WHERE id_mess = '$id_mess' AND is_available = 1 ")->result();
    }

    public function getKamarAvailbleUpadate($id_mess, $id_kamar)
    {
        return $this->db->query("SELECT * 
                                    FROM tbl_mst_kamar 
                                    WHERE id_mess = $id_mess AND is_available = 1 OR id_kamar = $id_kamar")->result();
    }

    public function getKamarAvailbleUpdate($id_mess)
    {
        return $this->db->query("SELECT * 
                                    FROM tbl_mst_kamar 
                                    WHERE id_mess = '$id_mess' AND is_available = 1 ")->result();
    }

    public function setKamarUse($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->_table_kamar, $data);
    }


    function delete_data($where, $data, $_table_transaksi_mess)
    {
        $this->db->where($where);
        $this->db->update($_table_transaksi_mess, $data);
    }

    function update_data($getArray, $data, $_table_kamar)
    {
        $this->db->where($getArray);
        $this->db->update($_table_kamar, $data);
    }

    function edit_data($id_trx_mess)
    {
        return $this->db->query("SELECT a.id_trx_mess, a.id_karyawan, a.id_mess, a.id_kamar, b.nik, b.nama_karyawan, b.jenis_kelamin, c.nama_mess, c.type_mess, c.kategori_mess, d.nomor_kamar
                                    FROM tbl_trx_mess a 
                                    JOIN tbl_mst_karyawan b
                                    ON a.id_karyawan = b.id_karyawan
                                    JOIN tbl_mst_mess c
                                    ON a.id_mess = c.id_mess
                                    LEFT JOIN tbl_mst_kamar d
                                    ON a.id_kamar = d.id_kamar
                                    WHERE id_trx_mess ='$id_trx_mess'")->row();
    }

    function updateTrx($where, $data, $_table_transaksi_mess)
    {
        $this->db->where($where);
        $this->db->update($_table_transaksi_mess, $data);
    }

    function complate_stat($where, $data, $_table_transaksi_mess)
    {
        $this->db->where($where);
        $this->db->update($_table_transaksi_mess, $data);
    }
}
