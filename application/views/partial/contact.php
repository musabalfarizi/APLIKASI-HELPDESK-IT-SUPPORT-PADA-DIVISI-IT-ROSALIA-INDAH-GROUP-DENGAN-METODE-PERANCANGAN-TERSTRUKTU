 <div id="templatemo-contact">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header head_contact">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">CONTACT US</span>
                            <hr class="team_hr team_hr_right hr_gray"/>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="templatemo-contact-map" id="">   
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0760536777298!2d110.86998070000001!3d-7.5666873999999975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17a79c294d9d%3A0xaf283eb83d5496a7!2sKantor+IT+Development+Rosalia+Indah+Group!5e0!3m2!1sen!2sid!4v1440036222128" width="750" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="clearfix"></div>
                        <i>IT Development Rosalia Indah Group, <span class="txt_orange">Palur</span> Karanganyar.</i>
                    </div>
                    <div class="col-md-4 contact_right">
                        <p>Untuk informasi lebih lanjut, hubungi.</p>
                        <p><img src="<?php base_url(); ?>assets/images/location.png" alt="icon 1" /> Ngringo Palur Karanganyar</p>
                        <p><img src="<?php base_url(); ?>assets/images/phone1.png"  alt="icon 2" /> 0882 1664 2846</p>
                        <p><img src="<?php base_url(); ?>assets/images/globe.png" alt="icon 3" /><a class="link_orange" href="#"><span class="txt_orange">www.it.rosalia-indah.com</span></a></p>
		      <form class="form-horizontal" method = "post" action="<?php echo site_url("kirim");?>" >
		      <div class="form-group">
								<input name="kode" type="hidden"/>
								<input name="tgl" type="hidden" value="<?php echo "CURRENT_TIMESTAMP" ;?>"/>
								<input hidden name="terbaca" disabled="disable" type="checkbox" value="" />
                                <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="40" required=""/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" maxlength="40" required=""/>
                            </div>
                            <div class="form-group">
                                <textarea name="pesan" class="form-control" style="height: 130px;" placeholder="Message" required=""></textarea>
								<input type="checkbox" name="terbaca" hidden />
		            </div>
                            <button type="submit" class="btn btn-orange pull-right">SEND</button>
                      </form>
		      </div> 
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /#templatemo-contact -->