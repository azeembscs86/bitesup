<html lang="en">
    <head>
        <style>
            .logo{

                width: 80%;
                height: 15%;
            }
            .header-top-bar{
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
            .shrink .header-top-bar {
                margin-top: -23px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
            .normal {
                height: 180px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
                margin-bottom: 89px;
            }
            .normal .navbar-right {
                // padding-top: 40px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
            .navbar-brand img {
                max-height: 100px;
                width:300px;
                padding-top: 0px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
            .navbar-brand {
                padding: 0px !important;
            }

            .shrink {
                height: 90px;

                padding-bottom: 110px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
            .shrink .navbar-right {
                //padding-bottom: 50px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
            .shrink .navbar-brand img {
                padding-bottom: 20px;
                max-height: 110px;
                -webkit-transition: 0.1s;
                -moz-transition: 0.1s;
                -ms-transition: 0.1s;
                transition: 0.1s;
            }
             .btn-regis{
            display: inline-block;
            margin-bottom: 0px;
            padding: 5px 20px;
            border: 0px none;
            border-radius: 3px;
            background-image: none;
            vertical-align: middle;
            text-align: center;
            white-space: nowrap;
            font-weight: normal;
            font-size: 12px;
            line-height: 20px;
            cursor: pointer;
            -moz-user-select: none;
}

        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Homepage - Careers</title>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <!-- Stylesheets -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/modern-business.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/font-awesome.min.css">

        <link rel="shortcut icon" href="<?= base_url('images/favicon.ico'); ?>" />
        <link rel="stylesheet" href="<?= base_url(); ?>css/flexslider.css">

        <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/responsive.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/datepicker.css">
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url() . 'less/datepicker.less' ?>" />
        <link href="<?= base_url(); ?>font/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/formValidation.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>

    <body>
        <div id="main-wrapper">

            <header class="header-style-1" id="header">
                <div class="header-top-bar" style="background-color:#fff;">
                    <div class="container">

                        <!-- Header Register -->
                        <div class="header-register">
                            <a class="btn-regis btn-link" href="<?= base_url('main/register') ?>" id="register" style="color:#000;">Register</a>
                        </div> <!-- end .header-register -->

                        <!-- Header Login -->
                        <div class="header-login">
                            <a href="#" class="btn btn-link"  style="color:#000;">Login</a>
                            <div>
                                <form action="<?= base_url(); ?>login/check_user" method="post" id="login">
                                    <div class="form-group">
                                        <input type="text" name="emp_email" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="emp_password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <a class="link pull-right" href="<?= base_url('auth/forgot_password'); ?>">Forgot Password</a>
                                    </div>
                                    <input type="submit" class="btn btn-default" value="Login" name="loginbtn"/>

                                </form>
                            </div>
                        </div> <!-- end .header-login -->

                    </div>
                </div> <!-- end .header-top-bar -->


                <div class="header-nav-bar" >

                    <div class="container">

                        <!-- Logo -->
                        <div class="css-table logo">
                            <div class="css-table-cell">
<!--                                    <a href="<?= base_url(); ?>">
                                    <img alt="" src="<?= base_url('images/logo.png'); ?>">
                                </a>  end .logo -->
                            </div>
                        </div>


                        <nav class="navbar navbar-default navbar-fixed-top normal" id="header_navbar" role="navigation" style="background-color: white; height: 100px" >
                            <!-- Mobile Menu Toggle -->

                            <!-- Primary Nav -->
                            <div class="col-xs-6 col-sm-6" style="padding-left: 50px">
                                <div class="css-table logo ">
                                    <div class="css-table-cell image">
                                        <a href="<?= base_url(); ?>">
                                            <img class="img" alt="" src="<?= base_url('images/logo.png'); ?>" >
                                        </a> <!-- end .logo -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6" >
                                <a id="mobile-menu-toggle" href="#"><span></span></a>
                            </div>
                            <ul class="primary-nav" style="padding-right: 50px">
                                <li id="top-nav-jobs" class=" ">
                                    <a href="<?= base_url(); ?>main/job_listing" style="font-size:16px;">Jobs</a>
                                    <!--                                    <ul>
                                                                            <li><a href="jobs.php">Jobs Listings</a></li>
                                                                            <li><a href="jobs-single.html">Jobs Details</a></li>
                                                                        </ul>-->
                                </li>
                                <li id="top-nav-companies" class=" ">
                                    <a href="<?= base_url(); ?>main/companies" style="font-size:16px;">Companies</a>
                                </li>
                                <li id="top-nav-cities" class=" ">
                                    <a href="<?= base_url(); ?>main/cities" style="font-size:16px;">Cities</a>
                                </li>
                                <li id="top-nav-employees" class=" ">
                                    <a href="<?= base_url('login') ?>" style="font-size:16px;">For Employers</a>
                                </li>

                                <li id="top-nav-contact" class=" ">
                                    <a href="<?= base_url(); ?>main/contact_us" style="font-size:16px;">Contact Us</a>
                                </li>
                            </ul>
                            <div class="container" id="mobile-menu-container">
                                <div class="login-register">
                                    <!--                                    <a class="btn btn-link clone btn-default mobile-login-toggle" href="#">Login</a><a class="btn btn-link clone btn-default mobile-register-toggle" href="#">Register</a>-->
                                </div>
                                <div class="menu"></div>
                            </div>
                        </nav>
                    </div> <!-- end .container -->

                    <div class="container" >
                        <!--                        <div class="login-register"><a class="btn btn-link clone btn-default mobile-login-toggle" href="#">Login</a><a class="btn btn-link clone btn-default mobile-register-toggle" href="#">Register</a></div>
                                                <div class="menu"></div>-->
                    </div>

                    <!-- end .header-nav-bar -->
                </div>

                <div class="header-page-title">
                    <div class="container">
                        <h1>Forgot Password<small></small></h1>
                        <ul class="breadcrumbs">
                            <li><a href="<?= base_url(); ?>">Home</a></li>
                            <li><a>Forgot Password</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div id="content" class="bg-gray">
                <div id="page-content">
                    <div class="white-container container">
                        <div class="row">
                            <div class="col-lg-6">


                                <?php echo form_open("auth/forgot_password", array("class" => "form-horizontal")); ?>
                                <h1><?php echo lang('forgot_password_heading'); ?></h1>
                                <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>
                                <?php if (!empty($message)) { ?>
                                    <div id="infoMessage" class="alert alert-message alert-success" ><?php echo $message; ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                                <?php } ?>
                                <div class="form-group"style="margin: 5px 5px">
                                    <label class="col-md-4 control-label" for="Email">Email</label>  
                                    <div class="col-md-8">
                                        <input type="text" name="email" value="" id="email" class="form-control input-md">
                                    </div>
                                </div>



                                <label class="col-md-4"></label>  
                                <div class="btn-group" style="margin: 5px 17px;" >
                                    <input type="submit" name="submit" value="Submit" class="form-control btn btn-sm btn-primary">
                                </div>


                                <?php echo form_close(); ?>
                            </div>
                            <div class="col-lg-4" style="margin-left:100px;margin-top: 50px">
                                <a class="btn btn-lg btn-success register-btn" href="<?= base_url('login')?>" >Login Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-4">
                        <div class="widget">
                            <div class="widget-content">
                                <a href="<?= base_url(); ?>">     <img class="logo" src="<?= base_url() ?>images/logo.png" alt=""></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, sunt illum dolore dolor vel perferendis nisi sequi laudantium porro blanditiis!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-4">
                        <div class="widget">
                            <h6 class="widget-title">Navigation</h6>

                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-12 col-md-6">
                                        <ul class="footer-links">
                                            <li><a href="<?= base_url('main/job_listing'); ?>">Jobs</a></li>
                                            <li><a href="<?= base_url('main/faqs'); ?>">FAQ's</a></li>
                                            <li><a href="<?= base_url('main/terms'); ?>">Terms & Condition</a></li>
                                            <li><a href="<?= base_url('main/advertise'); ?>">Advertise Here</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-xs-6 col-sm-12 col-md-6">
                                        <ul class="footer-links">
                                            <li><a href="<?= base_url(); ?>main/about_us">About Us</a></li>
                                            <li><a href="<?= base_url(); ?>main/contact_us">Contact Us</a></li>
                                            <li><a href="<?= base_url(); ?>main/privacy_policy">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-2">
                        <div class="widget">
                            <h6 class="widget-title">Follow Us</h6>

                            <div class="widget-content">
                                <ul class="footer-links">
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-2">
                        <div class="widget">
                            <h6 class="widget-title">Popular Jobs</h6>

                            <div class="widget-content">
                                <ul class="footer-links">
                                    <li><a href="<?= base_url(); ?>main/jobs">Web Developer</a></li>
                                    <li><a href="<?= base_url(); ?>main/jobs">Web Designer</a></li>
                                    <li><a href="<?= base_url(); ?>main/jobs">UX Engineer</a></li>
                                    <li><a href="<?= base_url(); ?>main/jobs">Account Manager</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <div class="container">
                    <p>&copy; Copyright 2015 <a href="<?= base_url(); ?>">kaamkaaj</a> | All Rights Reserved | Developed by <a href="http://noriyah.com/">Noriyah</a></p>

                    <ul class="footer-social">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                        <li><a href="#" class="fa fa-pinterest"></a></li>
                        <li><a href="#" class="fa fa-dribbble"></a></li>
                    </ul>
                </div>
            </div>
        </footer> <!-- end #footer -->

    </div> <!-- end #main-wrapper -->

    <!-- Scripts -->

    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
    <script src="<?php echo base_url(); ?>js/maplace.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.ba-outside-events.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.responsive-tabs.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.combosex.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easytabs.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.isotope.min.js"></script>
    <script>
        $(document).ready(function () {

            $("#employee").click(function () {
                $('#employee_div').show(500);
                $('#recruiter_div').hide();
            });
            $("#recruiter").click(function () {
                $('#employee_div').hide();
                $('#recruiter_div').show(500);
            });
            $("#work-no-btn").click(function () {
                $('#experience-yes-div').hide();
            });
            $("#work-yes-btn").click(function () {
                $('#experience-yes-div').show(500);
            });
        });
    </script>
    <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-progressbar.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.inview.min.js"></script>
    <script src="<?php echo base_url(); ?>js/script.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/modern-business.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/validation.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/formValidation.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/framework/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url('css/newsbox/js/jquery.marquee.js') ?>"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // prepare chart data
            var sampleData = [
                {Month: 'Jan14', Viewed: 1},
                {Month: 'Feb14', Viewed: 2},
                {Month: 'Mar14', Viewed: 1},
                {Month: 'Apr14', Viewed: 1},
                {Month: 'May14', Viewed: 4},
                {Month: 'Jun14', Viewed: 1},
                {Month: 'Jul14', Viewed: 2}
            ];

            // prepare jqxChart settings
            var settings = {
                title: "CV Reviewed By Employers",
                description: "",
                padding: {left: 10, top: 10, right: 20, bottom: 10},
                titlePadding: {left: 90, top: 0, right: 0, bottom: 10},
                source: sampleData,
                xAxis:
                        {
                            dataField: 'Month',
                            gridLines: {visible: false}
                        },
                colorScheme: 'scheme01',
                seriesGroups:
                        [
                            {
                                type: 'column',
                                columnsGapPercent: 10,
                                seriesGapPercent: 0,
                                valueAxis:
                                        {
                                            minValue: 0,
                                            maxValue: 5,
                                            unitInterval: 2.5,
                                            description: 'CV Reviewed'
                                        },
                                series: [
                                    {dataField: 'Viewed', displayText: 'Viewed'},
                                ]
                            }
                        ]
            };

            // select the chartContainer DIV element and render the chart.
            $('#chartContainer').jqxChart(settings);
        });
    </script>
    <script>
        $(".personal-info-btn").click(function () {

            //$("#eattach_id").val($(this).data('id'));

            $('#editProfile').modal('show');

        });
    </script>

    <script>

        $(window).scroll(function () {
            if ($(document).scrollTop() > 100) {
                $('.navbar').addClass('shrink');
            }
            else {
                $('.navbar').removeClass('shrink');
            }
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(".demo1").bootstrapNews({
                newsPerPage: 3,
                autoplay: true,
                pauseOnHover: true,
                direction: 'up',
                newsTickerInterval: 1500,
                onToDo: function () {
                    //console.log(this);
                }
            });


        });
        $('#infoMessage').delay(5000).fadeOut(400);
    </script>
     
</body>
</html>
