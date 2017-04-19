<?php 
class Konsultasi extends MX_Controller{

    //put your code here
  private $upload_path = "./assets/image/konsultasi";

  public function __construct() {

    $this->load->library( 'parser' );
    $this->load->model('mkonsultasi');
    $this->load->model('tryout/mtryout');
    $this->load->model('tingkat/mtingkat');
    $this->load->model('matapelajaran/mmatapelajaran');
    $this->load->library("pagination");


    parent::__construct();
    $this->load->library('sessionchecker');
    $this->sessionchecker->cek_token();
  }

  function get_id_siswa(){
   return $this->mtryout->get_id_siswa();
 }

 function get_id_mentor(){
   return $this->mkonsultasi->get_id_mentor();
 }

 public function pertanyaan_ku($key='') {
  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> 'Daftar Pertanyaan Saya'
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-daftar-konsultasi.php',
    APPPATH.'modules/konsultasi/views/v-show-tingkat.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  
  // jika gada yang di search, key di set kosong
  ##KONFIGURASI UNTUUK PAGINATION
  $config = array();

  // kalo ada yang di cari
  if (!empty($_POST)) {
    //keywordnya dapet dari get.
    $keyword = $_POST['cari'];
  }else{
    $keyword='';
  }

    $config["base_url"] = base_url() . "konsultasi/pertanyaan_ku/";
    $config["uri_segment"] = 3;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  

  $config["total_rows"] = $this->mkonsultasi->get_my_questions_number($this->get_id_siswa(),$keyword);
  $config["per_page"] = 10;

  # konfig link
  $config['cur_tag_open'] = "<a style='background:#f27c66;color:white'>";
  $config['cur_tag_close'] = '</a>';
  $config['first_link'] = "<span title='Page Awal'> << </span>"; 
  $config['last_link'] = "<span title='Page Akhir'> >> </span>";
  # konfig link

  $this->pagination->initialize($config);
  ##KONFIGURASI UNTUUK PAGINATION
  
  $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());

  // pertanyaan saya.
  $data['my_questions']=$this->mkonsultasi->get_my_questions($this->get_id_siswa(),$config["per_page"], $page, $keyword);
  $data["links"] = $this->pagination->create_links();

  $this->parser->parse( 'templating/index', $data );
}

public function pertanyaan_all() {
  ## kalo gak ada yang di cari
  if (!empty($_GET)) {
    $key = $_GET['cari'];
  }else{
    $key="";
  }
  ## kalo gak ada yang di cari

  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> 'Daftar Semua Pertanyaan'
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-daftar-konsultasi_all.php',
    APPPATH.'modules/konsultasi/views/v-show-tingkat.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  
  ##KONFIGURASI UNTUUK PAGINATION
  $config = array();
  $config["base_url"] = base_url() . "konsultasi/pertanyaan_all/";
  $config["total_rows"] = $this->mkonsultasi->get_all_questions_number($key);
  $config["per_page"] = 1;
  $config["uri_segment"] = 3;

  $config['cur_tag_open'] = "<a style='background:#f27c66;color:white'>";
  $config['cur_tag_close'] = '</a>';



  $config['first_link'] = "<span title='Page Awal'> << </span>"; 
  $config['last_link'] = "<span title='Page Akhir'> >> </span>";
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
  ##KONFIGURASI UNTUUK PAGINATION
  
  $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());

  // pertanyaan saya.
  $data['my_questions']=$this->mkonsultasi->get_all_questions($this->get_id_siswa(),$config["per_page"], $page,$key);
  $data["links"] = $this->pagination->create_links();

  $this->parser->parse( 'templating/index', $data );
}

public function pertanyaan_grade() {
  ## kalo gak ada yang di cari
  if (!empty($_GET)) {
    $key = $_GET['cari'];
  }else{
    $key="";
  }
  ## kalo gak ada yang di cari

  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> 'Daftar Pertanyaan Setingkat'
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-daftar-konsultasi_grade.php',
    APPPATH.'modules/konsultasi/views/v-show-tingkat.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  
  ##KONFIGURASI UNTUUK PAGINATION
  $config = array();
  $config["base_url"] = base_url() . "konsultasi/pertanyaan_grade/";
  $config["total_rows"] = $this->mkonsultasi->get_all_questions_number($this->get_id_siswa());
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;

  $config['cur_tag_open'] = "<a style='background:#f27c66;color:white'>";
  $config['cur_tag_close'] = '</a>';



  $config['first_link'] = "<span title='Page Awal'> << </span>"; 
  $config['last_link'] = "<span title='Page Akhir'> >> </span>";
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
  ##KONFIGURASI UNTUUK PAGINATION
  
  $data['mapel'] = $this->mmatapelajaran->get_mapel_by_tingkatID($this->get_tingkat_siswa());

  // pertanyaan saya.
  $data['my_questions']=$this->mkonsultasi->get_my_question_level($this->get_tingkat_siswa(),$config["per_page"], $page,$key);
  $data["links"] = $this->pagination->create_links();

  $this->parser->parse( 'templating/index', $data );
}

