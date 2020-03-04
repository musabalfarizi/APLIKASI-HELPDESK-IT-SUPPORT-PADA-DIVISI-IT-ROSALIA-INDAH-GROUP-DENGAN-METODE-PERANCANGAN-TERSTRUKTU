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
      <h3 class="box-title">DATA STATUS</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
		
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
			
			<th>NAMA</th>
			<th>KET</th>
			<th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>

<?php foreach($daftar as $m){ 
?>
<tr>

<td><?php echo $m->nama;?></td>
<td><?php echo $m->ket;?></td>
<td><?php echo anchor('software/update/'.$m->id_software,'<img src="'.base_url('assets/edit.png').'" width="18" length="18" />');?>
<?php echo anchor('software/delete/'.$m->id_software,'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete','onclick'=>"return confirm('apakah anda yakin ingin menghapus data ini')"));?></i></font></div></td>
 
 
 </tr>
<?php } ?>
</tbody>
<tfoot>
<a href="<?=base_url('index.php/software/insert');?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah data</a>
</tfoot>
 </table>
 </div>
 </div>
 </div>
 </div>
 