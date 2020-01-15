Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Anak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Anak</a></li>
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
              <h3 class="card-title"><?php echo anchor(site_url('data_anak/create'),'Create', 'class="btn btn-primary"'); ?></h3>
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
        <th>Id Dokter</th>
        <th>Nama Klinik</th>
        <th>Nama Anak</th>
        <th>Tempat Lahir</th>
       <!--  <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Usia</th>
        <th>Kode Unik</th> -->
        <th>Action</th> 
            </tr>
                </thead>
                <tbody>
               <?php
            foreach ($data_anak_data as $data_anak)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $data_anak->id_dokter ?></td>
            <td><?php echo $data_anak->nama_klinik ?></td>
            <td><?php echo $data_anak->nama_anak ?></td>
            <td><?php echo $data_anak->tempat_lahir ?></td>
           <!--  <td><?php echo $data_anak->tanggal_lahir ?></td>
            <td><?php echo $data_anak->jenis_kelamin ?></td>
            <td><?php echo $data_anak->usia ?></td>
            <td><?php echo $data_anak->kode_unik ?></td> -->
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('data_anak/read/'.$data_anak->id_anak),'Read', 'class="btn btn-primary btn-sm"'); 
            
                echo anchor(site_url('data_anak/update/'.$data_anak->id_anak),'Update', 'class="btn btn-success btn-sm"'); 
               
                echo anchor(site_url('data_anak/delete/'.$data_anak->id_anak),'Delete', 'class="btn btn-danger btn-sm"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        <th>Id Dokter</th>
        <th>Nama Klinik</th>
        <th>Nama Anak</th>
        <th>Tempat Lahir</th>
       <!--  <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Usia</th>
        <th>Kode Unik</th> -->
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