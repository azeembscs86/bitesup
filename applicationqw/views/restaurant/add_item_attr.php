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
                <li class="active">Add Restaurant Menu Items Attributes</li>
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
                    <h1 class="page-title">Add Restaurant Items Attribute</h1>
                </header>
                <form id="form-submit" method="post" action="" enctype="multipart/form-data">

                    <!--Menu-->
                    <section>
                        <!--                        <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <h3>Restaurant Categories Items</h3>
                                                    </div>
                                                    <div class="col-md-5" >
                                                        <div class="form-group">
                                                            <button type="submit" onclick="return false" class="btn btn-default icon add_more_category">Add More<i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="tab-content menu min-height-160">
                                    <div class="tab-pane fade in active append_category_div" >
                                        <article>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <!--                                                    <div class="row">
                                                                                                            <div class="col-md-2">
                                                                                                                <label for="title">Select Item</label>
                                                                                                            </div>
                                                                                                            <div class="col-md-8 col-lg-offset-1">
                                                                                                                <div class="form-group">
                                                                                                                    <select name="item_id" title="" data-live-search="true">
                                                    <?php //foreach ($item_detail as $item) { ?>
                                                                                                                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                                    <?php //} ?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>-->
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Item Name</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" value="<?= $item_detail->id ?>"  name="item_id" placeholder="Name">
                                                                <input type="text" class="form-control" value="<?= $item_detail->name ?>" disabled="" name="name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Attribute Name</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="attribute_name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Attribute Value</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="" name="attribute_value" placeholder="Value">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Attribute Image</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" name="userfile" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="title">Parent</label>
                                                        </div>
                                                        <div class="col-md-8 col-lg-offset-1">
                                                            <div class="form-group">
                                                                <input type="hidden"  name="parent" value="1" >
                                                                <input type="checkbox"  name="parent" value="0" >
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
                            <input type="submit" class="btn btn-default pull-right" name="add_restaurant_menu_item_attr" value="Add Item Attribute">
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