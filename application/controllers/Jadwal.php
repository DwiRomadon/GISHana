<?php
/**
 * Created by PhpStorm.
 * User: mr-lvs
 * Date: 22/01/19
 * Time: 11:58
 */

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Query');
		$this->load->library('form_validation');
		$this -> namalengkap  	= $_SESSION['nmlengkap'];
		$this -> username 		= $_SESSION['username'];
		$this -> idlevel    	= $_SESSION['id_level'];
		$this -> kdprodi_user	= $_SESSION['kdprodi_user'];

		#cek login
		if(isset($_SESSION['user_is_login']) and $_SESSION['user_is_login']== true):
			$this -> namalengkap 	    = $_SESSION['nmlengkap'];
			$this -> username 			= $_SESSION['username'];
			$this -> idlevel    		= $_SESSION['id_level'];
			$this -> kdprodi_user	    = $_SESSION['kdprodi_user'];
		else:
			$this -> flsh_msg('Perhatian!','warning','anda harus login untuk mengakses halaman tersebut');
			redirect(base_url('login'));
		endif;
	}

	public function flsh_msg($title,$type,$msg)
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

		$flash_message = array( 'title' => $title,
			'color' => $color,
			'msg'   => $msg
		);
		$this->session->set_flashdata('message',$flash_message);
	}

	public function index(){
		$data['web'] 	= array(
			'page'		  => 't_jadwal.php'
		);

		$data['user']		= array(
			'name' 	  		=> $this -> username,
			'level'	  		=> $this -> idlevel,
			'nmlengkap' 	=> $this -> namalengkap,
			'kdprodi_user'	=> $this -> kdprodi_user
		);

		$data['prodi']   = $this -> Query -> getData(array('kode_jurusan'=>$this -> kdprodi_user),'vfakprodi') -> row();
		$data['thnssem'] = $this -> Query -> orderByLimit('thnakademik','thnsem','DESC', '10') -> result();

		$thnSem 	= $this -> input -> post('thnsem');
		$kdProdi  	= $this -> input -> post('kodeprodi');

		if(is_null($this -> db -> query("SHOW TABLES LIKE 'vjadwal".$thnSem."'")->row())):
			redirect(base_url('jadwal'));
		else:
			$data['tabel'] = $this -> Query -> getData(array('ThnSmester'=>$thnSem,'Kd_Jur'=>$kdProdi, 'MKUN'=>'N'),'vjadwal'.$thnSem) -> result();
		endif;

		//select kampus
		$data['kampus'] = $this -> Query -> getAllData('kampus') -> result();
		//select jenjang
		$data['jenjang'] = $this -> Query -> getDataOrderBy(array('kode_jurusan'=>$this -> kdprodi_user),'vfakprodi','kode_jenjang','DESC') -> row();
		$data['jenis_kuliah'] = $this -> Query -> getAllData('program') -> result();
		$data['jenis_semester'] = $this -> Query -> getAllData('jenissem') -> result();
		//select matakuliah
		$data['matakuliah'] = $this -> Query -> getDataOrderBy(array('Aktif'=>'Y','MKUN'=>'N', 'JurusanKd'=>$this -> kdprodi_user),'matakuliah','Kode_MK','DESC') -> result();
		$data['jenisjadwal'] = $this -> Query -> getAllData('jenisjadwal') -> result();
		$data['hari'] = $this -> Query -> getAllData('hari') -> result();
		$data['kelas'] = $this -> Query -> getAllData('kelas') -> result();
		$data['ruang'] = $this -> Query -> getAllDataOrder('ruang','Nm_Ruang','ASC') -> result();
		$data['jamkuliah'] = $this -> Query -> getAllData('jamkuliah') -> result();
		$data['dosen'] = $this -> Query -> getAllDataOrder('tbdos','nmdostbdos','ASC') -> result();

		$data['tahunsems'] = $this -> Query -> getDataOrderBy(array('aktif'=>'Y'), 'thnakademik','thnsem', 'DESC') -> row();
		$this->load->view('Dashboard/template', $data);
	}

}
