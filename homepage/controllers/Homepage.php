<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->model('guru/mguru');
        $this->load->model('siswa/msiswa');
        $this->load->model('matapelajaran/mmatapelajaran');
        $this->load->model('video/mvideos');
        $this->load->model('Mhomepage');
        
    }

    public function index() {
        $datas['jumlahGuru'] = $this->mguru->get_teachers_number();
        $datas['jumlahMapel'] = $this->mmatapelajaran->get_courses_number();
        $datas['jumlahSiswa'] = $this->msiswa->get_siswa_numbers();
        $datas['jumlahVideo'] = $this->mvideos->get_numbers_all_video();




        $data = array(
        'judul_halaman' => 'Neon Homepage',
        'jumlah_guru' => $datas['jumlahGuru'],
        'jumlah_siswa' => $datas['jumlahSiswa'],
        'jumlah_mapel' => $datas['jumlahMapel'],
        'jumlah_video'=> $datas['jumlahVideo']


        );
        $data['file'] = 'v-container.php';
        $data['teachers'] = $this->mguru->get_guru_random();

        $this->parser->parse('v-index-homepage', $data);
    }
    
    function addpesan() {
        $data['name'] = htmlspecialchars($this->input->post('namalengkap'));
        $data['phone'] = htmlspecialchars($this->input->post('telepon'));
        $data['alamat'] = htmlspecialchars($this->input->post('email'));
        $data['pesan'] = htmlspecialchars($this->input->post('pesan'));
        $this->Mhomepage->insert_pesan($data);
    }
}
