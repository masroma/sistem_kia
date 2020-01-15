
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Anak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Data Anak</a></li>
             
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
              <h3 class="card-title"><?php echo anchor(site_url('data_anak'),'Data Anak', 'class="btn btn-success"'); ?></h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
        <tr><td>Id Dokter</td><td><?php echo $id_dokter; ?></td></tr>
        <tr><td>Nama Klinik</td><td><?php echo $nama_klinik; ?></td></tr>
        <tr><td>Nama Anak</td><td><?php echo $nama_anak; ?></td></tr>
        <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
        <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
        <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
        <tr><td>Usia</td><td><?php echo $usia; ?></td></tr>
        <tr><td>Kode Unik</td><td align="center"><img src="<?php echo base_url() ?>assets/barcode/<?php echo $kode_unik; ?>.png"><br/><?php echo $kode_unik; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('data_anak') ?>" class="btn btn-default">Cancel</a></td></tr>
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