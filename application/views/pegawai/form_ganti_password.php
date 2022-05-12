<div class="container-fluid">
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>
    <div class="card" style="width:60%" >
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('pegawai/ganti_password/ganti_password_aksi')?>">
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="pass_baru" class="form-control">
                    <?php echo form_error('pass_baru','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input type="password" name="ulangi_pass" class="form-control">
                    <?php echo form_error('ulangi_pass','<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>    