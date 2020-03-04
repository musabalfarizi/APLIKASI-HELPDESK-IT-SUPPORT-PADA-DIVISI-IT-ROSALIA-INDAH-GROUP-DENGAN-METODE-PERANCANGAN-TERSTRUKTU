<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="<?php echo base_url();?>/assets/images/itdev.ico" type="image/icon">
    <head>
        <title>IT Development</title>
        <meta name="keywords" content="" />
		<meta name="description" content="" />
<!-- 
Urbanic Template 
http://www.templatemo.com/preview/templatemo_395_urbanic 
-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel='stylesheet' type='text/css'>
		
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url();?>assets/js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url();?>assets/css/templatemo_style.css"  rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>

        <div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                            <img src="<?php echo base_url();?>assets/images/phone.png" alt="phone"/>0882 1664 2846 <?php echo form_error('nama');?></div>
                    <div id="email" class="pull-right">
                            <img src="<?php echo base_url();?>assets/images/email.png" alt="email"/>
                            it@rosalia-indah.co.id
                    </div>
                </div>
            </div>
        </div>
        <div class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
								<span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a href="#" class="navbar-brand"><img src="<?php echo base_url();?>assets/images/templatemo_logo.png" alt="Urbanic template" title="Urbanic Template" /></a>
                        </div>
                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li class="active"><a href="#templatemo-top">HOME</a></li>
								<li><a href="#templatemo-welcome">SERVICES</a></li>
                                <li><a href="#templatemo-about">ABOUT</a></li>
                                <li><a href="#templatemo-portfolio">PORTFOLIO</a></li>
                                <li><a href="#templatemo-blog">PRODUCT</a></li>
                                <li><a href="#templatemo-contact">CONTACT</a></li>
								<li><a href="#templatemo-partners">PARTNER</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
        
        <div>
            <!-- Carousel -->
            <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#templatemo-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="1"></li>
                    <li data-target="#templatemo-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container">
                            <div class="carousel-caption">
							<?php $this->load->helper(array('form'));?>
                                <h1>IT Development</h1>
                                <p>(Rosalia Indah Group)</p>
                                <p><a data-toggle="modal" href="#myModal" class="btn btn-lg btn-green" style="margin: 20px;" role="button">Trouble Hardware </a>
									
                                <a data-toggle="modal" href="#software" class="btn btn-lg btn-orange" style="margin: 20px;" role="button">Trouble Software </a></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="container">
                                <div class="carousel-caption">
                                    <div class="col-sm-6 col-md-6">
                                    	<h1>Software Development</h1>
                                        <p>We are ready to developing software with custom system.</p>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    	<h1>Hardware &amp; Networking</h1>
                                        <p>Entrust to us for performance and used IT equipment.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="item">
                            <div class="container">
                                <div class="carousel-caption">
                                	<h1>IT Consultant</h1>
                                    <p>Contact us to get the best solutions for IT systems applied.</p>
                                    <p><a class="btn btn-lg btn-green" href="#templatemo-contact" role="button" style="margin: 20px;">Contact Us</a></p>
                                </div>
                            </div>
                        </div>
                </div>
                <a class="left carousel-control" href="#templatemo-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#templatemo-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div><!-- /#templatemo-carousel -->
        </div>
       
        <?php $this->load->view('partial/service'); ?>

        <?php $this->load->view('partial/about');?>

        <?php $this->load->view('partial/portfolio');?>

		<?php $this->load->view('partial/product');?>

		<?php $this->load->view('partial/contact');?>
		
		<?php $this->load->view('partial/partner');?>

        <div class="templatemo-tweets">
            <div class="container">
                <div class="row" style="margin-top:20px;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-1">
                                <img src="<?php base_url();?>assets/images/quote.png" alt="icon" />
                        </div>
                        <div class="col-md-7 tweet_txt" >
                                <span>Global Support for Rosalia Indah Group.</span>
                                <br/>
                                <span class="twitter_user">IT Development, RIG</span>
                        </div>
                        <div class="col-md-2">
                        </div>
                 </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <div class="templatemo-footer" >
            <div class="container">
                <div class="row">
                    <div class="text-center">

                        <div class="footer_container">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <span class="social-icon-fb"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-rss"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-dribbble"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="height30"></div>
                            <a class="btn btn-lg btn-orange" href="#" role="button" id="btn-back-to-top">Back To Top</a>
                            <div class="height10"></div>
                        </div>
                        <div class="footer_bottom_content">
                   			Copyright © 2015 <a href="#">IT Development | Rosalia Indah Group</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php base_url();?>assets/js/stickUp.min.js" type="text/javascript"></script>
        <script src="<?php base_url();?>assets/js/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
        <script src="<?php base_url();?>assets/js/templatemo_script.js" type="text/javascript"></script>
		
	
	
		<!-- templatemo 395 urbanic -->
		<style>.pop {z-index: 5000;}</style>
		<div class="modal fade pop" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">	
		<div class="modal-content">	
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<center><h3> IT Development Rosalia Indah </h3></center></div>
		<div class="modal-body">
		<?php 
		$data['jeniswo']=$this->orderm->get_jeniswo()->result();
		$data['status']=$this->orderm->get_status()->result();
		echo $this->load->view('orderform', $data); 
		?>
		
							</div>
							</div>
							</div>
							</div>
							
		<div class="modal fade pop" id="software" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">	
		<div class="modal-content">	
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	   <center><h3> IT Development Rosalia Indah </h3></center></div>
		<div class="modal-body">
		<?php 
		$data['software']=$this->orderm->get_software_id()->result();
		$data['status']=$this->orderm->get_status()->result();
		echo $this->load->view('softwareform', $data); 
		?>
		
							</div>
							</div>
							</div>
							</div>
    </body>
</html>