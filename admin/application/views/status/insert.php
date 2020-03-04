<?php echo $message;?>
<?php echo validation_errors();?>
<?php echo form_open($action);?>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">New Status</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
  
<tr>
<td>Nama</td>
<td><input type="text" name="nama" class="text"  value=""/>
</tr>
<tr>
<td>Ket</td>
<td><input type="text" name="ket" class="text"   value=""/>
</tr>

        <tfoot>
          <tr>
            <th><font size="5" align="center" class="btn btn-sm btn-default btn-flat pull-center" ><?php echo $link_back;?></font></th>
			<th><input align="center" class="btn btn-sm btn-info btn-flat pull-left" type="submit" value="Save"/></th> 
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  