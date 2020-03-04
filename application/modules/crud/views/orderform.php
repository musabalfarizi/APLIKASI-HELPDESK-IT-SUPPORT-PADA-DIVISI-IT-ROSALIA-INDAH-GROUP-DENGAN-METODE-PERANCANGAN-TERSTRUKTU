<html>
<head>
<title></title>
</head>
<body>
<?php echo $judul;?>
<?php echo validation_errors();?>
<?php echo form_open($action);?>
<table>
<tr>
<td>Tanggal Penulisan</td>
<td><input type='text' name='tgl' value=''></td>
</tr><tr>
<td>Pemesan</td>
<td><input type='text' name='pemesan' placeholder='Pemesan' value=''></td>
</tr><tr>
<td>Email</td>
<td><input type='text' name='email' value=''></td>
</tr><tr>
<td>Telepon</td>
<td><input type='text' name='telp' value=''></td>
</tr><tr>
<td>Perusahaan</td>
<td><input type='text' name='company' value=''></td>
</tr><tr>
<td>Divisi</td>
<td><input type='text' name='divisi' value=''></td>
</tr><tr>
<td>Jenis WO</td>
<td><select name="ref_jeniswo">
<option value="">A1</option>
<option value="">A2</option>
<option value="">B1</option>
<option value="">B2</option>
<option value="">C1</option>
</select></td>
</tr><tr>
<td>Keluhan</td>
<td><input type='text' name='keluhan' value=''></td>
</tr><tr>
<td>Status Pekerjaan</td>
<td><select name="ref_status" >
<option value="">Ongoing</option>
<option value="">Postponed</option>
<option value="">Finish</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="save"/></td>
</tr>
</table></form>
<?php $close;?>
</body>
</html>