function get_tingkat_siswa(){
  $id_tingkat = $this->mtingkat->get_level_by_siswaID($this->get_id_siswa());
  if ($id_tingkat) {
    return $id_tingkat[0]['tingkatID'];
  } 

}
    //ajax add konsultasis
function ajax_add_konsultasi(){
  $isi = $this->input->post( 'isi' ) ;
  $judul = $this->input->post( 'namapertanyaan' );
  $bab = $this->input->post( 'bab' );

  $mentor = $this->input->post( 'mentorID' );
  // $mentor = 1;

  if ($mentor == 1) {
    // kalo ada mentornya
    $data = array(
      'isiPertanyaan' => $isi,
      'judulPertanyaan' => $judul,
      'babID' =>$bab,
      'siswaID' =>$this->get_id_siswa(),
      'mentorID'=>$this->get_id_mentor()
      );
  }else{
    // kalo gak ada
    $data = array(
      'isiPertanyaan' => $isi,
      'judulPertanyaan' => $judul,
      'babID' =>$bab,
      'siswaID' =>$this->get_id_siswa()
      );
  }
  $this->mkonsultasi->insert_konstulasi( $data );
}

function list_image_uploaded(){
  $list = $this->mkonsultasi->show_image();

  $data = array();
  $n=1;
  $baseurl = base_url();
  foreach ( $list as $item ) {
    $row = array();

    $row[] = $n;
    $row[] = $item['nama_file'];
    $row[] = $item['date_created'];
    $link = base_url("assets/image/konsultasi/").$item['nama_file'];
    $row[] = "<img src=".$link." width='100px'>";
    $row[] = $link;

    $row[] = "<a class='' >copy</a>";



    $data[] = $row;
    $n++;

  }

  $output = array(
    "data"=>$data,
    );
  echo json_encode( $output );


}

//bertanya berdasarkan idsub
public function bertanya($bab){

  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> 'Buat Pertanyaan',
    'bab' => $bab
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-create-konsultasi.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  $this->parser->parse( 'templating/index', $data );
}

public function editpost($id){
  // get jawabanya dulu.
  $datas['param'] = ['id_jawaban'=>$id,'id_pengguna'=>$this->session->userdata('id')];
  $data_edit = $this->mkonsultasi->get_edit_jawaban($datas['param']);

  // cek apakah data yang editnya benar yang dia buat?
  if ($data_edit) {
    $data = array(
      'judul_halaman' => 'Neon - Edit Jawaban',
      'judul_header'=> 'Edit Jawaban',
      );

    $data['files'] = array(
      APPPATH.'modules/homepage/views/v-header-login.php',
      APPPATH.'modules/templating/views/t-f-pagetitle.php',
      APPPATH.'modules/konsultasi/views/v-edit-jawaban.php',
      APPPATH.'modules/homepage/views/v-footer.php'
      );
    $data['edit'] = $data_edit['0'];

    $this->parser->parse( 'templating/index', $data );
  }else{
    echo "Gagal!";
  }
}





// list untuk pagination
function jawab_single(){
         // code u/pagination
 $this->load->database();
 $idPengguna = $this->session->userdata['id'];
 $jumlah_data = $this->Mbanksoal->jumlah_soalSaya($idPengguna);

 $config['base_url'] = base_url().'index.php/banksoal/mysoal/';
 $config['total_rows'] = $jumlah_data;
 $config['per_page'] = 10;

        // Start Customizing the “Digit” Link
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
        // end  Customizing the “Digit” Link

        // Start Customizing the “Current Page” Link
 $config['cur_tag_open'] = '<li><a><b>';
 $config['cur_tag_close'] = '</b></a></li>';
        // END Customizing the “Current Page” Link

        // Start Customizing the “Previous” Link
 $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
         // END Customizing the “Previous” Link

        // Start Customizing the “Next” Link
 $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
         // END Customizing the “Next” Link

        // Start Customizing the first_link Link
 $config['first_link'] = '<span aria-hidden="true">&larr; First</span>';
 $config['first_tag_open'] = '<li>';
 $config['first_tag_close'] = '</li>';
         // END Customizing the first_link Link

        // Start Customizing the last_link Link
 $config['last_link'] = '<span aria-hidden="true">Last &rarr;</span>';
 $config['last_tag_open'] = '<li>';
 $config['last_tag_close'] = '</li>';
         // END Customizing the last_link Link

 $from = $this->uri->segment(3);
 $this->pagination->initialize($config);  
        //     
 $list = $this->Mbanksoal->data_soalSaya($config['per_page'],$from);

 $this->tampSoal($list);
}
// list untuk pagination


  # fungsi ajax get jumlah postingan
