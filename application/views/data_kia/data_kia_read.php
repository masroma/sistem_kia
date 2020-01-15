
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data kia</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Detail Data kia</a></li>
             
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
              <h3 class="card-title"><?php echo anchor(site_url('data_kia'),'Data kia', 'class="btn btn-success"'); ?></h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 <table class="table">
	    <tr><td>Kode Anak</td><td><?php echo $kode_anak; ?></td></tr>
	    <tr><td>Id Orangtua</td><td><?php echo $id_orangtua; ?></td></tr>
	    <tr><td>Nik Bayi</td><td><?php echo $nik_bayi; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Gol Darah</td><td><?php echo $gol_darah; ?></td></tr>
                     <tr><td>Photo Anak</td><td> <a href="<?php echo base_url();?>assets/kia/<?php echo $photo_anak; ?>" target="_blank"><img src="<?php echo base_url();?>assets/kia/<?php echo $photo_anak; ?>" width="150px"></a></td></tr>
	    <tr><td>Photo Kk</td><td> <a href="<?php echo base_url();?>assets/kia/<?php echo $photo_kk; ?>" target="_blank"><img src="<?php echo base_url();?>assets/kia/<?php echo $photo_kk; ?>" width="150px"></a></td></tr>
	    
	    <tr><td>Photo Akta Kelahiran</td><td><a href="<?php echo base_url();?>assets/kia/<?php echo $photo_akta_kelahiran; ?>" target="_blank"><img src="<?php echo base_url();?>assets/kia/<?php echo $photo_akta_kelahiran; ?>" width="150px"></a></td></tr>
	    
                     <tr><td>Photo Ktp Ayah</td><td><a href="<?php echo base_url();?>assets/kia/<?php echo $photo_ktp_ayah; ?>" target="_blank"><img src="<?php echo base_url();?>assets/kia/<?php echo $photo_ktp_ayah; ?>" width="150px"></a></td></tr>
                     
	    <tr><td>Photo Ktp Ibu</td><td><a href="<?php echo base_url();?>assets/kia/<?php echo $photo_ktp_ibu; ?>" target="_blank"><img src="<?php echo base_url();?>assets/kia/<?php echo $photo_ktp_ibu; ?>" width="150px"></a></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_kia') ?>" class="btn btn-default">Cancel</a></td></tr>
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