

<style>
    .jFiler-input-dragDrop {
    width: 752px;
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
                <li class="active">Add Restaurant Menu Items</li>
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
            <div class="col-md-12">
                <header>
                    <h1 class="page-title">Add Restaurant Menu Items</h1>
                </header>
                <form id="form-submit" method="post" action="" enctype="multipart/form-data">

                    <!--Menu-->
                    <section>
                        <div class="row">
                            <div class="">
                                    <div class=" append_category_div" >
                                        <article>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                        <div class="col-md-2">
                                                            <label for="title">Select Category</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <select name="menu_id" title="Select Category" data-live-search="true">
                                                                    <?php foreach ($restaurant_categories as $categories) { ?>
                                                                        <option value="<?= $categories->id ?>"><?= $categories->name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="title">Item Name</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="title">Price</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="price" placeholder="Price">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="title">Description</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="" name="description" placeholder="Detail about Item">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="title">item Images</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" id="filer_input" name="image_url[]" multiple="" >
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </article>
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
                            <input type="submit" class="btn btn-default pull-right" name="add_restaurant_menu_items" value="Add Item">
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