function ajax_get_jumlah_postingan($id_pertanyaan){
  $jumlah = $this->mkonsultasi->get_jumlah_postingan($id_pertanyaan);
  echo $jumlah;
}

//add jawaban.
function ajax_add_jawaban(){
  $data = array(
    'isiJawaban' => $this->input->post( 'isiJawaban' ),
    'penggunaID' => $this->input->post( 'penggunaID' ),
    'pertanyaanID' =>$this->input->post( 'pertanyaanID' ),
    );
  $this->mkonsultasi->insert_jawaban($data);
}

function check_point($id_jawaban){
  $id_siswa = $this->get_id_siswa();
  $id_pengguna = $this->get_id_pengguna($id_jawaban);
  $komentar = "Asd";
  $id_jawab = $this->input->post('idJawaban');
  // $id_jawab = "53";


  $data = array(
    'siswaID' => $id_siswa,
    'penggunaID' => $id_pengguna,
    'komentar' =>$komentar,
    'jawabID'=>$id_jawab
    );
  

  $check = $this->mkonsultasi->check_postingan($data);
  echo json_encode($check);
}

//add point.
function ajax_add_point($id_jawaban){
  //penggunaID
  //siswaID
  $id_siswa = $this->get_id_siswa();
  $id_pengguna = $this->get_id_pengguna($id_jawaban);
  $komentar = $this->input->post('isiKomentar');
  $id_jawab = $this->input->post('idJawaban');

  $data = array(
    'siswaID' => $id_siswa,
    'penggunaID' => $id_pengguna,
    'komentar' =>$komentar,
    'jawabID'=>$id_jawab
    );
  // var_dump($data);

  // $check = $this->mkonsultasi->check_postingan($data);
  $this->mkonsultasi->insert_point($data);
  // var_dump($check); 
  // "<script>alert('masuk')</script>";

}

function get_id_pengguna($id_jawaban){
  return $this->mkonsultasi->get_penggunaID($id_jawaban);
}

// check postingan 
// function check_point(){

// }

function searchpertanyaan(){
  $this->load->view('coba');
}

function search_all(){
  $namapertanyaan = $_GET['term'];
  // var_dump($namapertanyaan);
  $result = $data['questions']=$this->mkonsultasi->get_all_questions($namapertanyaan);

  $pertanyaan = array();
  foreach ($result as $key) {
    $pertanyaan[] = array(
      'value'=>$key['judulPertanyaan'],
      'url'=>base_url('konsultasi/singlekonsultasi')."/".$key['pertanyaanID'],
      );
    // $pertanyaan[] = $key->judulPertanyaan  
  }
  echo json_encode($pertanyaan);
}

function search_mine(){
  $namapertanyaan = $_GET['term'];
  // var_dump($namapertanyaan);
  $result = $data['questions']=$this->mkonsultasi->get_my_questions($this->get_id_siswa(),$namapertanyaan);

  $pertanyaan = array();
  foreach ($result as $key) {
    $pertanyaan[] = array(
      'value'=>$key['judulPertanyaan'],
      'url'=>base_url('konsultasi/singlekonsultasi')."/".$key['pertanyaanID'],
      );
    // $pertanyaan[] = $key->judulPertanyaan  
  }
  echo json_encode($pertanyaan);
}


function search_tingkat(){
  $namapertanyaan = $_GET['term'];
  // var_dump($namapertanyaan);
  $result = $data['questions']=$this->mkonsultasi->get_my_question_level($this->get_tingkat_siswa(),$namapertanyaan);

  $pertanyaan = array();
  foreach ($result as $key) {
    $pertanyaan[] = array(
      'value'=>$key['judulPertanyaan'],
      'url'=>base_url('konsultasi/singlekonsultasi')."/".$key['pertanyaanID'],
      );
    // $pertanyaan[] = $key->judulPertanyaan  
  }
  echo json_encode($pertanyaan);
}

function upload(){
  $data = array(
    'judul_halaman' => 'Neon - Konsultasi',
    'judul_header'=> "Upload untuk forum",
    );

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-upload-image.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );


  $this->parser->parse( 'templating/index', $data );
}


public function do_upload(){
  if ( ! empty($_FILES)) 
  {
    $config["upload_path"]   = $this->upload_path;
    $config["allowed_types"] = "gif|jpg|png";

    // get file name
    //random name
    $new_name = time()."-".$_FILES['file']['name'];
    $config['file_name'] = $new_name;
    // get
    $this->load->library('upload', $config);
  // echo "<a data-nama='".$new_name."' class='insert' onclick='insert()'>Sisipkan</a>";
    echo "<a data-nama='".$new_name."' class='insert' onclick='insert()' style='border: 2px solid #18bb7c; padding: 2px;display: inline' title='Sisipkan' disabled><i class='fa fa-cloud-upload'></i></a>";



    if ( ! $this->upload->do_upload("file")) {
      echo "failed to upload file(s)";
    }else{
      $file_data = $this->upload->data();
      $data['data_upload_konsultasi']=  array(
        'nama_file' => $new_name,
        'penggunaID' => $this->session->userdata('id')
        );
      $this->mkonsultasi->in_upload_konsultasi($data);
    }
  }
}

public function remove_img()
{
  $upload_path = "./assets/image/gallery";
  $file = $this->input->post('file');
  $UUID = $this->input->post('UUID');
  $this->Mgallery->del_gallery($UUID);
    // unlink(FCPATH . $upload_path . "/" .$file );
  if ($file && file_exists($upload_path . "/" . $file)) {
    unlink($upload_path . "/" . $file);
  } 
}

function ajax_update_jawaban(){
  $data = array(
    'isiJawaban' => $this->input->post('isi'),
    'penggunaID' => $this->session->userdata('id'),
    'id' =>$this->input->post( 'id' ),
    );
  var_dump($data);
  $this->mkonsultasi->edit_jawaban($data);
}


# function show single konsultasi
function show_post($id){
  $data = array(
    'judul_halaman' => 'Neon - Single Post',
    );
  $data['data_postingan'] = $this->mkonsultasi->show_post($id)[0];

  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/konsultasi/views/v-single-jawab.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );

  $this->parser->parse( 'templating/index', $data );

}


# function show single konsultasi
function singlekonsultasi($id_pertanyaan){
  ##KONFIGURASI UNTUUK PAGINATION
  $config = array();
  $config["base_url"] = base_url() . "konsultasi/singlekonsultasi/".$id_pertanyaan;
  $config["total_rows"] = $this->mkonsultasi->get_postingan_pagination_number($id_pertanyaan);
  $config["per_page"] = 2;
  $config["uri_segment"] = 4;

  $config['cur_tag_open'] = "<a style='background:#f27c66;color:white'>";
  $config['cur_tag_close'] = '</a>';


  $config['first_link'] = "<span title='Page Awal'> << </span>"; 
  $config['last_link'] = "<span title='Page Akhir'> >> </span>";
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
  ##KONFIGURASI UNTUUK PAGINATION
  
  $single_pertanyaan = $this->mkonsultasi->get_pertanyaan($id_pertanyaan)[0];
  $jumlah = $this->mkonsultasi->get_jumlah_postingan($id_pertanyaan);
  $date = $single_pertanyaan['tgl_dibuat'];
  $timestamp = strtotime($date);
  # untuk pertanyaan



  $data = array(
    'judul_halaman' => 'Neon - '.$single_pertanyaan['judulPertanyaan'],
    'judul_header'=> $single_pertanyaan['judulPertanyaan'],
    'isi'=> $single_pertanyaan['isiPertanyaan'],
    'author'=> $single_pertanyaan['namaDepan']." ".$single_pertanyaan['namaBelakang'],
    'jumlah'=>$jumlah,
    'bab'=>$single_pertanyaan['judulBab'],
    'akses'=>$single_pertanyaan['hakAkses'],
    'id_pertanyaan'=>$id_pertanyaan,
    'id_pengguna'=>$this->session->userdata('id'),
    'tanggal'=>date("d", $timestamp),
    'bulan'=>date("M", $timestamp),
    'photo'=>base_url("assets/image/photo/siswa/".$single_pertanyaan['photo'])
    );

  $data['username'] = $single_pertanyaan['namaPengguna'];
  $data['isi'] = $single_pertanyaan['isiPertanyaan'];

  $data["data_postingan"] = $this->mkonsultasi->get_postingan_pagination($id_pertanyaan,$config["per_page"], $page);
  $data["links"] = $this->pagination->create_links();


  $data['files'] = array(
    APPPATH.'modules/homepage/views/v-header-login.php',
    APPPATH.'modules/templating/views/t-f-pagetitle.php',
    APPPATH.'modules/konsultasi/views/v-single-konsultasi.php',
    APPPATH.'modules/homepage/views/v-footer.php'
    );
  $this->parser->parse( 'templating/index', $data );
}



#pencarian
function cari_semua(){
  var_dump($_GET);
}
#pencarian

}
