<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/data_jabatan/tambah_data')?>"><i class="fas fa-plus "></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan')?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-2">
            <tr style="margin-bottom: 120px">
                <th class="text-center">No</th>
                <th class="text-center">Nama Jabatan</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tunjangan Transportasi</th>
                <th class="text-center">Uang Makan</th>
                <th class="text-center">Total</th>
                <th class="text-center" colspan="3">Opsi</th>
            </tr>
            <?php $no=1; foreach ($jabatan as $j) : ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $j->nama_jabatan?></td>
                    <td>Rp. <?php echo number_format($j->gaji_pokok,0,',','.')?></td>
                    <td>Rp. <?php echo number_format($j->tj_transport,0,',','.')?></td>
                    <td>Rp. <?php echo number_format($j->uang_makan,0,',','.')?></td>
                    <td>Rp. <?php echo number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan,0,',','.')?></td>
                    <td><a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/data_jabatan/detail_data/'.$j->id_jabatan)?>"><i class="fas fa-fw fa-search-plus "></i></a></td>               
                    <td><a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_jabatan/update_data/'.$j->id_jabatan)?>"><i class="fas fa-fw fa-edit "></i></a></td>       
                    <td><a onClick="return confirm('Yakin ingin menghapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_jabatan/delete_data/'.$j->id_jabatan)?>"><i class="fas fa-trash "></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


           
