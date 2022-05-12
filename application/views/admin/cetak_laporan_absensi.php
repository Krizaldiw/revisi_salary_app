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
        <h2>Daftar Slip Gaji Pegawai</h2>
    </center>
    <?php 
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulanTahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan.$tahun;
        }
    ?>

    <div class="table-responsive">
        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $bulan ?> </td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo $tahun ?> </td>
            </tr>
        </table>
        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Alpha</th>
            </tr>
            <?php $no=1; foreach($lap_kehadiran as $l) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $l->nik ?></td>
                <td><?php echo $l->nama_pegawai ?></td>
                <td><?php echo $l->jenis_kelamin ?></td>
                <td><?php echo $l->nama_jabatan ?></td>
                <td><?php echo $l->hadir ?></td>
                <td><?php echo $l->sakit ?></td>
                <td><?php echo $l->alpha ?></td>

            </tr>
            <?php endforeach; ?>    
        </table>
        <table  width="100%">
            <tr>
                <td></td>
                <td width="200px">
                    <p>Surakarta, <?php echo date("d M Y") ?><br> Human Resource Department</p><br><br>
                    <p>_________________________</p>
                </td>
            </tr>
        </table>
    </div>    
</body>
</html>
<script type="text/javascript">
    window.print();
</script>