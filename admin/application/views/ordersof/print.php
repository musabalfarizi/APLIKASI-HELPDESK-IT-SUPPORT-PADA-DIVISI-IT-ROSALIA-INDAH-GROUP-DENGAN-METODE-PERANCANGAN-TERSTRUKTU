<script type="text/javascript">
  $(function () {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": false,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": false,
      "bInfo": falsee,
      "bAutoWidth": false
    });
  });
</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
$clrCounter = 0; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan order</title>

</head>
<body style="font:13px Lucida Grande, Lucida Sans Unicode, Helvetica, Arial, sans-serif">

	<?php //if ($gud == "GX000") {echo "<caption>Laporan stok semua gudang</caption>"; }else{echo "<caption>Laporan stok gudang". $det->namagud. "</caption>"; }
		?>
		 <div class="box-header">
      <h3 class="box-title" align="center">laporan order</h3>
    </div><!-- /.box-header -->
<table id="example2" class="table table-bordered table-hover" >
	
	
     <thead>
            <tr>
			  <th align="justify" scope="col" width="30">Tanggal</th>
            <th align="justify" scope="col" width="30">Pemesan</th>
			<th align="justify" scope="col" width="20px">Company</th>
			<th align="justify" scope="col" width="20px">Software</th>
			<th align="justify" scope="col" width="80px">Request</th>
			<th align="justify" scope="col" width="50px">Ket</th>
			<th align="justify" scope="col" width="20px">Status</th>
          </tr>
        </thead>
    
    <tbody>

	<?php foreach ($orderpro as $sto) { ?>
    	<tr class="<?php echo ($clrCounter++ % 2 == 0 ? 'whiteBackground' : 'whiteBackground'); ?>">
        <td align="justify" scope="row"><?php echo $sto->tgl;?></td>
            <td align="justify" scope="row"><?php echo $sto->pemesan;?></td>
            <td align="justify" scope="row"><?php echo $sto->company;?></td>
			<td align="justify" scope="row"><?php echo $sto->nama_software;?></td>
            <td align="justify" scope="row"><?php echo $sto->request;?></td>
			<td align="justify" scope="row"><?php echo $sto->ket;?></td>
			<td align="justify" scope="row"><?php echo $sto->nama_status;?></td>
        </tr>
	<?php } ?>
    </tbody>
	

	<p class="btn btn-sm  glyphicon glyphicon-cloud-download btn-flat pull-right"><?php echo $link_download;?></p>
	<p class="btn btn-sm glyphicon glyphicon-arrow-left"><?php echo $link_back;?></p>

</table>

</body>
<style>
.whiteBackground { background: #fff; }
.whiteBackground { background: #fff; }
</style>
</html>