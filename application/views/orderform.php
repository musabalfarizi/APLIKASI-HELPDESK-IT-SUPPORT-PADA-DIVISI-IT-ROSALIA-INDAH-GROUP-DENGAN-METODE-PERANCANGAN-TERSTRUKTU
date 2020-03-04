<html lang="en">
<head>
	<meta charset="utf-8">
	</head>
<body>
<center><h3 style="margin-left:25px;">Trouble HARDWARE</h3></center>
<form class="form-horizontal" method = "post" action="<?php echo site_url("home/add");?>">
<div class="form-group">
<tr>
<td><input type="text" name="pemesan" value="" class="form-control pup" placeholder="Pemesan" required=""/></td>
</tr><tr>

<td><input placeholder="Email" name="email" class="form-control pup" type="email" required=""></td>
</tr><tr>

<td><input type="text" name="telp" value="" class="form-control pup" placeholder="Telp" required=""/></td>
</tr><tr>

<td><input type="text" name="company" value="" class="form-control pup" placeholder="Nama Perusahaan" required=""/></td>
</tr><tr>

<td><input type="text" name="divisi" value="" class="form-control pup" placeholder="Divisi" required=""/></td>
</tr>
<tr>
<td><select hidden="yes" name="id_jeniswo" id="id_jeniswo" required="">
<?php foreach ($jeniswo as $wo){ echo 
"<option value='".$wo->id_jeniswo."'>".$wo->nama."</option>";}?>
</select></td>
</tr><tr>

<td><textarea name="keluhan" class="form-control pup" placeholder="Keluhan" required=""></textarea></td>
</tr><tr>

<td><select hidden="yes" name="id_status" id="id_status" required="">
<?php foreach ($status as $sts){ 
echo 
"<option value='".$sts->id_status."'>".$sts->nama."</option>";}?>
</select></td>

<input type="checkbox" name="read" hidden />

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
