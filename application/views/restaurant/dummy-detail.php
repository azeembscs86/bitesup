<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user.style.css" type="text/css">

    <title>Spotter - Universal Directory Listing HTML Template</title>

</head>

<body onunload="" class="page-subpage page-item-detail navigation-off-canvas" id="page-top">

<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                    <a href="<?php base_url(); ?>"><img src="assets/img/logo-restaurant.png" alt="logo"></a>
                </div>
                <nav class="navigation-items">
                    <div class="wrapper">
                        <ul class="main-navigation navigation-top-header"></ul>
                        <ul class="user-area">
                            <li><a href="sign-in.html">Sign In</a></li>
                            <li><a href="register.html"><strong>Register</strong></a></li>
                        </ul>
                        <a href="submit.html" class="submit-item">
                            <div class="content"><span>Submit Your Item</span></div>
                            <div class="icon">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <div class="toggle-navigation">
                            <div class="icon">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end Navigation-->
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Off Canvas Navigation-->
            <nav class="off-canvas-navigation">
                <header>Navigation</header>
                <div class="main-navigation navigation-off-canvas"></div>
            </nav>
            <!--end Off Canvas Navigation-->
            <!--Sub Header-->
            <section class="sub-header">
                <div class="search-bar horizontal collapse" id="redefine-search-form"></div>
                <!-- /.search-bar -->
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <div class="redefine-search">
                            <a href="#redefine-search-form" class="inner" data-toggle="collapse" aria-expanded="false" aria-controls="redefine-search-form">
                                <span class="icon"></span>
                                <span>Redefine Search</span>
                            </a>
                        </div>
                        <ol class="breadcrumb">
                            <li><a href="index-directory.html"><i class="fa fa-home"></i></a></li>
                            <li><a href="#">Page</a></li>
                            <li class="active">Detail</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section>
            <!--end Sub Header-->

            <!--Page Content-->
            <div id="page-content">

                <div id="map-detail"></div>
                <section class="container">
                    <div class="row">
                        <!--Item Detail Content-->
                        <div class="col-md-9">
                            <section class="block" id="main-content">
                                <header class="page-title">
                                    <div class="title">
                                        <h1>Max Five Lounge</h1>
                                        <figure>63 Birch Street</figure>
                                    </div>
                                    <div class="info">
                                        <div class="type">
                                            <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                            <span>Restaurant</span>
                                        </div>
                                    </div>
                                </header>
                                <div class="row">
                                    <!--Detail Sidebar-->
                                    <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                                        <!--Contact-->
                                        <section>
                                            <header><h3>Contact</h3></header>
                                            <address>
                                                <div>Max Five Lounge</div>
                                                <div>63 Birch Street</div>
                                                <div>Granada Hills, CA 91344</div>
                                                <figure>
                                                    <div class="info">
                                                        <i class="fa fa-mobile"></i>
                                                        <span>818-832-5258</span>
                                                    </div>
                                                    <div class="info">
                                                        <i class="fa fa-phone"></i>
                                                        <span>+1 123 456 789</span>
                                                    </div>
                                                    <div class="info">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="#">www.maxfivelounge.com</a>
                                                    </div>
                                                </figure>
                                            </address>
                                        </section>
                                        <!--end Contact-->
                                        <!--Rating-->
                                        <section class="clearfix">
                                            <header class="pull-left"><a href="#reviews" class="roll"><h3>Rating</h3></a></header>
                                            <figure class="rating big pull-right" data-rating="4"></figure>
                                        </section>
                                        <!--end Rating-->
                                        <!--Events-->
                                        <section>
                                            <header><h3>Events</h3></header>
                                            <figure>
                                                <div class="expandable-content collapsed show-60" id="detail-sidebar-event">
                                                    <div class="content">
                                                        <p>Maecenas purus sapien, pellentesque non consectetur eu, rhoncus in mauris.
                                                            Duis et nisl metus. Sed ut pulvinar mauris, bibendum ullamcorper ex.
                                                            Aliquam vitae ante diam. Nam eu blandit odio. Cras erat lorem, iaculis eu nulla eu, sodales aliquam eros.
                                                        </p>
                                                    </div>
                                                </div>
                                                <a href="#" class="show-more expand-content" data-expand="#detail-sidebar-event" >Show More</a>
                                            </figure>
                                        </section>
                                        <!--end Events-->
                                        <!--Contact Form-->
                                        <section>
                                            <header><h3>Contact Form</h3></header>
                                            <figure>
                                                <form id="item-detail-form" role="form" method="post" action="?">
                                                    <div class="form-group">
                                                        <label for="item-detail-name">Name</label>
                                                        <input type="text" class="form-control framed" id="item-detail-name" name="item-detail-name" required="">
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="item-detail-email">Email</label>
                                                        <input type="email" class="form-control framed" id="item-detail-email" name="item-detail-email" required="">
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="item-detail-message">Message</label>
                                                        <textarea class="form-control framed" id="item-detail-message" name="item-detail-message"  rows="3" required=""></textarea>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <button type="submit" class="btn framed icon">Send<i class="fa fa-angle-right"></i></button>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </form>
                                            </figure>
                                        </section>
                                        <!--end Contact Form-->
                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>
                                            <article class="item-gallery">
                                                <div class="owl-carousel item-slider">
                                                    <div class="slide"><img src="assets/img/items/1.jpg" data-hash="1" alt=""></div>
                                                    <div class="slide"><img src="assets/img/items/2.jpg" data-hash="2" alt=""></div>
                                                    <div class="slide"><img src="assets/img/items/3.jpg" data-hash="3" alt=""></div>
                                                    <div class="slide"><img src="assets/img/items/4.jpg" data-hash="4" alt=""></div>
                                                    <div class="slide"><img src="assets/img/items/5.jpg" data-hash="5" alt=""></div>
                                                    <div class="slide"><img src="assets/img/items/6.jpg" data-hash="6" alt=""></div>
                                                    <div class="slide"><img src="assets/img/items/7.jpg" data-hash="7" alt=""></div>
                                                </div>
                                                <!-- /.item-slider -->
                                                <div class="thumbnails">
                                                    <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                                    <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                                        <div class="content">
                                                            <a href="#1" id="thumbnail-1" class="active"><img src="assets/img/items/1.jpg" alt=""></a>
                                                            <a href="#2" id="thumbnail-2"><img src="assets/img/items/2.jpg" alt=""></a>
                                                            <a href="#3" id="thumbnail-3"><img src="assets/img/items/3.jpg" alt=""></a>
                                                            <a href="#4" id="thumbnail-4"><img src="assets/img/items/4.jpg" alt=""></a>
                                                            <a href="#5" id="thumbnail-5"><img src="assets/img/items/5.jpg" alt=""></a>
                                                            <a href="#6" id="thumbnail-6"><img src="assets/img/items/6.jpg" alt=""></a>
                                                            <a href="#7" id="thumbnail-7"><img src="assets/img/items/7.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- /.item-gallery -->
                                            <article class="block">
                                                <header><h2>Description</h2></header>
                                                <p>
                                                    Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam.
                                                    Donec neque massa, viverra interdum eros ut, imperdiet pellentesque mauris.
                                                    Proin sit amet scelerisque risus. Donec semper semper erat ut mollis.
                                                    Curabitur suscipit, justo eu dignissim lacinia, ante sapien pharetra duin
                                                    consectetur eros augue sed ex. Donec a odio rutrum, hendrerit sapien vitae,
                                                    euismod arcu. Suspendisse potenti. Integer ut diam venenatis, pellentesque
                                                    felis eget, elementum enim. Suspendisse sit amet massa commodo nulla iaculis
                                                    fermentum. Integer eget tincidunt est, in imperdiet risus.
                                                    Morbi sit amet urna purus.
                                                </p>
                                            </article>
                                            <!-- /.block -->
                                            <article class="block">
                                                <header><h2>Daily Menu</h2></header>
                                                <div class="list-slider owl-carousel">
                                                    <div class="slide">
                                                        <header>
                                                            <h3><i class="fa fa-calendar"></i>Monday (today)</h3>
                                                        </header>
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Chicken wings</h4>
                                                                <figure>Curabitur odio nibh, luctus non pulvinar</figure>
                                                            </div>
                                                            <div class="right">$4.50</div>
                                                        </div>
                                                        <!-- /.list-item -->
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Mushroom ragout</h4>
                                                                <figure>Donec a odio rutrum, hendrerit sapien</figure>
                                                            </div>
                                                            <div class="right">$3.60</div>
                                                        </div>
                                                        <!-- /.list-item -->
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Nice salad with tuna, beans and hard-boiled egg</h4>
                                                                <figure>Urabitur suscipit, justo eu dignissim lacinia </figure>
                                                            </div>
                                                            <div class="right">$1.20</div>
                                                        </div>
                                                        <!-- /.list-item -->
                                                    </div>
                                                    <!-- /.slide -->
                                                    <div class="slide">
                                                        <header>
                                                            <h3><i class="fa fa-calendar"></i>Tuesday</h3>
                                                        </header>
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Chicken wings</h4>
                                                                <figure>Curabitur odio nibh, luctus non pulvinar</figure>
                                                            </div>
                                                            <div class="right">$4.50</div>
                                                        </div>
                                                        <!-- /.list-item -->
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Mushroom ragout</h4>
                                                                <figure>Donec a odio rutrum, hendrerit sapien</figure>
                                                            </div>
                                                            <div class="right">$3.60</div>
                                                        </div>
                                                        <!-- /.list-item -->
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Nice salad with tuna, beans and hard-boiled egg</h4>
                                                                <figure>Urabitur suscipit, justo eu dignissim lacinia </figure>
                                                            </div>
                                                            <div class="right">$1.20</div>
                                                        </div>
                                                        <!-- /.list-item -->
                                                    </div>
                                                    <!-- /.slide -->
                                                </div>
                                                <!-- /.list-slider -->
                                            </article>
                                            <!-- /.block -->
                                            <article class="block">
                                                <header><h2>Features</h2></header>
                                                <ul class="bullets">
                                                    <li>Free Parking</li>
                                                    <li>Cards Accepted</li>
                                                    <li>Wi-Fi</li>
                                                    <li>Air Condition</li>
                                                    <li>Reservations</li>
                                                    <li>Teambuildings</li>
                                                    <li>Places to seat</li>
                                                    <li>Winery</li>
                                                    <li>Draft Beer</li>
                                                    <li>LCD</li>
                                                    <li>Saloon</li>
                                                    <li>Free Access</li>
                                                    <li>Terrace</li>
                                                    <li>Minigolf</li>
                                                </ul>
                                            </article>
                                            <!-- /.block -->
                                            <article class="block">
                                                <header><h2>Opening Hours</h2></header>
                                                <dl class="lines">
                                                    <dt>Monday</dt>
                                                    <dd>08:00 am - 11:00 pm</dd>
                                                    <dt>Tuesday</dt>
                                                    <dd>08:00 am - 11:00 pm</dd>
                                                    <dt>Wednesday</dt>
                                                    <dd>08:00 am - 11:00 pm</dd>
                                                    <dt>Thursday</dt>
                                                    <dd>08:00 am - 11:00 pm</dd>
                                                    <dt>Friday</dt>
                                                    <dd>08:00 am - 11:00 pm</dd>
                                                    <dt>Saturday</dt>
                                                    <dd>08:00 am - 11:00 pm</dd>
                                                </dl>
                                            </article>
                                            <!-- /.block -->
                                        </section>
                                        <!--Reviews-->
                                        <section class="block" id="reviews">
                                            <header class="clearfix">
                                                <h2 class="pull-left">Reviews</h2>
                                                <a href="#write-review" class="btn framed icon pull-right roll">Write a review <i class="fa fa-pencil"></i></a>
                                            </header>
                                            <article class="clearfix overall-rating">
                                                <strong class="pull-left">Over Rating</strong>
                                                <figure class="rating big color pull-right" data-rating="4"></figure>
                                                <!-- /.rating -->
                                            </article><!-- /.overall-rating-->
                                            <section class="reviews">
                                                <article class="review">
                                                    <figure class="author">
                                                        <img src="assets/img/default-avatar.png" alt="">
                                                        <div class="date">12.05.2014</div>
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <h5>Catherine Brown</h5>
                                                        <figure class="rating big color" data-rating="4"></figure>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                            Nulla vestibulum, sem ut sollicitudin consectetur, augue diam ornare massa,
                                                            ac vehicula leo turpis eget purus. Nunc pellentesque vestibulum mauris,
                                                            eget suscipit mauris imperdiet vel. Nulla et massa metus.
                                                        </p>
                                                        <div class="individual-rating">
                                                            <span>Value</span>
                                                            <figure class="rating" data-rating="4"></figure>
                                                        </div>
                                                        <!-- /.user-rating -->
                                                        <div class="individual-rating">
                                                            <span>Service</span>
                                                            <figure class="rating" data-rating="4"></figure>
                                                        </div>
                                                        <!-- /.user-rating -->
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <!-- /.review -->
                                                <article class="review">
                                                    <figure class="author">
                                                        <img src="assets/img/default-avatar.png" alt="">
                                                        <div class="date">10.05.2014</div>
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <h5>John Doe</h5>
                                                        <figure class="rating big color" data-rating="5"></figure>
                                                        <p>
                                                            Nunc pellentesque vestibulum mauris, eget suscipit mauris
                                                            imperdiet vel. Nulla et massa metus. Nam porttitor quam eget ante
                                                        </p>
                                                        <div class="individual-rating">
                                                            <span>Value</span>
                                                            <figure class="rating" data-rating="5"></figure>
                                                        </div>
                                                        <!-- /.user-rating -->
                                                        <div class="individual-rating">
                                                            <span>Service</span>
                                                            <figure class="rating" data-rating="5"></figure>
                                                        </div>
                                                        <!-- /.user-rating -->
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <!-- /.review -->
                                            </section>
                                            <!-- /.reviews-->
                                        </section>
                                        <!-- /#reviews -->
                                        <!--end Reviews-->
                                        <!--Review Form-->
                                        <section id="write-review">
                                            <header>
                                                <h2>Write a Review</h2>
                                            </header>
                                            <form id="form-review" role="form" method="post" action="?" class="background-color-white">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="form-review-name">Name</label>
                                                            <input type="text" class="form-control" id="form-review-name" name="form-review-name" required="">
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="form-review-email">Email</label>
                                                            <input type="email" class="form-control" id="form-review-email" name="form-review-email" required="">
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="form-review-message">Message</label>
                                                            <textarea class="form-control" id="form-review-message" name="form-review-message"  rows="3" required=""></textarea>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-default">Submit Review</button>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <aside class="user-rating">
                                                            <label>Value</label>
                                                            <figure class="rating active" data-name="value"></figure>
                                                        </aside>
                                                        <aside class="user-rating">
                                                            <label>Service</label>
                                                            <figure class="rating active" data-name="score"></figure>
                                                        </aside>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.main-search -->
                                        </section>
                                        <!--end Review Form-->
                                    </div>
                                    <!-- /.col-md-8-->
                                </div>
                                <!-- /.row -->
                            </section>
                            <!-- /#main-content-->
                        </div>
                        <!-- /.col-md-8-->
                        <!--Sidebar-->
                        <div class="col-md-3">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>New Places</h2></header>
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Cash Cow Restaurante</h3>
                                        <figure>63 Birch Street</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="assets/img/items/1.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Blue Chilli</h3>
                                        <figure>2476 Whispering Pines Circle</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="assets/img/items/2.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="3"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Eddie’s Fast Food</h3>
                                        <figure>4365 Bruce Street</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="assets/img/items/3.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="5"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                </section>
                                
                                <section>
                                    <header><h2>Categories</h2></header>
                                    <ul class="bullets">
                                        <li><a href="#" >Restaurant</a></li>
                                        <li><a href="#" >Steak House & Grill</a></li>
                                        <li><a href="#" >Fast Food</a></li>
                                        <li><a href="#" >Breakfast</a></li>
                                        <li><a href="#" >Winery</a></li>
                                        <li><a href="#" >Bar & Lounge</a></li>
                                        <li><a href="#" >Pub</a></li>
                                    </ul>
                                </section>
                                <section>
                                    <header><h2>Events</h2></header>
                                    <div class="form-group">
                                        <select class="framed" name="events">
                                            <option value="">Select Your City</option>
                                            <option value="1">London</option>
                                            <option value="2">New York</option>
                                            <option value="3">Barcelona</option>
                                            <option value="4">Moscow</option>
                                            <option value="5">Tokyo</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div><!-- /.row-->
                </section>
                <!-- /.container-->
            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->
        <!--Page Footer-->
        <footer id="page-footer">
            <div class="inner">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <!--New Items-->
                                <section>
                                    <h2>New Items</h2>
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Cash Cow Restaurante</h3>
                                        <figure>63 Birch Street</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="assets/img/items/1.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                    <a href="item-detail.html" class="item-horizontal small">
                                        <h3>Blue Chilli</h3>
                                        <figure>2476 Whispering Pines Circle</figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="assets/img/items/2.jpg" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="3"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--/.item-horizontal small-->
                                </section>
                                <!--end New Items-->
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <!--Recent Reviews-->
                                <section>
                                    <h2>Recent Reviews</h2>
                                    <a href="item-detail.html#reviews" class="review small">
                                        <h3>Max Five Lounge</h3>
                                        <figure>4365 Bruce Street</figure>
                                        <div class="info">
                                            <div class="rating" data-rating="4"></div>
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non suscipit felis, sed sagittis tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras ac placerat mauris.
                                        </p>
                                    </a><!--/.review-->
                                    <a href="item-detail.html#reviews" class="review small">
                                        <h3>Saguaro Tavern</h3>
                                        <figure>2476 Whispering Pines Circle</figure>
                                        <div class="info">
                                            <div class="rating" data-rating="5"></div>
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                        </div>
                                        <p>
                                            Pellentesque mauris. Proin sit amet scelerisque risus. Donec semper semper erat ut mollis curabitur
                                        </p>
                                    </a>
                                    <!--/.review-->
                                </section>
                                <!--end Recent Reviews-->
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <section>
                                    <h2>About Us</h2>
                                    <address>
                                        <div>Max Five Lounge</div>
                                        <div>63 Birch Street</div>
                                        <div>Granada Hills, CA 91344</div>
                                        <figure>
                                            <div class="info">
                                                <i class="fa fa-mobile"></i>
                                                <span>818-832-5258</span>
                                            </div>
                                            <div class="info">
                                                <i class="fa fa-phone"></i>
                                                <span>+1 123 456 789</span>
                                            </div>
                                            <div class="info">
                                                <i class="fa fa-globe"></i>
                                                <a href="#">www.maxfivelounge.com</a>
                                            </div>
                                        </figure>
                                    </address>
                                    <div class="social">
                                        <a href="#" class="social-button"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="social-button"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="social-button"><i class="fa fa-pinterest"></i></a>
                                    </div>

                                    <a href="contact.html" class="btn framed icon">Contact Us<i class="fa fa-angle-right"></i></a>
                                </section>
                            </div>
                            <!--/.col-md-4-->
                        </div>
                        <!--/.row-->
                    </div>
                    <!--/.container-->
                </div>
                <!--/.footer-top-->
                <div class="footer-bottom">
                    <div class="container">
                        <span class="left">(C) ThemeStarz, All rights reserved</span>
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


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/before.load.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/richmarker-compiled.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/maps.js"></script>

