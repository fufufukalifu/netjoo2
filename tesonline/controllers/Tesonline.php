<?phpclass Tesonline extends MX_Controller {    //put your code here    public function __construct() {        // $this->load->model( 'Mmatapelajaran' );        $this->load->model( 'tingkat/MTingkat' );        $this->load->model( 'Tesonline_model' );        $this->load->library( 'parser' );        parent::__construct();    }    public function index() {        $data = array(            'judul_halaman' => 'Netjoo - Latihan Online',            'judul_header' =>'Test Online'        );        $data['files'] = array(            APPPATH.'modules/homepage/views/v-header-login.php',            APPPATH.'modules/templating/views/t-f-pagetitle.php',            APPPATH.'modules/tesonline/views/v-test-show-tingkat.php',            APPPATH.'modules/homepage/views/v-footer.php',        );        $data['tingkat'] = $this->load->MTingkat->gettingkat();        //print_r($data['tingkat']);        // $data['pelajaran_sma'] = $this->load->Mmatapelajaran->get_pelajaran_sma();        // $data['pelajaran_smk'] = $this->load->Mmatapelajaran->get_pelajaran_smk();        // $data['pelajaran_smp'] = $this->load->Mmatapelajaran->get_pelajaran_smp();        // $data['pelajaran_sd'] = $this->load->Mmatapelajaran->get_pelajaran_sd();        $this->parser->parse( 'templating/index', $data );    }    public function pilihmapel( $idtingkat ) {        $data = array(            'judul_halaman' => 'Netjoo - Pilih Mata Pelajaran',            'judul_header' =>'Latihan Online'        );        $data['files'] = array(            APPPATH.'modules/homepage/views/v-header-login.php',            APPPATH.'modules/templating/views/t-f-pagetitle.php',            APPPATH.'modules/tesonline/views/v-test-show-mapel.php',            APPPATH.'modules/homepage/views/v-footer.php',        );        $data['mapel'] = $this->load->MTingkat->getmapelbytingkatid( $idtingkat );        // print_r($data['mapel']);        // print_r($data['mapel']);        // $data['pelajaran_sma'] = $this->load->Mmatapelajaran->get_pelajaran_sma();        // $data['pelajaran_smk'] = $this->load->Mmatapelajaran->get_pelajaran_smk();        // $data['pelajaran_smp'] = $this->load->Mmatapelajaran->get_pelajaran_smp();        // $data['pelajaran_sd'] = $this->load->Mmatapelajaran->get_pelajaran_sd();        $this->parser->parse( 'templating/index', $data );    }    public function mulai() {        //kalo gada yang dikirimkan nilainya        if ( !isset( $_POST['id'] ) ) {            $data = array(                'judul_halaman' => 'Netjoo - Pilih Mata Pelajaran',                'judul_header' =>'Sepertinya anda tersesat',                'judul_tingkat' =>'',            );            $konten = 'modules/tesonline/views/v-error-test.php';        }else {            $id = (int)$_POST['id'];            // $data['paket'] = $this->load->Tesonline_model->getpaketbytingkatmapel( $id );            $data['paket'] = $this->load->Tesonline_model->getpaketbytingkatmapel( $id );            $tingkatID = $this->load->Tesonline_model->getpaketbytingkatmapel( $id )[0]->tingkatID;            $data = array(                'judul_halaman' => 'Netjoo - Pilih Mata Pelajaran',                'judul_header' =>'Latihan Online',                'judul_tingkat' =>'',            );            $konten = 'modules/tesonline/views/v-mulai-test.php';            $data['mapeltingkat'] = $this->load->MTingkat->getmapelbytingkatid( $tingkatID );            $data['paket'] = $this->load->Tesonline_model->getpaketbytingkatmapel( $id );            // print_r($data['mapeltingkat']);                   }        $data['files'] = array(            APPPATH.'modules/homepage/views/v-header-login.php',            APPPATH.'modules/templating/views/t-f-pagetitle.php',            APPPATH.$konten,            APPPATH.'modules/homepage/views/v-footer.php',        );         $this->parser->parse( 'templating/index', $data );    }    public function test() {        $this->load->view( 'templating/t-header' );        $this->load->view( 'templating/t-navbar' );        $this->load->view( 'vTest.php' );        $this->load->view( 'templating/t-footer' );    }    public function DetailTest() {        $this->load->view( 'templating/t-header' );        $this->load->view( 'templating/t-navbar' );        $this->load->view( 'vDetailTest.php' );        $this->load->view( 'templating/t-footer' );    }    public function mulaiTest() {        $this->load->view( 'templating/t-header' );        $this->load->view( 'templating/t-navbar' );        $this->load->view( 'vHalamanTest.php' );        $this->load->view( 'templating/t-footer1' );    }}?>