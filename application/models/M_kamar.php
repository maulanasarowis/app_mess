<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kamar extends CI_Model
{
    private $_table = "tbl_mst_kamar";

    public function getAll()
    {
        $this->db->where('status', 1);
        return $this->db->get($this->_table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    function getAllKamarByIdMess($where, $_table)
    {
        return $this->db->get_where($_table, $where);
    }
}
