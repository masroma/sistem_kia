
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Cari laporan</a></li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <!-- Default box -->
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="<?php echo base_url();?>Laporan/hasillaporan" method="post">
        <div class="form-group">
            <label for="int">dari Tanggal </label>
            <input type="date" class="form-control" name="tanggal_awal" />
        </div>
        <div class="form-group">
            <label for="int">Sampai Tanggal </label>
            <input type="date" class="form-control" name="tanggal_akhir" />
        </div>
        <div class="form-group">
            <label for="date">Status</label>
            
           <select name="status"  class="form-control">
               <option value="0">Belum di setujui</option>
                <option value="1">Sudah di setujui</option>
           </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Lihat Laporan</button> 
     
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