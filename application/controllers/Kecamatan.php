<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller
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
            'page' => 't_kecamatan.php'
        );
        $data['user'] = $this->userLogin();
        $data['datakecamatan'] = $this->Query->getAllData('tbl_kecamatan')->result();
        $this->load->view('Dashboard/template', $data);
    }

    public function viewInputKecamatan()
    {
        $data['web'] = array(
            'page' => 'datakecamatan.php'
        );
        $data['edit'] = false;
        $data['user'] = $this->userLogin();
        $this->load->view('Dashboard/template', $data);
    }

    public function inputKecamatan()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $cekKode = $this->Query->getData(array("kd_kec" => $kode), 'tbl_kecamatan')->row();
        if ($cekKode):
            $this->flsh_msg('Gagal', 'danger', 'Data gagal ditambah, kode kecamatan sudah ada');
            redirect(base_url('kecamatan/viewInputKecamatan'));
        else:
            $inputData = $this->Query->inputData(array(
                'kd_kec' => $kode,
                'nama_kec' => $nama
            ), 'tbl_kecamatan');

            if ($inputData):
                $this->flsh_msg('Berhasil', 'ok', 'Data berhasil ditambah');
                redirect(base_url('kecamatan/viewInputKecamatan'));
            else:
                $this->flsh_msg('Gagal!', 'danger', 'Data gagal ditambah');
                redirect(base_url('kecamatan/viewInputKecamatan'));
            endif;
        endif;
    }

    public function viewEditKecamatan()
    {
        $data['web'] = array(
            'page' => 'datakecamatan.php'
        );
        $idKecamatan = $this->uri->segment('3');
        $data['datakecamatan'] = $this->Query->getData(array('id_kec' => $idKecamatan), 'tbl_kecamatan')->row();
        $data['edit'] = true;
        $data['user'] = $this->userLogin();
        $this->load->view('Dashboard/template', $data);
    }

    public function editKecamatan()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $idKecamatan = $this->input->post('idkecamatan');

        $updateData = $this->Query->updateData(
            array('id_kec' => $idKecamatan),
            array('kd_kec' => $kode, 'nama_kec' => $nama), 'tbl_kecamatan');

        if ($updateData):
            $this->flsh_msg('Berhasil', 'ok', 'Data berhasil dirubah');
            redirect(base_url('kecamatan'));
        else:
            $this->flsh_msg('Gagal!', 'danger', 'Data gagal dirubah');
            redirect(base_url('kecamatan/viewEditKecamatan/') . $idKecamatan);
        endif;
    }

    public function hapusKecamatan()
    {
        $idKecamatan = $this->input->post('idkecamatan');
        $hapusData = $this->Query->delData(array('id_kec' => $idKecamatan), 'tbl_kecamatan');

        if ($hapusData):
            $this->flsh_msg('Berhasil', 'ok', 'Data berhasil hapus');
            redirect(base_url('kecamatan'));
        else:
            $this->flsh_msg('Gagal!', 'danger', 'Data gagal dihapus');
            redirect(base_url('kecamatan'));
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
