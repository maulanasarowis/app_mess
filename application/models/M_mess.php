<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_mess extends CI_Model
{
    private $_table = "tbl_mst_mess";

    function edit($where, $_table)
    {
        return $this->db->get_where($_table, $where);
    }

    function update_data($where, $data, $_table)
    {
        $this->db->where($where);
        $this->db->update($_table, $data);
    }

    function cekKamar()
    {
        return $this->db->query(
            'SELECT id_mess, nama_mess, type_mess, kategori_mess, jumlah_kamar, alamat, 
            (SELECT count(*) 
            FROM tbl_mst_kamar 
            WHERE is_available = 1 AND id_mess = a.id_mess) as available 
            FROM tbl_mst_mess a'
        )->result();
    }

    function save($data)
    {
        $this->db->insert($this->_table, $data);
    }
}
