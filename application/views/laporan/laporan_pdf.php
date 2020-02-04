
<div class="container-fluid">
<table style="pading-bottom:10px; border-bottom:30px;" class="border-bottom">
        <tr>
            <th>
                <img src="assets/surat/logo.png" width="150" >
            </th>
            <td>
                <h3 style="margin:0px;">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Tangerang</h3>
                <p style="margin:0px;">disdukcapil.tangerang.go.id</p>
            </td>
        </tr>
    </table>
<!-- Page Heading -->
<!-- Page Heading -->
<center>
<h3 tyle="padding:0px; margin:0px;" class=" mb-2 text-gray-800">Laporan Data KIA</h3>
<h5 tyle="padding:0px; margin:0px;" class="mb-2 text-gray-800">  Tanggal <?php echo date('d F Y');?></h5>
</center>


<!-- DataTales Example -->
<div class="card shadow mb-4" style="margin-top:20px;">
  <div class="card-header py-3">
    
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table border="1" class="table table-bordered" width="100%" cellspacing="0">
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
			<td><?php if($key->status == 0) {echo '<span style="color:red;">menunggu proses</span>';} else { echo '<span style="color:green;">di setujui</span>';}?></td>

		</tr>
	<?php } ?>
       </tbody>
	    </table>
</div>
</div></div>
</div>