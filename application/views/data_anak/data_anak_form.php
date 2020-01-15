
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data Anak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Form Data Anak</a></li>
             
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
                  <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">Dokter <?php echo form_error('id_dokter') ?></label>
           
            <select name="id_dokter" class="form-control select2" style="width: 100%;" value="<?php echo $id_dokter; ?>">
              <?php foreach($data_dokter as $row ) { ?>
                
                    <option value ='<?php echo $row->id_dokter;?>' ><?php echo $row->nip_dokter;?> - <?php echo $row->nama_dokter;?></option>
              <?php }?>
              </select>
        </div>
        <div class="form-group">
            <label for="varchar">Nama Klinik <?php echo form_error('nama_klinik') ?>Nama Klinik</label>
            <input type="text" class="form-control" name="nama_klinik" id="nama_klinik" placeholder="Nama Klinik" value="<?php echo $nama_klinik; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Anak <?php echo form_error('nama_anak') ?></label>
            <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Nama Anak" value="<?php echo $nama_anak; ?>" />
            <input type="hidden" class="form-control" name="kode_unik" id="nama_anak" placeholder="Nama Anak" value="<?php echo $kode_unik; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
        <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>">
                <option value="pria">Laki - Laki</option>
                <option value="wanita">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Usia <?php echo form_error('usia') ?></label>
            <input type="number" class="form-control" name="usia" id="usia" placeholder="Usia" value="<?php echo $usia; ?>" />
        </div>
       
        <input type="hidden" name="id_anak" value="<?php echo $id_anak; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('data_anak') ?>" class="btn btn-default">Cancel</a>
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