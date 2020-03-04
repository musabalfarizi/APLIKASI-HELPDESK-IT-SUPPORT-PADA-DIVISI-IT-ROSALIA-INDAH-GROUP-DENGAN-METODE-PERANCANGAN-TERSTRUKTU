<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Karyawan</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<tr>
<td>NIK</td>
<td><input type="text" name="nik" value=""></td>
</tr>
<tr>
<td>Nama</td>
<td><input type="text" name="nama" value="">
</tr>
<tr>
<td>Tempat Lahir</td>
<td><input type="text" name="tempatlahir" value="">
</td>
</tr>
<tr>
<td>Tanggal Lahir</td>
<td><input type="date" name="tgllahir" value=""/></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td><input type="radio" name="kelamin" value="Pria" /> Pria
<input type="radio" name="kelamin" value="Wanita"/> Wanita
</tr>
<tr>
<td>Agama</td>
<td><select name='id_agama' id='agama'>
<option value="Pilih Agama">Pilih Agama
<?php foreach ($agama as $agm){
	echo "<option value='".$agm->id_agama."'>".$agm->nama."</option>";
}
?>
</option>
</select>
</td>
</tr>
<tr>
<td>CP</td>
<td><input type="text" name="phone" value=""/>
</tr>
<tr>
<td>Tanggal Masuk</td>
<td><input type="date" name="tglmasuk" value=""/>
</tr>
<tr>
<td>Alamat</td>
<td><input type="text" name="alamat" value=""/>
</tr>
<tr>
<td>Keterangan</td>
<td><textarea name="ket"></textarea>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Save"/></td>
</tr>

<div class="btn btn-sm btn-info btn-flat pull-left"><?php echo $link_back;?></div>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->