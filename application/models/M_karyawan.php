<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
    private $_table = "tbl_mst_karyawan";

    public function getAll()
    {
        // return $this->db->get($this->_table)->result();
        // $this->db->select('*');
        // $this->db->from('tbl_mst_karyawan a');
        // $this->db->join('tbl_mst_departemen b', 'b.id_departemen = a.id_departemen');
        // $this->db->where('a status', 1);
        // return $this->db->order_by('singkatan_departemen', 'ASC')->get()->result();
        return $this->db->query(
            'SELECT *
            FROM tbl_mst_karyawan a
            INNER JOIN tbl_mst_departemen b ON b.id_departemen=a.id_departemen
            WHERE a.status = 1
            ORDER BY singkatan_departemen ASC;'
        )->result();
    }

    function save($data)
    {
        $this->db->insert($this->_table, $data);
    }

    function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_karyawan' => $id])->row();
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
