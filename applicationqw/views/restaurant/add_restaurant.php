<style>
    .error, .alert-error{
        color:#a94442;
        margin-top: 5px;
        margin-bottom: 0;
        font-size: 85%;
        font-weight: 500;
        font-family: 'Arial', sans-serif;
    }
    .fa-times {
        margin-top:-27px;
    }
</style>

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
                <li class="active">Add Restaurant</li>            
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
                    <div class="block">
                        <?php if($feedback= $this->session->flashdata('feedback')): 
                              $feedback_class= $this->session->flashdata('feedback_class');

                        ?>
                           <div class="row">                               
                                   <div class="col-lg-4" style="margin-left: 370px;">
                                       <div class="alert alert-dismissible <?= $feedback_class; ?>">
                                           <p><?= $feedback; ?></p>
                                       </div>
                                   </div>                               
                           </div>
                           <?php endif; ?>
                        
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <header>
                                    <h1 class="page-title">Add Restaurant</h1>
                                </header>
                                <hr>
                                <form role="form" id="add_restaurant" name="add_restaurant" class="add_restaurant" method="post" action="<?php echo base_url(); ?>restaurant/restaurant_add" enctype="multipart/form-data">
                        
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div id="alert" class="alert alert-error">
                                <h6><?= strip_tags($this->session->flashdata('error')); ?></h6>
                                <a class="close fa fa-times" onclick="hide_error_message()" href="#"></a>
                            </div>
                        <?php }if ($this->session->flashdata('alert')) { ?>
                            <div id="alert" class="alert alert-waring">
                                <h6><?= strip_tags($this->session->flashdata('alert')); ?></h6>
                                <a class="close fa fa-times" href="#"></a>
                            </div>
                        <?php }if ($this->session->flashdata('message')) { ?>
                            <div id="alert" class="alert alert-success">
                                <h6><?= strip_tags($this->session->flashdata('message')); ?></h6>
                                <a class="close fa fa-times" href="#"></a>
                            </div>
                        <?php } ?>
                                    
                                    <div class="form-group">
                                        <label for="form-register-full-name">Restaurant Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" onBlur="checkNameAvailability()" required>
                                        <span id="name-availability-status"></span>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-email">Description:</label>
                                        <textarea class="form-control" id="discrip" name="description"></textarea>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-password">User:</label>
                                        <input type="text" class="form-control" id="u_name" name="u_name" onBlur="checkAvailability()" required>
                                         <span id="user-availability-status"></span>       
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="model">Country:</label>
                                        <select id="e1" name="country" class="populate" style="width:300px"
                                                        required>
                                                    <option value="" disabled selected hidden>Select Country.</option>
                                                    <?php foreach ($all_countries as $country) { ?>
                                                        <option
                                                            value="<?= $country->country_id ?>"><?= $country->country_name ?> </option>
                                                    <?php } ?>
                                        </select>
                                        
                                    </div>
                                    
                                    <div class="form-group city_show_div" style="display: none;">                                        
                                        <label class="control-label col-lg-3">City</label>
                                        
                                            <select id="c1" name="city" class="populate e9" data-live-search="true" style="width:300px" >
                                            </select>                                                                                 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="form-register-password">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div><!-- /.form-group -->                                 
                                    <div class="form-group">
                                        <label for="form-register-date">Restaurant Logo:</label>
                                        <div class="input-group input-append">
                                            <input type="file" class="form-control" name="logo_image_url" />
                                            <span class=" add-on"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-register-date">Restaurant Cover:</label>
                                        <div class="input-group input-append">
                                            <input type="file" class="form-control" name="cover_image_url" />
                                            <span class=" add-on"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group clearfix">
                                        <input type="submit" class="btn pull-right btn-default" id="account-submit" value="Add Restaurant" >
                                    </div><!-- /.form-group -->
                                </form>
                                <hr>
                               
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.block-->
            </div>
            <!-- end Page Content-->
           

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/before.load.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/after.js"></script>



<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "<?php echo base_url(); ?>restaurant/check_user_exist",
    data:'u_name='+$("#u_name").val(),
    type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
    },
    error:function (){}
    });
}//ends usercheck function


//Starts Restaurantname validation
function checkNameAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "<?php echo base_url(); ?>restaurant/check_name_exist",
    data:'name='+$("#name").val(),
    type: "POST",
    success:function(data){
        $("#name-availability-status").html(data);
        $("#loaderIcon").hide();
    },
    error:function (){}
    });
}

</script>

<script>
    function hide_error_message()
    {
        $("#alert").hide();
    }
</script>


<script>
    $(document).ready(function () {
        $('#e1').change(function () {

            var country = $(this).val();
            if (country != 'null') {
                $('#c1').empty();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>dashboard/get_city_drop_down",
                    data: {country_id: country},
                    success: function (data) {
                        $('.city_show_div').show();
                        //alert(data);
                        $('#c1').html('');
                        $('#c1').html(data);
                    }

                });//end of ajax.
                $('.e9').select();
            }//end of 'if' statement.
        });//end of chnage function.
    });//end of ready function.
</script>


<script> 
   jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty"); 
    jQuery(document).ready(function($){

		// validate signup form on keyup and submit
		$("#add_restaurant").validate({
			rules: {
				name: "required",
				u_name:{
					required: true,
					noSpace: true
				},
                                country: {
                                    required: true
                                }
			},
			messages: {
				name: "Please enter Restaurant Name",
				u_name: {
					required: "Username is Required",
					noSpace: "Username has no space"
				},
                                country: {
                                    required: "please select your Country"
                                }
			}
		});		
	});
       
</script>