Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Orang Tua</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Orang Tua</a></li>
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
              <h3 class="card-title"><?php echo anchor(site_url('data_Orangtua/create'),'Create', 'class="btn btn-primary"'); ?></h3>
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
		<th>Nik Ayah</th>
		<th>Nama Ayah</th>
		<th>Nik Ibu</th>
		<th>Nama Ibu</th>
		<th>Action</th>
            </tr>
                </thead>
                <tbody>
                <?php
            foreach ($data_orangtua_data as $data_orangtua)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data_orangtua->nik_ayah ?></td>
			<td><?php echo $data_orangtua->nama_ayah ?></td>
			<td><?php echo $data_orangtua->nik_ibu ?></td>
			<td><?php echo $data_orangtua->nama_ibu ?></td>
		
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data_orangtua/read/'.$data_orangtua->id_orangtua),'Read','class="btn btn-primary btn-sm"'); 
				echo ' | '; 
				echo anchor(site_url('data_orangtua/update/'.$data_orangtua->id_orangtua),'Update', 'class="btn btn-success btn-sm"'); 
				echo ' | '; 
				echo anchor(site_url('data_orangtua/delete/'.$data_orangtua->id_orangtua),'Delete', 'class="btn btn-danger btn-sm"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
		<th>Nik Ayah</th>
		<th>Nama Ayah</th>
		<th>Nik Ibu</th>
		<th>Nama Ibu</th>
	
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