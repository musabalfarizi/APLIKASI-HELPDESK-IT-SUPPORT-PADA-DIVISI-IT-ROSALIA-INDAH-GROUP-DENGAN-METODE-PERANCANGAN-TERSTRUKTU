<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false
    });
  });
</script>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">DATA KARYAWAN</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat tanggal lahir</th>
			<th>Agama</th>
            <th>Jenis Kelamin</th>
            <th>Keterangan</th>
			<td>Action</td>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($daftar_karyawan as $k) {?>
          <tr>
			<td><?php echo $k->id;?></td>
			<td><?php echo $k->kode;?></td>
			<td><?php echo $k->nik;?></td>
			<td><?php echo $k->nama;?></td>
			<td><?php echo $k->tempatlahir.', '.$k->tgllahir;?></td>
			<td><?php echo $k->nama_agama;?></td>
			<td><?php echo $k->kelamin;?></td>
			<td><?php echo $k->ket;?></td>
			<td><div><?php echo anchor('karyawans/update/'.$k->id,
			'<img src="'.base_url('assets/edit.png').'" width="18" length="18" />');?></div>
			</br><div>
			<?php echo anchor('karyawans/delete/'.$k->id,
			'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete',
			'onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus karyawan ini?')"));?></div> </td>
          </tr><?php }?>
          
        </tbody>
		<tfoot>
		<tr>
		<a href="<?=base_url('index.php/karyawans/add');?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah data</a>
		</tr>
		</tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  
</div><!-- /.col -->
</div><!-- /.row -->