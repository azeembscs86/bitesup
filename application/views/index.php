<?php
$folder_name = $folder_name;
$page_name = $file_name;
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <?php include 'top.php'; ?>
        <title>Bitesup</title>
    </head>
    <!-- Navigation-->
    <?php include $header_name . '.php'; ?>
    <!-- end Navigation-->
    <!-- Page Canvas-->
    <div id="page-canvas">
        <!--Off Canvas Navigation-->
        <?php include $nav_name . '.php'; ?>
        <!--end Off Canvas Navigation-->
        <?php include $folder_name . '/' . $page_name . '.php'; ?>
    </div>
    <!-- end Page Canvas-->
    <!--Page Footer-->
    <footer id="page-footer">
        <div class="inner">
            <div class="footer-top">
                        
 
 <div class="container">
 <div class="row">

  <div class="col-md-2">
   <ul style="list-style: none;">
    <li><strong>Business</strong></li>
    <li><a href="<?=base_url() ?>restaurant/add_new_restaurant">Add a Restaurant</a></li>
    <li><a href="<?=base_url() ?>main/claim_your_listing">Claim your Listing</a></li>
    <li><a href="http://bitesup.com/masterbites/login">Business Login</a></li>
    <li><a href="<?=base_url() ?>main/guidelines">Guidelines</a></li>
    <li><a href="<?=base_url() ?>main/advertise">Advertise</a></li>
   </ul>
  </div>
  <div class="col-md-2">
   <ul style="list-style: none;">
    <li><strong>About (Bitesup)</strong></li>
    <li><a href="<?=base_url() ?>main/about_us">Bitesup (About us)</a></li>
    <li><a href="<?=base_url() ?>main/mobile_app">Mobile Apps</a></li>
    <li><a href="<?=base_url() ?>main/developers">Developers</a></li>
    <li><a href="">Bitesup Blog</a></li>
    <li><a href="<?=base_url() ?>main/feedback">Feedback</a></li>
    
    
   </ul>
  </div>
     <div class="col-md-2" style="float:right;">
   <ul class="list-inline">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li><a href="#"><i class="fa fa-skype"></i></a></li>
   
    
    
   </ul>
  </div>
     
     
  <div class="clearfix"></div>
 </div>
</div>
      
      <div class="container">
 <div class="row">
  <div class="col-md-12">
   <ul class="list-inline" style="list-style: none;">
       <li><a href="<?=base_url() ?>main/privacy"><strong>Privacy</strong></a> </li>
    <li><a href="<?=base_url() ?>main/term_condition"><strong>Term</strong></a></li>
    <li><a href="<?=base_url() ?>main/csr"><strong>CSR</strong></a></li>
    <li><a href="<?=base_url() ?>main/security"><strong>Security</strong></a></li>
    <li><a href="<?=base_url() ?>main/sitemap"><strong>Sitemap </strong></a></li>
    <li><a href="<?=base_url() ?>main/contact"><strong>Contact Us</strong></a></li>
   
   </ul>
  </div><!-- col-12 -->
 </div><!-- row -->
</div>
           
<!-- container -->
                <!--/.container-->
            </div>
            <!--/.footer-top-->
            <div class="footer-bottom">
                <div class="container">
                    <span class="left">(C) Bites Up, All rights reserved</span>
                    <span class="right">
                        <a href="#page-top" class="to-top roll"><i class="fa fa-angle-up"></i></a>
                    </span>
                </div>
            </div>
            <!--/.footer-bottom-->
        </div>
    </footer>
    <!--end Page Footer-->
</div>
<!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->
<?php include 'bottom.php'; ?>
<!--[if lte IE 9]>
       <script type="text/javascript" src="assets/js/ie-scripts.js"></script>
       <![endif]-->
</body>
</html>



