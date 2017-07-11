<?php if(!empty($restaurant_review)){ ?>  
                                                <?php foreach($restaurant_review as $review){ ?>
                                                <article class="review">
                                                    <figure class="author">
                                                        <?php if($review->user_image != 'NULL' AND "") { ?>
                                                        <img src="<?php echo $review->user_image; ?>" alt="">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/img/default-avatar.png" alt="">
                                                        <?php } ?>
                                                        
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <h5><?php echo $review->first_name." ".$review->last_name;  ?></h5>
                                                        <?php
                                                        $doc= $review->coments_date;
                                                        $date = date('d-M-Y h:i A', strtotime($doc));
                                                        ?>
                                                        <div class="date" style="width: 161px;
    margin-top: -31px;
    float: right;"><?php echo $date; ?></div>
                                                        <figure class="rating big color" data-rating="<?php if(!empty($review->user_rating)){ echo $review->user_rating; } ?>"></figure>
                                                        
                                                        <p style="margin-top:17px;"><?php echo $review->rec_comments; ?></p>    
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <?php }//End foreach ?>
                                            <?php } else { //start Else condition ?>
                                                <p>No Comment in Found in This Restaurant</p>
                                            <?php } //end else and if condition ?>        