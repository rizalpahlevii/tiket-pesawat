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
        <h3 class="text-center mt-3">Laporan Data Pesawat</h3>
        <table class="table table-bordered table-stripped table-hover">
            <thead>
                <tr><th class="short">No</th><th class="short">ID Pesawat</th><th class="normal">Nama Pesawat</th><th class="normal">Image</th><th class="normal">Kursi Ekonomi</th><th class="normal">Kursi Bisnis</th></tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $user['id_pesawat'] ?></td>
                        
                        <td><?php echo $user['type_pesawat'] ?></td>
                        <td><?php echo $user['image'] ?></td>
                        <td><?php echo $user['jml_kursi_ekonomi'] ?></td>
                        <td><?php echo $user['jml_kursi_bisnis'] ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>