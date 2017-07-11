<link href="<?= base_url() ?>assets/css/jquery-ui.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<!--Sub Header-->

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

    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
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
                <li class="active">Feeds</li>
<!--                <li><a href="main/users">Users</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
                <li><a href="<?php echo base_url(); ?>restaurant/index">Restaurants</a></li>
<!--                <li><a href="#">Managing</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/user_friend_list/35">My Buddies</a></li>  
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
            <div class="col-md-9 col-lg-offset-2">
                <header>
                    <h1 class="page-title col-lg-offset-4">Submit Feed</h1>
                </header>
                <form id="form-add_feed" name="form-add_feed" role="form" method="post" action="" enctype="multipart/form-data">
                    <section>
                        <div class="form-group large">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                        </div>
                    </section>
                    <section>
                        <h3>Feed Detail</h3>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="location">Place</label>
                                    <input id="search-input" type="text" placeholder="Place" name="place">
                                </div>
                            </div>


                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" placeholder="Location" name="location" readonly>
                                </div>
                            </div>

                            <div class="col-md-1 col-sm-1">
                                <div class="form-group">
                                    <label for="location">&nbsp; &nbsp;</label>
                                <button  type="button" class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#google_map_model" style="background: #ff9c00;color: white">Map</button>
                                </div>
                            </div>
                            <!--/.col-md-4-->
                            
                        </div>
                        <!--/.row-->
                        </br>
                        <div class="row">

                            

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" cols="4" rows="4" name="desc"></textarea>
                                </div>

                            </div>

                            <!--/.col-md-4-->
                        </div>
                        <!--/.row-->
                    </section>
                    <!--

                    <!--Gallery-->
                    <section>
                        <h3>Gallery</h3>
                        <div >
                            <input type="file" name="file[]" id="filer_input" multiple="multiple">

                        </div>
                    </section>
                    <!--end Gallery-->

                    <hr>
                    <section>
                        <div class="form-group">
                            <input type="submit" name="form-add_feed" class="btn btn-default pull-right" value="Submit">
                        </div>
                        <!-- /.form-group -->
                    </section>
                </form>
                <!--/#form-submit-->
            </div>
            <!--/.col-md-9-->
            <!--Sidebar-->
            <!-- /.col-md-3-->
            <!--end Sidebar-->
        </div>
    </section>
</div>
<!-- end Page Content-->

<div class="modal fade" id="google_map_model">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">location</h3>
            </div>

            <div class="modal-body">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="dvMap" style="width: 600px; height: 500px"></div>
            </div>
        </div>
    </div>
</div>



<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>
<script>

    $("#search-input").autocomplete({
        source: "<?php echo base_url('feeds/get_restaurants'); ?>"
    });

</script>
<script>
    $(document).ready(function () {

        $('#form-add_feed')
                .find('[name="feed_tags"]')
                // Revalidate the cities field when it is changed
                .change(function (e) {
                    $('#form-add_feed').formValidation('revalidateField', 'feed_tags');
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

<script type="text/javascript">
    function initialize() {

        var mapOptions = {
            center: new google.maps.LatLng(29.356855,69.854625),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);


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
    $( document ).ready(function() {
        $(".item_div").hide();
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
                    $(".item_div").show();

                }
            });
        });



</script>





