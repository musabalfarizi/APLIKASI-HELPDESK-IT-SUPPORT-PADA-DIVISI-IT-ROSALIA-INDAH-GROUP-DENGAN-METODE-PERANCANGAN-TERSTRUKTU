<!-- Main row -->
<div class="row">
    <div class="col-md-8">
  <!-- TABLE: LATEST ORDER Hard  -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Latest Order Hardware</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
            <tr>
              <th>Pemesan</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Perusahaan</th>
              <th>Divisi</th>
            </tr>
          </thead>
          <tbody>
		  <?php foreach ($hardware as $oh) {?>
            <tr>
		  <td><a href="<?php echo site_url('order/read/'.$oh->id_order);?>"><?php echo $oh->pemesan;?></a></td>
              <td><?php echo $oh->email;?></td>
              <td><span class="label label-success"></span><?php echo $oh->telp;?></td>
              <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $oh->company;?></div></td>
			  <td><?php echo $oh->divisi;?></td>
            <?php }?></tr>
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
      
      <a href="<?php echo site_url('order');?>" class="btn btn-sm btn-flat pull-right">All Order Hardware</a>
	  <a href="<?php echo site_url('ordersof');?>" class="btn btn-sm  btn-flat pull-right">All Order Software</a>
    </div><!-- /.box-footer -->
  </div><!-- /.box -->
  <!-- TABLE: LATEST ORDER SOFTWARE -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Latest Order Software</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
            <tr>
              <th>Pemesan</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Perusahaan</th>
            </tr>
          </thead>
          <tbody>
		  <?php foreach ($xorderpro as $os) {?>
            <tr>
		  <td><a href="<?php echo site_url('ordersof/view/'.$os->id_orderpro);?>"><?php echo $os->pemesan;?></a></td>
              <td><?php echo $os->email;?></td>
              <td><span class="label label-success"></span><?php echo $os->telp;?></td>
              <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $os->company;?></div></td>
            <?php }?></tr>
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
     
      <a href="<?php echo site_url('order');?>" class="btn btn-sm btn-flat pull-right">All Order Hardware</a>
	  <a href="<?php echo site_url('ordersof');?>" class="btn btn-sm  btn-flat pull-right">All Order Software</a>
    </div><!-- /.box-footer -->
  </div><!-- /.box -->
</div><!-- /.col -->
    <div class="col-md-4">
      <!-- PRODUCT LIST -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Unread Messages</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <ul class="products-list product-list-in-box">
		  <?php foreach ($kontaks as $k) { ?>
            <li class="item">
              <div class="product-img">
                <img src="<?=base_url();?>assets/dist/img/default-50x50.gif" alt="Product Image"/>
              </div>
              <div class="product-info">
                <a href="<?php echo site_url('contact/view/'.$k->id_contact);?>" class="product-title"><?php echo $k->nama;?> <span class="label badge pull-right"><?php echo $k->tanggal;?></span></a>
                <span class="product-description">
                  <?php echo $k->email;?>
                </span>
              </div>
            </li><!-- /.item --><?php } ?>
          </ul>
        </div><!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="<?php echo site_url('contact');?>" class="uppercase">View All Contact</a>
        </div><!-- /.box-footer -->
      </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->