
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
                            <li class="active">Add Restaurant</li>
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
                                <form role="form" id="form-register" method="post" action="<?php echo base_url(); ?>restaurant/restaurant_add" enctype="multipart/form-data">
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
                                        <select name="country" id="e1"  title="Select Country" data-live-search="true">
                                            <option value="">Select Country Name</option>
                                            <?php foreach($countries as $country){ ?>
                                            <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="form-group city_show_div" style="display: none;">
                                            <label class="control-label col-lg-3">City</label>

                                            <div class="col-lg-6">

                                                <select id="c1" name="city" class="populate e9" data-live-search="true" style="width:300px" >

                                                </select>
                                            </div>

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
                                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Add Restaurant</button>
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
            
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".e9").select2();
    });
</script>

<script>
    $(document).ready(function () {
        $('#e1').change(function () {
            var country = $(this).val();
            if (country != 'null') {
                $('#c1').empty();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ;?>restaurant/get_city_by_drop_down",
                    data: {country_id: country},
                    success: function (data) {
                        $('.city_show_div').show();
                        //alert(data);
                        $('#c1').html('');
                        $('#c1').html(data);

                    }

                });//end of ajax.
                $('.e9').select2();
            }//end of 'if' statement.
        });//end of chnage function.
    });//end of ready function.
</script>


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

