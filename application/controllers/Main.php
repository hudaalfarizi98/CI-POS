<?php defined("BASEPATH") or exit ("No direct script access allowed");

class Main extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if($this->session->userdata("is_login") == FALSE) {
            redirect("Login");
        }
        $this->load->model("MainModel");
    }
    public function started(){
        $this->load->view('Main');
    }

    public function insert_sales(){
        $plu = $this->input->post("plu_cek_pos");
        $qty = $this->input->post("qty_cek_pos");
        $response = "";
        if($plu == "" or $qty == "") {
            $response = array("status" => "gagal");
        } else {
            //CEK PLU APAKAH ADA DI DATABSE
                $cekplu = $this->db->get_where("prodmas",array("prdcd"=>$plu))->num_rows();
                    if(!$cekplu > 0) {
                        $response = array("status" => "gagal2");
                } else {
                    // CEK APAKAH PLU SUDAH ADA ATAU BELUM
                    $cekplutemp = $this->db->get_where("transaction_temp",array("prdcd"=>$plu));
                        if($cekplutemp->num_rows() > 0){
                            $data = array();
                                foreach($cekplutemp->result() as $row){
                                        $data['qty'] = $row->qty;
                                }

                                if($qty > $data['qty']){
                                      //SIMPAN KE TABLE SEMENTARA
                                    $data = array(
                                        "id_kasir" => $this->session->userdata("nik"),
                                        "prdcd" => $plu,
                                        "qty" => $qty
                                    );
                                    $this->db->set('qty', $qty);
                                    $this->db->where('prdcd', $plu);
                                    $this->db->update('transaction_temp');
                                    $response = array("status" => "sukses");
                                } else {
                                    echo "GAK BOLEH UPDATE";
                                }
                        }
                    
                }
        }
        echo json_encode($response);
    }

    public function get_net(){
        $user = $this->session->userdata("nik");
        $data = $this->MainModel->getNet($user)->result();
        $result = array();
        foreach ($data as $row){
            $newresult = array();
            $newresult["plu"] = $row->prdcd;
            $newresult["deskripsi"] = $row->deskripsi;
            $newresult["qty"] = $row->qty;
            $newresult["harga"] = $row->qty * $row->harga;
            $result[] = $newresult;
        }
        echo json_encode($result);
    }

    public function get_struk(){
        $user = $this->session->userdata("nik");
        $data['total'] = $this->input->post("totalmu");
        $data['hasil'] = $this->MainModel->getNet($user)->result();
        $this->load->library('pdf');
        $customPaper = array(0,0,340,650);
        $this->pdf->setPaper($customPaper, 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }
}
