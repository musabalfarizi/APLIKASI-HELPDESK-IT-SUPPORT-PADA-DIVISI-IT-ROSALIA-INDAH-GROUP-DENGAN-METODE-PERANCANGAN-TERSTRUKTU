
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><font color="blue" size="4">Update Karyawan</font></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<tr>
<td>ID</td>
<td><input type="text" name="id_karyawan" disabled="disable" class="text" value="<?php echo (isset($mkaryawan['id_karyawan']))?$mkaryawan['id_karyawan']:'';?>"/></td>
<input type="hidden" name="id_karyawan" value="<?php echo (isset($mkaryawan['id_karyawan']))?$mkaryawan['id_karyawan']:'';?>"/>
</tr>
<tr>
<td>NIK</td>
<td><input type="text" name="nik" value="<?php echo (set_value('nik'))?set_value('nik'):$mkaryawan['nik']; ?>"></td>
</tr>
<tr>
<td>Nama</td>
<td><input type="text" name="nama" value="<?php echo (set_value('nama'))?set_value('nama'):$mkaryawan['nama']; ?>">
</tr>
<tr>
<td>Tempat Lahir</td>
<td><input type="text" name="tempatlahir" value="<?php echo (set_value('tempatlahir'))?set_value('tempatlahir'):$mkaryawan['tempatlahir']; ?>">
</td>
</tr>
<tr>
<td>Tanggal Lahir</td>
<td><input type="date" name="tgllahir" value="<?php echo (set_value('tgllahir'))?set_value('tgllahir'):$mkaryawan['tgllahir']; ?>"/></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td><input type="radio" name="kelamin" value="Pria" <?php echo ($mkaryawan['kelamin'] =='Pria')?'checked':'';?>/>Pria
<input type="radio" name="kelamin" value="Wanita" <?php echo ($mkaryawan['kelamin'] =='Wanita')?'checked':'';?>/>Wanita
</td>
</tr>
<tr>
<td>Agama</td>
<td><select name='id_agama'>
<?php foreach ($agama as $agm) {
	if ($mkaryawan['id_agama'] == $agm->kode)
	{ ?>
<option value="<?php echo $agm->id_agama;?>" selected><?php echo $agm->nama;?></option>

<?php }else{ ?>

<option value="<?php echo $agm->id_agama; ?>"> <?php echo $agm->nama;?> </option>
<?php }} ?>
</select>
</td>
</tr>
<tr>
<td>Phone</td>
<td><input type="text" name="phone" value="<?php echo (set_value('phone'))?set_value('phone'):$mkaryawan['phone']; ?>">
</tr>
<tr>
<td>Tanggal Masuk</td>
<td><input type="date" name="tglmasuk" value="<?php echo (set_value('tglmasuk'))?set_value('tglmasuk'):$mkaryawan['tglmasuk']; ?>"/></td>
</tr>
<tr>
<td>Alamat</td>
<td><input type="text" name="alamat" value="<?php echo (set_value('alamat'))?set_value('alamat'):$mkaryawan['alamat']; ?>">
<tr>
<td>Keterangan</td>
<td><input type="text" name="ket" value="<?php echo (set_value('ket'))?set_value('ket'):$mkaryawan['ket']; ?>">
</tr>
</tr>
<input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Update"/>
<font class="btn btn-sm btn-default btn-flat pull-center"><?php echo $link_back;?></font>

      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->
