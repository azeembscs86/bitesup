
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
                <li class="active">Category Detail</li>            
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
            <!--Company Detail Content-->
            <div class="col-md-9">
                <header>
                    <h1 class="page-title">Category Detail
                        <a href="<?= base_url(); ?>restaurant/add_menu_items/<?= $category->restaurant_id; ?>" type="submit" class="btn btn-default pull-right" id="submit" >Add More Items&nbsp;<i class="fa fa-plus"></i></a>
                    </h1>
                </header>
                <!--Listing List-->
                <section class=" ">
                    <div class="item list" style="height: 175px;">
                        <div class="image">
                            <a href="item-detail.html">
                                <img style="height: 175px;" src="<?php echo $category->image; ?>" alt="">
                            </a>
                        </div>
                        <div class="wrapper">
                            <div class="col-lg-offset-10">
                                <i class="glyphicon glyphicon-bookmark" style="font-size:50px;position:absolute;color:<?php echo $category->color_code; ?>" ></i>   
                            </div>
                            <a href="item-detail.html"><h3><?php echo $category->name; ?></h3></a>
                        </div>
                    </div>
                    <!-- /.item-->
                </section>
                <!--end Listing List-->
                <hr>
                <!--Company Items-->
                <section>
                    <header><h2>Restaurant Items</h2></header>
                    <div class="expandable-content height collapsed show-380" id="company-items">
                        <div class="content">
                            <div class="row">
                                <?php foreach ($categories_itmes as $items_data) { ?>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item equal-height">
                                            <div class="image">
                                                <div class="quick-view" data-toggle="modal" data-target="#modal-bar"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="#">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?= $items_data->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span>Daily menu from: <?= $items_data->price ?></span>
                                                    </div>
                                                    <?php if (!empty($items_data->image_url)) { ?>
                                                        <img src="<?= $items_data->image_url ?>" height="198px" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url() ?>assets/img/items/restaurant/4.jpg" alt="">
                                                    <?php } ?>

                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?= base_url() ?>restaurant/item_detail/<?= $items_data->restaurant_id ?>/<?= $items_data->item_id ?>"><h3><?= $items_data->name ?></h3></a>
                                                <figure><?= $items_data->country_name ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="<?= base_url(); ?>assets/icons/restaurants-bars/restaurants/japanese-food.png" alt=""></i>
                                                        <span>Food</span>
                                                    </div>
                                                    <div class="rating" data-rating="3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <a href="#" class="show-more expand-content" data-expand="#company-items" >Show More</a>
                    </div>

                </section>
                <!--end Company Items-->
                <hr>

            </div>
            <!-- /.col-md-8-->
            <!--Sidebar-->
            <div class="col-md-3">
                <aside id="sidebar">
                   <section>
                        <header><h2>New Places</h2></header>
                        <?php foreach ($restaurants as $rest) {?>
                        <a href="item-detail.html" class="item-horizontal small">
                            <h3><?php echo $rest->name; ?></h3>
                            <figure><?php echo $rest->website_address; ?></figure>
                            <div class="wrapper">
                                <div class="image"><img style="height:70px;" src="<?php echo $rest->logo_url; ?>" alt=""></div>
                                <div class="info">
                                    <div class="type">
                                        <i><img src="<?= base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
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
                        <header><h2><a href="<?= base_url() ?>restaurant/category_listing/<?= $category->restaurant_id ?>">Categories</a></h2></header>
                        <ul class="bullets">
                            <?php
                            if (!empty($restaurant_categories)) {
                                foreach ($restaurant_categories as $cats) {
                                    ?>
                                    <li><a href="<?= base_url() ?>restaurant/category_detail/<?= $cats->category_id ?>/<?= $cats->restaurant_id ?>" ><?= $cats->name; ?></a></li>
    <?php }
} ?>
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
