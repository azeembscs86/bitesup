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
                            <li class="active">Login</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section> 
    <!--Page Content-->
    
<!--Page Content-->
<div id="page-content">
    <section class="container">
        <div class="block">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <header>
                        <h1 class="page-title">Sign In</h1>
                    </header>
                    <hr>
                    <form role="form" id="form-sign-in-account" method="post" action="<?= base_url(); ?>index.php/login/check_user/">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-error">
                                <h6><?= strip_tags($this->session->flashdata('error')); ?></h6>
                                <a class="close fa fa-times" href="#"></a>
                            </div>
                        <?php }if ($this->session->flashdata('alert')) { ?>
                            <div class="alert alert-waring">
                                <h6><?= strip_tags($this->session->flashdata('alert')); ?></h6>
                                <a class="close fa fa-times" href="#"></a>
                            </div>
                        <?php }if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-success">
                                <h6><?= strip_tags($this->session->flashdata('message')); ?></h6>
                                <a class="close fa fa-times" href="#"></a>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="form-sign-in-email">Email:</label>
                            <input type="text" class="form-control" id="form-sign-in-email" name="email" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-sign-in-password">Password:</label>
                            <input type="password" class="form-control" id="form-sign-in-password" name="password" required>
                        </div><!-- /.form-group -->
                        <div class="form-group clearfix">
                            <button type="submit" class="btn pull-right btn-default" id="account-submit">Sign In</button>
                        </div><!-- /.form-group -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.block-->
</div>
<!-- end Page Content-->
