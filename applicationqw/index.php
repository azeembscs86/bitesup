
<!--Page Content-->
<div id="page-content">
    <!--Hero Image-->
    <section class="hero-image search-filter-middle height-500">
        <div class="inner">
            <div class="container">
                <h1>Find Place For Fun and Eat</h1>
                <div class="search-bar horizontal">
                    <form class="main-search border-less-inputs background-dark narrow" role="form" method="post" action="?">
                        <div class="input-row">
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="model">Place Type</label>
                                <select name="model" id="model" multiple title="Any" data-live-search="true">
                                    <option value="1">Restaurant</option>
                                    <option value="2">Vegetarian</option>
                                    <option value="3">Bar</option>
                                    <option value="4">Night Life</option>
                                    <option value="5">Breakfast</option>
                                    <option value="6">Fast Food</option>
                                    <option value="7">Steak & Grill</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="location">Location</label>
                                <div class="input-group location">
                                    <input type="text" class="form-control" id="location" placeholder="Enter Location">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </form>
                    <!-- /.main-search -->
                </div>
                <!-- /.search-bar -->
            </div>
        </div>
        <div class="background">
            <img src="<?=base_url()?>assets/img/restaurant-bg.jpg" alt="">
        </div>
    </section>
    <!--end Hero Image-->

    <!--Featured-->
    <section id="featured" class="block equal-height">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                <?php
                if(!empty($restaurant)){?>

                    <header><h2 style="margin-bottom: 95px;margin-left: 15px;">Restaurants</h2></header>
               <?php foreach ($restaurant as $row){ ?>
                <div class="col-md-4 col-sm-4">
                    <div class="item">
                        <div class="image">
                            <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                            <a href="item-detail.html">
                                <div class="overlay">
                                    <div class="inner">
                                        <div class="content">
                                            <h4>Description</h4>
                                            <p><?php echo $row->description; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-thumbs-up"></i>
                                </div>
                                <img src="<?php echo $row->logo_url; ?>" alt="">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="item-detail.html"><h3><?php echo $row->name; ?></h3></a>

                            <div class="info">
                                <div class="type">
                                    <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                    <span>Restaurant</span>
                                </div>
                                <div class="rating" data-rating="4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.item-->
                </div>
                <?php }}?>
                </div>


                <?php
                $iterator = 0;
                if(!empty($feeds)){?>
                <div class="col-lg-8">
                    <section>
                    <header><h2 style="margin-bottom: 95px;margin-left: 15px;"">Feeds</h2></header>
                <?php    foreach ($feeds as $row) {
                        ?>
                        <article class="blog-post">

                            <header>

                                <a href="blog-detail.html"><h3 style="font-size: 18px;margin-bottom: 0px;"><img style="height: 65px;width: 65px;border-radius: 50px;margin-right: 10px;"  src="<?php echo $row->user_image_url; ?>" alt=""><?php echo $row->first_name ?>&nbsp;<?php echo $row->last_name ?></h3></a></header>




                            <div class="owl-carousel testimonials" style="padding: 0px;">
                                <?php for ($j = 0; $j < sizeof($feed_images[$iterator]); $j++) { ?>
                                    <div class="slide"><h4><img style="height: 400px;width: 900px;"  src="<?php echo $feed_images[$iterator][$j]->image_url; ?>" alt="">
                                            <div class="carousel-caption" style="padding-bottom: 0px;padding-top:0px;left: 0%;right:0%;opacity:0.6;padding-left: 25px;background-color: white;">
                                                <div class="col-sm-6"><img style="padding:8px;width: 78px;border-radius: 50px;float: left;"  src="<?php echo $row->user_image_url; ?>" alt="">
                                                    <h1 style="text-align: left;color: black;margin-top: 5px;"><?php echo $row->title; ?></h1><br>
                                                    <h2 style="text-align: left;color: black;margin-top: -18px;margin-bottom: 10px;"><?php echo $row->title; ?></h2>
                                                </div>
                                                <div class="col-sm-6 pull-right">
                                                    <div class="box">
                                                        <div class="icon">
                                                            <div class="image"><i class="glyphicon glyphicon-bookmark"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </h4>
                                    </div>

                                <?php } $iterator++; ?>
                            </div>

                            <div class="margin">
                                <a class="btn-clean" href="#">
                                    Like <i class="glyphicon glyphicon-heart"></i>
                                </a>
                                <a class="btn-clean" href="#">
                                    Tried <i class="glyphicon glyphicon-ok"></i>
                                </a>
                                <a class="btn-clean" href="#">
                                    Wish <i class="glyphicon glyphicon-star"></i>
                                </a>
                            </div>





                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?php echo $row->datetime ?></a>

                                <div class="tags">
                                    <a href="<?= base_url() ?>feeds/edit_feeds/<?php echo $row->id ?>" class="tag article">Edit</a>
                                    <a href="<?= base_url() ?>feeds/delete_feed/<?php echo $row->id ?>" class="tag article">Delete</a>
                                </div>
                            </figure>
                            <p><?php echo $row->desc ?>
                            </p>
                            <!--<a style="float: right;" href=" " class="icon">Edit Post</a>-->
                            <a href="<?= base_url() ?>feeds/feed_detail/<?php echo $row->id ?>" class="icon">Read More <i class="fa fa-angle-right"></i></a>
                        </article><!-- /.blog-post -->
                        </section>
                        </div>
                    <?php } }?>

                <div class="col-lg-3 col-lg-offset-1">
                <section>
                    <header><h2>New Places</h2></header>
                    <?php if(!empty($restaurants_places)){ foreach ($restaurants_places as $rest) {?>
                        <a href="item-detail.html" class="item-horizontal small">
                            <h3><?php echo $rest->name; ?></h3>
                            <figure><?php echo $rest->website_address; ?></figure>
                            <div class="wrapper">
                                <div class="image"><img src="<?php echo $rest->logo_url; ?>" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                        <span>Restaurant</span>
                                    </div>
                                    <div class="rating" data-rating="4"></div>
                                </div>
                            </div>
                        </a>
                    <?php }} ?>

                </section>
