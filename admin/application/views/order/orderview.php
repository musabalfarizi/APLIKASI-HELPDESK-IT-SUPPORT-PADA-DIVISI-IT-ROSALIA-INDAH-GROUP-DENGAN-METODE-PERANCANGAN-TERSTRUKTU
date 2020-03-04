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
      <h3 class="box-title">Request Hardware</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>Tanggal</th>
            <th>Pemesan</th>
			<th>Email</th>
            <th>Telepon</th>
            <th>Perusahaan</th>
            <th>Divisi</th>
            <th>Jenis WO</th>
            <th>Keluhan</th>
			<td>Status</td>
			<td>Action</td>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($list as $l) {?>
          
		  <tr>
			<td><?php echo $l->tgl;?></td>
			<td><?php echo $l->pemesan;?></td>
			<td><?php echo $l->email;?></td>
			<td><?php echo $l->telp;?></td>
			<td><?php echo $l->company;?></td>
			<td><?php echo $l->divisi;?></td>
			<td><?php echo $l->jeniswo;?></td>
			<td><?php echo $l->keluhan;?></td>
			<td><?php echo $l->statusnya;?></td></a>
			
			<td><div  class="header"><?php echo anchor('order/update/'.$l->id_order,
			'<img src="'.base_url('assets/edit.png').'" width="18" length="18" />');?>
			<?php echo anchor('order/delete/'.$l->id_order,'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete',
			'onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus?')"));?></div></td>
          </tr><?php }?>
        </tbody>
		<tfoot>
		<tr>
		<a href="<?php echo base_url("index.php/order/post/"); ?>" class="btn btn-sm btn-info btn-flat pull-right">laporan Data</a>
		</tr>
		<tr>
		</tr>
		</tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  
</div><!-- /.col -->
</div><!-- /.row -->