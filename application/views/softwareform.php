<html lang="en">
<head>
	<meta charset="utf-8">
	</head>
<body>
<center><h3 style="margin-left:25px;">Trouble SOFTWARE</h3></center>
<form class="form-horizontal" method = "post" action="<?php echo site_url("home/addsoft");?>">

<div class="form-group">
<input name="pemesan" type="text"  class="form-control pup" placeholder="Pemesan" maxlength="40" required=""/>

<input  name="email" type="email"  class="form-control pup" placeholder="Email" maxlength="40" value="" required=""/>

<input name="telp" type="text" placeholder="Contact Person" value="" class="form-control pup" required=""/>
		
<input name="company" type="text" placeholder="Nama Perusahaan" value="" class="form-control pup" required=""/>

<select class="form-control pup" name="id_software">
<?php foreach ($software as $f) {
	if ($xorderpro['id_software'] == $f->id_software)
	{ ?>
<option value="<?php echo $f->id_software;?>" selected><?php echo $f->nama;?></option>
<?php } else { ?>
<option value="<?php echo $f->id_software;?>"><?php echo $f->nama;?></option>
<?php }}?>
</select>

<textarea name="request" placeholder="Request" type="text" value="" class="form-control pup" required=""></textarea>

<textarea name="ket" type="text" placeholder="Keterangan" value="" class="form-control pup" required=""></textarea>

<div hidden class="form-group">
<select  class="form-control" name="id_status">
<?php foreach ($status as $s){
	echo "<option value='".$s->id_status."'>".$s->nama."</option>";
}
?>
</select>
</div>
  


<div hidden class="form-group">
<input  type="checkbox" class="form-control" name="terbaca"/>
</div>
<tr><td>
<button type="submit" class="btn btn-small btn-primary"/>Submit</button></td>
</tr>
<tr><td>
<input type="reset" class="btn btn-small" value="Reset"></td>
</tr>
</div>
</form>
</body>
<style>
.pup {
width:500px;
height:40px;
margin-left:35px;
margin-bottom:10px;
}
button {
margin-left:300px;
margin-top:0px;
}
.datepicker {z-index: 7000;}
</style>
</html>
