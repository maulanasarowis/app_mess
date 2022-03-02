<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_departemen extends CI_Model
{
    private $_table = "tbl_mst_departemen";

    public function getAll()
    {
        $this->db->where('status', 1);
        return $this->db->get($this->_table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    function edit_data($where, $_table)
    {
        return $this->db->get_where($_table, $where);
    }

    function update_data($where, $data, $_table)
    {
        $this->db->where($where);
        $this->db->update($_table, $data);
    }

    function delete_data($where, $data, $_table)
    {
        $this->db->where($where);
        $this->db->update($_table, $data);
    }
}
