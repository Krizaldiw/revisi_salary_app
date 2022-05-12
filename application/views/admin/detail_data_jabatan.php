<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
        </div>
        <div class="card-body">
            <?php foreach ($jabatan as $j) :?>
                <div class="row">
                    <div class="col-md-8"><table class="table">
                        <tr>
                            <td>Nama Jabatan</td>
                            <td><strong><?php echo $j->nama_jabatan ?></strong></td>
                        </tr>
                        <tr>
                            <td>Gaji Pokok</td>
                            <td><strong>Rp. <?php echo number_format($j->gaji_pokok,0,',','.')?></strong></td>
                        </tr>
                        <tr>
                            <td>Tunjangan Transportasi</td>
                            <td><strong>Rp. <?php echo number_format($j->tj_transport,0,',','.')?></strong></td>
                        </tr>
                        <tr>
                            <td>Uang Makan</td>
                            <td><strong>Rp. <?php echo number_format($j->uang_makan,0,',','.')?></strong></td>
                        </tr>
                </table>
                <a href="<?php echo base_url('admin/data_jabatan/index')?>"><div class="btn btn-sm btn-warning mb-2">Kembali</div></a>
                </div>    
            <?php endforeach; ?>    
        </div>
    </div>    
</div>    