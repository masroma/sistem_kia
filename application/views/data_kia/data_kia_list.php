
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data KIA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data KIA</a></li>
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
              <h3 class="card-title"><?php echo anchor(site_url('data_kia/create'),'Create', 'class="btn btn-primary"'); ?></h3>
               <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
		<th>Kode Anak</th>
		<th>Id Orangtua</th>
		<th>Nik Bayi</th>
	 <th>Keterangan</th>
		
		<th>Action</th>
            </tr>
                </thead>
                <tbody>
                <?php if($this->session->userdata('ses_akses') == '5') { ?>
                  <?php
            foreach ($data_kia_email as $data_kia)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data_kia->kode_anak ?></td>
			<td><?php echo $data_kia->id_orangtua ?></td>
			<td><?php echo $data_kia->nik_bayi ?></td>
			<td align="center">
        <?php if($data_kia->photo_anak == NULL) { ?>
          <ul>
            <span class="badge badge-danger"><?php echo 'photo anak masih kosong'?></span>
          <?php } else if($data_kia->photo_kk == NULL) { ?>
             <span class="badge badge-danger"><?php echo 'photo KK masih kosong'?></span>
          <?php } else if($data_kia->photo_akta_kelahiran == NULL) { ?>
            <span class="badge badge-danger"><?php echo 'photo photo akta kelahiran masih kosong'?></span>
           <?php } else if($data_kia->photo_ktp_ayah == NULL) { ?>
            <span class="badge badge-danger"> <?php echo 'photo photo KTP Ayah masih kosong'?></span>
          <?php } else if($data_kia->photo_ktp_ibu == NULL) { ?>
             <span class="badge badge-danger"><?php echo 'photo photo KTP Ibu masih kosong'?></span>
          <?php } else { ?>
            <?php if($data_kia->status == 0){ ?>
              <?php if($this->session->userdata('ses_akses') == '4'){ ?>
               <form action="<?php echo base_url();?>Data_kia/update_status" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_kis" value="<?php echo $data_kia->id_kis; ?>" /> 
                  <input type="hidden" name="status" value="1" /> 
                    <button type="submit" class="btn btn-primary btn-sm">Validasi </button> 
              <?php } else { ?>
                 <span class="badge badge-primary"><?php echo 'Menunggu persetujuan'?></span>
              <?php } ?>
              </form>
            <?php } else { ?>
                <span class="badge badge-success"><?php echo 'Data sudah diterima'?></span>
              <?php } ?>
          <?php } ?>
        </ul>
      </td>
		
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data_kia/read/'.$data_kia->id_kis),'Read','class="btn btn-primary btn-sm"'); 
				echo ' | '; 
				echo anchor(site_url('data_kia/update/'.$data_kia->id_kis),'Update', 'class="btn btn-success btn-sm"'); 
				echo ' | '; 
				echo anchor(site_url('data_kia/delete/'.$data_kia->id_kis),'Delete', 'class="btn btn-danger btn-sm"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
                <?php } else {?>
                <?php
            foreach ($data_kia_data as $data_kia)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data_kia->kode_anak ?></td>
			<td><?php echo $data_kia->id_orangtua ?></td>
			<td><?php echo $data_kia->nik_bayi ?></td>
			<td align="center">
        <?php if($data_kia->photo_anak == NULL) { ?>
          <ul>
            <span class="badge badge-danger"><?php echo 'photo anak masih kosong'?></span>
          <?php } else if($data_kia->photo_kk == NULL) { ?>
             <span class="badge badge-danger"><?php echo 'photo KK masih kosong'?></span>
          <?php } else if($data_kia->photo_akta_kelahiran == NULL) { ?>
            <span class="badge badge-danger"><?php echo 'photo photo akta kelahiran masih kosong'?></span>
           <?php } else if($data_kia->photo_ktp_ayah == NULL) { ?>
            <span class="badge badge-danger"> <?php echo 'photo photo KTP Ayah masih kosong'?></span>
          <?php } else if($data_kia->photo_ktp_ibu == NULL) { ?>
             <span class="badge badge-danger"><?php echo 'photo photo KTP Ibu masih kosong'?></span>
          <?php } else { ?>
            <?php if($data_kia->status == 0){ ?>
              <?php if($this->session->userdata('ses_akses') == '4'){ ?>
               <form action="<?php echo base_url();?>Data_kia/update_status" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_kis" value="<?php echo $data_kia->id_kis; ?>" /> 
                  <input type="hidden" name="status" value="1" /> 
                    <button type="submit" class="btn btn-primary btn-sm">Validasi </button> 
              <?php } else { ?>
                 <span class="badge badge-primary"><?php echo 'Menunggu persetujuan'?></span>
              <?php } ?>
              </form>
            <?php } else { ?>
                <span class="badge badge-success"><?php echo 'Data sudah diterima'?></span>
              <?php } ?>
          <?php } ?>
        </ul>
      </td>
		
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data_kia/read/'.$data_kia->id_kis),'Read','class="btn btn-primary btn-sm"'); 
				echo ' | '; 
				echo anchor(site_url('data_kia/update/'.$data_kia->id_kis),'Update', 'class="btn btn-success btn-sm"'); 
				echo ' | '; 
				echo anchor(site_url('data_kia/delete/'.$data_kia->id_kis),'Delete', 'class="btn btn-danger btn-sm"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
              <?php
            }
            ?>
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
		<th>Kode Anak</th>
		<th>Id Orangtua</th>
		<th>Nik Bayi</th>
	
		<th>Action</th>
            </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper