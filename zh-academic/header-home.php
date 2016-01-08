<?php session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<![endif]-->
<!--[if IE 7]>
<html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<![endif]-->
<!--[if gt IE 8]>
<!-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <!--
      <![endif]-->
    <!-- This template is based on Bootstrap 3.0 -->
    <html>

        <head>
            <title>
                <?php wp_title(); ?>
            </title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
                    <!-- To be sure using the latest rendering mode for IE -->
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/resources/demos/style.css"/>
                            <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/academy.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style_old.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style_v2.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/academic-faq.css" type="text/css" />
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-multiselect.css" type="text/css" />
                            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
                            <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                                <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                                <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bootpag.min.js"></script>
                                <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>

                                <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-multiselect.js"></script>
                                <script src="<?php echo get_template_directory_uri(); ?>/js/SelectBox.js"></script>
                                <!--<script src="<?php// echo get_template_directory_uri(); ?>/js/custom-js.js"></script>-->
                                
                                <!-- IE HTML5 and CSS3 Support for older borwsers -->
                                <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js" type="text/javascript">
                                </script>
                                <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
                                <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/academy.js"></script>
                                </head>
        
        
        
        
         <body class="noJS">
        <script>
            var bodyTag = document.getElementsByTagName("body")[0];
                bodyTag.className = bodyTag.className.replace("noJS", "hasJS");
        </script>
             <?php 
             if(empty($_SESSION['academy'])) {
//                 Set defaults values here
                    $_SESSION["academy"] = "overview";
                    $_SESSION["modules"] = "calendar";
                    $_SESSION["product"] = "blue-ehs";
                }
             ?>
            <div class="wrapper">
                <noscript>
                    <div class="noscript">
                        <div class="noscript-inner">
                            <p>
                                <strong>
                                    JavaScript seems to be disabled in your browser.
                                </strong>
                            </p>
                            <p>
                                You must have JavaScript enabled in your browser to utilize the functionality of this website.
                            </p>
                        </div>
                    </div>
                </noscript>
                <!-- Header -->
                <header>
                    <div class="sticky-menu">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a href="https://app.blueehs.com/public/" target="_blank" class="btn btn-login pull-right">
                                        <i class="fa fa-sign-in"></i> Login Now
                                    </a>
                                </div>
                            </div>

                            <div class="row header-title">
                                <div class="col-md-5 col-xs-12 logo-section">
                                    <a href="<?php echo bloginfo('siteurl');?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/zhlogo.png" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12 zh-home-navigation">
                                    <!-- Site Navigation -->
                                    <nav role="navigation" class="navbar navbar-default pull-right header-menu">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a href="#" class="navbar-brand">Menu</a>
                                        </div>

                                        <!-- Collection of nav links and other content for toggling -->


                                          <!-- Site Navigation -->
                            <nav class="header-menu">

                            </nav> 
                                        <div id="navbarCollapse" class="collapse navbar-collapse">

                                            <?php

                                                $defaults = array(
                                                        'theme_location'  => 'header_Menu',
                                                        'menu_class'      => 'nav navbar-nav',
                                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                                                );

                                                wp_nav_menu( $defaults );
                                                //wp_nav_menu(array('theme_location' => 'header_Menu')); ?>
                                        <!--<ul class="nav navbar-nav">
                                            <li class="active">
                                                <a href="#">Home</a>
                                            </li>

                                        </ul>-->
                                    </div>
                                    </nav>
                    <?php 
//                    echo '</br>+'.$_SESSION["modules"] ;
//                  echo  '></br>+'.$_SESSION["product"]; 
//                  echo  '></br>+'.$_SESSION["academy"]; ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <a href="#"><span class="sticky-signup">Sign Up Now</span></a>
                </header>