<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Query');
        $this->load->library('form_validation');
        $this->nama = $_SESSION['nama'];
        $this->username = $_SESSION['username'];
        $this->email = $_SESSION['email'];
        $this->photo = $_SESSION['photo'];
        $this->level = $_SESSION['level'];

        #cek login
        if (isset($_SESSION['user_is_login']) and $_SESSION['user_is_login'] == true and $_SESSION['level'] == "admin"):
            $this->nama = $_SESSION['nama'];
            $this->username = $_SESSION['username'];
            $this->email = $_SESSION['email'];
            $this->photo = $_SESSION['photo'];
            $this->level = $_SESSION['level'];
        else:
            $this->flsh_msg('Perhatian!', 'warning', 'anda harus login untuk mengakses halaman admin');
            redirect(base_url('login'));
        endif;
    }

    public function flsh_msg($title, $type, $msg)
    {
        $color = '';

        switch ($type) {
            case 'ok':
                $color = 'callout-success';
                break;
            case 'warning':
                $color = 'callout-warning';
                break;
            case 'danger':
                $color = 'callout-danger';
                break;
            default:
                $color = 'callout-info';
                break;
        }

        $flash_message = array('title' => $title,
            'color' => $color,
            'msg' => $msg
        );
        $this->session->set_flashdata('message', $flash_message);
    }


    public function index()
    {
//        $this->load->library('Googlemaps');
//        $config=array();
//        $config['center']="-5.4286681, 105.2006974";
//        $config['zoom']=17;
//        $config['map_height']="700px";
//        $this->googlemaps->initialize($config);
//        $marker=array();
//        $marker['position']="-5.4286681, 105.2006974";
//        $this->googlemaps->add_marker($marker);
//        $data['map']=$this->googlemaps->create_map();
        $data['web'] = array(
            'page' => 'home.php'
        );
        $data['dataspbu'] = $this->Query->getDataJoin('tbl_spbu','tbl_kecamatan', 'kd_kec')->result();
        $data['user'] = $this->userLogin();
        $this->load->view('Dashboard/template', $data);
    }

    public function dataUser()
    {
        $data['web'] = array(
            'page' => 't_users.php'
        );
        $data['user'] = $this->userLogin();
        $data['datauser'] = $this->Query->getAllData('users')->result();
        $this->load->view('Dashboard/template', $data);
    }

    public function userLogin()
    {
        return array(
            'name' => $this->nama,
            'username' => $this->username,
            'email' => $this->email,
            'photo' => $this->photo,
            'level' => $this->level,
        );
    }
}
