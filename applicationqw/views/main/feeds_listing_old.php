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

    <section class="container">
        <div class="row">
            <div class="col-md-9">

                <header>
                    <div class="col-md-12" style="padding: 60px;">
                        <div class="col-md-6">
                            <h1 class="page-title">Feeds</h1>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <div class="form-group">
                                <a href="<?= base_url(); ?>feeds/add_feed" type="submit" class="btn btn-default pull-right" id="submit" >Check In&nbsp;<i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </header>

                <?php
                $iterator = 0;
                if(!empty($feeds)){
                foreach ($feeds as $row) {
                    ?>
                    <article class="blog-post">

                        <header>
                            <div>
                                <a style="float:right; margin-left:  5px;" href="<?= base_url() ?>feeds/edit_feeds/<?php echo $row->id ?>"  ><i class="glyphicon glyphicon-pencil"></i></a>
                                <a style="float:right;" href="<?= base_url() ?>feeds/delete_feed/<?php echo $row->id ?>" ><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                            <a href="blog-detail.html"><h2><?php echo $row->title ?></h2></a></header>


                        <article class="">

                            <div class="owl-carousel testimonials" style="padding: 0px;">
                                <?php for ($j = 0; $j < sizeof($feed_images[$iterator]); $j++) { ?>
                                <div class="slide"><h4><img style="height: 400px;width: 900px;"  src="<?php echo $feed_images[$iterator][$j]->image_url; ?>" alt=""></h4></div>
                                <?php } $iterator++; ?>
                            </div>


                        </article>

                        <figure class="meta">
                            <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                            <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?php echo $row->datetime ?></a>

                            <!--                            <div class="tags">
                                                            <a href="" class="tag article">Edit</a>
                                                                    <a href="#" class="tag article">Design</a>
                                                                <a href="#" class="tag article">Trend</a>
                                                        </div>-->
                        </figure>
                        <p><?php echo $row->desc ?>
                        </p>
                        <!--<a style="float: right;" href=" " class="icon">Edit Post</a>-->
                        <a href="<?= base_url() ?>feeds/feed_detail/<?php echo $row->id ?>" class="icon">Read More <i class="fa fa-angle-right"></i></a>
                    </article><!-- /.blog-post -->
                <?php } }?>



                <!--Pagination-->
                <nav>
                    <ul class="pagination pull-right">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
                <!--end Pagination-->
            </div>
            <div class="col-md-3">
                <aside id="sidebar">
                    <section>
                        <header><h2>New Places</h2></header>
                        <a href="item-detail.html" class="item-horizontal small">
                            <h3>Cash Cow Restaurante</h3>
                            <figure>63 Birch Street</figure>
                            <div class="wrapper">
                                <div class="image"><img src="<?=base_url()?>assets/img/items/1.jpg" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
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
                                <div class="image"><img src="<?=base_url()?>assets/img/items/2.jpg" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
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
                                <div class="image"><img src="<?=base_url()?>assets/img/items/3.jpg" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?=base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                        <span>Restaurant</span>
                                    </div>
                                    <div class="rating" data-rating="5"></div>
                                </div>
                            </div>
                        </a>
                        <!--/.item-horizontal small-->
                    </section>
                    <section>
                        <a href="#"><img src="<?=base_url()?>assets/img/ad-banner-sidebar.png" alt=""></a>
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
        </div>
    </section>
</div>
<!-- end Page Content-->

