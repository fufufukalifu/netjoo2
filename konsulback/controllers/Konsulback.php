 <?php 
 /**
  * 
  */
  class Konsulback extends MX_Controller
  {
  	private $limit = 1;
  	function __construct()
  	{
  		$this->load->helper( 'session' );
        parent::__construct();
        $this->load->model( 'Mkonsulback' );
        $this->load->library('parser');
        $this->load->model('konsultasi/mkonsultasi');
        $this->load->model('tryout/mtryout');
        $this->load->model('tingkat/mtingkat');
        $this->load->model('matapelajaran/mmatapelajaran');

        //cek kalo bukan guru lemparin.
        if ($this->session->userdata('loggedin')==true) {
            if ($this->session->userdata('HAKAKSES')=='siswa'){
             // redirect('welcome');
            }else if($this->session->userdata('HAKAKSES')=='guru'){
             // redirect('guru/dashboard');
            }else{
            // redirect('login');
            }
        }
  	}
    //history di guru 
  	public function myhistory()
  	{

  		$data['judul_halaman'] = "History Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-history-konsul.php',
  			);
  		$penggunaID=$this->session->userdata['id'];
  		// get jumlah respon
  		$data['countJawab']=$this->Mkonsulback->get_count_jawab($penggunaID);
  		// get data guru
  		$datguru=$this->Mkonsulback->get_datguru($penggunaID);
  		$data['nama']=$datguru['namaDepan'].' '.$datguru['namaBelakang'];
  		$data['photo']=base_url().'assets/image/photo/siswa/'.$datguru['photo'];
  		$data['countLove']=$this->Mkonsulback->get_count_love($penggunaID);
  		// get respon atau jawaban
  		$data['respon']=$this->Mkonsulback->get_respone_by_guru($penggunaID);
  		$tamppoin=($data['countJawab']*5)+($data['countLove']*10);
  		$data['poin']=$tamppoin;
      //get data komen untuk tabel histrori komen
      $data['komen']=$this->Mkonsulback->get_komen_love($penggunaID);

         #START cek hakakses#
  		$hakAkses=$this->session->userdata['HAKAKSES'];
  		if ($hakAkses=='admin') {
         // jika admin
  			$this->parser->parse('admin/v-index-admin', $data);
  		} elseif($hakAkses=='guru'){
         // jika guru
  			$this->parser->parse('templating/index-b-guru', $data);
  		}else{
        // jika siswa redirect ke welcome
  			redirect(site_url('login'));
  		}
          #END Cek USer#
  	}
  	// history guru berdasarkan id guru
  	public function history($penggunaID)
  	{

  		$data['judul_halaman'] = "History Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-history-konsul.php',
  			);
  		// get jumlah respon
  		$data['countJawab']=$this->Mkonsulback->get_count_jawab($penggunaID);
  		// get data guru
  		$datguru=$this->Mkonsulback->get_datguru($penggunaID);
  		$data['nama']=$datguru['namaDepan'].' '.$datguru['namaBelakang'];
  		$data['photo']=base_url().'assets/image/photo/siswa/'.$datguru['photo'];
  		$data['countLove']=$this->Mkonsulback->get_count_love($penggunaID);
  		// get respon atau jawaban
  		$data['respon']=$this->Mkonsulback->get_respone_by_guru($penggunaID);
  		$tamppoin=($data['countJawab']*5)+($data['countLove']*10);
  		$data['poin']=$tamppoin;
      //get data komen untuk tabel histrori komen
      $data['komen']=$this->Mkonsulback->get_komen_love($penggunaID);
         #START cek hakakses#
  		$hakAkses=$this->session->userdata['HAKAKSES'];
  		if ($hakAkses=='admin') {
         // jika admin
  			$this->parser->parse('admin/v-index-admin', $data);
  		} elseif($hakAkses=='guru'){
         // jika guru
  			$this->parser->parse('templating/index-b-guru', $data);
  		}else{
        // jika siswa redirect ke welcome
  			redirect(site_url('login'));
  		}
          #END Cek USer#
  	}

  	public function aq_konsul ()
  	{
  		$data['judul_halaman'] = "Akumulasi Konsultasi";
  		$data['files'] = array(
  			APPPATH . 'modules/konsulback/views/v-aq-konsul.php',
  			);
  		$dat_guru=$this->Mkonsulback->get_aq_konsul();
  		$tampAq=array();
  		foreach ($dat_guru as $value) {
  			$penggunaID=$value['penggunaID'];
  			$love=$this->Mkonsulback->get_count_love($penggunaID);
  			$datguru=$this->Mkonsulback->get_datguru($penggunaID);
  			$countJawab=$this->Mkonsulback->get_count_jawab($penggunaID);
  			$poin=($countJawab*5)+($love*10);
  			$tampAq[]=array('poin'=>$poin,
  							'nama'=>$value['namaDepan'].' '.$value['namaBelakang'],
                'mapel'=>$value['mapel'],
  							'love'=>$love,
  							'countJawab'=>$countJawab,
  							'penggunaID'=>$penggunaID
  							);
  		}
  		rsort($tampAq);
  		$data['dat_aq']=$tampAq;
         #START cek hakakses#
  		$hakAkses=$this->session->userdata['HAKAKSES'];
  		if ($hakAkses=='admin') {
         // jika admin
  			$this->parser->parse('admin/v-index-admin', $data);
  		} elseif($hakAkses=='guru'){
         // jika guru
  			$this->parser->parse('templating/index-b-guru', $data);
  		}else{
        // jika siswa redirect ke welcome
  			redirect(site_url('login'));
  		}
         // #END Cek USer#
  	}

    public function listkonsul()
    {
      $data = array(
      'judul_halaman' => 'Neon - Konsultasi',
      'judul_header'=> 'Daftar Pertanyaan'
      );

    $data['files'] = array(
      APPPATH.'modules/konsulback/views/v-back-daftar-konsul.php'
      );
    // $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());
    $limit=1;
    $data['questions']=$this->Mkonsulback->all($limit);
    $penggunaID=$this->session->userdata['id'];
    $dat_guru=$this->Mkonsulback->get_datguru($penggunaID);
    $mataPelajaranID=$dat_guru['mataPelajaranID'];
    $data['my_questions']=$this->Mkonsulback->get_my_questions($mataPelajaranID,$limit);
    // $data['questions_bylevel']=$this->mkonsultasi->get_my_question_level($this->get_tingkat_siswa());


    // $this->parser->parse( 'templating/index', $data );
    $this->parser->parse('templating/index-b-guru', $data);
    }
    // function more listkonsul
    public function moreallsoal()
    {
       $getLastContentId=$this->input->post('getLastContentId');
      $data['moreask']=$this->Mkonsulback->more_all_soal($getLastContentId);
     
      // var_dump($getLastContentId);
      $this->load->view('v-load-all-ask',$data);
    }
        // function more listkonsul
    public function moremapelsoal()
    {
       $getLastContentId=$this->input->post('getLastContentId');
      $data['moreask1']=$this->Mkonsulback->more_guru_soal($getLastContentId);
     
      // var_dump($getLastContentId);
      $this->load->view('v-load-mapel-ask',$data);
    }
    // Test
    public function pagination()
    {
      $this->load->library('pagination');
      $config['base_url']='http://localhost/netjoo-2/index.php/konsulback/pagination';
      $config['per_page']=2;
      $config['num_link']=2;
      $config['total_rows']=$this->db->get('tb_k_pertanyaan')->num_rows();
      $this->pagination->initialize($config);
      $data['query']=$this->db->get('tb_k_pertanyaan',$config['per_page'],$this->uri->segment(3));
      var_dump($data['query']);
      $this->load->view('konsulback/test.php', $data);


    }

  function get_id_siswa(){
   return $this->Mkonsulback->get_id_siswa();

  }
    function get_tingkat_siswa(){
    $id_tingkat = $this->mtingkat->get_level_by_siswaID($this->get_id_siswa());
    if ($id_tingkat) {
    return $id_tingkat[0]['tingkatID'];
    } 
    
  }
  // test
    // ajax pagination
    public function ajax()
    {
      // $this->load->model('Mkonsulback', 'tb_k_pertanyaan');
      // $query = $this->tb_k_pertanyaan->all($this->limit);
      // $total_rows = $this->tb_k_pertanyaan->count();
      // $this->load->helper('app');
      // $pagination_links = pagination($total_rows, $this->limit);
      // $data['pagination']=compact('query', 'pagination_links');
      // if ( ! $this->input->is_ajax_request()) $this->load->view('v-hpagination');
      // $this->load->view('v-ajax-pagination', $data);

      // if ( ! $this->input->is_ajax_request()) $this->load->view('v-fpagination');
      ###########################################################
      // Konfig halaman
      #######################################################
      $data['judul_halaman']='Neon - Konsultasi';
      $data['judul_header']='Daftar Pertanyaan';

      // $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());
      // get data semua pertanyaan
      $data['questions']=$this->mkonsultasi->get_all_questions();
      $penggunaID=$this->session->userdata['id'];
      $dat_guru=$this->Mkonsulback->get_datguru($penggunaID);
      $mataPelajaranID=$dat_guru['mataPelajaranID'];
      // get pertanyaan berdasarkan keahlian guru
      $data['my_questions']=$this->Mkonsulback->get_my_questions($mataPelajaranID,$this->limit);
      ###################################
      // Konfig pagination
      ####################################
      $this->load->model('Mkonsulback', 'tb_k_pertanyaan');
      //query1 = all pertanyaan
      $data['query'] = $this->tb_k_pertanyaan->all($this->limit);
      //query2 =  pertanyaan berdasarkan mp
      // $data['query2'] = $this->tb_k_pertanyaan->all($this->limit);
      $total_rows = $this->tb_k_pertanyaan->count();
      $this->load->helper('app');
      // pagination untuk tab semua pertanyaan
      $data['pagination_links'] = pagination($total_rows, $this->limit);
      // pagination untuk tab pertanyaan berdasarkan keahlian guru
      $data['pagination_links1'] = pagination($this->Mkonsulback->count_my_questions($mataPelajaranID),$this->limit);
      $data['test']='hekoooo';
      // $data['pagination']=compact('query', 'pagination_links');
      
      ######################################
      // Pengecekan Untuk Jaquery pagination 
      ######################################
      if ( ! $this->input->is_ajax_request()){
              $data['files'] = array(
        APPPATH.'modules/konsulback/views/v-ajax-pagination.php'
        );
                     $data['allasks'] = array(
        APPPATH.'modules/konsulback/views/v-ajax-all-ask.php'
        );
                                   $data['myasks'] = array(
        APPPATH.'modules/konsulback/views/v-ajax-my-ask.php'
        );
                     $this->load->view('templating/index-b-guru', $data);
      }else{
        // hasil view tab pagination
        $this->load->view('v-ajax-my-ask',$data);
        // $this->load->view('v-ajax-all-ask',$data);
      }

      
    } 

  } ?>