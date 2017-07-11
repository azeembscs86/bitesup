ِ<?php
//echo '<pre>';
//print_r($page_name);
//exit;
?>

<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>img/avatar5.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Admin</p>

                <a href="#">Administrator</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="<?php
                        if ($page_name == 'index')
                            echo 'active';
                        ?>">
                <a href="<?= base_url(); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php
                        if ($page_name == 'employees' ||
                                $page_name == 'recruiters')
                            echo 'active';
                        ?>">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>User Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                        if ($page_name == 'employees')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/users/employees_listing"><i class="fa fa-angle-double-right"></i> Employees Management</a></li>
                    <li class="<?php
                        if ($page_name == 'recruiters')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/users/recruiters_listing"><i class="fa fa-angle-double-right"></i> Recruiters Management</a></li>
                    <li></li>
                </ul>

            </li>
            <li class="treeview <?php
                        if ($page_name == 'userplan' ||
                                $page_name == 'planaccess')
                            echo 'active';
                        ?>">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Plans Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                        if ($page_name == 'userplan')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/users_plans_listing"><i class="fa fa-angle-double-right"></i> Users Plan Management</a></li>
<!--                    <li class="<?php
                        if ($page_name == 'planaccess')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/plan_access_management"><i class="fa fa-angle-double-right"></i> Plan Access Management</a>
                    </li>-->
                    <li></li>
                </ul>

            </li>
            
            <li class="treeview <?php
                        if ($page_name == 'jobs' ||
                                $page_name == 'news' ||
                                $page_name == 'industry')
                            echo 'active';
                        ?>">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>System</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                        if ($page_name == 'jobs')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/jobs_listing"><i class="fa fa-angle-double-right"></i> Jobs Management</a></li>
                    <li class="<?php
                        if ($page_name == 'news')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/news_listing"><i class="fa fa-angle-double-right"></i> News Management</a></li>
                    <li class="<?php
                        if ($page_name == 'industry')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/industry_listing"><i class="fa fa-angle-double-right"></i> Industry Management</a></li>
                                                    <li class=""><a href="<?= base_url() ?>index.php/message_center/index"> <i class="fa fa-home"></i> <span>Message Centre</span> </a> </li>

                    
                    <li></li>
                </ul>

            </li>
            <li class="treeview <?php
                        if ($page_name == 'country' ||
                                $page_name == 'state' ||
                                $page_name == 'city')
                            echo 'active';
                        ?>">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Location Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                        if ($page_name == 'country')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/country_listing"><i class="fa fa-angle-double-right"></i> Country Management</a></li>
                    <li class="<?php
                        if ($page_name == 'state')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/state_listing"><i class="fa fa-angle-double-right"></i> State Management</a></li>
                    <li class="<?php
                        if ($page_name == 'city')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/city_listing"><i class="fa fa-angle-double-right"></i> City Management</a></li>
                    <li></li>
                </ul>

            </li>
            
            <li class="treeview <?php
                        if ($page_name == 'faq' ||
                                $page_name == 'aboutus' ||
                                $page_name == 'termsandconditions' ||
                                $page_name == 'privacypolicy')
                            echo 'active';
                        ?>">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Site Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class=" treeview-menu ">
                    <li class="<?php
                        if ($page_name == 'faq')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/faq"><i class="fa fa-angle-double-right"></i> FAQ </a></li>
                    <li class="<?php
                        if ($page_name == 'aboutus')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/aboutus"><i class="fa fa-angle-double-right"></i> About Us </a></li>
                    <li class="<?php
                        if ($page_name == 'termsandconditions')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/termsandconditions"><i class="fa fa-angle-double-right"></i> Terms $ Conditions </a></li>
                    <li class="<?php
                        if ($page_name == 'privacypolicy')
                            echo 'active';
                        ?>"><a href="<?= base_url() ?>index.php/system/privacy_policy"><i class="fa fa-angle-double-right "></i> Privacy Policy </a></li>
                    <li></li>
                </ul>

            </li>
            
            <!--<li class=""><a href="<?= base_url() ?>index.php/system/aboutus"> <i class="fa fa-home"></i> <span>About Us</span> </a> </li>-->
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

