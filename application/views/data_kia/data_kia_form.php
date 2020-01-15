
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data KIA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Form Data KIA</a></li>
             
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
              <h3 class="card-title"><?php echo anchor(site_url('data_KIA'),'Data KIA', 'class="btn btn-success"'); ?></h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Kode Anak <?php echo form_error('kode_anak') ?></label>
           
            <select name="kode_anak" class="form-control select2" style="width: 100%;" value="<?php echo $kode_anak; ?>">
              <?php foreach($data_anak as $row ) { ?>
                   <option <?php if($row->kode_unik == $kode_anak){ echo 'selected="selected"'; } ?> value="<?php echo $row->kode_unik ?>"><?php echo $row->kode_unik;?> - <?php echo $row->nama_anak;?> </option>
                 
              <?php }?>
              </select>
        </div>
	    <div class="form-group">
            <label for="int">Id Orangtua (ayah) <?php echo form_error('id_orangtua') ?></label>
           
            <select class="form-control select2" name="id_orangtua" id="id_orangtua" placeholder="Id Orangtua" value="<?php echo $id_orangtua; ?>" >
              <?php foreach($data_orangtua as $row ) { ?>
                
                    <option  <?php if($row->id_orangtua == $id_orangtua){ echo 'selected="selected"'; } ?> value ='<?php echo $row->id_orangtua;?>' ><?php echo $row->nik_ayah;?> - <?php echo $row->nama_ayah;?></option>
              <?php }?>
              </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nik Bayi <?php echo form_error('nik_bayi') ?></label>
            <input type="text" class="form-control" name="nik_bayi" id="nik_bayi" placeholder="Nik Bayi" value="<?php echo $nik_bayi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agama <?php echo form_error('agama') ?></label>
            <select  class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>">
               <?php foreach($data_agama as $row ) { ?>
                   <option <?php if($row->agama == $agama){ echo 'selected="selected"'; } ?> value="<?php echo $row->agama ?>"><?php echo $row->agama;?></option>
                 
              <?php }?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Gol Darah <?php echo form_error('gol_darah') ?></label>
            <select   class="form-control" name="gol_darah" id="gol_darah" placeholder="Gol Darah" value="<?php echo $gol_darah; ?>">
               <?php foreach($data_darah as $row ) { ?>
                   <option <?php if($row->golongan_darah == $gol_darah){ echo 'selected="selected"'; } ?> value="<?php echo $row->golongan_darah ?>"><?php echo $row->golongan_darah;?></option>
                 
              <?php }?>
            </select>
        </div>
	    <div class="form-group">
               <?php if($photo_anak != null) { ?>
                   <img src="<?php echo base_url();?>assets/kia/<?php echo $photo_anak;?>" width="150px"/>
               <?php } else { ?>
               <p style="margin-bottom:-10px;">photo anak belum diisi</p>
               <?php } ?><br/>
            <label for="varchar">Photo Anak <?php echo form_error('photo_anak') ?></label>
            
              <?php if($this->uri->segment(3)=='create'){?>
                <input type="file" class="form-control" name="photo_anak" value="<?php echo $photo_anak; ?>" id="gambar" placeholder="Gambar" />
            <?php } else { ?>
                <input type="file" class="form-control" name="photo_anak" id="gambar" placeholder="Gambar" />
            <input type="hidden" class="form-control" name="photo_anak_lama" id="gambar" placeholder="Gambar" value="<?php echo $photo_anak; ?>" />
            <?php } ?>
            
           
        </div>
	    <div class="form-group">
            <?php if($photo_kk != null) { ?>
                   <img src="<?php echo base_url();?>assets/kia/<?php echo $photo_kk;?>" width="150px"/>
               <?php } else { ?>
                   <p style="margin-bottom:-10px;">Photo kk belum diisi</p>
               <?php } ?><br/>
            <label for="varchar">Photo Kk <?php echo form_error('photo_kk') ?></label>
              <?php if($this->uri->segment(3)=='create'){?>
                <input type="file" class="form-control" name="photo_kk" value="<?php echo $photo_kk; ?>" id="gambar" placeholder="Gambar" />
            <?php } else { ?>
                <input type="file" class="form-control" name="photo_kk" id="gambar" placeholder="Gambar" />
            <input type="hidden" class="form-control" name="photo_kk_lama" id="gambar" placeholder="Gambar" value="<?php echo $photo_kk; ?>" />
            <?php } ?>
        </div>

	    <div class="form-group">
            <?php if($photo_akta_kelahiran != null) { ?>
                   <img src="<?php echo base_url();?>assets/kia/<?php echo $photo_akta_kelahiran;?>" width="150px"/>
               <?php } else { ?>
                <p style="margin-bottom:-10px;">Photo akta kelahiran belum diisi</p>
               <?php } ?><br/>
            <label for="varchar">Photo Akta Kelahiran <?php echo form_error('photo_akta_kelahiran') ?></label>
            
             <?php if($this->uri->segment(3)=='create'){?>
                <input type="file" class="form-control" name="photo_akta_kelahiran" value="<?php echo $photo_akta_kelahiran; ?>" id="gambar" placeholder="Gambar" />
            <?php } else { ?>
                <input type="file" class="form-control" name="photo_akta_kelahiran" id="gambar" placeholder="Gambar" />
            <input type="hidden" class="form-control" name="photo_akta_kelahiran_lama" id="gambar" placeholder="Gambar" value="<?php echo $photo_akta_kelahiran; ?>" />
            <?php } ?>
        </div>
	    <div class="form-group">
           <?php if($photo_ktp_ayah != null) { ?>
                   <img src="<?php echo base_url();?>assets/kia/<?php echo $photo_ktp_ayah;?>" width="150px"/>
               <?php } else { ?>
                <p style="margin-bottom:-10px;">Photo KTP Ayah belum diisi</p>
               <?php } ?><br/>
            <label for="varchar">Photo Ktp Ayah <?php echo form_error('photo_ktp_ayah') ?></label>
            <?php if($this->uri->segment(3)=='create'){?>
                <input type="file" class="form-control" name="photo_ktp_ayah" value="<?php echo $photo_ktp_ayah; ?>" id="gambar" placeholder="Gambar" />
            <?php } else { ?>
                <input type="file" class="form-control" name="photo_ktp_ayah" id="gambar" placeholder="Gambar" />
            <input type="hidden" class="form-control" name="photo_ktp_ayah_lama" id="gambar" placeholder="Gambar" value="<?php echo $photo_ktp_ayah; ?>" />
            <?php } ?>
        </div>
	    <div class="form-group">
           <?php if($photo_ktp_ibu != null) { ?>
                   <img src="<?php echo base_url();?>assets/kia/<?php echo $photo_ktp_ibu;?>" width="150px"/>
               <?php } else { ?>
                <p style="margin-bottom:-10px;">Photo ktp belum diisi</p>
               <?php } ?><br/>
            <label for="varchar">Photo Ktp Ibu <?php echo form_error('photo_ktp_ibu') ?></label>
           <?php if($this->uri->segment(3)=='create'){?>
                <input type="file" class="form-control" name="photo_ktp_ibu" value="<?php echo $photo_ktp_ibu; ?>" id="gambar" placeholder="Gambar" />
            <?php } else { ?>
                <input type="file" class="form-control" name="photo_ktp_ibu" id="gambar" placeholder="Gambar" />
            <input type="hidden" class="form-control" name="photo_ktp_ibu_lama" id="gambar" placeholder="Gambar" value="<?php echo $photo_ktp_ibu; ?>" />
            <?php } ?>
        </div>

	    <input type="hidden" name="id_kis" value="<?php echo $id_kis; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_kia') ?>" class="btn btn-default">Cancel</a>
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