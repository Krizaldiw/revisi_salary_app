<?php 

class laporan_absensi extends CI_Controller{
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
        $data['title'] = "Laporan Absensi Pegawai";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_laporan_absensi');
        $this->load->view('templates_admin/footer'); 
    }

    public function cetak_laporan_absensi()
    {
        $data['title'] = "Cetak Laporan Absensi Pegawai";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulanTahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan.$tahun;
        }
        $data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan = '$bulanTahun' ORDER BY nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak_laporan_absensi');

    }
}

?>