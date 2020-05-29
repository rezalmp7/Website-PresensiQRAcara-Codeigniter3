<?php

class MAdmin extends CI_Model
{
    function select_all($table)
    {
        return $this->db->get($table);
    }
    function select_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function select_select($select, $table)
    {
        $this->db->select($select);
        return $this->db->get($table);
    }
    function select_select_where($select, $table, $where)
    {
        return $this->db->select($select)
        ->from($table)
        ->where($where)
        ->get();
    }
    function select_select_where_join_2table_type($select, $table1, $table2, $on, $where, $type)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on, $type)
        ->where($where)
        ->get();
    }
    function select_select_join_2table_type($select, $table1, $table2, $on, $type)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on, $type)
        ->get();
    }
    function select_select_sum_join_2table_type($select, $selectSum, $table1, $table2, $on, $type, $groupBy)
    {
        return $this->db->select($select)
        ->select_sum($selectSum)
        ->from($table1)
        ->join($table2, $on, $type)
        ->group_by($groupBy)
        ->get();
    }
    function select_select_where_join_3table_type($select, $table1, $table2, $on2, $type2, $table3, $on3, $type3, $where)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on2, $type2)
        ->join($table3, $on3, $type3)
        ->where($where)
        ->get();
    }
    function select_select_join_3table_type($select, $table1, $table2, $on2, $type2, $table3, $on3, $type3)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on2, $type2)
        ->join($table3, $on3, $type3)
        ->get();
    }
    function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
    }
    function update_data($table, $set, $where)
    {
        $this->db->from($table)
        ->where($where)
        ->set($set)
        ->update();
    }
    function select_join_1()
    {
        
    }
}