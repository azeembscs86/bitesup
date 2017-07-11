<!--Sub Header-->
<section class="sub-header">
    <!--    <div class="search-bar horizontal collapse" id="redefine-search-form"></div>-->
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
                <li><a href="<?= base_url(); ?>main"><i class="fa fa-home"></i></a></li>
                <li class="active">Suggest Restaurant</li>
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
                    <div class="block">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <header>
                                    <h2 class="page-title">Suggest Restaurant</h2>
                                </header>
                                <hr>
                                  <form role="form" id="add_rest_form" method="post" action="<?php echo base_url(); ?>restaurant/restaurant_add" enctype="multipart/form-data">
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
                                        <select name="country" id="e1" multiple title="Select Country" data-live-search="true">
                                            <?php foreach($all_countries as $country){ ?>
                                            <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label for="model">City:</label>
                                        <select id="c1" name="city" multiple title="Select Country" data-live-search="true">
                                            <option value="1">karachi</option>
                                            <option value="2">Islamabad</option>
                                            <option value="3">Lahore</option>
                                            <option value="4">Faisalabad</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-register-password">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-password">Mobile:</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-password">Email:</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-password">Website:</label>
                                        <input type="text" class="form-control" id="website_address" name="website_address">
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
                                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Submit</button>
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
            
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $('.input-group.date')

                .datepicker({
                    format: 'yyyy-mm-dd'
                })
                .on('changeDate', function (e) {
                    // Revalidate the date field
                    $('#register_user').formValidation('revalidateField', 'dob');
                });




        $('#register_user')
                .find('[name="tags"]')
                // Revalidate the cities field when it is changed
                .change(function (e) {
                    $('#register_user').formValidation('revalidateField', 'tags');
                })
                .end()

                .formValidation({
                    framework: 'bootstrap',
                    excluded: ':disabled',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        tags: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter at least one city you like the most.'
                                }
                            }
                        }

                    }
                });
    });
   

</script>

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

