<?php

class MLogin extends CI_Model
{
    function cek_login($table, $where)
    {
        $login = $this->db->get_where($table, $where)->num_rows();
        if($login>=1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function select_all($table)
    {
        return $this->db->get($table);
    }
    function select_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}