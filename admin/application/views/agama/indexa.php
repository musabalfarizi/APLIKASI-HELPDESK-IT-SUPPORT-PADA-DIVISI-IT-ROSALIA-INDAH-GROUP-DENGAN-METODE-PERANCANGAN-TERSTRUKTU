<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true
    });
  });
</script>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">DATA AGAMA</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
			
            <th>Nama</th>
            <th>Keterangan</th>
			<td>Action</td>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($agama as $a) {?>
          <tr>
			
			<td><?php echo $a->nama;?></td>
			<td><?php echo $a->ket;?></td>
			<td><div><?php echo anchor('agama/update/'.$a->id_agama,
			'<img src="'.base_url('assets/edit.png').'" width="18" length="18" />');?>
		
			<?php echo anchor('agama/delete/'.$a->id_agama,
			'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete',
			'onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus agama ini?')"));?></div> </td>
          </tr><?php }?>
          
        </tbody>
		<tfoot>
		<tr>
		<a href="<?=base_url('index.php/agama/add');?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah data</a>
		</tr>
		</tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  
</div><!-- /.col -->
</div><!-- /.row -->
<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

