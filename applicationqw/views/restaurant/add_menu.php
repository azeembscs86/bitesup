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
                <li class="active">Add Restaurant Menu</li>
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
                    <h1 class="page-title">Add Restaurant Menu</h1>
                </header>
                <form id="form-submit" method="post" action="" enctype="multipart/form-data">

                    <!--Menu-->
                    <section>
                        <div class="col-md-12">
                            <div class="col-md-7">
                                <h3>Restaurant Categories</h3>
                            </div>
                            <div class="col-md-5" >
                                <div class="form-group">
                                    <button type="submit" onclick="return false" class="btn btn-default icon add_more_category">Add More<i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="tab-content menu min-height-160">
                                    <div class="tab-pane fade in active append_category_div" >
                                        <article>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Category Name</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="name[]" placeholder="Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Category Logo</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" name="logo[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Category Image</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" id="" name="image[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Colour Code</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control colorpicker" name="color_code[]" placeholder="Color Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- /#tab-wine-list --> 
                                </div>
                                <!--  end Tab panes -->
                            </div>
                            <!-- /.col-md-9 -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!--end Menu-->
                    <hr>
                    <section>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default pull-right" name="add_restaurant_menu" value="Create Restaurant Menu">
                        </div>
                        <!-- /.form-group -->
                    </section>
                </form>
                <!--/#form-submit-->
            </div>
            <!--/.col-md-9-->
        </div>
    </section>
</div>
<!-- end Page Content-->