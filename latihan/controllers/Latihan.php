<?php 
/**
* 
*/
class Latihan extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model( 'mlatihan' );

        $this->load->library( 'parser' );
	}

	public function index()
	{	
		// get soal randoom
		$data['banksoal']=$this->mlatihan->get_banksoal();

		$id_soal=array();//untuk menampung id
		foreach ($data['banksoal'] as $row) {
			$id_soal[]= array('id_soal'=> $row['id_soal']);
		}
		// var_dump($id_soal);
		// get pilihan jawaban sesuai dgn soal
		$data['pilihan']=$this->mlatihan->get_piljawaban($id_soal);
		$this->load->library('table');
		echo $this->table->generate($data['banksoal']);
		echo "==================================";
		echo $this->table->generate($data['pilihan']);
		// var_dump($data);
		//soal + jawaban
		$tamp1=array();
		$tamp2=array();


		foreach ($data['banksoal'] as $row) {
			$tamp1 [] =array(
							'id_soal'=>$row['id_soal'],
							'jawab'=>'1');
			// $tamp2 [] =array(
			// 				'soal'=>$row['soal']);
			// $soal=array_push($tamp1,$tamp2);
			
		}
		$tamp1 ["soal"] = "test";
		
		 // print_r($soal);
		echo $this->table->generate($tamp1);
		// var_dump($soal);

	}

	public function formlatihan()
	{
		
        $data = array(
            'judul_halaman' => 'Netjoo - Welcome',
            'judul_header' =>'Welcome'
        );

        $data['files'] = array( 
            APPPATH.'modules/homepage/views/v-header-login.php',
            APPPATH.'modules/templating/views/t-f-pagetitle.php',
            APPPATH.'modules/homepage/views/v-footer.php',
        );

       

        $this->parser->parse( 'templating/index', $data );
	}
}
 ?>