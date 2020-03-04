
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Update Jeniswo</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<tr>
<input type="hidden" name="id" value="<?php echo (isset($jeniswo['id']))?$jeniswo['id']:'';?>"/>
</tr>

<tr>
<td>Nama</td>
<td><input type="text" name="nama" value="<?php echo (set_value('nama'))?set_value('nama'):$jeniswo['nama']; ?>">
</tr>
<tr>
<td>Keterangan</td>
<td><textarea name="ket" ><?php echo (set_value('ket'))?set_value('ket'):$jeniswo['ket']; ?></textarea>
</tr>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Update"/></td>
</tr>

<div class="btn btn-sm btn-info btn-flat pull-left"><?php echo $link_back;?></div>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->
