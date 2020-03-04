<script type="text/javascript">
	$(function () {
	$('#example2').dataTable({
		"bPaginate": true,
		"bLengthChange": false,
		"bFilter": true,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true,
		});
		});
</script>
<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Pesan</h3>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
			<thead>
			 <tr>
				<th>Nama</th>
				<th>Pesan</th>
				<th>Tanggal</th>
				<th>Email</th>
				<th></th>
			 </tr>
			</thead>
			<tbody>
			<?php foreach ($kontak as $k) { 
			if ($k->terbaca == '0') { ?>
			<tr>
				<td><a href="<?php echo site_url('contact/view/'.$k->id_contact);?>"><?php echo "<b>".$k->nama."</b>";?></a></td>
				<td><a href="<?php echo site_url('contact/view/'.$k->id_contact);?>"><?php echo "<b>".word_limiter($k->pesan,'2')."</b>";?></a></td>
				<td><a href="<?php echo site_url('contact/view/'.$k->id_contact);?>"><?php echo "<b>".$k->tanggal."</b>";?></a></td>
				<td><?php echo "<b>".$k->email."</b>";?></td>
				<td>
				<?php echo anchor('contact/delete/'.$k->id_contact,'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete','onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus user ini?')"));?></td>
				
				</td>
			</tr><?php }else{ ?>
			<tr>
				<td><a href="<?php echo site_url('contact/view/'.$k->id_contact);?>"><?php echo $k->nama;?></a></td>
				<td><a href="<?php echo site_url('contact/view/'.$k->id_contact);?>"><?php echo word_limiter($k->pesan,'2');?></a></td>
				<td><a href="<?php echo site_url('contact/view/'.$k->id_contact);?>"><?php echo $k->tanggal;?></a></td>
				<td><?php echo $k->email;?></td>
				<td>
				<?php echo anchor('contact/delete/'.$k->id_contact,'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete','onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus user ini?')"));?>
				
				</td>
			</tr>
			<?php }} ?>
			</tbody>
			<tfoot>
			 <tr>
			 <a href="#"> </a>
			 </tr>
			</tfoot>
		</table>
		</div>
	</div>
	</div>
</div>
