<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Pesan</h3>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
<tr>
<td>Nama</td>
<td><?php echo (set_value('Nama'))?set_value('nama'):$kontaks['nama'];?></td>
</tr>
<tr>
<td>Email</td>
<td><?php echo (set_value('email'))?set_value('email'):$kontaks['email'];?></td>
</tr>
<tr>
<td>Tanggal</td>
<td><?php echo (set_value('tanggal'))? set_value('tanggal'):$kontaks['tanggal'];?></td>
</tr>
<tr>
<td>Pesan</td>
<td><?php echo (set_value('pesan'))?set_value('pesan'):$kontaks['pesan'];?></td>
</tr>
</table>
		</div>
	</div>
	</div>
</div>