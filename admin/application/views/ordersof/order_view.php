<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title" ><font color="blue" size="5">Order View</font></h3>
		</div>
		<div class="box-body">
		<table id="example2" class="table table-bordered table-hover">
<td><b>Tanggal</td>
<td><?php echo (set_value('tgl'))?
set_value('tgl'):$xorderpro['tgl'];?>
</td> 
</tr>
<tr>
<td><b>Pemesan</td>
<td><?php echo set_value('pemesan')?set_value('pemesan'):$xorderpro['pemesan'];?>
</td>
</tr>
<tr>
<td><b>Email</td>
<td><?php echo set_value('email')?set_value('email'):$xorderpro['email'];?>
</td>
</tr>
<tr>
<td><b>Telpon</td>
<td><?php echo set_value('telp')?set_value('telp'):$xorderpro['telp'];?>
</td>
</tr>
<tr>
<td><b>Company</td>
<td><?php echo set_value('company')?set_value('company'):$xorderpro['company'];?>
</td>
</tr>
<tr>
<td><b>Software</td>
<td><?php echo set_value('id_software')?set_value('id_software'):$xorderpro['softwarenya'];?>
</td>
</tr>
<tr>
<td><b>Request</td>
<td><?php echo set_value('request')?set_value('request'):$xorderpro['request'];?>
</td>
</tr>
<tr>
<td><b>Ket</td>
<td><?php echo set_value('ket')?set_value('ket'):$xorderpro['ket'];?>
</td>
</tr>
<tr>
<td><b>Status</td>
<td><?php echo set_value('id_status')?set_value('id_status'):$xorderpro['statusnya'];?>
</td>
</tr>
</table>
		</div>
	</div>
	</div>
</div>