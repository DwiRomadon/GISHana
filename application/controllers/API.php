<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class API extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Query');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function login()
    {
        $u      = $this -> input -> post('username');
        $p      = md5($this -> input -> post('password'));
        $query   = $this -> Query -> getData(array('username'=>$u,'password'=>$p),'users') -> row();
        if($query):
            $data['status'] = true;
            $data['msg']	= 'berhasil login';
            $data['user']   = $query;
        else:
            $data['status'] = false;
            $data['msg']	= 'Cek kembali username atau password anda';
        endif;
        echo json_encode($data);
    }

    public function registrasi()
    {
        $nama   = $this -> input -> post('nama');
        $u      = $this -> input -> post('username');
        $p      = md5($this -> input -> post('password'));
        $email  = $this -> input -> post('email');
        $inputData  = $this -> Query -> inputData(array(
            'nama'=>$nama,
            'password'=>$p,
            'username'=>$u,
            'email'=>$email,
            'level'=>'user')
            ,'users');
        if($inputData):
            $data['status'] = true;
            $data['msg']	= 'berhasil registrasi';
            $data['user']   = array(
                'nama'=>$nama,
                'password'=>$p,
                'username'=>$u,
                'email'=>$email,
                'level'=>'user'
            );
        else:
            $data['status'] = false;
            $data['msg']	= 'Registrasi anda gagal';
        endif;
        echo json_encode($data);
    }

    public function getAllDataSpbu()
    {
        $photoStudio = $this->Query->getDataJoin('tbl_spbu','tbl_kecamatan', 'kd_kec')->result();
        if($photoStudio):
            $data['status'] = true;
            $data['msg']	= 'berhasil memuat';
            $data['user']   = $photoStudio;
        else:
            $data['status'] = false;
            $data['msg']	= 'gagal memuat';
        endif;
        echo json_encode($data);
    }

}
