
<?php 
$baris = $user->row();
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">List</div>
<form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>crud/update/<?php echo $baris->id_user; ?>">
        
        <div class="form-group">
            <label for="nama_user">Nama User</label>
            <input type="text" class="form-control" name="nama_user" value="<?php echo $baris->nama_user; ?>" placeholder="Enter Nama User">
        </div>
        <span class="help-block"> <?php echo form_error('nama_user'); ?> </span>
        
        <div class="form-group">
            <label for="usergroup">User Group</label>
            <select class="form-control" name="usergroup">
                <option value="">Pilih user Group</option>
                <?php foreach ($usergroup->result() as $valusergroup) { 
                if($baris->id_usergroup==$valusergroup->id_usergroup){
                 ?>
                <option value="<?php echo $valusergroup->id_usergroup; ?>" selected><?php echo $valusergroup->usergroup; ?></option>
                <?php }else{ ?>
                <option value="<?php echo $valusergroup->id_usergroup; ?>"><?php echo $valusergroup->usergroup; ?></option>
                <?php }} ?>
            </select>
        </div>
        <span class="help-block"> <?php echo form_error('usergroup'); ?> </span>
        
        <button type="submit" class="btn btn-default">Next</button>
</form>
</div>  