<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": false,
      "bLengthChange": true,
      "bFilter": false,
      "bSort": false,
      "bInfo": true,
      "bAutoWidth": false
    });
  });
</script>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">JENIS WO LIST</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
            
            <th>Nama</th>
			<th>Keterangan</th>
			<th>Action</th>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($jeniswo as $wo) {?>
          
		  <tr>
			
			<td><?php echo $wo->nama;?></td>
			<td><?php echo $wo->ket;?></td></a>
			
			<td><div  class="header"><?php echo anchor('jeniswo/update/'.$wo->id_jeniswo,
			'<img src="'.base_url('assets/edit.png').'" width="18" length="18" />');?>

			<?php echo anchor('jeniswo/delete/'.$wo->id_jeniswo,'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete',
			'onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus??')"));?></div></td>
          </tr><?php }?>
        </tbody>
		<tfoot>
		<tr>
		  <a href="<?=base_url('index.php/jeniswo/add');?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah data</a>
          </tr>
		</tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  
</div><!-- /.col -->
</div><!-- /.row -->