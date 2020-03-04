
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><font color="blue" size="5">Update Agama</font></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<tr>
<td>ID</td>
<td><input type="text" name="id_agama" disabled="disable" class="text" value="<?php echo (isset($agama['id_agama']))?$agama['id_agama']:'';?>"/></td>
<input type="hidden" name="id_agama" value="<?php echo (isset($agama['id_agama']))?$agama['id_agama']:'';?>"/>
</tr>

<tr>
<td>Nama</td>
<td><input type="text" name="nama" class="text" value="<?php echo (set_value('nama'))?set_value('nama'):$agama['nama']; ?>"/></td>
</tr>
<tr>
<td>Keterangan</td>
<td><input type="text" name="ket" class="text" value="<?php echo (set_value('ket'))?set_value('ket'):$agama['ket'];?>"/>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Update">
</td>
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