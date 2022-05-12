<?php 

class data_pegawai extends CI_Controller{
    public function __construct(){
        parent::__construct();
    
        if($this->session->userdata('hak_akses') != '1')
        {
          $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('welcome');
        }
      }

    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->salary_model->get_data('data_pegawai')->result();    
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->salary_model->get_data('data_jabatan')->result();    
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

     public function tambah_data_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_data();
        }else{
           $nik                 = $this->input->POST('nik');
           $nama_pegawai        = $this->input->POST('nama_pegawai'); 
           $jenis_kelamin       = $this->input->POST('jenis_kelamin');
           $tanggal_masuk       = $this->input->POST('tanggal_masuk');
           $jabatan             = $this->input->POST('jabatan');
           $status              = $this->input->POST('status');
           $hak_akses           = $this->input->POST('hak_akses');
           $username            = $this->input->POST('username');
           $password            = $this->input->POST('password');
           $photo               = $_FILES['photo']['name'];
           if($photo=''){}else{
               $config ['upload_path']      = './assets/photo';
               $config ['allowed_types']    = 'jpg|jpeg|png|webp|tiff|svg'; 
               $this->load->library('upload',$config);
               if(!$this->upload->do_upload('photo')){
                   echo "Photo Gagal di upload !";
               }else{
                   $photo=$this->upload->data('file_name');
               }
           }
           
           $data = array(
               'nik'   => $nik,
               'nama_pegawai'   => $nama_pegawai,
               'jenis_kelamin'  => $jenis_kelamin,
               'jabatan'        => $jabatan,
               'tanggal_masuk'  => $tanggal_masuk,
               'status'         => $status,
               'hak_akses'      => $hak_akses,
               'username'       => $username,
               'password'       => $password,
               'photo'          => $photo,         
           );

           $this->salary_model->insert_data($data, 'data_pegawai');
           $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di tambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/data_pegawai');
        }
    }


    public function update_data($id)
    {
        $where = array('id_pegawai' => $id);
        $data['title'] = "Update Data Pegawai";
        $data['jabatan'] = $this->salary_model->get_data('data_jabatan')->result();  
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();  
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->update_data();
        }else{
           $id                  = $this->input->POST('id_pegawai');
           $nik                 = $this->input->POST('nik');
           $nama_pegawai        = $this->input->POST('nama_pegawai'); 
           $jenis_kelamin       = $this->input->POST('jenis_kelamin');
           $tanggal_masuk       = $this->input->POST('tanggal_masuk');
           $jabatan             = $this->input->POST('jabatan');
           $status              = $this->input->POST('status');
           $hak_akses           = $this->input->POST('hak_akses');
           $username            = $this->input->POST('username');
           $password            = $this->input->POST('password');
           $photo               = $_FILES['photo']['name'];
           if($photo){
               $config ['upload_path']      = './assets/photo';
               $config ['allowed_types']    = 'jpg|jpeg|png|webp|tiff|svg'; 
               $this->load->library('upload',$config);
               if($this->upload->do_upload('photo')){
                   $photo=$this->upload->data('file_name');
                   $this->db->set('photo', $photo);
               }else{
                   echo $this->upload->display_errors();
               }
           }
           
           $data = array(
               'nik'            => $nik,
               'nama_pegawai'   => $nama_pegawai,
               'jenis_kelamin'  => $jenis_kelamin,
               'jabatan'        => $jabatan,
               'tanggal_masuk'  => $tanggal_masuk,
               'status'         => $status,      
               'hak_akses'      => $hak_akses,
               'username'       => $username,
               'password'       => $password,
           );

           $where  = array(
               'id_pegawai' => $id
           );

           $this->salary_model->update_data('data_pegawai', $data, $where);
           $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di update</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/data_pegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('nama_pegawai','Nama Pegawai','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','required');
        $this->form_validation->set_rules('jabatan','Jabatan','required');
        $this->form_validation->set_rules('status','Status','required');
    }

    public function delete_data($id)
    {
        $where = array('id_pegawai' => $id);
        $this->salary_model->delete_data($where, 'data_pegawai');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/data_pegawai');
    }
}
?>