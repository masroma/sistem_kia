
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Orangtua</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Data Orangtua</a></li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo anchor(site_url('data_Orangtua'),'Data Orangtua', 'class="btn btn-success"'); ?></h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table">
	    <tr><td>Nik Ayah</td><td><?php echo $nik_ayah; ?></td></tr>
	    <tr><td>Nama Ayah</td><td><?php echo $nama_ayah; ?></td></tr>
	    <tr><td>Nik Ibu</td><td><?php echo $nik_ibu; ?></td></tr>
	    <tr><td>Nama Ibu</td><td><?php echo $nama_ibu; ?></td></tr>
	    <tr><td>Alamat Lengkap</td><td><?php echo $alamat_lengkap; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_orangtua') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper