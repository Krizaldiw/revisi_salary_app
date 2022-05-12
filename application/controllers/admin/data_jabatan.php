<?php

class data_jabatan extends CI_Controller{
    public function __construct(){
        parent::__construct();
    
        if($this->session->userdata('hak_akses') != '1'){
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
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->salary_model->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_data();
        }else{
           $nama_jabatan    = $this->input->POST('nama_jabatan');
           $gaji_pokok      = $this->input->POST('gaji_pokok'); 
           $tj_transport    = $this->input->POST('tj_transport');
           $uang_makan      = $this->input->POST('uang_makan');

           $data = array(
               'nama_jabatan'   => $nama_jabatan,
               'gaji_pokok'     => $gaji_pokok,
               'tj_transport'   => $tj_transport,
               'uang_makan'     => $uang_makan,
           );
           $this->salary_model->insert_data($data, 'data_jabatan');
           $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di tambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/data_jabatan');
        }
    }

    public function detail_data($id_jabatan)
    {
        $data['jabatan'] = $this->salary_model->detail_data($id_jabatan);
        $data['title'] = "Detail Data Jabatan";
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Update Data";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->update_data();
        }else{
           $id              = $this->input->POST('id_jabatan'); 
           $nama_jabatan    = $this->input->POST('nama_jabatan');
           $gaji_pokok      = $this->input->POST('gaji_pokok'); 
           $tj_transport    = $this->input->POST('tj_transport');
           $uang_makan      = $this->input->POST('uang_makan');

           $data = array(
               'nama_jabatan'   => $nama_jabatan,
               'gaji_pokok'     => $gaji_pokok,
               'tj_transport'   => $tj_transport,
               'uang_makan'     => $uang_makan,
           );

           $where = array(
                'id_jabatan' => $id 
           );

           $this->salary_model->update_data('data_jabatan', $data, $where);
           $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di update</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/data_jabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
        $this->form_validation->set_rules('tj_transport','tunjangan transport','required');
        $this->form_validation->set_rules('uang_makan','uang_makan','required');
    }

    public function delete_data($id)
    {
        $where = array('id_jabatan' => $id);
        $this->salary_model->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/data_jabatan');
    }
}
?>