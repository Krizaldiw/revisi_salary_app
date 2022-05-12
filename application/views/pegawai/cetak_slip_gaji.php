<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Segoe UI;
            color: black;

        }
    </style>    
</head>    
<body>
    <center>
        <h1>PT. FAFIFU TECHNOLOGY CORP. </h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%; border-width: 3px; color: black;"/>
    </center><br><br>


    <?php foreach($potongan as $p) {
        $potongan =$p->jml_potongan;
    } ?>
 
    <?php foreach($print_slip as $ps) : ?>
    <?php $potongan_gaji = $ps->alpha * $potongan; ?>

    <div class="table-responsive">
        <table style="width: 100%" >
            <tr>
                <td width="20%">NIK</td>
                <td width="2%">:</td>
                <td><?php echo $ps->nik ?> </td>
            </tr>
            <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><?php echo $ps->nama_pegawai ?> </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $ps->nama_jabatan ?> </td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo substr($ps->bulan, 0, 2) ?> </td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo substr($ps->bulan, 2, 4) ?> </td>
            </tr>           
        </table>

        <table class="table table-striped table-striped mt-4 ">
            <tr>
                <th class="text-center" style="width: 5%">No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>  
            <tr>
                <td class="text-center" style="width: 5%">1</td>
                <td class="text-center">Gaji Pokok</td>
                <td class="text-center">Rp.<?php echo number_format($ps->gaji_pokok,0,',','.')?></td>
            </tr><tr>
                <td class="text-center" style="width: 5%">2</td>
                <td class="text-center">Tunjangan Transportasi</td>
                <td class="text-center">Rp.<?php echo number_format($ps->tj_transport,0,',','.')?></td>
            </tr>  
            <tr>
                <td class="text-center" style="width: 5%">3</td>
                <td class="text-center">Uang Makan</td>
                <td class="text-center">Rp.<?php echo number_format($ps->uang_makan,0,',','.')?></td>
            </tr>    
            <tr>
                <td class="text-center" style="width: 5%">4</td>
                <td class="text-center">Potongan Gaji</td>
                <td class="text-center">Rp.<?php echo number_format($potongan_gaji,0,',','.')?></td>
            </tr>  
            <tr>
                <th colspan="2" style="text-align: right;" class="text-center">Total Gaji</th>
                <th class="text-center">Rp.<?php echo number_format($ps->gaji_pokok + $ps->tj_transport + $ps->uang_makan - $potongan_gaji,0,',','.')?></th>
            </tr> 
        </table>
        <table class="table table-striped table-striped mt-4" width="100%">
            <tr>
                <td></td>
                <td width="100%">
                    <p>Pegawai</p><br><br>
                    <p class="font-weight-bold"><?php echo $ps->nama_pegawai ?> </p>
                </td>
                <td></td>
                <td width="200px">
                    <p>Surakarta, <?php echo date("d M Y") ?><br> Finance Dept, </p><br><br>
                    <p>_______________________</p>
                </td>
            </tr>
        </table>
        <?php endforeach; ?>
    </div>    
</body>
</html>
<script type="text/javascript">
    window.print();
</script>