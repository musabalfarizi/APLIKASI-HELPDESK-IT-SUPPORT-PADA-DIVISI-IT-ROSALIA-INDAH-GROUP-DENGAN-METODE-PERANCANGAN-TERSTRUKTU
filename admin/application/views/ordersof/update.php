
<?php echo validation_errors();?>
<?php echo form_open($action);?>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h2 class="box-title">Update Order</h2>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
	  <tr>
<td hidden><input class="form-control" type="text" name="id_orderpro"  class="text" value="<?php echo (isset($xorderpro['id_orderpro']))?$xorderpro['id_orderpro']:'';?>"/></td>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Tanggal</font></td>
<td><input class="form-control" type="text" disabled  name="tgl" class="text" value="<?php echo (set_value('tgl'))?
set_value('tgl'):$xorderpro['tgl'];?>"/>

</td> 
</tr>
<tr>
<td width="30%"><font size="4">Pemesan</font></td>
<td><input type="text" class="form-control" name="pemesan" class="text" value="<?php echo set_value('pemesan')?set_value('pemesan'):$xorderpro['pemesan'];?>"/>
<?php echo form_error('pemesan');?>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Email</font></td>
<td><input type="text" name="email" class="form-control" value="<?php echo set_value('email')?set_value('email'):$xorderpro['email'];?>"/>
<?php echo form_error('email');?>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Telpon</font></td>
<td><input type="text" class="form-control" name="telp" class="text" value="<?php echo set_value('telp')?set_value('telp'):$xorderpro['telp'];?>"/>
<?php echo form_error('telp');?>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Company</font></td>
<td><input class="form-control" type="text" name="company" class="text" value="<?php echo set_value('company')?set_value('company'):$xorderpro['company'];?>"/>
<?php echo form_error('company');?>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Software</font></td>
<td><select class="form-control" name="id_software">
<?php foreach ($software as $sf) {
	if ($xorderpro['id_software']== $sf->id_software) { ?>
	<option value="<?php echo $sf->id_software;?>" selected> <?php echo $sf->nama;?></option>
	<?php } else { ?>
	<option value="<?php echo $sf->id_software;?>"> <?php echo $sf->nama;?></option>
	<?php } } ?>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Request</font></td>
<td><input class="form-control" type="text" name="request" class="text" value="<?php echo set_value('request')?set_value('request'):$xorderpro['request'];?>"/>
<?php echo form_error('request');?>
</td>
</tr>
<tr>
<td width="30%"><font size="4">Ket</font></td>
<td><input class="form-control" type="text" name="ket" class="text" value="<?php echo set_value('ket')?set_value('ket'):$xorderpro['ket'];?>"/>
<?php echo form_error('telp');?>
</td>
</tr>
<tr>
<td><font  size="4">id_status<font></td>
<td><select class="form-control" name='id_status' id='id_status'>
<?php foreach ($status as $data){
if($xorderpro['id_status']==$data->id_status){
?>
<option value="<?php echo $data->id_status; ?>" selected><?php echo $data->nama; ?></option>
         <?php }else{ ?>
         <option value="<?php echo $data->id_status; ?>"><?php echo $data->nama; ?></option>
                <?php }} ?>
				</select>
</td>
</tr>
<tr>
<td hidden><?php if ($xorderpro['terbaca'] == 't') { echo form_checkbox('terbaca','t', set_checkbox('terbaca','t', $xorderpro['terbaca']==TRUE));?><?php }else {?> <?php echo form_checkbox ('terbaca','f', set_checkbox('terbaca', 'f', $xorderpro['terbaca'] ==FALSE));}?>
</td>
</tr>
<tr>
<th><font align="right" class="btn btn-sm btn-default btn-flat pull-center" ><?php echo $link_back;?></font></th>
<td><input  type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Save"/></td>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->