<?php

class LoginModel extends CI_Model{
    function checkUser($nik,$password){
        return $this->db->get_where("users",array("nik"=>$nik,"password"=>$password));
    }
}