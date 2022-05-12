<?php 

class potongan_gaji extends CI_Controller{
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
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->salary_model->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_potongan_gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Potongan Gaji";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_potongan_gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_data();
        }else{
           $potongan        = $this->input->POST('potongan');
           $jml_potongan    = $this->input->POST('jml_potongan');
           $data = array(
               'potongan'       => $potongan,
               'jml_potongan'   => $jml_potongan,
           );
           $this->salary_model->insert_data($data, 'potongan_gaji');
           $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di tambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/potongan_gaji');
        }
    }
    
    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['title'] = "Update Potongan Gaji";
        $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id='$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_potongan_gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->update_data();
        }else{
           $id                       = $this->input->POST('id'); 
           $potongan                 = $this->input->POST('potongan'); 
           $jml_potongan              = $this->input->POST('jml_potongan'); 


           $data = array(
               'potongan'       => $potongan,
               'jml_potongan'   => $jml_potongan,

           );

           $where = array(
                'id' => $id 
           );

           $this->salary_model->update_data('potongan_gaji', $data, $where);
           $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di update</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/potongan_gaji');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('potongan','potongan','required');
        $this->form_validation->set_rules('jml_potongan','jml_potongan','required');
    }

    public function delete_data($id)
    {
        $where = array('id' => $id);
        $this->salary_model->delete_data($where, 'potongan_gaji');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/potongan_gaji');
    }

}

?>