
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
                <li class="active">Profile</li>
                <li><a href="<?php echo base_url(); ?>feeds">Feeds</a></li>
<!--                <li><a href="main/users">Users</a></li>  -->
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
                <li><a href="<?php echo base_url(); ?>restaurant/index">Restaurants</a></li>
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
        <header>
            <ul class="nav nav-pills">
                <li class="active"><?php echo $user_data->first_name ?>&nbsp;&nbsp;<?php echo $user_data->last_name ?></h1></li>
               
            </ul>
        </header>
        <div class="row">
            <form id="form-profile" name="form-profile" role="form" method="post" action="?" enctype="multipart/form-data">
                <!--Profile Picture-->
                <div class="col-md-2">
                    <section>
                        <h3><i class="fa fa-image"></i>Profile Picture</h3>
                        <div id="profile-picture" class="profile-picture dropzone">
                            <input name="file" type="file">
                            <div class="dz-default dz-message"><span>Click or drop picture here</span></div>
                            <img src="<?php echo $user_data->user_image_url ?>" alt="">
                        </div>
                    </section>
                </div>
                <!--/.col-md-3-->
            </form>
            <div class="col-md-7">
                <form id="form-profile" name="form-profile" role="form" method="post" action="?" enctype="multipart/form-data">
                    <div class="row">
                        <!--                        Profile Picture
                                                <div class="col-md-3 col-sm-3">
                                                    <section>
                                                        <h3><i class="fa fa-image"></i>Profile Picture</h3>
                                                        <div id="profile-picture" class="profile-picture dropzone">
                                                            <input name="file" type="file">
                                                            <div class="dz-default dz-message"><span>Click or drop picture here</span></div>
                                                            <img src="<?php echo $user_data->user_image_url ?>" alt="">
                                                        </div>
                                                    </section>
                                                </div>
                                                /.col-md-3-->

                        <!--Contact Info-->
                        <div class="col-md-9 col-sm-9">
                            <section>
                                <h3><i class="fa fa-user"></i>Personal Info</h3>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_data->first_name ?>">
                                        </div>
                                        <!--/.form-group-->
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_data->last_name ?>">
                                        </div>
                                        <!--/.form-group-->
                                    </div>
                                    <!--/.col-md-3-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data->email ?>">
                                        </div>
                                        <!--/.form-group-->
                                    </div>

                                    <!--/.col-md-3-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" pattern="\d*" value="<?php echo $user_data->phone ?>">
                                        </div>
                                        <!--/.form-group-->
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="form-register-gender">Gender:</label>
                                            <div class="radio">
                                                <label><input type="radio" name="gender" class="radio" <?php if ($user_data->gender == 'male') echo 'checked="checked"'; ?>  value="male">Male</label>
                                                <label><input type="radio" name="gender" class="radio" <?php if ($user_data->gender == 'female') echo 'checked="checked"'; ?>  value="female">Female</label>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <!--/.form-group-->
                                    </div>

                                    <!--/.col-md-3-->
                                </div>
                            </section>
                            <section>
                                <h3><i class="fa fa-map-marker"></i>Address</h3>
                                <!--                                <div class="form-group">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control" id="state" name="state" value="Ohio">
                                                                </div>-->
                                <!--/.form-group-->
                                <div class="form-group">
                                    <label for="city">Country</label>
                                    <select name="country" id="model" title="Select Country" data-live-search="true">
                                        <option value="0" <?php if (0 == $user_data->country) echo 'selected="selected"'; ?>>Select Country</option>
                                        <option value="1" <?php if (1 == $user_data->country) echo 'selected="selected"'; ?>>Pakistan</option>
                                        <option value="2" <?php if (2 == $user_data->country) echo 'selected="selected"'; ?>>UK</option>
                                        <option value="3" <?php if (3 == $user_data->country) echo 'selected="selected"'; ?>>Turkey</option>
                                        <option value="4" <?php if (4 == $user_data->country) echo 'selected="selected"'; ?>>America</option>
                                    </select>
                                </div>
                                <!--/.form-group-->
                                <!--                                <div class="row">
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <div class="form-group">
                                                                            <label for="street">Street</label>
                                                                            <input type="text" class="form-control" id="street" name="street" value="2050 Sampson Street">
                                                                        </div>
                                                                        /.form-group
                                                                    </div>
                                                                    /.col-md-8
                                                                    <div class="col-md-4 col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="zip">ZIP</label>
                                                                            <input type="text" class="form-control" id="zip" name="zip" pattern="\d*" value="80444">
                                                                        </div>
                                                                        /.form-group
                                                                    </div>
                                                                </div>
                                                                /.col-md-3
                                                                <div class="form-group">
                                                                    <label for="additional-address">Additional Address Line</label>
                                                                    <input type="text" class="form-control" id="additional-address" name="additional-address">
                                                                </div>-->
                                <!--/.form-group-->
                            </section>
