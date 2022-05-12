<div class="container-fluid">
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/data_pegawai/tambah_data')?>"><i class="fas fa-plus "></i> Tambah Pegawai</a>
    <?php echo $this->session->flashdata('pesan')?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-2" style="margin-bottom: 120px">
            <tr >
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Tanggal Masuk</th>
                <th class="text-center">Status</th>
                <th class="text-center">Photo</th>
                <th class="text-center">Hak Akses</th>
                <th class="text-center" colspan="3">Opsi</th>
            </tr>
            <?php $no=1; foreach ($pegawai as $p) : ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $p->nik?></td>
                    <td><?php echo $p->nama_pegawai?></td>
                    <td><?php echo $p->jenis_kelamin?></td>
                    <td><?php echo $p->jabatan?></td>
                    <td><?php echo $p->tanggal_masuk?></td>
                    <td><?php echo $p->status?></td>
                    <td><img src="<?php echo base_url().'assets/photo/'.$p->photo ?>" width="45px"></td>
                        <?php if($p->hak_akses=='1') { ?>
                            <td>Admin</td>
                        <?php }else{ ?>
                            <td>Pegawai</td>
                        <?php } ?>        
                    <td><a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_pegawai/update_data/'.$p->id_pegawai)?>"><i class="fas fa-edit " ></i></a></td>
                    <td><a onClick="return confirm('Yakin ingin menghapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_pegawai/delete_data/'.$p->id_pegawai)?>"><i class="fas fa-trash "></i></a>  </td>                 
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
