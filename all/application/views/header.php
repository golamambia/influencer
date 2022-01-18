<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url();?>assets_front/images/favicon.png" type="image/x-icon" />
    <title>INFLUENCERTABLE</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets_front/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" type="text/css">

    <link href="<?php echo base_url();?>assets_front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets_front/css/responsive.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css'>
 <link href="<?php echo base_url();?>assets_front/css/dist.css" rel="stylesheet">  
</head>

<body class="" style="position: relative;">
<div id="overlayer"></div>
<span class="loader">
  <span class="fa fa-spinner fa-spin "></span>
</span>
    <!-- header css Start -->
    <div class="header_top clearfix">
        <div class="container-fluid">
            <div class="logo">
               <a href="<?=base_url();?>"> <img src="<?php echo base_url();?>assets_front/images/logo.png" alt="logo"></a>
            </div>
            <div class="header_right" >
                <nav class="menu">
                    <div class="menuButton">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul>
                        <?php 
                     
                         if($this->router->fetch_class()=='dashboard'){?>
                        <li><a href="<?=base_url();?>">Home</a></li>
                        <?php } ?>
                        <li><a href="<?=base_url();?>help">Need help with search?</a></li>
                        <li><a href="<?=base_url();?>pricing">Pricing</a></li>
                        
                    </ul>
                </nav>
                 <?php if($this->session->userdata('infllog_check')!=1){?>
                <div class="header_menuright">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="search_box"><i class="zmdi zmdi-search"></i></a>

                    <a href="<?=base_url();?>register" class="sign_up"><i class="zmdi zmdi-account"></i> SignUp</a>
                    <a href="<?=base_url();?>register/login" class="btn btn-primary">LOGIN</a>
                </div>
            <?php }else{?>
 <div class="header_menuright">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="search_box"><i class="zmdi zmdi-search"></i></a>

                    <a href="<?=base_url();?>dashboard/profile" class="sign_up"><i class="zmdi zmdi-account"></i> <?=ucfirst($this->session->userdata('infl_sess')['name']);?></a>
                    <a href="<?=base_url();?>dashboard/logout" class="btn btn-primary">Logout</a>
                </div>
            <?php }?>
            </div>
        </div>
    </div>

