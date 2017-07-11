<style>

    .div_branche{
        padding:0;
        overflow: scroll;
        overflow-x:hidden;
        background-color: white;
        height: auto;
    }
    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
        height:40px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }


</style>
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
                <li><a href="<?php echo base_url(); ?>dashboard/profile">Profile</a></li>
                <li class="active">Feeds</li>
<!--                <li><a href="main/users">Users</a></li>-->
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
        <div class="row">
            <!--Content-->
            <div class="col-md-9">
                <header>
                    <h1 class="page-title">Submit Item</h1>
                </header>
                <form  name="form-edit_feed"  id="form-edit_feeds" role="form" method="post" action="" enctype="multipart/form-data">
                    <section>
                        <div class="form-group large">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="<?php echo $feeds->title; ?>" id="title" name="title">
                        </div>
                    </section>
                    <section>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="type">Place</label>
                                    <select name="type" id="model" title="Select Type" data-live-search="true">
                                    </select>
                                </div>
                            </div>
                            <!--/.col-md-4-->

                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" value="<?php echo $feeds->location; ?>" id="location" name="location">
                                </div>
                            </div>

                            <div class="col-md-1 col-sm-1">
                                <div class="form-group">
                                    <label for="location">&nbsp; &nbsp;</label>
                                    <button  type="button" class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#google_map_model" style="background: #ff9c00;color: white">Map</button>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="">Near By</label>
                                </div>
                                <div class="div_branche" id=""  style=" width:400px ;height:200px;">
                                    <input id="near_by_branch" type="hidden" name="near_by_branch" value="<?= $feeds->branch_id ?>">
                                    <?php
                                    if(!empty($near_branches)){
                                        foreach($near_branches as $branch){?>

                                            <div class="col-md-6" ><a class="branch_id" href="#"   value="<?=$branch->id?>"><?=$branch->name?> </a></div>
                                            <div class="col-md-3"><a class="branch_id" href="#" value="<?=$branch->id?>"><input type="image" src="<?=$branch->logo_url?>" style="height:25px;width:25px;" /></a></div>
                                        <?php }
                                    }
                                    ?>
                                </div>
                            </div>

                            <!--/.col-md-4-->
                        </div>
                        <!--/.row--><br>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 item_div"  >
                                <div class="form-group" >
                                    <label for="type">Items</label>
                                    <select name="item" id="apped_it" title="Select Type" data-live-search="true" class="append_items" >
                                            <?php if(!empty($items)){
                                                foreach($items as $items_data){
                                            ?>
                                            <option value="<?=$items_data->id ?>" <?php if($items_data->id == $feeds->item){echo "checked" ;} ?> ><?=$items_data->name?></option>
                                        <?php }}?>
                                    </select>

                                </div>
                            </div>


                            <div class="col-md-8 col-sm-8">

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" cols="4" rows="4" id="desc" name="desc"><?php echo $feeds->desc; ?></textarea>
                                </div>

                            </div>
                            <!--/.col-md-4-->

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="form-edit_feed" class="btn btn-default pull-right"  value="Save">
                            </div>
                        </div>
                        <!--/.row-->
                    </section>
                    <!--                                /#address-contact
                                                    <section>
                                                        <h3>Map</h3>
                                                        <div id="map-simple" class="map-submit"></div>
                                                    </section>-->

                    


                        <!-- /.form-group -->

                </form>
                
                <!--Gallery-->
                <section>
                    <h3>Gallery</h3>
                    <div >
                        <table id="example3" class="display table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if(!empty($feed_images)){
                                foreach ($feed_images as $row) {
                                    ?>
                                    <tr>
                                        <td><img style="height: 200px; width: 200px;" src="<?=$row->image_url ?>" alt=""></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li>    <a style="cursor:pointer;" data-toggle="modal" class="edit_image_form" data-id="<?= $row->id ?>" >Edit</a></li>
                                                    <li>   <a  href="<?php echo base_url() ?>feeds/delete_magazine_type/<?php echo $row->id; ?>/<?php echo $row->feed_id; ?>" onclick="return confirm('Are you sure to Delete?')">Delete</a></li>

                                                </ul>
                                            </div> 
                                        </td>

                                    </tr>

                                    <?php
                                }}
                                ?>
                            </tbody>  
                        </table>

                    </div>
                </section>
                <!--end Gallery-->

                <!--/#form-submit-->
            </div>
            <!--/.col-md-9-->
            <!--Sidebar-->
            <div class="col-md-3">
                <aside id="sidebar">
                    <div class="sidebar-box">
                        <h3>Payment</h3>
                        <div class="form-group">
                            <label for="package">Your Package</label>
                            <select name="package" id="package" class="framed">
                                <option value="">Select your package</option>
                                <option value="1">Free</option>
                                <option value="2">Silver</option>
                                <option value="3">Gold</option>
                                <option value="4">Platinum</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <h4>This package includes</h4>
                        <ul class="bullets">
                            <li>1 Property</li>
                            <li>1 Agent Profile</li>
                            <li class="disabled">Agency Profile</li>
                            <li class="disabled">Featured Properties</li>
                        </ul>
                    </div>
                </aside>
                <!-- /#sidebar-->
            </div>
            <!-- /.col-md-3-->
            <!--end Sidebar-->
        </div>
    </section>
