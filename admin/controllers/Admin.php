<?php

/**
 *
 */
class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('video/mvideos');
        $this->load->model('matapelajaran/mmatapelajaran');
        $this->load->model('banksoal/mbanksoal');
        $this->load->library('parser');
    }

    public function index() {
        $this->load->view('templating/t-header');
        $this->load->view('v-left-bar-admin');
    }

    function daftarvideo() {
        $data['videos'] = $this->mvideos->get_all_videos_admin();
        $this->load->view('templating/t-header');

        $this->load->view('v-left-bar-admin');
        $this->load->view('v-daftar-video', $data);
    }

    function cobatemplating() {
        $data = array(
            'judul_halaman' => 'Dashboard Admin'
        );
        $data['file'] = 'v-container.php';

        $this->parser->parse('v-index-admin', $data);
    }


    function loadcontainer() {
        return $this->load->view('v-container');
    }

    function daftarmatapelajaran() {
        $data = array(
            'judul_halaman' => 'Mata Pelajaran'
        );

        $data['mapels'] = $this->mmatapelajaran->daftarMapel();
        $data['file'] = 'v-daftar-mapel.php';

        $this->parser->parse('v-index-admin', $data);
    }

    function showIcon() {
        $this->load->view('templating/t-header');
        $this->load->view('templating/t-icon');
    }

    function tambahMP() {
        $data['namaMataPelajaran'] = htmlspecialchars($this->input->post('namaMP'));
        $data['aliasMataPelajaran'] = htmlspecialchars($this->input->post('aliasMP'));
        $this->mmatapelajaran->tambahMP($data);
        redirect(base_url('index.php/admin/daftarmatapelajaran'));
    }

    function hapusMP() {
        $id = $this->input->post('idMP');
        $this->mmatapelajaran->hapusMP($id);
        redirect(base_url('index.php/admin/daftarmatapelajaran'));
    }

    function rubahMP() {
        $id = $this->input->post('idMP');
        $data['namaMataPelajaran'] = htmlspecialchars($this->input->post('namaMP'));
        $data['aliasMataPelajaran'] = htmlspecialchars($this->input->post('aliasMP'));
        $this->mmatapelajaran->rubahMP($id, $data);
        redirect(base_url('index.php/admin/daftarmatapelajaran'));
    }

    function daftartingkatpelajaran() {
        $data = array(
            'judul_halaman' => 'Tingkat Mata Pelajaran'
        );

        $data['mapels'] = $this->mmatapelajaran->daftarMapel();
        $data['mapelsd'] = $this->mmatapelajaran->daftarMapelSD();
        $data['mapelsmp'] = $this->mmatapelajaran->daftarMapelSMP();
        $data['mapelsma'] = $this->mmatapelajaran->daftarMapelSMA();
        $data['mapelsmk'] = $this->mmatapelajaran->daftarMapelSMK();
        $data['file'] = 'v-daftar-tingkat.php';

        $this->parser->parse('v-index-admin', $data);
    }

    function tambahtingkatMP() {
        $data['tingkatID'] = htmlspecialchars($this->input->post('idTingkatMP'));
        $data['mataPelajaranID'] = htmlspecialchars($this->input->post('idMP'));
        $data['keterangan'] = htmlspecialchars($this->input->post('keterangan'));
        $this->mmatapelajaran->tambahtingkatMP($data);
        redirect(base_url('index.php/admin/daftartingkatpelajaran'));
    }

    function hapustingkatMP() {
        $id = $this->input->post('tingkatMP');
        $this->mmatapelajaran->hapustingkatMP($id);
        redirect(base_url('index.php/admin/daftartingkatpelajaran'));
    }

    function rubahtingkatMP() {
        $id = $this->input->post('idtingkatMP');
        $data['keterangan'] = htmlspecialchars($this->input->post('keterangan'));
        $data['tingkatID'] = htmlspecialchars($this->input->post('tingkatMP'));
        $data['mataPelajaranID'] = htmlspecialchars($this->input->post('idMP'));
        $this->mmatapelajaran->rubahtingkatMP($id, $data);
        redirect(base_url('index.php/admin/daftartingkatpelajaran'));
    }

    function daftarbab() {
//        $judul = $this->uri->segment(3);
        $data = array(
            'judul_halaman' => 'BAB Mata Pelajaran '
        );
        $id = $this->uri->segment(4);
        ;
        $data['babs'] = $this->mmatapelajaran->daftarBab($id);
        $data['file'] = 'v-bab.php';
        $this->parser->parse('v-index-admin', $data);
    }

    function tambahbabMP() {
        $nmmp = htmlspecialchars($this->input->post('nmmp'));
        $data['tingkatPelajaranID'] = htmlspecialchars($this->input->post('idtmp'));
        $data['judulBab'] = htmlspecialchars($this->input->post('judulBab'));
        $data['keterangan'] = htmlspecialchars($this->input->post('deskbab'));
        $this->mmatapelajaran->tambahbabMP($data);
        redirect(base_url('index.php/admin/daftarbab/' . $nmmp . '/' . $data['tingkatPelajaranID']));
    }

    function rubahbabMP() {
        $nmmp = htmlspecialchars($this->input->post('nmmp'));
        $id = htmlspecialchars($this->input->post('idrubah'));
        $data['tingkatPelajaranID'] = htmlspecialchars($this->input->post('idtmp'));
        $data['judulBab'] = htmlspecialchars($this->input->post('judulBab'));
        $data['keterangan'] = htmlspecialchars($this->input->post('deskbab'));
        $this->mmatapelajaran->rubahbabMP($id, $data);
        redirect(base_url('index.php/admin/daftarbab/' . $nmmp . '/' . $data['tingkatPelajaranID']));
    }

    function hapusbabMP() {
        $nmmp = htmlspecialchars($this->input->post('nmmp'));
        $id = htmlspecialchars($this->input->post('id'));
        $data['tingkatPelajaranID'] = htmlspecialchars($this->input->post('idtmp'));
        $this->mmatapelajaran->hapusbabMP($id, $data);
        redirect(base_url('index.php/admin/daftarbab/' . $nmmp . '/' . $data['tingkatPelajaranID']));
    }

    function daftarsubbab() {
        $data = array(
            'judul_halaman' => 'SUB BAB Mata Pelajaran'
        );
        $id = $this->uri->segment(5);
        $data['babs'] = $this->mmatapelajaran->daftarsubBab($id);
        $data['file'] = 'v-subbab.php';

        $this->parser->parse('v-index-admin', $data);
    }

    function tambahsubbabMP() {
        $nmmp = htmlspecialchars($this->input->post('nmmp'));
        $jdlbab = htmlspecialchars($this->input->post('jdlbab'));

        $data['babID'] = htmlspecialchars($this->input->post('idbab'));
        $data['judulsubBab'] = htmlspecialchars($this->input->post('judulsubBab'));
        $data['keterangan'] = htmlspecialchars($this->input->post('desksubbab'));
        $this->mmatapelajaran->tambahsubbabMP($data);
        redirect(base_url('index.php/admin/daftarsubbab/' . $nmmp . '/' . $jdlbab . '/' . $data['babID']));
    }

    function rubahsubbabMP() {
        $nmmp = htmlspecialchars($this->input->post('nmmp'));
        $jdlbab = htmlspecialchars($this->input->post('jdlbab'));

        $id = htmlspecialchars($this->input->post('idsubBab'));
        $data['babID'] = htmlspecialchars($this->input->post('idbab'));
        $data['judulsubBab'] = htmlspecialchars($this->input->post('judulsubBab'));
        $data['keterangan'] = htmlspecialchars($this->input->post('desksubBab'));

        $this->mmatapelajaran->rubahsubbabMP($id, $data);
        redirect(base_url('index.php/admin/daftarsubbab/' . $nmmp . '/' . $jdlbab . '/' . $data['babID']));
    }

    function hapussubbabMP() {
        $nmmp = htmlspecialchars($this->input->post('nmmp'));
        $jdlbab = htmlspecialchars($this->input->post('jdlbab'));
        $id = htmlspecialchars($this->input->post('idsubBab'));

        $data['babID'] = htmlspecialchars($this->input->post('idbab'));
        
        $this->mmatapelajaran->hapussubbabMP($id, $data);
        redirect(base_url('index.php/admin/daftarsubbab/' . $nmmp . '/' . $jdlbab . '/' . $data['babID']));
    }

    #START FUNCTION UNTUK BANK SOAL#

    // function listmp($tingkatID) 
    // {
    //     $data = array(
    //         'judul_halaman' => 'Dashboard Admin'
    //     );
    //     $data['pelajaran'] =$this->mbanksoal->get_pelajaran($tingkatID);
    //     $data['file'] =  APPPATH.'modules/banksoal/views/v-list-mp.php';

    //     $this->parser->parse('v-index-admin', $data);
    // }

    #END FUNCTION UNTUK BANK SOAL#

}

?>
