 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(!empty($restaurant_detail->name)) { echo $restaurant_detail->name." "; } ?> Restaurant-<?php if(!empty($restaurant_detail->country_name)) { echo $restaurant_detail->country_name; } ?>-<?php if(!empty($restaurant_detail->city_name)) { echo $restaurant_detail->city_name; } ?>-<?php if(!empty($restaurant_tag[0]->tag)){ 
                                               foreach ($restaurant_tag as $tag) { 
                                                 $newstring = implode(", ", preg_split("/[\s]+/", $tag->tag));
                                                  echo $newstring; 
                                                }  } ?> - Bitesup </title>
    
    <meta name="title" content="<?php if(!empty($restaurant_detail->restaurant_meta_title)) {
        echo $restaurant_detail->restaurant_meta_title; 
    }else{ 
         echo $restaurant_detail->name; 
    }?>">
    
    <meta name="description" content="<?php if(!empty($restaurant_detail->restaurant_meta_description)) { echo $restaurant_detail->restaurant_meta_description;}else{ echo $restaurant_detail->description;}?>">
    <meta name="keywords" content="<?php if(!empty($restaurant_detail->restaurant_meta_keyword)) { echo $restaurant_detail->restaurant_meta_keyword;}else{ 
                 if(!empty($restaurant_tag[0]->tag)){ 
                  foreach ($restaurant_tag as $tag) { 
                  $newstring = implode(", ", preg_split("/[\s]+/", $tag->tag));
                  echo $newstring; 
              }
              }
              }
              ?>">
<meta name="author" content="ThemeBucket">

<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.ico">

<link href="<?php echo base_url() ?>assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-select.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.nouislider.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colors/brown.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dropzone.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
<link href="<?php echo base_url() ?>assets/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-tagsinput.css" />

<!--<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/formValidation.css"/>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker3.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/toastr.css" />