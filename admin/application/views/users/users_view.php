
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">View Users</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">

<tr>
<td>ID</td>
<td><?php echo (isset($tuser['id_user']))?$tuser['id_user']:'';?></td>
</tr>
<tr>
<td>Nama</td>
<td><?php echo (set_value('nama'))?set_value('nama'):$tuser['nama'];?>
</tr>
<tr>
<td>Alamat</td>
<td><?php echo (set_value('alamat'))?set_value('alamat'):$tuser['alamat'];?>
</tr>
<tr>
<td>Telephone</td>
<td><?php echo (set_value('phone'))?set_value('phone'):$tuser['phone'];?>
</tr>
<tr>
<td>Aktif</td>
<td><?PHP if ($tuser['aktif'] == 't' ) { echo form_checkbox('aktif','t',set_checkbox('aktif','t',$tuser['aktif'] == TRUE));?><?php }else{?> <?php echo form_checkbox('aktif','f',set_checkbox('aktif','f',$tuser['aktif'] == false));}?></td>
</tr>
<tr>
<td>Jenis Pengguna</td>
<td><select disabled name='id_level' >
<?php foreach ($level as $lvl) {
	if ($tuser['id_level'] == $lvl->kode)
	{ ?>
<option value="<?php echo $lvl->kode;?>" selected><?php echo $lvl->nama;?></option>

<?php }else{ ?>

<option value="<?php echo $lvl->kode; ?>"> <?php echo $lvl->nama;?> </option>
<?php }} ?>
</select>
</td>
</tr>
<tr>
<td>Keterangan</td>
<td><?php echo (set_value('ket'))?set_value('ket'):$tuser['ket'];?>
</tr>
<a href="<?php echo site_url('dashboard');?>" class="btn btn-sm btn-info btn-flat pull-left">Kembali</a>
</div>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->
