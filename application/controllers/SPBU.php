<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SPBU extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('Query');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
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
                $color = 'alert-success alert-dismissible';
                break;
            case 'warning':
                $color = 'callout-warning';
                break;
            case 'danger':
                $color = 'alert-danger alert-dismissible';
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
        $data['web'] = array(
            'page' => 't_spbu.php'
        );
        $data['user'] = $this->userLogin();
        $data['dataspbu'] = $this->Query->getDataJoin('tbl_spbu','tbl_kecamatan', 'kd_kec')->result();
        $this->load->view('Dashboard/template', $data);
    }

    public function viewInputSpbu()
    {
        $data['web'] = array(
            'page' => 'dataspbu.php'
        );
        $data['datakecamatan'] = $this->Query->getAllData('tbl_kecamatan')->result();
        $data['edit'] = false;
        $data['user'] = $this->userLogin();
        $this->load->view('Dashboard/template', $data);
    }

    public function do_upload()
    {

        $config['upload_path'] = './gambar_spbu/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = $this->upload->do_upload('gambar');

//        if (!$gambar):
//            $this->flsh_msg('Gagal', 'danger', 'Gagal menambah data');
//            redirect(base_url('spbu/viewInputSpbu'));
//        else:
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $namaSpbu = $this->input->post('namaspbu');
            $alamat = $this->input->post('alamat');
            $kodeKecamatan = $this->input->post('kodekecamatan');
            $deskripsi = $this->input->post('deskripsi');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');

            $inputData = $this->Query->inputData(array(
                'nama' => $namaSpbu,
                'alamat' => $alamat,
                'kd_kec' => $kodeKecamatan,
                'deskripsi' => $deskripsi,
                'gambar' => $file_name,
                'lati' => $lat,
                'longi' => $long,
            ), 'tbl_spbu');

            if ($inputData):
                $this->flsh_msg('Berhasil', 'ok', 'Data berhasil ditambah');
                redirect(base_url('spbu/viewInputSpbu'));
            else:
                $this->flsh_msg('Gagal!', 'danger', 'Data gagal ditambah');
                redirect(base_url('spbu/viewInputSpbu'));
            endif;
//        endif;

    }


    public function viewEditInputSpbu($id)
    {
        $data['web'] = array(
            'page' => 'dataspbu.php'
        );
        $data['datakecamatan'] = $this->Query->getAllData('tbl_kecamatan')->result();
        $data['datanya'] = $this->Query->getDataJoinWhere('tbl_kecamatan', 'tbl_spbu', 'kd_kec', array('tbl_spbu.id'=>$id))->row();
        $data['edit'] = true;
        $data['user'] = $this->userLogin();
        $this->load->view('Dashboard/template', $data);
    }

    public function do_upload_edit()
    {

        $config['upload_path'] = './gambar_spbu/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = $this->upload->do_upload('gambar');
        if (!$gambar){
            $namaSpbu = $this->input->post('namaspbu');
            $alamat = $this->input->post('alamat');
            $kodeKecamatan = $this->input->post('kodekecamatan');
            $deskripsi = $this->input->post('deskripsi');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');
            $id = $this->input->post('id');
            $file_name = $this->input->post('gambar');
        }else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $namaSpbu = $this->input->post('namaspbu');
            $alamat = $this->input->post('alamat');
            $kodeKecamatan = $this->input->post('kodekecamatan');
            $deskripsi = $this->input->post('deskripsi');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');
            $id = $this->input->post('id');
        }
        $inputData = $this->Query->updateData(
            array('id'=>$id),
            array(
            'nama' => $namaSpbu,
            'alamat' => $alamat,
            'kd_kec' => $kodeKecamatan,
            'deskripsi' => $deskripsi,
            'gambar' => $file_name,
            'lati' => $lat,
            'longi' => $long,
        ), 'tbl_spbu');

        if ($inputData):
            $this->flsh_msg('Berhasil', 'ok', 'Data merubah data');
            redirect(base_url('spbu'));
        else:
            $this->flsh_msg('Gagal!', 'danger', 'Data gagal dirubah');
            redirect(base_url('spbu/viewInputSpbu'));
        endif;

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
