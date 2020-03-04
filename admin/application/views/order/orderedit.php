<html>
<head>
<title></title>
</head>
<style>
.pup {
width:430px;
height:40px;
margin-left:35px;
margin-bottom:10px;
}
</style>
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h2 class="box-title">Update Order</h2>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<input type="hidden" name="id_order" value="<?php echo $order->id_order;?>" />
<input type="text" name="kode" disabled="yes" hidden value="<?php echo $order->kode;?>" />
<tr>
<td>Tanggal</td>
<td><input class="form-control pup" type="text" name="tgl" value="<?php echo $order->tgl;?>" disabled /></td>
</tr><tr>
<td>Pemesan</td>
<td><input class="form-control pup" type="text" name="pemesan" value="<?php echo $order->pemesan;?>"/></td>
</tr><tr>
<td>Email</td>
<td><textarea class="form-control pup" name="email"><?php echo $order->email;?></textarea></td>
</tr><tr>
<td>Telepon</td>
<td><input class="form-control pup" type="text" name="telp" value="<?php echo $order->telp;?>"/></td>
</tr><tr>
<td>Perusahaan</td>
<td><input class="form-control pup" type="text" name="company" value="<?php echo $order->company;?>"/></td>
</tr><tr>
<td>Divisi</td>
<td><input class="form-control pup" type="text" name="divisi" value="<?php echo $order->divisi;?>"/></td>
</tr><tr>
<td>Jenis WO</td>
<td><select class="form-control pup" name="id_jeniswo">
<?php foreach ($wo as $wow){
if ($order->id_jeniswo == $wow->id_jeniswo)
	{?>
	<option selected value="<?php echo $wow->id_jeniswo;?>"><?php echo $wow->nama;?></option>
	<?php }else{ ?>
<option value="<?php echo $wow->id_jeniswo;?>"><?php echo $wow->nama;?></option>
<?php }} ?>
</select></td>
</tr><tr>
<td>Keluhan</td>
<td><textarea class="form-control pup" name="keluhan"><?php echo $order->keluhan;?></textarea></td>
</tr><tr>
<td>Status</td>
<td><select class="form-control pup" name="id_status">
<?php foreach ($stat as $status) { 
if ($order->id_status == $status->id_status)
	{?>
	<option selected value="<?php echo $status->id_status;?>"><?php echo $status->nama;?></option>
	<?php }else{ ?>
<option value="<?php echo $status->id_status;?>"><?php echo $status->nama;?></option>
<?php }} ?>
</select>
</td>
</tr>
<th><a class="btn btn-sm btn-default btn-flat pull-center" href="<?php echo site_url('order');?>">Back to list</a></th>
<th><input class="btn btn-sm btn-info btn-flat pull-left" type="submit" value="Save"/></th>
</table>
</form>
