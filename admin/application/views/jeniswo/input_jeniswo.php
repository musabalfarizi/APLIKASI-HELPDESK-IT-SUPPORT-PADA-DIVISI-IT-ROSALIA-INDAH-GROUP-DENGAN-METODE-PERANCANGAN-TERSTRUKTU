<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">New Jenis WO</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<tr>
<input type="hidden" name="id_jeniswo" value="<?php echo (isset($jeniswo['id_jeniswo']))?$jeniswo['id_jeniswo']:'';?>"/>
</tr>

<tr>
<td>Nama</td>
<td><input type="text" name="nama" class="text" value=""/>
</tr>
<tr>
<td>Keterangan</td>
<td><textarea name="ket" ></textarea>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Save"/></td>
</tr>
<div class="btn btn-sm btn-default btn-flat pull-center"><?php echo $link_back;?></div></div>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->