
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data Orangtua</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Form Data Orangtua</a></li>
             
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
            <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nik Ayah <?php echo form_error('nik_ayah') ?></label>
            <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" placeholder="Nik Ayah" value="<?php echo $nik_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nik Ibu <?php echo form_error('nik_ibu') ?></label>
            <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" placeholder="Nik Ibu" value="<?php echo $nik_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat_lengkap">Alamat Lengkap <?php echo form_error('alamat_lengkap') ?></label>
            <textarea class="form-control" rows="3" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap"><?php echo $alamat_lengkap; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan Ayah <?php echo form_error('pekerjaan') ?></label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agama <?php echo form_error('agama') ?></label>
            <select  class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>">
               <?php foreach($data_agama as $row ) { ?>
                   <option <?php if($row->agama == $agama){ echo 'selected="selected"'; } ?> value="<?php echo $row->agama ?>"><?php echo $row->agama;?></option>
                 
              <?php }?>
            </select>
        </div>
	    <input type="hidden" name="id_orangtua" value="<?php echo $id_orangtua; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_orangtua') ?>" class="btn btn-default">Cancel</a>
	</form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper