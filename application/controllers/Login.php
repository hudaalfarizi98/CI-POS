<?php defined("BASEPATH") or exit ('No direct script Access Allowed');

class Login extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if($this->session->userdata("is_login") == TRUE) {
            redirect("Main/started");
        }
        $this->load->model('LoginModel');
        $this->load->library('user_agent');
    }
    function index(){
        $this->load->view('login');
    }

    function check_validation(){
        $nik = htmlspecialchars($this->input->post('nik'));
        $password = sha1($this->input->post('password'));

        //cek apakah user ada
        $cek = $this->LoginModel->checkUser($nik,$password)->num_rows();
        if($cek > 0) {
            //session
            $session = array(
                "browser" => $this->agent->browser(),
                "browser_versi" =>$this->agent->version(),
                "os" => $this->agent->platform(),
                "ip" => $this->input->ip_address(),
                "url" => site_url("Main/started"),
                "status" => "Anda Berhasil Login",
                "nik" => $nik,
                "is_login" => true
            );
            $this->session->set_userdata($session);
            echo json_encode($session);
        } else {
            $session = array(
                "status" => "Nik Dan Password anda salah",
            );
            echo json_encode($session);
        }
    }
}
