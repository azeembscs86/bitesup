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
                <li><a href="<?php echo base_url(); ?>feeds">Feeds</a></li>
<!--                <li><a href="main/users">Users</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
                <li class="active">Restaurants</li>
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
<!--end Sub Header-->


<!--Page Content-->
<div id="page-content">
    <section class="container">
        <div class="">
            <!--Content-->
            <div class="">
                <header>
                    <h1 class="page-title">Restaurants</h1>
                </header>
                <figure class="filter clearfix">
                    <div class="buttons pull-left">
                        <a href="listing-grid.html" class="btn icon active"><i class="fa fa-th"></i>Grid</a>
                        <a href="listing-list.html" class="btn icon"><i class="fa fa-th-list"></i>List</a>
                    </div>
                    <div class="pull-right">
                        <aside class="sorting">
                            <span>Sorting</span>
                            <div class="form-group">
                                <select class="framed" name="sort">
                                    <option value="">Date - Newest First</option>
                                    <option value="1">Date - Oldest First</option>
                                    <option value="2">Price - Highest First</option>
                                    <option value="3">Price - Lowest First</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </aside>
                    </div>
                </figure>

                <!--Listing Grid-->
                <section class="block equal-height">
                    <div class="row">
                         <?php
                         if(!empty($my_restaurant)){
                foreach ($my_restaurant as $my_rast) {
                    ?>
                        <div class="col-md-3 col-sm-4">
                            <div class="item">
                                <div class="image">
                                    <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                    <a href="<?= base_url(); ?>restaurant/restaurant_detail/<?= $my_rast->id; ?>">
                                        <div class="overlay">
                                            <div class="inner">
                                                <div class="content">
                                                    <h4>Name</h4>
                                                    <p><?= $my_rast->name; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <img style="height:200px;" src="<?= $my_rast->logo_url; ?>" alt="">
                                    </a>
                                </div>
                                <div class="wrapper">
                                    <a href="<?= base_url(); ?>restaurant/restaurant_detail/<?= $my_rast->id; ?>"><h3><?= $my_rast->name; ?></h3></a>

                                    <div class="info">
                                        <div class="type">
                                            <i><img src="<?= base_url()?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                            <span>Restaurant</span>
                                        </div>
                                        <div class="rating" data-rating="4"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.item-->
                        </div>
                <?php }} ?>
                        <!--/.col-sm-4-->
                    </div>
                    <!--/.row-->
                </section>
                <!--end Listing Grid-->
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

        </div>
    </section>
</div>
<!-- end Page Content-->
