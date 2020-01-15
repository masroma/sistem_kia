<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Data_darah Read</h2>
        <table class="table">
	    <tr><td>Golongan Darah</td><td><?php echo $golongan_darah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_darah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>