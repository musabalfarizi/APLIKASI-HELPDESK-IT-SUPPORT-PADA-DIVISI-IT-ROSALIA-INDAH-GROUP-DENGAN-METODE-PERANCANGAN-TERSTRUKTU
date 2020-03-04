<?php echo validation_errors();?>
<?php echo form_open($action);?>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h2 class="box-title">Update Status</h2>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
 

<td hidden><input class="form-control" class="form-group" type="text" name="id_software" class="text" value="<?php echo (isset($software['id_software']))?$software['id_software']:'';?>"/></td>


<tr>
<td>Nama</td>
<td><input class="form-control" type="text" name="nama" class="text" value="<?php echo set_value('nama')?set_value('nama'):$software['nama'];?>"/>

</tr>
<tr>
<td>Ket</td>
<td><input class="form-control" type="text" name="ket" class="text" value="<?php echo set_value('ket')?set_value('ket'):$software['ket'];?>"/>

</tr>
<tr>
<th><font align="right" class="btn btn-sm btn-default btn-flat pull-center" ><?php echo $link_back;?></font></th>
<td><input  type="submit" class="btn btn-sm btn-info btn-flat pull-left" value="Save"/></td>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  