</div>
<!-- end Page Content-->
<form name="edit_image" method="post" action="" enctype="multipart/form-data" class="form-horizontal">
    <div class="modal fade" id="edit_image" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Image</h4>
                </div>
                <input type="hidden" id="id" class="form-control" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-5">
                            <input type="file" id="file" class="form-control" name="image_url" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="edit_image" id="edit_image" value="Update" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="google_map_model">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">location</h3>
            </div>

            <div class="modal-body">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="dvMap1" style="width: 600px; height: 500px"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script type="text/javascript">
    function initialize() {

        var mapOptions = {
            center: new google.maps.LatLng(29.356855,69.854625),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        var map = new google.maps.Map(document.getElementById("dvMap1"), mapOptions);


        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });




        var marker;
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }



            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });




        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var locationss = latlngbounds;




        google.maps.event.addListener(map, 'click', function (e) {
            placeMarkerto(e.latLng);
            // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            var location_lat =  e.latLng.lat();
            var location_long = e.latLng.lng();
            var location_latlong = location_lat + ',' + location_long;
            console.log(location_latlong);
            document.getElementById("location").value = location_latlong;
        });
        function placeMarkerto(pin) {
            console.log('place Marker');

            if (marker == undefined){
                marker = new google.maps.Marker({
                    position: pin,
                    map: map,

                });
                console.log('undefined');
            }
            else{
                marker.setPosition(pin);
            }
            map.setCenter(pin);

        }




    }
</script>
<script>
    $(document).ready(function() {
        initialize();
    });
</script>
<script >

    $(document).on('click', '.branch_id', function (e) {
        $("#apped_it").empty();
        var branches_id = $(this).attr('value');
        document.getElementById("near_by_branch").value = branches_id;

        console.log(branches_id);
        $url = '<?= base_url() ?>feeds/get_branch_item';
        $data = 'branches_id=' + branches_id ;
        $.ajax({
            url: $url,
            type: "POST",
            data: $data,
            success: function (data) {
                $("#apped_it").append(data);
                $('#apped_it').selectpicker('refresh');
               // $(".item_div").show();

            }
        });
    });



</script>




<script src="<?= base_url(); ?>assets/js/jquery-2.1.3.min.js"></script>
<script>
    $(document).ready(function () {
        $(".edit_image_form").click(function () {
//                                                                        var gender = $(this).data('teagender');
//                                                                        if (gender === 'male') {
//                                                                            jQuery("#gendermale").attr('checked', 'checked');
//                                                                        } else if (gender === 'female') {
//                                                                            jQuery("#genderfemale").attr('checked', 'checked');
//                                                                        }
                                                            //console.log(gender);
                                                            $("#id").val($(this).data('id'));
                                                            $("#type").val($(this).data('type'));
                                                            $('#edit_image').modal('show');
                                                        });
                                                    });
</script>


<script>
    $(document).ready(function () {

        $('#form-edit_feeds')
            .find('[name="feed_tags"]')
            // Revalidate the cities field when it is changed
            .change(function (e) {
                $('#form-edit_feeds').formValidation('revalidateField', 'feed_tags');
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
                    desc: {
                        validators: {
                            notEmpty: {
                                message: 'The Description is required and cannot be empty'
                            },
                            callback: {
                                message: 'The Description must be less than 200 characters long',
                                callback: function (value, validator, $field) {
                                    if (value === '') {
                                        return true;
                                    }
                                    // Get the plain text without HTML
                                    var div = $('<div/>').html(value).get(0),
                                        text = div.textContent || div.innerText;

                                    return text.length <= 1000;
                                }
                            }
                        }
                    }

                }
            }).find('[name="desc"]')
            .ckeditor()
            .editor
            // To use the 'change' event, use CKEditor 4.2 or later
            .on('change', function () {
                // Revalidate the bio field
                $('#form-add_feed').formValidation('revalidateField', 'desc');
            });
    });


</script>

