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
                <li class="active">Register</li>            
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
            <div class="row">
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <header>
                        <h1 class="page-title">Register</h1>
                    </header>
                    <hr>
                    <form id="register_user" name="register_user" method="post" action="<?php echo base_url(); ?>main/register" enctype="multipart/form-data">
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
                            <label for="form-register-first-name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-last-name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-full-name">Username:</label>
                            <input type="text" class="form-control" id="username" onBlur="checkUsernameAvailability()" name="username" required>
                            <span id="user-availability-status"></span>   
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-email">Email:</label>
                            <input type="email" class="form-control" id="email" onBlur="checkUserEmailAvailability()" name="email" required>
                            <span id="email-availability-status"></span>  
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-confirm-password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-date">Date of Birth:</label>
                            <div class="input-group input-append date">
                                <input type="text" class="form-control" name="dob" />
                                <span class=" add-on"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form-register-gender">Gender:</label>
                            <div class="radio">
                                <label><input type="radio" name="gender" class="radio"  value="male">Male</label>
                                <label><input type="radio" name="gender" class="radio"  value="female">Female</label>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <select name="country" required="" title="Select Country" data-live-search="true">
                               <option value="-1" disabled selected hidden>Your Country.</option>
                                    <?php foreach($all_countries as $country ): ?>
                                        <option value="<?= $country->country_id;  ?>"> <?= $country->country_name; ?> </option>
                                    <?php endforeach;?>    
                            </select>
                            <div id="country_error" class="error"></div>
                        </div>  
                        <div class="form-group">
                            <label for="form-register-confirm-password">Phone:</label>
                            <input type="number" class="form-control" id="form-register-confirm-password" name="phone">
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-register-user_tags">User Tags</label>
                            <input type="text" class="form-control" data-role="tagsinput" id="tags" name="tags">
                        </div>
                        <!--/.form-group--> 
                        <div class="form-group">
                            <label for="form-register-date">User Image:</label>
                            <div class="input-group input-append">
                                <input type="file" class="form-control" name="user_image" />
                                <span class=" add-on"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form-register-date">Cover Image:</label>
                            <div class="input-group input-append">
                                <input type="file" class="form-control" name="cover_image" />
                                <span class=" add-on"></span>
                            </div>
                        </div>
<!--                        <div class="checkbox pull-left">
                            <label>
                                <input type="checkbox" class="checkbox" name="newsletter">Receive Newsletter
                            </label>
                        </div>-->
                        <div class="form-group clearfix">
                            <input type="submit" name="register_user" class="btn pull-right btn-default" id="register_user" value="Create Account">
                        </div><!-- /.form-group -->
                    </form>
                   
                    <hr>
                    <div class="center">
                        <figure class="note">By clicking the “Create an Account” button you agree with our <a href="terms-conditions.html" class="link">Terms and conditions</a></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.block-->
</div>
<!-- end Page Content-->

<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ui.timepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/before.load.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/after.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


<script> 
   jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty"); 
    jQuery(document).ready(function($){

		// validate signup form on keyup and submit
		$("#register_user").validate({
			rules: {
				first_name: "required",
				last_name: "required",                               
				username:{
					required: true,
					noSpace: true
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
                                phone:{
					required: true
				},                               
				email: {
					required: true,
					email: true
				},
                                country:{
                                    required: true
                                }
			},
			messages: {
				first_name: "Please enter your firstname",
				last_name: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					noSpace: "Username has no space"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
                                phone: {
					required: "Please enter your number."                                        
				},
                                country:{
                                    required: "Please Select your country"
                                },
				email: "Please enter a valid email address"
			}
		});		
	});
       
</script>

<script>
    $(document).ready(function () {

        $('.input-group.date')

                .datepicker({
                    format: 'yyyy-mm-dd'
                })
    });
</script>

<script>
    function hide_error_message()
    {
        $("#alert").hide();
    }
</script>

<script>

function checkUsernameAvailability() {
    $("#loaderIcon").show();    
    var username = $("#username").val();
    jQuery.ajax({
    url: "<?php echo base_url(); ?>main/check_username_exist/"+username,
    type: "POST",
    success:function(data){
        //alert(data);
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
    },
    error:function (){}
    });
}//ends usernamecheck function


function checkUserEmailAvailability() {
    $("#loaderIcon").show();       
    jQuery.ajax({
    url: "<?php echo base_url(); ?>main/check_user_email_exist",
    type: "POST",
    data: 'email='+$("#email").val(),
    success:function(data){
        //alert(data);
        $("#email-availability-status").html(data);
        $("#loaderIcon").hide();
    },
    error:function (){}
    });
}//ends usercheck function

</script>