<!--                            <section>
                                <h3><i class="fa fa-info-circle"></i>About Me</h3>
                                <div class="form-group">
                                    <label for="about-me">Some Words About Me</label>
                                    <div class="form-group">
                                        <textarea class="form-control" id="about-me" rows="3" name="about-me" required></textarea>
                                    </div>
                                    /.form-group
                                </div>
                                /.form-group
                            </section>-->
                            <div class="form-group">
                                <input type="submit" class="btn btn-large btn-default" value="Save Changes" id="form-profile" name="form-profile">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!--/.col-md-6-->
                    </div>
                </form>
            </div>
            <!--Password-->
            <div class="col-md-3">
                <h3><i class="fa fa-asterisk"></i>Profile Setting  </h3>
                <form role="form" method="post" action="" >
                    <div class="form-group">
                        <label for="profile_setting">Profile Privacy</label>
                        <select name="profile_setting" id="profile_setting">
                            <option value="">Select </option>
                            <option value="Public"<?php if (!empty($user_preference_data->profile_setting) AND  ($user_preference_data->profile_setting == 'Public')){?> selected="selected" <?php }?> >Public</option>
                            <option value="Private" <?php if (!empty($user_preference_data->profile_setting) AND ($user_preference_data->profile_setting == 'Private')){?> selected="selected" <?php }?>>Private</option>
                        </select>
                    </div>
                    <!--/.form-group-->
                    
                   
                    <div class="form-group">
                        <label for="request_setting">Request Setting </label>
                        <select name="request_setting" id="request_setting"  >
                            <option value="">Select </option>
                            <option value="Auto"<?php  if (!empty($user_preference_data->request_setting) AND ($user_preference_data->request_setting == 'Auto')) {?> selected="selected" <?php }?> >Auto</option>
                            <option value="Requested" <?php if (!empty($user_preference_data->request_setting) AND ($user_preference_data->request_setting == 'Requested')) {?> selected="selected" <?php }?>>Requested</option>
                        </select>
                    </div>
                    <!--/.form-group-->

                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-default submit">
                    </div>
                    <span class="error" style="display:none"> Please Enter Valid Data</span>
                    <span class="success" style="display:none"> Updated Successfully</span>
                    <!-- /.form-group -->
                </form>
            </div>
        </div>
    </section>
</div>
<!-- end Page Content-->
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript" >
    $(function () {
        $(".submit").click(function () {
            var profile_setting = $("#profile_setting").val();
            var request_setting = $("#request_setting").val();
            var dataString = 'profile_setting=' + profile_setting + '&request_setting=' + request_setting;
                    if (profile_setting == '' || request_setting == '')
            {
                $('.success').fadeOut(200).hide();
                $('.error').fadeOut(200).show();
            } else
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>feeds/profile_Setting",
                    data: dataString,
                    success: function () {
                        $('.success').fadeIn(200).show();
                        $('.error').fadeOut(200).hide();
                    }
                });
            }
            return false;
        });
    });
</script>




