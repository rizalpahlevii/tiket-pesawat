<!DOCTYPE html>
<html>
<head>
    <title>Report Table</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
   <style type="text/css">
       
   </style>

</head>
<body>
    <div class="container">
        <h3 class="text-center mt-3">Laporan Data Bandara</h3>
        <table class="table table-bordered table-stripped table-hover">
            <thead>
                <tr><th class="short">No</th><th class="short">ID Bandara</th><th class="normal">Nama Bandara</th><th class="normal">Kode</th><th class="normal">Kota Bandara</th><</tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($bandaras as $bandara) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $bandara['id_bandara'] ?></td>
                        <td><?php echo $bandara['nama_bandara'] ?></td>
                        <td><?php echo $bandara['kode'] ?></td>
                        <td><?php echo $bandara['kota_bandara'] ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>