<script>
    var itemID = 1;
    $.getJSON("<?php echo base_url(); ?>assets/json/items.json.txt")
        .done(function(json) {
                $.each(json.data, function(a) {
                    if( json.data[a].id == itemID ) {
                        itemDetailMap(json.data[a]);
                    }
                });
        })
        .fail(function( jqxhr, textStatus, error ) {
            console.log(error);
        })
    ;
    $(window).load(function(){
        var rtl = false; // Use RTL
        initializeOwl(rtl);
    });
</script>

<!--[if lte IE 9]>
<script type="text/javascript" src="assets/js/ie-scripts.js"></script>
<![endif]-->
</body>
</html>





<div id="page-content">
                <section class="container">
                    <div class="row">
                        <!--Item Detail Content-->
                        <div class="col-md-9">
                            <section class="block" id="main-content">
                                                                
                                <div class="row">
                                    <!--Detail Sidebar-->
                                    <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                                        <!--Contact-->
                                        <section>
                                            <header><h3>Contact</h3></header>
                                            
                                            <div class="restaurant-logo" style="margin-bottom: 20px;">
                               
                                            <?php
                                            $imagename = "";
                                            $url = @getimagesize($restaurant_detail->logo_url);
                                            if (@!is_array($url)) {
                                                $imagelogo = base_url()."uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                            } else {
                                                $imagelogo = $restaurant_detail->logo_url;
                                            }
                                            ?>
                                                <img align="center" src="<?php echo $imagelogo; ?>" alt="logo" width="110" height="90">
                                            </div>
                                            
                                            <address>
                                                
                                                <div><?php if(!empty($restaurant_detail->country_name)) { echo $restaurant_detail->country_name; } ?></div>
                                                <div><?php if(!empty($restaurant_branch[0]->branch_name)) echo $restaurant_branch[0]->branch_name; ?></div>
                                                <figure>
                                                         <?php if(!empty($res_mobile[0]->mobile_no)): ?>
                                                        <?php foreach($res_mobile as $mobile_no): ?>
                                                    <div class="info">                                                      
                                                        <i class="fa fa-mobile"></i>  
                                                        <span><?php echo $mobile_no->mobile_no; ?></span>                                                        
                                                    </div>
                                                    <?php endforeach; 
                                                              endif;?>
                                                    
                                                    <?php if(!empty($res_phone[0]->phone_no)): ?>
                                                        <?php foreach($res_phone as $phone_no): ?>
                                                    <div class="info">                                                        
                                                       <i class="fa fa-phone"></i>
                                                        <span><?php echo $phone_no->phone_no; ?></span>                                                       
                                                    </div>
                                                        <?php endforeach; 
                                                              endif;?>
                                                    
                                                    <?php if(!empty($restaurant_detail->website_address)): ?>
                                                    <div class="info" style="width: 290px;">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="<?php echo $restaurant_detail->website_address; ?>" target="_blank"><?php echo $restaurant_detail->website_address; ?></a>     
                                                    </div>
                                                    <?php endif; ?>
                                                </figure>
                                            </address>
                                        </section>
                                        <!--end Contact-->
                                        <!--Rating-->
                                        <section class="clearfix">
                                            <header class="pull-left"><a href="#reviews" class="roll"><h3>Rating</h3></a></header>
                                            <figure class="rating big pull-right" data-rating="4"></figure>
                                        </section>
                                        <!--end Rating-->
                                        <!--Events-->
                                        
                                        <section>
                                           <header><h2>Opening Hours</h2></header>
                                           
                                            <?php if(!empty($restaurant_timing)){ ?>                                          
                                            <ul style="list-style-type:none">
                                            
                                            <?php foreach( $restaurant_timing as $timing){ ?>    
                                                <li><b><?php echo $timing->day;  ?>:</b> <?= $timing->start_time; ?> - <?=$timing->end_time; ?></li>                                               
                                            <?php } ?>
                                            </ul>
                                            <?php } else {?>
                                                <p>Not Available</p>
                                            <?php } ?>
                                        </section>
                                        
                                          <!--sidebar categories-->
                                          <br>
                                        <section>                                         
                                           <header><h2>Categories</h2></header>
                                           <ul class="bullets">
                                               <?php
                                               if(!empty($cuisine_type)){
                                               foreach ($cuisine_type as $cuisine) { ?>
                                                   <li><?php echo $cuisine->tag_name; ?></li>
                                               <?php } } else{ ?>
                                                   <p>No Category Selected</p>
                                               <?php } ?>
                                           </ul>
                                        </section>
                                          
                                        <?php if(!empty($restaurant_tag[0]->tag)){ ?>
                                          <br>
                                          <section>                                         
                                           <header><h2>Restaurant Tags</h2></header>
                                           <ul class="bullets">
                                               <?php
                                               foreach ($restaurant_tag as $tag) { ?>
                                                   <li><?php echo $tag->tag; ?></li>
                                               <?php } ?>
                                           </ul>
                                        </section>
                                        <?php } ?>  

                                          <?php if(!empty($socail_acc) AND $socail_acc[0]->link !=""){ ?>
                                            <br>                                            
                                        <section>                                         
                                           <header><h2>Socia Links</h2></header>                                           
                                           <ul class="list-inline">
                                            <?php foreach($socail_acc as $social) {?>  
                                            <?php
                                            $social_class= "";
                                                if($social->social_acc_id == 1)
                                                {
                                                    $social_class = 'fa-facebook';
                                                }
                                                else if($social->social_acc_id == 2)
                                                {
                                                    $social_class = 'fa-twitter';
                                                }
                                                else if($social->social_acc_id == 3)
                                                {
                                                    $social_class = 'fa-instagram';
                                                }
                                                else if($social->social_acc_id == 4)
                                                {
                                                    $social_class = 'fa-google-plus';
                                                }
                                                else if($social->social_acc_id == 5)
                                                {
                                                    $social_class = 'fa-snapchat';
                                                }
                                                else if($social->social_acc_id == 6)
                                                {
                                                    $social_class = 'fa-youtube';
                                                }
                                                else if($social->social_acc_id == 7)
                                                {
                                                    $social_class = 'fa-pinterest';
                                                }
                                                else if($social->social_acc_id == 8)
                                                {
                                                    $social_class = 'fa-flickr';
                                                }
                                                else if($social->social_acc_id == 9)
                                                {
                                                    $social_class = 'fa-tumblr';
                                                }
                                            ?>
                                            <li><a href="<?php echo $social->link; ?>" target="_blank"><i class="fa <?php echo $social_class; ?>"></i></a></li>                                  
                                            <?php } ?>
                                           </ul>                                       
                                        </section>
                                            <?php } ?>
                                          
                                          
                                       
                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>  

                                            <header class="page-title">
                                                <div class="title">
                                                    <h1><?php if(!empty($restaurant_detail->name)) { echo $restaurant_detail->name; } ?> </h1>                                      
                                                </div>                                   
                                            </header>
                                           
                                            <?php if(!empty($promotion_banners)){ ?>
                                            <article class="item-gallery">
                                                
                                            <div id="cage"> 
                                                <div class="owl-carousel item-slider">
                                                    <?php
                                                    $count_banner=1;
                                                    foreach($promotion_banners as $banner){ ?>
                                                    <div class="slide"><img src="<?php echo $banner->image_url; ?>" data-hash="<?php echo $count_banner; ?>" alt=""></div>
<!--                                                <div class="slide"><img src="assets/img/items/2.jpg" data-hash="2" alt=""></div> -->
                                                    <?php 
                                                    $count_banner++; 
                                                    }//end foreach
                                                    ?>
                                                </div>
                                            </div> 

                                                <!-- /.item-slider -->
                                                <div class="thumbnails">
                                                <?php if($promotion_banners >= 5){ ?>
                                                    <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                                <?php } ?>    
                                                    <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                                        <div class="content">
                                                    <?php
                                                    $count_banner=1;
                                                    foreach($promotion_banners as $banner){ ?>
                                                            <a href="#<?php echo $count_banner; ?>" onclick="show_logo()" id="thumbnail-<?php echo $count_banner;?>" <?php if($count_banner==1){ ?>class="active"<?php } ?>><img src="<?php echo $banner->image_url; ?>" alt="" width="85" height="65"></a>
                                                        <!--<a href="#2" id="thumbnail-2"><img src="assets/img/items/2.jpg" alt=""></a> -->
                                                            
                                                       <?php 
                                                       $count_banner++;
                                                       }//end foreach ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                function show_logo(){
                                                    $(".restaurant-logo").hide(); 
                                                    $("#cage").show();                                                     
                                                }
                                                </script>
                                                
                                            </article>
                                            <?php } //end if condition for banners ?>
                                            
                                            <!-- /.item-gallery -->
                                            
                                            <?php if(!empty($restaurant_detail->description)){ ?>
                                            <article class="block">
                                                <header><h2>Description</h2></header>
                                                <p><?php echo $restaurant_detail->description; ?></p>
                                            </article>
                                            <?php } ?>
                                            
                                            <!-- /.block -->