</div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
        <div class="background opacity-5">
            <img src="<?=base_url()?>assets/img/restaurants-bg2.jpg" alt="">
        </div>
    </section>
    <!--end Featured-->

    <!--Popular-->

    <!--end Popular-->

    <!--Why Us-->

    <!--end Why Us-->

    <hr>

    <!--Listing-->
    <section id="listing" class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">

                    <!--/.equal-height-->

                    <!--Categories-->
                    <section id="categories">
                        <header><h2>Categories</h2></header>
                        <ul class="categories">
                            <?php if(!empty($categories)){
                                foreach($categories as $category){
                            ?>
                            <li><a href="#"><?=$category->name?></a></li>
                            <?php }}?>

                        </ul>
                        <!--/.categories-->
                    </section>
                    <!--end Categories-->

                </div>
                <div class="col-md-3 col-sm-3">
                    <aside id="sidebar">
                        <section>
                            <header><h2>Text Widget</h2></header>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lectus turpis, rutrum
                                at dictum ac, mollis sed turpis. Integer commodo condimentum quam sit amet pellentesque.
                                In convallis orci sit amet dictum ultricies. Donec iaculis libero sed euismod blandit
                            </p>
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
                        </section>

                    </aside>
                    <!--/#sidebar-->
                </div>
                <!--/.col-md-3-->
            </div>
            <!--/.row-->
        </div>
        <!--/.block-->
    </section>
    <!--end Listing-->

<!--    <hr>-->

<!--    Partners
    <section id="partners" class="block">
        <div class="container">
            <header><h2>Partners</h2></header>
            <div class="logos">
                <div class="logo"><a href="#"><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                <div class="logo"><a href="#"><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                <div class="logo"><a href="#"><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                <div class="logo"><a href="#"><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                <div class="logo"><a href="#"><img src="assets/img/logo-partner-05.png" alt=""></a></div>
            </div>
        </div>
        /.container
    </section>
    end Partners-->
</div>
<!-- end Page Content-->

