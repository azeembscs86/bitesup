<style>
    *{
        font-family: 'Open Sans', sans-serif;
    }

    .well {
        color:white;
        margin-top:-20px;
        background-color:#f5b909;
        border:2px solid white;
        text-align:center;
        cursor:pointer;
        font-size: 25px;
        padding: 15px;
        border-radius: 0px !important;
    }

    .well:hover {
        margin-top:-20px;
        background-color:#474747;
        border:2px solid white;
        text-align:center;
        cursor:pointer;
        font-size: 25px;
        padding: 15px;
        border-radius: 0px !important;
        /*border-bottom : 2px solid black;*/
    }

    bodyy {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #fff;
        background-color: #F1F1F1;
    }



    .bg_blur
    {
        background-image:url('http://data2.whicdn.com/images/139218968/large.jpg');
        height: 300px;
        background-size: cover;
    }

    .follow_btn {
        text-decoration: none;
        position: absolute;
        left: 35%;
        top: 42.5%;
        width: 35%;
        height: 15%;
        background-color: #007FBE;
        padding: 10px;
        padding-top: 6px;
        color: #fff;
        text-align: center;
        font-size: 20px;
        border: 4px solid #007FBE;
    }

    .follow_btn:hover {
        text-decoration: none;
        position: absolute;
        left: 35%;
        top: 42.5%;
        width: 35%;
        height: 15%;
        background-color: #007FBE;
        padding: 10px;
        padding-top: 6px;
        color: #fff;
        text-align: center;
        font-size: 20px;
        border: 4px solid rgba(255, 255, 255, 0.8);
    }

    .headerr{
        color : #808080;
        margin-left:10%;
        margin-top:70px;
    }

    .picture{
        height:150px;
        width:150px;
        position:absolute;
        top: 75px;
        left:-75px;
    }

    .picture_mob{
        position: absolute;
        width: 35%;
        left: 35%;
        bottom: 70%;
    }

    .btn-style{
        color: #fff;
        background-color: #007FBE;
        border-color: #adadad;
        width: 33.3%;
    }

    .btn-style:hover {
        color: #333;
        background-color: #3D5DE0;
        border-color: #adadad;
        width: 33.3%;

    }


    @media (max-width: 767px) {
        .headerr{
            text-align : center;
        }



        .nav{
            margin-top : 30px;
        }
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
                <li><a href="<?php echo base_url(); ?>dashboard/profile">Profile</a></li>
                <li><a href="<?php echo base_url(); ?>feeds">Feeds</a></li>
                <li class="active">Users</li>
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
                <li><a href="<?php echo base_url(); ?>restaurant/index">Restaurants</a></li>
                <li><a href="#">Managing</a></li>
                <?php if(isset($user_id)){?> 
          
                <li><a href="<?php echo base_url(); ?>main/user_friend_list/<?php echo $user_id; ?>">My Buddies</a></li>  
          <?php
          }
          ?>
                <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>               
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
        <div class="row">
            <!--Company Detail Content-->
            <div class="col-md-9">


                <!--Company Members-->
                <section>
                    <header><h2></h2></header>
                    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
                        <div class="row panel">
                            <div class="col-md-4 bg_blur ">
                                <?php
                                if (!empty($follow_list)) {
                                    ?>
                                    <button style="background-color: #66BD2B"  class = "follow_btn hidden-xs"><span>Following</span></button>
                                <?php } elseif (!empty($request_list)) { ?>
                                    <button style="background-color: silver"  class = "follow_btn hidden-xs"><span>Requested</span></button>
                                    <?php
                                } else {
                                    ?>
                                    <button style="background-color: grey" value = "<?php echo $user_data_detail->id ?>" class = "follow_btn hidden-xs follow ">Follow</button>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-8  col-xs-12">
                                <img src="<?php echo $user_data_detail->user_image_url ?>" class="img-thumbnail picture hidden-xs" />
                                <img src="<?php echo $user_data_detail->user_image_url ?>" class="img-thumbnail visible-xs picture_mob" />
                                <div class="headerr">
                                    <h1><?php echo $user_data_detail->first_name ?>&nbsp;<?php echo $user_data_detail->last_name ?></h1>
                                    <h4><?php echo $user_data_detail->username ?></h4>
                                    <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                                        "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span>
                                </div>
                            </div>
                        </div>   

                        <div class="row nav">    
                            <div class="col-md-4"></div>
                            <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
                                <div class="col-md-4 col-xs-4 well">123 Posts</div>
                                <div class="col-md-4 col-xs-4 well"><?php echo $get_following ?>  Following</div>
                                <a id="new_follower" ></a>
                                <a id="follower" class="col-md-4 col-xs-4 well follower"><?php echo $get_follower ?> Followers</a>
                            </div>
                        </div>
                    </div>
                    <?php if ($profile_setting == 1 || $follow_list == 'yes') { ?>
                        <a><h2>Date Of Birth:<?php echo $user_data_detail->dob; ?></h2></a>
                        <a><h2> Phone: <?php echo $user_data_detail->phone; ?></h2></a>
                    <?php } else {
                        
                    }
                    ?>

                </section>
                <!--end Company Members-->
            </div>
            <!-- /.col-md-8-->

            <!--end Sidebar-->
        </div><!-- /.row-->
    </section>
    <!-- /.container-->
</div>
<!-- end Page Content-->
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript" >
    $(function () {
        $(".follow").click(function () {
            var reference = this;
            var friend_id = $(this).val();
//            console.log(friend_id);
            var dataString = 'friend_id=' + friend_id;

            $.ajax({
                dataType: "json",
                type: "POST",
                url: "<?php echo base_url() ?>main/follow",
                cache: false,
                data: dataString,
                success: function (response) {
//                    console.log(response);
                    if (response != '') {
                        $(reference).html('Following');
                        $(reference).css('background-color', '#66BD2B');
                        $(reference).removeClass('follow').addClass('add').off('click');
                        $('.follower').hide();
                        var follower = '<div id="award_record">' +
                                '<a class="col-md-4 col-xs-4 well">' + response + ' Follower </a>' +
                                '</div>' ;
                        $("#new_follower").append(follower);

                    }
                    if (response == '') {
                        $(reference).html('Requested');
                        $(reference).css('background-color', 'silver');
                        $(reference).removeClass('follow').addClass('add').off('click');

                    }
                }
            });
        });
        $(".add").click(function () {
            var hello = $(this).val();
            console.log(hello);

        });
    });
</script>