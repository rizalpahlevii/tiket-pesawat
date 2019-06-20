<!DOCTYPE html>
<html>
<head>
    <title>Tiket</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/tiket/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/tiket/AdminLTE.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/tiket/skins/_all-skins.min.css">
    <style type="text/css">
        *{
            font-family: 'Courier New';
        }
    </style>
</head>
<body>
    <?php foreach($tmp as $data) : ?>

     <div class="">
    <div class="box">
        <div class="box-body">
            <div class="col-lg-12" style="background-color: #fff">
        <div class="col-sm-7" style="border-right: 1px solid#000">
            <div class="col-sm-12">
                <label><?php echo $data->kelas ?> CLASS : BOARDING PASS</label>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Passenger</label>
                    <p><?php echo $data->nama_passenger ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>No Penerbangan</label>
                    <p><?php echo $data->id_penerbangan ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Airport</label>
                    <p><?php echo $data->nama_bandara ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Boarding Time</label>
                    <p><?php echo $data->tgl_penerbangan ?></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>From</label>
                    <p><?php echo $data->asal ?></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>To</label>
                    <p><?php echo $data->tujuan ?></p>
                </div>
            </div>
            <div class="col-sm-12">
                <p>SPECIAL REQUEST</p>
                <p>GATE CLOSES 15 BEFORE ST</p><br>
                <p>PLEASE BE AT THE BOARDING GATE AT LEST 30 MINUTES BEFORE TIME.</p>
            </div>
        </div>
        <div class="col-sm-5" style="">
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo base_url() ?>assets/logo.png" class="" style="width: 70%">
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <div class="col-sm-6">
                <h3 style="font-family: 'Courier New'; "><?php echo $data->nama_passenger ?></h3>
            </div>
            <div class="col-sm-6">
                <img src="<?php echo base_url() ?>assets/master/pesawat/<?= $data->image ?>" class="" style="width: 50%">
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Flight</label>
                    <p><?php echo $data->type_pesawat ?></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>No Kursi</label>
                    <p><?php echo $data->nomor_kursi ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Gate</label>
                    <p>TIMUR</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>From</label>
                    <p><?php echo $data->asal ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>To</label>
                    <p><?php echo $data->tujuan ?></p>
                </div>
            </div>
            <div class="col-sm-12">
                <label><center> <?php echo $data->kelas ?> CLASS</center></label>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<script src="<?php echo base_url();?>assets/tiket/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/tiket/bootstrap.min.js"></script>
     <script src="<?php echo base_url();?>assets/tiket/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/tiket/app.min.js"></script>
    <script src="<?php echo base_url();?>assets/tiket/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/tiket/daterangepicker.js"></script>
</body>
</html>