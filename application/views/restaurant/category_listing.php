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
            <!--Content-->
            <div class="col-md-9">
                <header>
                    <h1 class="page-title">Category Listing
                        <div class="form-group">
                            <a href="<?= base_url(); ?>restaurant/add_menu/<?php echo $restaurant_id ?>" type="submit" class="btn btn-default pull-right" id="submit" >Add Category&nbsp;<i class="fa fa-plus"></i></a>
                        </div>
                    </h1>
                </header>


                <!--Listing List-->
                <section class="block listing">
                    <?php foreach ($category as $cat) { ?>
                        <div class="item list">
                            <div class="image">
                                <a href="<?= base_url() ?>restaurant/category_detail/<?php echo $cat->id; ?>/<?php echo $cat->restaurant_id; ?>">
                                    <img style="height: 150px;" src="<?php echo $cat->image; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-lg-offset-10 ">
                                <i class="glyphicon glyphicon-bookmark" style="margin-left: 450px;font-size:50px;position:absolute;color:<?php echo $cat->color_code; ?>" ></i>   
                            </div>
                            <div class="wrapper">
                                <a href="<?= base_url() ?>restaurant/category_detail/<?php echo $cat->id; ?>/<?php echo $cat->restaurant_id; ?>"><h3><?php echo $cat->name; ?></h3></a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- /.item-->


                </section>
                <!--end Listing List-->
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
                </aside>
                <!-- /#sidebar-->
            </div>
            <!-- /.col-md-3-->
            <!--end Sidebar-->
        </div>
    </section>
</div>
<!-- end Page Content-->

