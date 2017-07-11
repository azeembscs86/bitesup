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
                            <li class="active">Restaurant by Tags</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section>         
            <!--end Sub Header-->
             <!-- Main List Restaurant gird view----->   
             <div id="page-content">
                <section id="featured" class="block equal-height">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <header><h2 style="margin-bottom: 95px;margin-left: 15px;">Restaurants By Category</h2></header>
                   <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                  <a href="<?php echo base_url() ?>main/category_restaurant/<?php echo $category_id; ?>" class="btn icon  active"><i class="fa fa-th"></i>Grid</a>
                                    <a href="<?php echo base_url() ?>main/list_category_restaurant/<?php echo $category_id; ?>" class="btn icon"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                
                            </figure>
                    
                    <div id="results"></div>
                   <div align="center">
                       <button id="load_more_button"><img src="<?php echo base_url() ?>assets/img/ajax-loader.gif"  class="animation_image" style="float:left;"> Load More</button> <!-- load button -->
    </div>
                 
                </div>
                <div class="col-lg-3 col-lg-offset-1">
                    <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                               
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="<?php echo base_url(); ?>main/category_restaurant/<?php echo $category->tag_id;  ?>"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
        <div class="background opacity-5">
            <img src="<?=base_url()?>assets/img/restaurants-bg2.jpg" alt="">
        </div>
    </section>
            </div>
             
             
             
             
             
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
var track_page = 1; //track user click as page number, righ now page number 1
load_contents(track_page); //load content

$("#load_more_button").click(function (e) { //user clicks on button
	track_page++; //page number increment everytime user clicks load button
	load_contents(track_page); //load content
});

//Ajax load function
function load_contents(track_page){
	$('.animation_image').show(); //show loading image
	
	$.post( '<?php echo base_url() ?>main/load_more_category_restaurant', {'page': track_page,'category_id' : "<?php echo $category_id; ?>"}, function(data){
		
		if(data.trim().length == 0){
			//display text and disable load button if nothing to load
			$("#load_more_button").text("You have reached end of the record!").prop("disabled", true);
		}
		
		$("#results").append(data); //append data into #results element
		
		//scroll page to button element
		$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 800);
	
		//hide loading image
		$('.animation_image').hide(); //hide loading image once data is received
	});
}
</script>            
             
             <style type="text/css">
button {padding: 8px 20px;background: #fbfbfb;border: 1px solid #ddd;border-radius: 4px;height: 37px;min-width: 130px;}
button:hover, button:active, button:focus{background: #f3f3f3;outline: none;}
</style>