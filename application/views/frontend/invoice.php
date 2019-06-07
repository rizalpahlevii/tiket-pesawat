
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <?php if($penumpang === "Tidak Ada Pesanan") :  ?>
            <h5 style="text-align: center;">Anda Tidak Mempunyai Pesanan</h5><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php else: ?>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo base_url('assets/logo.png'); ?>" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $row->id_penerbangan ?><br>
                                Created: <?php echo $row->tgl_booking ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Nama Pesawat :</b><br>
                                <?php echo $row->type_pesawat ?><br>
                                <b>Nama Bandara :</b><br>
                                <?php echo $row->nama_bandara ?><br>
                                <b>Asal Penerbangan :</b><br>
                                <?php echo $row->asal ?><br>
                               <b>Tujuan Penerbangan :</b><br>
                                <?php echo $row->tujuan ?><br>
                                
                            </td>
                            
                            <td>
                                <b>Tgl Penerbangan :</b><br>
                                <?php echo $row->tgl_penerbangan ?><br>
                               <b>Jam Tiba :</b><br>
                                <?php echo $row->jam_berangkat ?><br>

                               <b>Jam Tiba :</b><br>
                                <?php echo $row->jam_tiba ?><br>
                                <b>Kelas Penerbangan :</b><br>
                                <?php echo $row->kelas ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
        </table>
        <h5>Data Customer</h5>
        <table>
            <tr class="ok" >
                <th>
                    Nama Customer
                </th>
                
                <th>
                    Email
                </th>
                 <th>
                    Kota
                </th>
                 <th>
                    Negara
                </th>
            </tr>
            
           <tr>
               <td><?php echo $row->nama ?></td>
               <td><?php echo $row->email ?></td>
               <td><?php echo $row->kota ?></td>
               <td><?php echo $row->negara ?></td>
           </tr>
        </table>
        <h5>Data Penumpang</h5>
        <table>
            <tr class="ok" >
                <th>
                    Nama Penumpang
                </th>
                <th></th>
                <th>
                    No Kursi
                </th>
                 <th>
                    Umur
                </th>
            </tr>
            <?php foreach($penumpang as $p): ?>
           <tr>
               <td><?php echo $p->nama_passenger ?></td><td></td>
               <td><?php echo $p->nomor_kursi ?></td>
               <td><?php echo $p->umur ?></td>
           </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>
