<?php
if(isset($all_content) && is_array($all_content) && count($all_content)) {
            foreach ($all_content as $key => $content) {?>
<?php
                            $imagename = "";
                            $url = @getimagesize($content->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $content->logo_url;
                            }
                            ?>

<div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $content->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $content->description; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $content->restaurant_id ?>"><h3><?php echo substr($content->restaurant_name,0,10); ?></h3></a>
                                        <figure><?php echo $content->city_name.",".$content->country_name; ?></figure>
                                        
                                    </div>
                                </div><?php
            }                     
}else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>