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
	<h3 class="box-title">Request Software</h3>
	</div>
	
	<div class="box-body">
	<table id="example2" class="table table-bordered table-hover">
	<thead>
	<tr>

	<th>Tanggal</th>
	<th>Pemesan</th>
	<th>Email</th>
	<th>Telp</th>
	<th>Company</th>
	<th>Software</th>
	<th>Request</th>
	<th>Ket</th>	
	<th>Status</th>
	<th hidden></th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	
	<?php foreach($daftar as  $xorderpro){
	?>
	<tr>
	
	<td><?php echo $xorderpro->tgl;?></td>
	<td><?php echo word_limiter($xorderpro->pemesan,'3');?></td>
	<td><?php echo $xorderpro->email;?></td>
	<td><?php echo $xorderpro->telp;?></td>
	<td><?php echo $xorderpro->company;?></td>
	<td><?php echo word_limiter($xorderpro->nama_software,'10');?></td>
	<td><?php echo $xorderpro->request;?></td>
	<td><?php echo word_limiter($xorderpro->ket,'2');?></td>
	<td><?php echo $xorderpro->nama_status;?></td>
	
	<td  hidden><?php if($xorderpro->terbaca == 't' ){echo form_checkbox('terbaca','t',set_checkbox('terbaca','t',$xorderpro->terbaca == TRUE));?><?php } else {?> <?php echo form_checkbox('terbaca','f',set_checkbox('terbaca','f',$xorderpro->terbaca == false));}?></td>
	<td><div><?php echo anchor('ordersof/update/'.$xorderpro->id_orderpro,'<img src="'.base_url('assets/edit.png').'" width="20" length="20"/>');?>
	<?php echo anchor('ordersof/delete/'.$xorderpro->id_orderpro,'<img src="'.base_url('assets/trash.png').'" width="20 length="20"/>',array('class'=>'delete','onclick'=>"return confirm('apakah anda yakin ingin menghapus data ini')"));?></div></td>
	</tr>
	<?php }?>
	</tbody>
	<tfoot>
	<tr>
		<a href="<?php echo base_url("index.php/ordersof/post/"); ?>" class="btn btn-sm glyphicon glyphicon-circle-arrow-right btn-flat pull-right">laporan Data</a>
		</tr>
</tfoot>
 </table>
 </div>
 </div>
 </div>
 </div>