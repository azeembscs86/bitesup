<div id="page-content">

    <section class="container">
        <div class="row">
            <!--Company Detail Content-->
            <div class="col-md-9">
                <header>
                    <h1 class="page-title"><?php if(!empty($restaurant_detail)){echo $restaurant_detail->name; ?></h1>
                    
                </header>
                <!--Logo and Map-->
                <section>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="logo">
                                <div class="image"><img style="height: 160px;width: 262px" src="<?= $restaurant_detail->logo_url; ?>" alt=""></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div id="map-simple"></div>
                        </div>
                    </div>
                </section>
                <!--end Logo and Map-->
                <!--Contact info-->
                <section>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <section>
                                <h3><i class="fa fa-map-marker"></i>Address</h3>
                                <address>
                                    <div><?= $restaurant_detail->name; ?></div>
                                    <div>63 Birch Street</div>
                                    <div>Granada Hills, CA 91344</div>
                                </address>
                                <?php }?>
                            </section>
                            <section>
                                <h3><i class="fa fa-share-alt"></i>Social Profile</h3>
                                <div class="social">
                                    <?php
                                    if(!empty($socail_acc)){
                                    foreach($socail_acc as $row) {
                                        if($row->social_acc_id == 2){?>
                                          <a href="<?=$row->link?>" class="social-button"><i class="fa fa-twitter"></i></a>
                                        <?php }elseif(($row->social_acc_id) == 1){?>
                                          <a href="<?=$row->link?>" class="social-button"><i class="fa fa-facebook"></i></a>
                                            <?php }elseif(($row->social_acc_id) == 3){?>
                                            <a href="<?=$row->link?>" class="social-button"><i class="fa fa-pinterest"></i></a>

                                        <?php } }}?>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <h3><i class="fa fa-envelope"></i>Contact</h3>
                            <figure>
                                <!--                                            <div class="info">
                                                                                <strong>Phone</strong>
                                                                                <span>818-832-5258</span>
                                                                            </div>-->
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
                                    <strong>Website:</strong>
                                    <a href="#"><?php if(!empty($restaurant_detail)){echo $restaurant_detail->website_address;} ?></a>
                                </div>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <h3><i class="fa fa-file-text"></i>About Us</h3>
                            <p><?php if(!empty($restaurant_detail)){echo $restaurant_detail->description; }?></p>
                        </div>
                    </div>
                </section>
                <!--end Contact info-->
                <hr>
                <!--Company Items-->
                <section>
                    <header><h2>Restaurant Items</h2></header>
                    <div class="expandable-content height collapsed show-380" id="company-items">
                        <div class="content">
                            <div class="row">
                                <?php 
                                
                                foreach ($restaurant_items as $items_data) { 
                                    if(!empty($items_data->item_id)){ 
                                    ?>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item equal-height">
                                            <div class="image">
                                                <div class="quick-view" data-toggle="modal" data-target="#modal-bar"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?= base_url() ?>restaurant/item_detail/<?= $restaurant_detail->id ?>/<?= $items_data->item_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?= $items_data->item_desc; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span>Daily menu from:</span>
                                                    </div>
                                                    <?php if (!empty($items_data->item_image)) { ?>
                                                        <img src="<?= $items_data->item_image ?>" height="198px" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url() ?>assets/img/items/restaurant/4.jpg" alt="">
                                                    <?php } ?>

                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?= base_url() ?>restaurant/item_detail/<?= $restaurant_detail->id ?>/<?= $items_data->item_id ?>"><h3><?= $items_data->item_name ?></h3></a>

                                                <div class="info">
                                                    <div class="type">

                                                        <span>price</span>
                                                        <span> <?= $items_data->item_price ?></span>
                                                    </div>
                                                    <div class="rating" data-rating="3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <a href="#" class="show-more expand-content" data-expand="#company-items" >Show More</a>
                    </div>
                </section>
                <!--end Company Items-->
                <hr>
                <article>
                    <header><h2>Opening Hours</h2></header>
                    <dl class="lines">
                        <?php 
                        if(!empty($restaurant_timing)){
                        foreach ($restaurant_timing as $row){ ?>
                        <dt><?=ucfirst($row->day) ?></dt>
                        <dd><?=$row->start_time ?> - <?=$row->end_time ?></dd>
                        <?php } } ?>
                    </dl>
                </article>
                <hr>
<!--                Company Members
                <section>
                    <header><h2>Members</h2></header>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="member">
                                <img src="<?= base_url(); ?>assets/img/member-1.jpg" alt="">
                                <h4>Jane Daubert</h4>
                                <figure>Company CEO</figure>
                                <hr>
                                <div class="social">
                                    <a href="#" ><i class="fa fa-twitter"></i></a>
                                    <a href="#" ><i class="fa fa-facebook"></i></a>
                                    <a href="#" ><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                            /.member
                        </div>
                        /.col-md-4
                        <div class="col-md-4 col-sm-4">
                            <div class="member">
                                <img src="<?= base_url(); ?>assets/img/member-2.jpg" alt="">
                                <h4>Kristy Jose</h4>
                                <figure>Marketing Specialist</figure>
                                <hr>
                                <div class="social">
                                    <a href="#" ><i class="fa fa-twitter"></i></a>
                                    <a href="#" ><i class="fa fa-facebook"></i></a>
                                    <a href="#" ><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                            /.member
                        </div>
                        /.col-md-4
                        <div class="col-md-4 col-sm-4">
                            <div class="member">
                                <img src="<?= base_url(); ?>assets/img/member-3.jpg" alt="">
                                <h4>John Doe</h4>
                                <figure>PR Manager</figure>
                                <hr>
                                <div class="social">
                                    <a href="#" ><i class="fa fa-twitter"></i></a>
                                    <a href="#" ><i class="fa fa-facebook"></i></a>
                                    <a href="#" ><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                            /.member
                        </div>
                        /.col-md-4
                    </div>
                    /.row
                </section>
                end Company Members-->
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
                        <header><h2><a href="<?= base_url() ?>restaurant/category_listing/<?= $restaurant_detail->id ?>">Categories</a></h2></header>
                        <ul class="bullets">
                            <?php
                            if(!empty($restaurant_categories)){
                            foreach ($restaurant_categories as $cats) { ?>
                                <li><a href="<?= base_url() ?>restaurant/category_detail/<?= $cats->category_id ?>/<?= $cats->restaurant_id ?>" ><?= $cats->name; ?></a></li>
                            <?php } } ?>
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