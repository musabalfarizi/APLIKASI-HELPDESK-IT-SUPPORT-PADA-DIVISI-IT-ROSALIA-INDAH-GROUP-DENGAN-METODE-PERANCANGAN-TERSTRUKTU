<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true
    });
  });
</script>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">DATA USER</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            
            
            <th>Nama</th>
            <th>Alamat</th>
            <th>Phone</th>
			<th>Jenis Pengguna</th>
			<th>Keterangan</th>
			<th>Aktif</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
		<?php foreach ($datas as $u) {?>
          <tr>
			
			
			<td><?php echo $u->nama;?></td>
			<td><?php echo $u->alamat;?></td>
			<td><?php echo $u->phone;?></td>
			<td><?php echo $u->jenis_pengguna;?></td>
			<td><?php echo $u->ket;?></td>
			<td><?PHP if ($u->aktif == 't' ) { echo form_checkbox('aktif','t',set_checkbox('aktif','t',$u->aktif == TRUE));?><?php }else{?> <?php echo form_checkbox('aktif','f',set_checkbox('aktif','f',$u->aktif == false));}?>
			<td><div><?php echo anchor('users/update/'.$u->id_user,'<img src="'.base_url('assets/edit.png').'" width="18" length="18" />');?>
	
			<?php echo anchor('users/delete/'.$u->id_user,
			'<img src="'.base_url('assets/trash.png').'" width="18" length="18" />',array('class'=>'delete',
			'onclick'=>"return confirm(
			'Apakah Anda yakin ingin menghapus user ini?')"));?></div> 
			</td>
          </tr><?php }?>
        </tbody>
        <tfoot>
          <tr>
		  <a href="<?=base_url('index.php/users/add');?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah data</a>
			
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->
<?php

/* 
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

