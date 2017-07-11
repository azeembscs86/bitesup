
<div class="header-page-title">
    <div class="container">
        <h1>Login<small></small></h1>
        <ul class="breadcrumbs">
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li><a>login</a></li>
        </ul>
    </div>
</div>
</header>

<div id="page-content" class="bg-gray">
    <div class="white-container container">
        <div class="row ml">
            <div class="col-lg-6">
                <form class="form-horizontal" action="<?= base_url('index.php/login/check_user'); ?>" method="post">
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-error">
                            <h6><?= strip_tags($this->session->flashdata('error'));?></h6>
                            <a class="close fa fa-times" href="#"></a>
                        </div>
                    <?php }if($this->session->flashdata('alert')){?>
                        <div class="alert alert-waring">
                            <h6><?= strip_tags($this->session->flashdata('alert'));?></h6>
                            <a class="close fa fa-times" href="#"></a>
                        </div>
                    <?php }if($this->session->flashdata('message')){?>
                        <div class="alert alert-success">
                            <h6><?= strip_tags($this->session->flashdata('message'));?></h6>
                            <a class="close fa fa-times" href="#"></a>
                        </div>
                    <?php }?>
                    
                    <div class="form-group"style="margin: 5px 5px">
                        <label class="col-xs-12 col-md-4 control-label" for="Email">Email</label>  
                        <div class="col-xs-12 col-md-8">
                            <input id="Email" name="emp_email" placeholder="Email Address" class="form-control input-md" required="" type="text">
                        </div>
                    </div>
                    <div class="form-group" style="margin: 5px 5px">
                        <label class="col-xs-12 col-md-4 control-label" for="password">Password</label>  
                        <div class="col-xs-12 col-md-8">
                            <input id="password" name="emp_password" placeholder="Password" class="form-control input-md" required="" type="password">
                        </div>
                    </div>
                    <div class="" style="margin: 5px 5px">
                        <label class="col-md-4 " ></label> 
                        <div class="col-md-8">
                            <h6 style=""><a href="<?php echo base_url(); ?>index.php/auth/forgot_password">Forgot Password?</a></h6>
                        </div>
                    </div>
                    <div class="form-group" style="margin: 5px 5px;">
                        <div class="col-xs-12 col-md-12 ">
                            <div class="col-xs-12 col-md-3 pull-right" >
                            <label></label>
                                <input class="form-control btn btn-sm btn-primary " required="" value="LOG IN" type="submit">
                        </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="col-lg-4 ">
              
    <div class="row">
   <div class="box">
              
                <div class="info">
                    <h4 class="text-center">Get Register Now!</h4>
                    <!--<p>Get Register Now!</p>-->
                     <a class="btn btn-lg btn-success register-btn" href="<?= base_url('index.php/main/register')?>" type="submit">Register Now</a>
                </div>
            </div>
        
	
</div>
         
        </div>    
    </div>
</div>