<!--                                            <article class="block">
                                                <header><h2>Daily Menu</h2></header>
                                                <div class="list-slider owl-carousel">
                                                    <div class="slide">
                                                        <header>
                                                            <h3><i class="fa fa-calendar"></i>Monday (today)</h3>
                                                        </header>
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Chicken wings</h4>
                                                                <figure>Curabitur odio nibh, luctus non pulvinar</figure>
                                                            </div>
                                                            <div class="right">$4.50</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Mushroom ragout</h4>
                                                                <figure>Donec a odio rutrum, hendrerit sapien</figure>
                                                            </div>
                                                            <div class="right">$3.60</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Nice salad with tuna, beans and hard-boiled egg</h4>
                                                                <figure>Urabitur suscipit, justo eu dignissim lacinia </figure>
                                                            </div>
                                                            <div class="right">$1.20</div>
                                                        </div>
                                                         /.list-item 
                                                    </div>
                                                     /.slide 
                                                    <div class="slide">
                                                        <header>
                                                            <h3><i class="fa fa-calendar"></i>Tuesday</h3>
                                                        </header>
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Chicken wings</h4>
                                                                <figure>Curabitur odio nibh, luctus non pulvinar</figure>
                                                            </div>
                                                            <div class="right">$4.50</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Mushroom ragout</h4>
                                                                <figure>Donec a odio rutrum, hendrerit sapien</figure>
                                                            </div>
                                                            <div class="right">$3.60</div>
                                                        </div>
                                                         /.list-item 
                                                        <div class="list-item">
                                                            <div class="left">
                                                                <h4>Nice salad with tuna, beans and hard-boiled egg</h4>
                                                                <figure>Urabitur suscipit, justo eu dignissim lacinia </figure>
                                                            </div>
                                                            <div class="right">$1.20</div>
                                                        </div>
                                                         /.list-item 
                                                    </div>
                                                     /.slide 
                                                </div>
                                                 /.list-slider 
                                            </article>-->
                                            <!-- /.block -->
                                            

                                            <article class="block">
                                                <?php if(!empty($most_used_tags)){ ?>
                                                <header><h2>Features Tags</h2></header>
                                                <ul class="bullets">
                                                   <?php foreach($most_used_tags as $row) { ?>
                                                    <li><?php echo $row->tag_name; ?></li>                                                    
                                                   <?php }//end foreach ?>
                                                </ul>
                                                <?php }//End if condition ?>
                                            </article>

                                        </section>
                                        
                                                                                
                                        <!--Reviews-->
                                        <section class="block" id="reviews">
                                            <header class="clearfix">
                                                <h2 class="pull-left">Reviews</h2>
                                                <a href="#write-review" class="btn framed icon pull-right roll">Write a review <i class="fa fa-pencil"></i></a>
                                            </header>
                                      
                                            <section class="reviews">
                                                
                                            <?php if(!empty($restaurant_review)){ ?>  
                                                <?php foreach($restaurant_review as $review){ ?>
                                                <article class="review">
                                                    <figure class="author">
                                                        <?php if($review->user_image != 'NULL' AND "") { ?>
                                                        <img src="<?php echo $review->user_image; ?>" alt="">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/img/default-avatar.png" alt="">
                                                        <?php } ?>
                                                        <?php
                                                        $doc= $review->coments_date;
                                                        $date = date('d-M-Y h:i A', strtotime($doc));
                                                        ?>
                                                        <div class="date" style="width: 130px; margin-top: 2px;"><?php echo $date; ?></div>
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <h5><?php echo $review->first_name." ".$review->last_name;  ?></h5>
                                                        <figure class="rating big color" data-rating="<?php if(!empty($review->user_rating)){ echo $review->user_rating; } ?>"></figure>
                                                        
                                                        <p style="margin-top:17px;"><?php echo $review->rec_comments; ?></p>    
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <?php }//End foreach ?>
                                            <?php } else { //start Else condition ?>
                                                <p>No Comment in Found in This Restaurant</p>
                                            <?php } //end else and if condition ?>
                                                
                                                                                               
                                            </section>
                                            <!-- /.reviews-->
                                        </section>
                                        <!-- /#reviews -->
                                        <!--end Reviews-->
                                        <!--Review Form-->
                                        <section id="write-review">
                                            <header>
                                                <h2>Write a Review</h2>
                                            </header>
                                            
                                            <form id="form-review" role="form" name="user_restaurant_review" method="post" action="<?php echo base_url(); ?>restaurant/add_user_review" class="background-color-white">
                                                <input type="hidden" id="user_id" name="user_id" value="30">
                                                <input type="hidden" id="date" name="date" value="<?php echo date("Y-m-d h:i:s"); ?>">
                                                <input type="hidden" id="restaurant_id" name="restaurant_id" value="<?php echo $this->uri->segment(3); ?>">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                                                                                
                                                        <div class="form-group">
                                                            <label for="form-review-message">Message</label>
                                                            <textarea class="form-control" id="review_message" name="review_message"  rows="3" required=""></textarea>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-default" id="submit_comment" name="submit_comment" value="Submit Review">
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <aside class="user-rating">
                                                            <label>Your Rating</label>
                                                            <figure class="rating active" id="rating" data-name="value"></figure>
                                                        </aside>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.main-search -->
                                        </section>
                                        <!--end Review Form-->
                                    </div>
                                    <!-- /.col-md-8-->
                                </div>
                                <!-- /.row -->
                            </section>
                            <!-- /#main-content-->
                        </div>
                        <!-- /.col-md-8-->
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top: 50px;">
                            <aside id="sidebar">
                                                                
                               <!-- Featured Restaurant start-->    
                               <?php if(!empty($featured_restaurant)){ ?>
                                <section>
                                    <header><h2>Featured Restaurant</h2></header>
                                    <?php foreach($featured_restaurant as $featured_res) { ?>
                                    <a href="<?= base_url() ?>restaurant/restaurant_detail/<?php echo $featured_res->restaurant_id; ?>" class="item-horizontal small">
                                        <h3><?php echo $featured_res->restaurant_name; ?></h3>
                                        <figure><?php echo $featured_res->city_name .", ". $featured_res->country_name; ?></figure>
                                        <div class="wrapper">
                                            <?php
                                                $imagename = "";
                                                $url = @getimagesize($featured_res->logo_url);
                                                if (@!is_array($url)) {
                                                    $imagesname = base_url()."uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                                } else {
                                                    $imagesname = $featured_res->logo_url;
                                                }
                                            ?>
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span><?php echo $featured_res->cousine_name; ?></span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php }// end foreach ?>                           
                                </section>    
                               <?php } ?>
                    <!-- Featured Restaurant End-->                                                          
                    
                    <!-- Featured Reviews Start-->
                    <?php if(!empty($user_reviews)){ ?>
                            <section>
                                <header><h2>Featured Users</h2></header>
                                <?php foreach($user_reviews as $featured_rev ){ ?>
                            <?php
                            $user_image = "";
                            $url = @getimagesize($featured_rev->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $featured_rev->user_image;
                            }
                            ?>
                                <a href="#" class="item-horizontal small">
                                    <h3><?php echo $featured_rev->first_name ." ". $featured_rev->last_name; ?></h3>
                                     <figure><?php echo $featured_rev->country_name; ?></figure>
                                    <div class="wrapper">
                                        <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                        <div class="info">
                                            <div class="type">                                               
                                                <span><?php echo $featured_rev->user_comments; ?> Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                            
                                        </div>
                                    </div>
                                </a>  
                                <?php } ?>
                            </section>
                    <?php } //end if ?>
                    <!-- Featured Reviews End-->
                                                      
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div><!-- /.row-->
                </section>
                <!-- /.container-->
            </div>