<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Update User</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<tr>
<td>ID</td>
<td><input type="text" name="id_user" disabled="disable" class="text" value="<?php echo (isset($tuser['id_user']))?$tuser['id_user']:'';?>"/></td>
<input type="hidden" name="id_user" value="<?php echo (isset($tuser['id_user']))?$tuser['id_user']:'';?>"/>
</tr>
<tr>
<td>Nama</td>
<td><input type="text" name="nama" class="text" value="<?php echo (set_value('nama'))?set_value('nama'):$tuser['nama']; ?>"/></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass" class="text" value=''/>
</tr>
<tr>
<td>Alamat</td>
<td><input type="text" name="alamat" class="text" value="<?php echo (set_value('alamat'))?set_value('alamat'):$tuser['alamat'];?>"/>
</tr>
<tr>
<td>Telephone</td>
<td><input type="text" name="phone" class="text" value="<?php echo (set_value('phone'))?set_value('phone'):$tuser['phone'];?>"/>
</tr>
<tr>
<tr>
<td>Aktif</td>
<td><?PHP if ($tuser['aktif'] == 't' ) { echo form_checkbox('aktif','t',set_checkbox('aktif','t',$tuser['aktif'] == TRUE));?><?php }else{?> <?php echo form_checkbox('aktif','f',set_checkbox('aktif','f',$tuser['aktif'] == false));}?>
</tr>
<td>Jenis Pengguna</td>
<td><select name='id_level'>
<?php foreach ($level as $lvl) {
	if ($tuser['id_level'] == $lvl->id_level)
	{ ?>
<option value="<?php echo $lvl->id_level;?>" selected><?php echo $lvl->nama;?></option>
<?php }else{ ?>
<option value="<?php echo $lvl->id_level; ?>"> <?php echo $lvl->nama;?> </option>
<?php }} ?>
</select>
</td>
</tr>
<tr>
<td>Keterangan</td>
<td><input type="text" name="ket" class="text" value="<?php echo (set_value('ket'))?set_value('ket'):$tuser['ket'];?>"/>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Update"td>
</tr>
<div class="btn btn-sm btn-default btn-flat pull-center">
<?php echo $link_back;?>
</div>
</div>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->