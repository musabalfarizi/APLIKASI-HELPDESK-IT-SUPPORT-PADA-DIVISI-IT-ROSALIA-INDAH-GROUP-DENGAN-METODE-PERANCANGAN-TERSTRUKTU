<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">List</div>
  
<table id="myTable" class="table table-striped table-hover tablesorter" cellspacing="0"> 
                <?php 
                $per_page = abs($this->input->get('per_page'));
                $no = $per_page + 1;
                if(count($user->result()) > 0) {
                ?> 
                <thead> 
                <form name="cari" action="<?php echo site_url() ?>crud" method="GET">
                    <tr>
                        <th width="33"><div align="center">#</div></th> 
                        <th>
                           <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
                        </th> 
                        <th>
                           <select name="usergroup" class="form-control">
                            <option value="">Pilih User Group</option>
                            <?php foreach ($usergroup->result() as $valusergroup) { ?>
                            <option value="<?php echo $valusergroup->usergroup; ?>"><?php echo $valusergroup->usergroup; ?></option>
                            <?php } ?>
                           </select>
                        </th> 
                        <th width="60" colspan="2">
                            <div class="btn-group">
                                <button class="btn btn-success" type="submit"><i class="icon-search"></i></button>
                                <a href="<?php echo site_url() ?>crud" class="btn btn-success"><i class="icon-refresh"></i></a>
                                <a href="<?php echo site_url() ?>crud/add" class="btn btn-success"><i class="icon-plus"></i></a>
                            </div>
                        </th> 
                    </tr>
                </form> 
                </thead>
                <thead> 
                    <tr>
                        <th width="33"><div align="center">No</div></th> 
                        <th><div align="left">Nama </div></th> 
                        <th><div align="left">User Group </div></th> 
                        <th colspan="2"><div align="center">Aksi</div></th> 
                    </tr>
                </thead> 
                <tbody> 
                    <?php
                    foreach($user->result() as $baris){
                    ?>
                    <tr>
                      <td>
                          <?php echo $no; ?>
                      </td>           
                      <td>
                          <?php echo $baris->nama_user;?>
                      </td>
                      <td>
                          <?php echo $baris->usergroup;?>
                      </td>
                      <td width="65"><a href="<?php echo site_url() ?>crud/update/<?php echo $baris->id_user;?>" class="btn btn-primary"><i class="icon-edit icon-white"></i></a></td>
                      <td width="65"><a href="<?php echo site_url() ?>crud/delete/<?php echo $baris->id_user;?>" class="btn btn-danger" onClick='return confirm("Anda yakin ingin menghapus data ini?")'><i class="icon-remove icon-white"></i></a></td>
                    </tr> 
                    <?php
                    $no++;
                    }
                    ?>
                </tbody> 
                <tfoot>
                    <tr>
                        <td colspan="6">
                        <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
                        </td>
                        <?php
                        } else {
                        ?>
                        <table id="myTable" class="table table-striped table-hover tablesorter" cellspacing="0"> 
                        <thead> 
                        <form name="cari" action="<?php echo site_url() ?>crud" method="GET">
                            <tr>
                                <th width="33"><div align="center">#</div></th> 
                                <th>
                                   <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
                                </th> 
                                <th>
                                   <select name="usergroup" class="form-control">
                                    <option value="">Pilih User Group</option>
                                    <?php foreach ($usergroup->result() as $valusergroup) { ?>
                                    <option value="<?php echo $valusergroup->usergroup; ?>"><?php echo $valusergroup->usergroup; ?></option>
                                    <?php } ?>
                                   </select>
                                </th> 
                               <th width="12S0" colspan="2">
                                    <div class="btn-group">
                                        <button class="btn btn-success" type="submit"><i class="icon-search"></i></button>
                                        <a href="<?php echo site_url() ?>crud" class="btn btn-success"><i class="icon-refresh"></i></a>
                                        <a href="<?php echo site_url() ?>crud/add" class="btn btn-success"><i class="icon-plus"></i></a>
                                    </div>
                                </th> 
                        </tr>
                        </form> 
                        </thead>
                        <thead> 
                            <tr>
                                <th width="33"><div align="center">No</div></th> 
                                <th><div align="left">Nama </div></th> 
                                <th><div align="left">User Group </div></th> 
                                <th colspan="2"><div align="center">Aksi</div></th> 
                            </tr>
                        </thead> 
                        <tbody> 
                        <td colspan="6">
                          Data Tidak Tersedia
                        </td>    
                        </tbody>
                        </table>    
                        <?php
                        }
                        ?>
                     </tr>
                </tfoot>
</table>
</div>  