<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Order</h3>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
</tr>
<td>
<input type="hidden" name="id" value="<?php echo (isset($orders['id']))?$orders['id']:'';?>"/>
</td>
<tr>
<td valign='top'>Pemesan</td>
<td><?php echo (set_value('pemesan'))?set_value('pemesan'):$orders['pemesan'];?></td>
</tr>
<tr>
<td valign='top'>Email</td>
<td><?php echo (set_value('email'))?set_value('email'):$orders['email'];?></td>
</tr>
<tr>
<td valign='top'>Tanggal</td>
<td><?php echo (set_value('tgl'))? set_value('tgl'):$orders['tgl'];?></td>
</tr>
<tr>
<td valign='top'>Telepon</td>
<td><?php echo (set_value('telp'))?set_value('telp'):$orders['telp'];?></td>
</tr>
<tr>
<td valign='top'>Perusahaan</td>
<td><?php echo (set_value('company'))?set_value('company'):$orders['company'];?></td>
</tr>
<tr>
<td valign='top'>Divisi</td>
<td><?php echo (set_value('divisi'))?set_value('divisi'):$orders['divisi'];?></td>
</tr>
<tr>
<td valign='top'>Jenis WO</td>
<td><?php echo (set_value('ref_jeniswo'))?set_value('ref_jeniswo'):$orders['jeniswonya'];?></td>
</tr>
<tr>
<td valign='top'>Keluhan</td>
<td><?php echo (set_value('keluhan'))?set_value('keluhan'):$orders['keluhan'];?></td>
</tr>
<tr>
<td valign='top'>Status</td>
<td><?php echo (set_value('ref_status'))?set_value('ref_status'):$orders['statusnya'];?></td>
</tr>
<tr>
<td><input type="checkbox" name="read" checked hidden />
</tr>
</table>
		</div>
	</div>
	</div>
</div>