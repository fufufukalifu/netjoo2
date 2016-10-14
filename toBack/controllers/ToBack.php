<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class ToBack extends MX_Controller
{
	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model('mToBack');
		$this->load->model( 'paketsoal/MPaketsoal' );
		$this->load->model('siswa/msiswa');
		$this->load->model('Templating/mtemplating');
		parent::__construct();
	}

	#START Function buat TO#
	public function buatTo()
	{
		echo "masuk controller";
		$nmpaket=htmlspecialchars($this->input->post('nmpaket'));
		$tglMulai=htmlspecialchars($this->input->post('tglmulai'));
		$tglAkhir=htmlspecialchars($this->input->post('tglakhir'));
		$publish=htmlspecialchars($this->input->post('publish'));
		$UUID = uniqid();
		$wktMulai=htmlspecialchars($this->input->post('wktmulai'));
		$wktAkhir=htmlspecialchars($this->input->post('wktakhir'));





		$dat_To=array(
			'nm_tryout'=>$nmpaket,
			'tgl_mulai'=>$tglMulai,	
			'tgl_berhenti'=>$tglAkhir,	
			'wkt_mulai'=>$wktMulai,	
			'wkt_berakhir'=>$wktAkhir,	
			'publish'=>$publish,
			'UUID' =>$UUID
			);

		$this->mToBack->insert_to($dat_To);
		 redirect(site_url('toback/addPaketTo/'.$UUID));
	}
	#END Function buat TO#

	#START Function add pakket to Try Out#
	// menampilkan halaman add to
	public function addPaketTo($UUID)
	{	
		$data['tryout'] = $this->MPaketsoal->get_id_by_UUID($UUID);
		// 
		if (!$data['tryout']==array()) {

			$data['id_to']=$data['tryout']['id_tryout'];
			$data['siswa'] = $this->msiswa->get_allsiswa();
			$data['paket']= $this->MPaketsoal->getpaketsoal();
	        $data['files'] = array(
	            APPPATH . 'modules/toback/views/v-bundlepaket.php',
	        );
	        $data['judul_halaman'] = "Bundle Paket";
	        
		} else {
			$data['files'] = array(
	            APPPATH . 'modules/templating/views/v-data-notfound.php',
	        );
	        $data['judul_halaman'] = "Bundle Paket";
			 // $this->load->view('templating/v-data-notfound');
		}
		
		$this->load->view('templating/index-b-guru', $data);
	}
	//add paket ke TO
	public function addPaketToTO()
	{
		$id_paket=$this->input->post('idpaket');
		$id_tryout=$this->input->post('id_to');
		// $id_paket=$this->input->post('test');
		// $this->mToBack->inseert_addPaket();
		$dat_paket=array();//testing
		foreach ($id_paket as $key) {
			$dat_paket[] = array(
				'id_tryout'=>$id_tryout,
			'id_paket'=>$key);
			
		}
		$this->mToBack->insert_addPaket($dat_paket);
		// var_dump(expression)
	}
	// add hak akses to siswa 
	public function addsiswaToTO()
	{
		$id_siswa=$this->input->post('idsiswa');
		$id_tryout=$this->input->post('id_to');
		// $id_paket=$this->input->post('test');
		// $this->mToBack->inseert_addPaket();
		//menampung array id siswa
		$dat_siswa=array();
		foreach ($id_siswa as $key) {
			$dat_siswa[] = array(
				'id_tryout'=>$id_tryout,
			'id_siswa'=>$key);
			
		}
		//add siswa ke paket 
		$this->mToBack->insert_addSiswa($dat_siswa);
		// var_dump(expression)
	}

	//menampikan paket yg sudah di add
	function ajax_listpaket($idTO) {
		

		$list = $this->load->mToBack->paket_by_toID($idTO);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_paket ) {
			// $no++;
			$row = array();
			$row[] = $list_paket['paketID'];
			$row[] = $list_paket['nm_paket'];
			$row[] = $list_paket['deskripsi'];
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropPaket('."'".$list_paket['idKey']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}
	
		$output = array(
			
			"data"=>$data,
		);

		echo json_encode( $output );
	}

	function ajax_listsiswa($idTO) {
		

		$list = $this->load->mToBack->siswa_by_totID($idTO);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_siswa ) {
			// $no++;
			$row = array();
			$row[] = $list_siswa ['siswaID'];
			$row[] = $list_siswa ['namaDepan'];
			$row[] = $list_siswa['aliasTingkat'];
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSiswa('."'".$list_siswa['idKey']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}
	
		$output = array(
			
			"data"=>$data,
		);

		echo json_encode( $output );
	}

	#END Function add pakket to Try Out#

	#START Function di halaman daftar TO#
	//menampilkan halaman list TO
	public function listTO()
	{
        $data['files'] = array(
            APPPATH . 'modules/toback/views/v-list-to.php',
        );
        $data['judul_halaman'] = "List Try Out";
        $this->load->view('templating/index-b-guru', $data);
	}
	// menampilkan list to
	public function ajax_listsTO()
	{
		$list =$this->mToBack->get_To();
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_to ) {
			// $no++;
			if ($list_to['publish']=='1') {
				$publish='Publish';
			} else {
				$publish='Tidak Publish';
			}
			
			$row = array();
			$row[] = $list_to ['id_tryout'];
			$row[] = $list_to ['nm_tryout'];
			$row[] = $list_to['tgl_mulai'];
			$row[] = $list_to['tgl_berhenti'];
			$row[] = $publish;
			$row[] = '
			<a class="btn btn-sm btn-primary"  title="Ubah" onclick="edit_TO('."'".$list_to['id_tryout']."'".')">
			<i class="ico-file5"></i></a>
			<a class="btn btn-sm btn-success"  title="ADD PAKET to TO" href='."addPaketTo/".$list_to['UUID'].' >
			<i class="ico-file-plus2"></i></a>
			
			<a class="btn btn-sm btn-primary"  title="Daftar Peserta TO" onclick="show_peserta('."'".$list_to['UUID']."'".')">
			<i class="ico-user"></i></a>

			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropTO('."'".$list_to['id_tryout']."'".')">
			<i class="ico-remove"></i></a>
			'

			;

			$data[] = $row;

		}
	
		$output = array(
			
			"data"=>$data,
		);

		echo json_encode( $output );

	}
	public function dropTO($id_tryout)
	{
		$this->mToBack->drop_TO($id_tryout);
	}

	public function ajax_edit( $id_tryout) {
		$data = $this->mToBack->get_TO_by_id( $id_tryout );
		echo json_encode( $data );
	}
	#END Function di halaman daftar TO#

	// Drop paketb to TO
	public function dropPaketTo($idKey)
	{
		$this->mToBack->drop_paket_toTO($idKey);
	}

	// Drop siswa to to
	public function dropSiswaTo($idKey)
	{
		$this->mToBack->drop_siswa_toTO($idKey);
	}


	public function editTryout()
	{
		$data['id_tryout']=htmlspecialchars($this->input->post('id_tryout'));
		$nm_tryout=htmlspecialchars($this->input->post('nama_tryout'));
		$tglMulai=htmlspecialchars($this->input->post('tgl_mulai'));
		$tglAkhir=htmlspecialchars($this->input->post('tgl_berhenti'));
		$publish=htmlspecialchars($this->input->post('publish'));

		$data['tryout']=array(
			'nm_tryout'=>$nm_tryout,
			'tgl_mulai'=>$tglMulai,
			'tgl_berhenti'=>$tglAkhir,
			'publish'=>$publish,
			);

		$this->mToBack->ch_To($data);
	}

	#####OPIK#########################################

public function reportto($uuid){
	if (!isset($uuid)) {
		echo "string";
	}else{
		echo "string2";
	}
	// $data['tryout'] = $this->MPaketsoal->get_id_by_UUID($uuid);
	// 	// 
	// 	if (!$data['tryout']==array()) {

			$data['id_to']=$data['tryout']['id_tryout'];
			$data['siswa'] = $this->msiswa->get_allsiswa();
			$data['paket']= $this->MPaketsoal->getpaketsoal();
	        $data['files'] = array(
	            APPPATH . 'modules/toback/views/v-list-peserta.php',
	        );
	        $data['judul_halaman'] = "Daftar Peserta";
	        
	// 	} else {
	// 		$data['files'] = array(
	//             APPPATH . 'modules/templating/views/v-data-notfound.php',
	//         );
	//         $data['judul_halaman'] = "Bundle Paket";
	// 		 // $this->load->view('templating/v-data-notfound');
	// 	}
		
		$this->load->view('templating/index-b-guru', $data);
}





















































































































































































	########################################################

}
?>
