<?php

class Artikel extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		no_access();
		levelsuper();
	}
	public function index()
	{
		$data=array(
			"title"=>'Artikel',
			"menu"=>getmenu(),
			"all"=>$this->db->get('admin')->result(),
			"aktif"=>"artikel",
			"content"=>"user/artikel.php",
		);
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				print_r('gambar gak ada');exit;
		}
		else
		{
				print_r('berhasil');exit;
		}
		
	}
	// public function reset($id)
	// {
	// 	$cek=$this->db->query("SELECT * FROM admin where id_admin='$id'")->row_array();
		
	// 	$object=array(
	// 		"username"=>$cek['id_penduduk'],
	// 		"password"=>md5($cek['id_penduduk']),
	// 	);
	// 	$this->db->where('id_admin', $id);
	// 	$this->db->update('admin', $object);
	// 	$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
	// 	redirect('User');
	// }
	// public function delete($id)
	// {
	// 	$this->db->query("DELETE FROM admin where id_admin='$id'");
	// 	$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
	// 	redirect('User');
	// }
}
