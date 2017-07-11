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
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
                <li><a href="<?php echo base_url(); ?>dashboard/profile">Profile</a></li>
                <li class="active">Feeds</li>
<!--                <li><a href="main/users">Users</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
                <li><a href="<?php echo base_url(); ?>restaurant/index">Restaurants</a></li>
<!--                <li><a href="#">Managing</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/user_friend_list/<?php echo $user_id; ?>">My Buddies</a></li>  
                <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>                
            </ol>
            <!-- /.breadcrumb-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /.breadcrumb-wrapper-->
</section>

<!--Page Content-->
<div id="page-content">
    <section class="container">
        <div class="row">
            <div class="col-md-9">
                <header>
                    <h1 class="page-title"><?php echo $feeds->title; ?></h1>
                </header>

                <article class="blog-post">
                    <article class="item-gallery">
                        <div class="owl-carousel item-slider">
                            <?php
                            $i = 1;
                            foreach ($feed_images as $images) {
                                ?>
                                <div class="slide"><img style="height: 400px;width: 900px;" src="<?= $images->image_url; ?>" data-hash="<?= $i ?>" alt=""></div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <!-- /.item-slider -->
                        <div class="thumbnails">
                            <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                            <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                <div class="content">
                                    <?php
                                    $j = 1;
                                    foreach ($feed_images as $imagess) {
                                        ?>
                                        <a href="#<?= $j; ?>" id="thumbnail-<?= $j ?>" class="<?php
                                        if ($j == 1) {
                                            echo 'active';
                                        } else {
                                            echo '';
                                        }
                                        ?>" ><img src="<?= $imagess->image_url; ?>" alt=""></a>
                                           <?php
                                           $j++;
                                       }
                                       ?>
                                </div>
                            </div>
                        </div>

                    </article>
                    <figure class="meta">
                        <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                        <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?php echo $feeds->datetime; ?></a>
                        <!--                        <div class="tags">
                                                    <a href="#" class="tag article">Architecture</a>
                                                    <a href="#" class="tag article">Design</a>
                                                    <a href="#" class="tag article">Trend</a>
                                                </div>-->
                    </figure>
                    <p><?php echo $feeds->desc; ?>
                    </p>
                
                </article>

            </div>
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
                        <a href="#"><img src="assets/img/ad-banner-sidebar.png" alt=""></a>
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

