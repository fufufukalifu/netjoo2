<?php 
class Register extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('mregister');
    }
    
    // function untuk menampikan halam pertama saat registrasi
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('vRegisterSiswa');
       $this->load->view('templating/t-footer');
    }

    // function untuk menampilkan halaman untuk pendaftaran user siswa
    public function registersiswa(){



       $this->load->view('templating/t-header');
       $this->load->view('vRegisterSiswa');
       $this->load->view('templating/t-footer');


    }

    //function untuk menampilkan halaman pendaftaran Guru
    public function registerguru(){
       $this->load->view('templating/t-header');
       $this->load->view('vRegisterGuru');
    }

    //function untuk menyimpan data pendaftaran user siswa ke database
    public function savesiswa()
    {
      //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      //syarat pengisian form regitrasi siswa
      $this->form_validation->set_rules('namapengguna', 'Nama Pengguna',  'trim|required|min_length[5]|max_length[12]|is_unique[tb_pengguna.namaPengguna]');
      $this->form_validation->set_rules('namadepan', 'Nama Depan',  'required');
      $this->form_validation->set_rules('alamat', 'Alamat',  'required');
      $this->form_validation->set_rules('nokontak', 'No Kontak',  'required');
      $this->form_validation->set_rules('katasandi', 'Kata Sandi',   'required|matches[passconf]');
      $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
      $this->form_validation->set_rules('email','Email','required|is_unique[tb_pengguna.email]');


      //pesan error atau pesan kesalahan pengisian form registrasi siswa
      $this->form_validation->set_message('namapengguna','is_unique','*Nama Pengguna sudah terpakai');
      $this->form_validation->set_message('is_unique','email','*Email sudah terpakai');
      $this->form_validation->set_message('is_unique','*Nama Pengguna sudah terpakai');
      $this->form_validation->set_message('max_length', '*Nama Pengguna maksimal 12 karakter!');
      $this->form_validation->set_message('min_length', '*Nama Pengguna minimal 5 karakter!');
      $this->form_validation->set_message('required','*tidak boleh kosong!');
      $this->form_validation->set_message('matches','*Kata Sandi tidak sama!');

      //pengecekan pengisian form regitrasi siswa
      if ($this->form_validation->run() == FALSE) {
          //jika tidak memenuhi syarat akan menampilkan pesan error/kesalahan di halaman regitrasi siswa
           $this->load->view('templating/t-header');
           $this->load->view('vRegisterSiswa');
           $this->load->view('templating/t-footer');
      } else { 
           
          //data siswa
          $namaDepan=htmlspecialchars($this->input->post('namadepan'));
          $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
          $alamat=htmlspecialchars($this->input->post('alamat'));
          $noKontak=htmlspecialchars($this->input->post('nokontak'));
          $namaSekolah=htmlspecialchars($this->input->post('namasekolah'));
          $alamatSekolah=htmlspecialchars($this->input->post('alamatsekolah'));

          //data akun
          $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));
          $kataSandi=htmlspecialchars(md5($this->input->post('katasandi')));
          $email=htmlspecialchars($this->input->post('email'));
          $hakAkses='murid';


           //melempar data guru ke function insert_pengguna di kelas model
          $data['mregister']=$this->mregister->insert_pengguna($namaPengguna,$kataSandi,$email,$hakAkses);
          //untuk mengambil nilai id pengguna untuk di jadikan FK pada tabel siswa
          $data['tb_pengguna']=$this->mregister->get_idPengguna($namaPengguna);

          //melempar data guru ke function insert_guru di kelas model
          $data['mregister']=$this->mregister->insert_siswa($namaDepan,$namaBelakang,$alamat,$noKontak,$namaSekolah,$alamatSekolah,$data);

      }
      





    }

    // function untuk menampung data dari form kemudian di lempar 
    // ke function insert_guru dan insert_pengguna di kelas model Mregister
    public function saveguru()
    {     
       //load library n helper
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      //syarat pengisian form regitrasi guru
      $this->form_validation->set_rules('namapengguna', 'Nama Pengguna',  'trim|required|min_length[5]|max_length[12]|is_unique[tb_pengguna.namaPengguna]');
      $this->form_validation->set_rules('namadepan', 'Nama Depan',  'required');
      $this->form_validation->set_rules('alamat', 'Alamat',  'required');
      $this->form_validation->set_rules('nokontak', 'No Kontak',  'required');
      $this->form_validation->set_rules('katasandi', 'Kata Sandi',   'required|matches[passconf]');
      $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
      $this->form_validation->set_rules('email','Email','required|is_unique[tb_pengguna.email]');


      //pesan error atau pesan kesalahan pengisian form registrasi guru
      $this->form_validation->set_message('namapengguna','is_unique','*Nama Pengguna sudah terpakai');
      $this->form_validation->set_message('is_unique','email','*Email sudah terpakai');
      $this->form_validation->set_message('is_unique','*Nama Pengguna sudah terpakai');
      $this->form_validation->set_message('max_length', '*Nama Pengguna maksimal 12 karakter!');
      $this->form_validation->set_message('min_length', '*Nama Pengguna minimal 5 karakter!');
      $this->form_validation->set_message('required','*tidak boleh kosong!');
      $this->form_validation->set_message('matches','*Kata Sandi tidak sama!'); 



      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templating/t-header');
        $this->load->view('vRegisterGuru');
      } else {
        //data guru
        $namaDepan=htmlspecialchars($this->input->post('namadepan'));
        $namaBelakang=htmlspecialchars($this->input->post('namabelakang'));
        $mataPelajaran=htmlspecialchars($this->input->post('mtpelajaran'));
        $alamat=htmlspecialchars($this->input->post('alamat'));
        $noKontak=htmlspecialchars($this->input->post('nokontak'));

        //data untuk akun
        $namaPengguna=htmlspecialchars($this->input->post('namapengguna'));
        $kataSandi=htmlspecialchars(md5($this->input->post('katasandi')));
        $email=htmlspecialchars($this->input->post('email'));
        $hakAkses='guru';

        
        //melempar data guru ke function insert_pengguna di kelas model
        $data['mregister']=$this->mregister->insert_pengguna($namaPengguna,$kataSandi,$email,$hakAkses);

        //untuk mengambil nilai id pengguna untuk di jadikan FK pada tabel siswa
        $data['tb_pengguna']=$this->mregister->get_idPengguna($namaPengguna);

        //melempar data guru ke function insert_guru di kelas model
        $data['mregister']=$this->mregister->insert_guru($namaDepan,$namaBelakang,$mataPelajaran,$alamat,$noKontak,$namaPengguna,$data);
        
      }
      

    }

}
 ?>