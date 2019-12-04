<?php

class MainModel extends CI_Model {
    function getNet($user){
        $this->db->select('*');
        $this->db->from('transaction_temp');
        $this->db->where(array("id_kasir"=>$user));
        $this->db->join('prodmas', 'prodmas.prdcd = transaction_temp.prdcd');
        return $this->db->get();
    }
}