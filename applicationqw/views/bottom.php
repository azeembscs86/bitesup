<script>
    var base_url = '<?php echo base_url(); ?>';
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ui.timepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/before.load.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/after.js"></script>
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>-->
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.nouislider.all.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/icheck.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.filer.min.js"></script>
<!--<script type="text/javascript" src="<?= base_url() ?>assets/js/load.scripts.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>assets/js/dropzone.js"></script>
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/maps.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script src="<?= base_url();?>assets/js/toastr.js"></script>

<script>
    $(window).load(function(){
        var rtl = false; // Use RTL
        initializeOwl(rtl);
    });

    autoComplete();
</script>
<script>
     var app = 1;
    $(document).on('click', '.add_more_account', function (e) {
        $url = '<?= base_url() ?>restaurant/get_all_social_companies';
        $.ajax({
            url: $url,
            type: "POST",
            dataType: 'json',
            success: function (data) {
               
                var social_data_row = '<div class="row">' +
                        '<div class = "col-md-4" >' +
                        '<div class = "form-group" >' +
                        '<select name = "social_acc_id[]" id="model" class="social_append'+ app +'" title ="Select Social Account" data-live-search="true" >' +
                        '</select>' +
                        '</div>' +
                        '</div>' +
                        '<div class = "col-md-8" >' +
                        '<div class = "form-group" >' +
                        '<input type = "text" class = "form-control" name = "link[]" placeholder ="Social Account Link" >' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                $(".outer_div_account").append(social_data_row);
                $.each(data, function (key, val) {
                    var social_c_data = '<option value = "' + val.id + '" >' + val.name + '</option>';
                    $(".social_append"+app+"").append(social_c_data);
                });
                var select = $('select');
                if (select.length > 0) {
                    select.selectpicker();
                }
                var bootstrapSelect = $('.bootstrap-select');
                var dropDownMenu = $('.dropdown-menu');
                bootstrapSelect.on('shown.bs.dropdown', function () {
                    dropDownMenu.removeClass('animation-fade-out');
                    dropDownMenu.addClass('animation-fade-in');
                });
                bootstrapSelect.on('hide.bs.dropdown', function () {
                    dropDownMenu.removeClass('animation-fade-in');
                    dropDownMenu.addClass('animation-fade-out');
                });
                bootstrapSelect.on('hidden.bs.dropdown', function () {
                    var _this = $(this);
                    $(_this).addClass('open');
                    setTimeout(function () {
                        $(_this).removeClass('open');
                    }, 100);
                });
            }
        });
         app = app + 1;
    });
</script>
<script>
    $(function () {
        $('.colorpicker').colorpicker();
    });
</script>
<script>
    $(document).on('focus', '#colorpicker', function (e) {
        $('.colorpicker').colorpicker();
    });
</script>


<script>
    $(document).on('click', '.add_more_category', function (e) {
        var social_data_row = '<article>' +
                '<hr>' +
                '<div class="row">' +
                '<div class="col-md-12 ">' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<label for="title">Category Name</label>' +
                '</div>' +
                '<div class="col-md-8 col-lg-offset-1">' +
                '<div class="form-group">' +
                '<input type="text" class="form-control" name="name[]" placeholder="Name">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<label for="title">Category Logo</label>' +
                '</div>' +
                '<div class="col-md-8 col-lg-offset-1">' +
                '<div class="form-group">' +
                '<input type="file" class="form-control" id="" name="logo[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<label for="title">Category Image</label>' +
                '</div>' +
                '<div class="col-md-8 col-lg-offset-1">' +
                '<div class="form-group">' +
                '<input type="file" class="form-control" id="" name="image[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<label for="title">Colour Code</label>' +
                '</div>' +
                '<div class="col-md-8 col-lg-offset-1">' +
                '<div class="form-group">' +
                '<input type="text" class="form-control colorpicker" id="colorpicker" name="color_code[]" placeholder="Color Code">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</article>';
        $(".append_category_div").append(social_data_row);
    });
</script>
<script>
    $('#filer_input').filer({
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-folder"></i></div><div class="jFiler-input-text">\n\
<h3></h3>\n\
<span style="display:inline-block; margin: 15px 0"></span>\n\
</div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
        showThumbs: true,
        theme: "dragdropbox",
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                    <div class="jFiler-item-container">\
                        <div class="jFiler-item-inner">\
                            <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-info">\
                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                    <span class="jFiler-item-others">{{fi-size2}}</span>\
                                </div>\
                                {{fi-image}}\
                            </div>\
                            <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left"></ul>\
                                <ul class="list-inline pull-right">\
                                    <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                </ul>\
                            </div>\
                        </div>\
                    </div>\
                </li>',
            itemAppend: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                remove: '.jFiler-item-trash-action'
            }
        }
    });
    $(window).load(function () {
        var rtl = false; // Use RTL
        initializeOwl(rtl);
    });
   //autoComplete();
   if ($('.dropzone').length > 0) {
        Dropzone.autoDiscover = false;

        $("#file-submit").dropzone({
            url: "",
            autoProcessQueue: false,
            addRemoveLinks: true
        });
        $("#profile-picture").dropzone({
            url: "<?php echo base_url() ?>dashboard/update_profile_pic",
            addRemoveLinks: false
        });
        }
</script>
<script src="<?php echo base_url() ?>assets/js/tagsinput.js"></script>
<script src="//cdn.ckeditor.com/4.4.3/basic/ckeditor.js"></script>
<script src="//cdn.ckeditor.com/4.4.3/basic/adapters/jquery.js"></script>

<!--<script>
    $(window).load(function(){
        var _latitude = 51.541599;
        var _longitude = -0.112588;
        var draggableMarker = true;
        simpleMap(_latitude, _longitude, draggableMarker);
    });
</script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>dist/js/formValidation.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>dist/js/framework/bootstrap.js"></script>
