<h3 style="margin-left:35px;">NEW ORDER SOFTWARE</h3>

<form  align="center" method = "post" action= "<?php echo site_url("ordersof/insert");?>">

<input type="text" class="pup form-control" name="pemesan" class="text" value="" placeholder="Pemesan" required=""/>

<input type="email" name="email" class="pup form-control" value="" placeholder="Email" required=""/>

<input type="text" class="form-control pup" name="telp" class="text" value="" placeholder="Contact Person" required=""/>

<input class="form-control pup" type="text" name="company" class="text" value="" placeholder="Perusahaan"required=""/>

<select class="form-control pup" name="id_software">
<?php foreach ($software as $sf) {
	if ($xorder['id_software']== $sf->id_software) { ?>
	<option value="<?php echo $sf->id_software;?>" selected> <?php echo $sf->nama;?></option>
	<?php } else { ?>
	<option value="<?php echo $sf->id_software;?>"> <?php echo $sf->nama;?></option>
	<?php } } ?>
				</select>
<textarea class="form-control pup" type="text" name="request" class="text" value="" placeholder="Request" required=""></textarea>

<textarea class="form-control pup" type="text" name="ket" class="text" value="" placeholder="Keterangan" required=""></textarea>

<select class="form-control pup" name='id_status' id='kode'>
<?php foreach ($status as $data){
if($xorderpro['id_status']==$data->id_status){
?>
<option value="<?php echo $data->id_status; ?>" selected><?php echo $data->nama; ?></option>
                <?php }else{ ?>
                <option value="<?php echo $data->id_status; ?>"><?php echo $data->nama; ?></option>
                <?php }} ?>
				</select>

<td hidden><input type="checkbox" name="terbaca" hidden />
</td>
<button type="submit" class="btn btn-small btn-primary"/>Submit</button>
</form>
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
</style>