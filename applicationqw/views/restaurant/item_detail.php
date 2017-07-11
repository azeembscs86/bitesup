<style>
    .owl-controls {
        position: absolute;
        top: -30px;
        bottom: 0;
        margin: auto;
        height: 0px;
        width: 100%;
    }


</style>
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
                <li class="active">Item Detail</li>
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
            <!--Item Detail Content-->
            <div class="col-md-9">
                <section class="block" id="main-content">
                    <header class="page-title">
                        <div class="title">
                            <h1><?= $restaurant_item_detail->name ?></h1>
                            <figure><?= $restaurant_detail->country_name ?></figure>
                        </div>
                        <div class="info">
                            <div class="type" style="text-align:right;" >
                                <i><img style="opacity: 0.6;width: 20px;" src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                <span>Restaurant</span>
                            </div>
                        </div>
                    </header>
                    <div class="row">
                        <!--Detail Sidebar-->
                        <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                            <!--Contact-->
                            <section class="section">
                                <header><h3>Address</h3></header>
                                <address>
                                    <div><?= $restaurant_item_detail->name ?></div>
                                    <div><?= $restaurant_detail->country_name ?></div>
                                    <!--                                    <div>Granada Hills, CA 91344</div>-->
                                    <figure>

                                        <div class="info">
                                            <strong>Mobile:</strong>
                                            <?php if(!empty($res_mobile)){
                                                $lenght = count($res_mobile);
                                                $i = 0;
                                                foreach($res_mobile as $res_row){
                                                    if($i == $lenght-1){?>
                                                        <span><?= $res_row->mobile_no ?></span>
                                                    <?php }else{?>
                                                        <span><?= $res_row->mobile_no.', ' ?></span>

                                                        <?php $i++;}}}?>
                                        </div>
                                        <div class="info">
                                            <strong>Phone:</strong>
                                            <?php if(!empty($res_phone)){
                                                $lenght = count($res_phone);
                                                $i = 0;
                                                foreach($res_phone as $phone_row){
                                                    if($i == $lenght-1){?>
                                                        <span><?= $phone_row->phone_no ?></span>
                                                    <?php }else{?>
                                                        <span><?= $phone_row->phone_no.', ' ?></span>

                                                        <?php $i++;}}}?>
                                        </div>

                                        <div class="info">
                                            <strong>Email:</strong>
                                            <?php if(!empty($res_email)){
                                                $lenght = count($res_email);
                                                $i = 0;
                                                foreach($res_email as $email_row){
                                                    if($i == $lenght-1){?>
                                                        <span><?= $email_row->email ?></span>
                                                    <?php }else{?>
                                                        <span><?= $email_row->email.', ' ?></span>

                                                        <?php $i++;}}}?>
                                        </div>



                                        <div class="info">
                                            <i class="fa fa-globe"></i>
                                            <a href="#"><?= $restaurant_detail->website_address ?></a>
                                        </div>
                                    </figure>
                                </address>
                            </section>
                            <!--end Contact-->

                            <section class="section">
                                <div class="social1"> <h3><i class="fa fa-share-alt"></i>&nbsp;&nbsp;Social Profile</h3>
                                    <div class="social">
                                        <a class="social-button" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="social-button" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="social-button" href="#"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </section>
                            <!--Rating-->
<!--                            <section class="clearfix">
                                <header class="pull-left"><a href="#reviews" class="roll"><h3>Rating</h3></a></header>
                                <figure class="rating big pull-right" data-rating="4"></figure>
                            </section>-->
                            <!--end Rating-->
                            <!--Events-->
<!--                            <section>
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
                            </section>-->
                            <!--end Events-->
                            <!--Contact Form-->

                            <!--end Contact Form-->
                        </aside>
                        <!--end Detail Sidebar-->
                        <!--Content-->
                        <div class="col-md-8 col-sm-8">
                            <section>
                                <article class="item-gallery">
                                    <div class="owl-carousel item-slider">
                                        <?php
                                        $i = 1;
                                        foreach ($items_images as $images) {
                                            ?>
                                            <div class="slide"><img src="<?= $images->image_url; ?>" data-hash="<?= $i ?>" alt=""></div>
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
                                                foreach ($items_images as $imagess) {
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
                                <!-- /.item-gallery -->
                                <article class="block">
                                    <header><h2>Description</h2></header>
                                    <p>
                                        <?= $restaurant_item_detail->description ?>
                                    </p>
                                    <hr>


                                </article>

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
                                            <img src="<?= base_url() ?>assets/img/default-avatar.png" alt="">
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
                                            <img src="<?= base_url() ?>assets/img/default-avatar.png" alt="">
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
                                                <input type="text" class="form-control" id="form-review-name" name="form-review-name" required>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="form-review-email">Email</label>
                                                <input type="email" class="form-control" id="form-review-email" name="form-review-email" required>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="form-review-message">Message</label>
                                                <textarea class="form-control" id="form-review-message" name="form-review-message"  rows="3" required></textarea>
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
                        <?php foreach ($restaurants as $rest) { ?>
                            <a href="item-detail.html" class="item-horizontal small">
                                <h3><?php echo $rest->name; ?></h3>
                                <figure><?php echo $rest->website_address; ?></figure>
                                <div class="wrapper">
                                    <div class="image"><img style="height:70px;" src="<?php echo $rest->logo_url; ?>" alt=""></div>
                                    <div class="info">
                                        <div class="type">
                                            <i><img src="<?= base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="rating" data-rating="5"></div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                        <!--/.item-horizontal small-->
                    </section>
                    <section>
                        <header><h2><a href="<?= base_url() ?>restaurant/category_listing/<?= $rest->id ?>">Categories</a></h2></header>
                        <ul class="bullets">
                            <?php
                            if (!empty($restaurant_categories)) {
                                foreach ($restaurant_categories as $cats) {
                                    ?>
                                    <li><a href="<?= base_url() ?>restaurant/category_detail/<?= $cats->category_id ?>/<?= $cats->restaurant_id ?>" ><?= $cats->name; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
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