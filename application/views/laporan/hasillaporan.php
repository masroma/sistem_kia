
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="h3 mb-2 text-gray-800">Laporan KIA</h1>
<h5>Laporan Pendaftar Dari Tanggal <b><?php echo $tanggal_awal;?></b> sd <b><?php echo $tanggal_akhir;?></b> dan Status <?php if($status == 0){ echo "menunggu proses";} else {echo "di setujui";}?></h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
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
            <form action="<?php echo base_url(); ?>Laporan/cetak" method="post">
    <input type="hidden" name="tanggal_awal" value="<?php echo $tanggal_awal;?>" >
    <input type="hidden" name="tanggal_akhir" value="<?php echo $tanggal_akhir;?>" >
    <input type="hidden" name="status" value="<?php echo $status;?>" >
    <button type="submit" class="btn btn-sm btn-primary">cetak laporan</button>
   
    </form>
                 <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead>
       
            <tr>
		<th>Nama Anak</th>
        <th>Nama Orang Tua</th>
		<th>NIK Anak</th>
		
		<th>Status</th>
		
		</tr>
	
        </thead>

	
        <tbody>
        	<?php foreach ($data_kia as $key) { ?>
		<tr>
			<td><?php echo $key->nama_anak;?></td>
			<td><?php echo $key->nama_ayah;?></td>
			<td><?php echo $key->nik_bayi;?></td>
			<td><?php if($key->status == 0) {echo '<span class="badge badge-danger">menunggu proses</span>';} else { echo '<span class="badge badge-success">di setujui</span>';}?></td>

		</tr>
	<?php } ?>
		
			 
      
		</tbody>
		
       
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