<?phpclass Tesonline extends MX_Controller {    //put your code here    public function __construct() {        // $this->load->model( 'Mmatapelajaran' );        $this->load->model('tingkat/MTingkat');        $this->load->model('Tesonline_model');        $this->load->model('Latihan/mlatihan');        $this->load->library('parser');        parent::__construct();    }    public function index() {        $data = array(            'judul_halaman' => 'Neon - Latihan Online',            'judul_header' => 'Test Online'        );        $data['files'] = array(            APPPATH . 'modules/homepage/views/v-header-login.php',            APPPATH . 'modules/templating/views/t-f-pagetitle.php',            APPPATH . 'modules/tesonline/views/v-test-show-tingkat.php',            APPPATH . 'modules/homepage/views/v-footer.php',        );        $data['tingkat'] = $this->load->MTingkat->gettingkat();        $this->parser->parse('templating/index', $data);    }    #memilih matapelajaran yang akan dilakukan tesonline.    public function pilihmapel($idtingkat) {        $data = array(            'judul_halaman' => 'Neon - Pilih Mata Pelajaran',            'judul_header' => 'Latihan Online'        );        $data['files'] = array(            APPPATH . 'modules/homepage/views/v-header-login.php',            APPPATH . 'modules/templating/views/t-f-pagetitle.php',            APPPATH . 'modules/tesonline/views/v-test-show-mapel.php',            APPPATH . 'modules/homepage/views/v-footer.php',        );        $data['mapel'] = $this->load->MTingkat->getmapelbytingkatid($idtingkat);        $this->parser->parse('templating/index', $data);    }    public function mulai() {        //kalo gada yang dikirimkan nilainya        if (!isset($_POST['id'])) {            $data = array(                'judul_halaman' => 'Neon - Pilih Mata Pelajaran',                'judul_header' => 'Sepertinya anda tersesat',                'judul_tingkat' => '',            );            $konten = 'modules/tesonline/views/v-error-test.php';        } else {            $id = (int) $_POST['id'];            // $data['paket'] = $this->load->Tesonline_model->getpaketbytingkatmapel( $id );            $data['paket'] = $this->load->Tesonline_model->getpaketbytingkatmapel($id);            $tingkatID = $this->load->Tesonline_model->getpaketbytingkatmapel($id)[0]->tingkatID;            $data = array(                'judul_halaman' => 'Neon - Pilih Mata Pelajaran',                'judul_header' => 'Latihan Online',                'judul_tingkat' => '',            );            $konten = 'modules/tesonline/views/v-mulai-test.php';            $data['mapeltingkat'] = $this->load->MTingkat->getmapelbytingkatid($tingkatID);            $data['paket'] = $this->load->Tesonline_model->getpaketbytingkatmapel($id);            // print_r($data['mapeltingkat']);        }        $data['files'] = array(            APPPATH . 'modules/homepage/views/v-header-login.php',            APPPATH . 'modules/templating/views/t-f-pagetitle.php',            APPPATH . $konten,            APPPATH . 'modules/homepage/views/v-footer.php',        );        $this->parser->parse('templating/index', $data);    }    public function daftarlatihan() {        // $tingkatID = $this->load->mlatihan->get_latihan($this->session->userdata['USERNAME'])[0]->tingkatID;        $data = array(            'judul_halaman' => 'Neon - Daftar Latihan',            'judul_header' => 'History Latihan',            'judul_tingkat' => '',        );        $konten = 'modules/tesonline/views/v-mulai-test.php';        $data['files'] = array(            APPPATH . 'modules/homepage/views/v-header-login.php',            APPPATH . 'modules/templating/views/t-f-pagetitle.php',            APPPATH . $konten,            APPPATH . 'modules/homepage/views/v-footer.php',        );        $data['report'] = $this->load->mlatihan->get_report($this->session->userdata['USERNAME']);        $data['latihan'] = $this->load->mlatihan->get_latihan($this->session->userdata['USERNAME']);        $this->parser->parse('templating/index', $data);    }    public function test() {        $this->load->view('templating/t-header');        $this->load->view('templating/t-navbar');        $this->load->view('vTest.php');        $this->load->view('templating/t-footer');    }    public function DetailTest() {        $this->load->view('templating/t-header');        $this->load->view('templating/t-navbar');        $this->load->view('vDetailTest.php');        $this->load->view('templating/t-footer');    }    public function mulaiTest() {        if (!empty($this->session->userdata['id_latihan'])) {            $id = $this->session->userdata['id_latihan'];            $this->load->view('templating/t-headersoal');            $query = $this->load->Tesonline_model->get_soal($id);            $data['soal'] = $query['soal'];            $data['pil'] = $query['pil'];            $this->load->view('vHalamanTest.php', $data);            $this->load->view('templating/t-footersoal');        } else {            $this->errorTest();        }    }    public function errorTest() {        $this->load->view('templating/t-headersoal');        $this->load->view('v-error-test.php');    }    public function cekJawaban() {        $data = $this->input->post('pil');        $id = $this->session->userdata['id_latihan'];        $id_latihan = $this->session->userdata['id_latihan'];        $result = $this->load->Tesonline_model->jawabansoal($id);        $benar = 0;        $salah = 0;        $kosong = 0;        $koreksi = array();        $idSalah = array();        for ($i = 0; $i < sizeOf($result); $i++) {            $id = $result[$i]['soalid'];            // $data[$id];            if (!isset($data[$id])) {                $kosong++;                $koreksi[] = $result[$i]['soalid'];                $idSalah[] = $i;            } else if ($data[$id] == $result[$i]['jawaban']) {                $benar++;            } else {                $salah++;                $koreksi[] = $result[$i]['soalid'];                $idSalah[] = $i;            }        }////        echo $kosong;//        echo $salah;//        echo $benar;        $hasil['id_latihan'] = $id_latihan;        $hasil['id_pengguna'] = $this->session->userdata['id'];        $hasil['jmlh_kosong'] = $kosong;        $hasil['jmlh_benar'] = $benar;        $hasil['jmlh_salah'] = $salah;        $hasil['total_nilai'] = $benar;        $hasil['durasi_pengerjaan'] = $this->input->post('durasi');        $result = $this->load->Tesonline_model->inputreport($hasil);        $this->load->Tesonline_model->updateLatihan($id_latihan);        $this->session->unset_userdata('id_latihan');        redirect(base_url('index.php/tesonline/daftarlatihan'));    }}