<?php
class pagination_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    //fetch books
    function get_products($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from stock_products where (name like '%$st%' or company like '%$st%' or p_type like '%$st%') limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_products_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from stock_products where (name like '%$st%' or company like '%$st%' or p_type like '%$st%')";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}
?>