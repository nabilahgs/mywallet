<?php

class models extends CI_Model
{
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
}
