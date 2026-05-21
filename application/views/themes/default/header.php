<style>
    .navbar-nav > li > a{
        color: #000;
    }
    .nav > li > a:hover{
        color:#f2c686;
        background-color: #fff;
    }
    .navbar-nav > .active > a, .navbar-nav > .active > a:focus, .navbar-nav > .active > a:hover{
        color:#f2c686;
        background-color: #fff;
    }
   
    .is_appointment:hover{
        color:#fff;
        background-color: #e7be7e !important;
    }
        
    .is_appointment .fa.fa-plus {
        transition: transform 0.3s ease;
        display: inline-block;
    }

    .is_appointment:hover .fa.fa-plus {
        transform: rotate(90deg);
    }
    @media (min-width: 1430px) {
        .is_appointment{
            margin-left:200px;
            border-radius:0px;
        }
    }

@media (min-width: 1324px) and (max-width: 1430px) {
    .navbar-right {
        float: right !important;
        margin-left: 8%;
    }
    .is_appointment{
        margin-left:100px;
        border-radius:0px;
    }
}

/* @media (min-width: 1024px) {
    .navbar .navbar-header .navbar-toggle {
        display: block;
    }
}
@media (min-width: 1024px) {
    .navbar .navbar-collapse.collapse {
        display: none !important;
        height: auto !important;
        padding-bottom: 0;
        overflow: visible !important;
    }
}

@media (min-width: 1024px) {
    .navbar .navbar-collapse.in {
        overflow-y: visible !important;
    }
}
@media (min-width: 1024px) {
    .navbar-collapse {
        width: auto;
        border-top: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
} */


@media (min-width: 1024px) {
   #call_us{
    text-align: end;
    padding:0px 4rem
   }
}

@media only screen and (max-width: 600px) {
        .is_appointment{
            margin-left:14px;
            width: 250px;

        }
    }
</style>
<header style="background-color:#247979;" >
    <div class="container-fluid" style="padding:7px" >
        <div class="row">
            <div class="col-md-6" style="padding:0px 4rem">
            <h6 style="font-size:14px;font-weight:600;color:#fff"> <span style="color:#e5bb78;"> Working time </span>: Mon – Sat: 10:00AM – 08:00PM </h6>
            </div>
            <div class="col-md-6" id="call_us" style="padding:0px 4rem">
            <a href="tel:+91 9096855853">
            <h6 style="font-size:14px;font-weight:600;color:#fff"> <i class="fa fa-phone" style="color:#000" aria-hidden="true"></i><span style="color:#e5bb78"> Give Us a Call </span> : +91 9096855853</h6></a>
            </div>
        </div>
    </div>  
</header>
 <header>
    <div class="container-fluid" style="background-color:#fff;">
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                            <span class="sr-only"><?php echo $this->lang->line('toggle_navigation'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url($front_setting->logo); ?>" alt="" style=" mix-blend-mode:multiply;height:40px;max-height:40px;"/></a> -->
                        <a class="navbar-brand logo" href="https://elif.in/"><img src="<?php echo base_url($front_setting->logo); ?>" alt="" style=" mix-blend-mode:multiply;height:40px;max-height:40px;"/></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse-3">
                        <ul class="nav navbar-nav navbar-right" >
                            <?php
                            foreach ($main_menus as $menu_key => $menu_value) {
                                $submenus = false;
                                $cls_menu_dropdown = "";
                                $menu_selected = "";
                                if ($menu_value['page_slug'] == $active_menu) {
                                    $menu_selected = "active";
                                }
                                if (!empty($menu_value['submenus'])) {
                                    $submenus = true;
                                    $cls_menu_dropdown = "dropdown";
                                }
                                if ($menu_value['menu'] == $active_menu) {
                                    $menu_selected = "active";
                                }
                                $is_appointment = strtolower($menu_value['menu']) == 'appointment';
                                $is_home = strtolower($menu_value['menu']) == 'home1';

                                ?>
                                <li class="<?php echo $menu_selected . " " . $cls_menu_dropdown; ?>" >
                                    <?php
                                    if (!$submenus) {
                                        $top_new_tab = '';
                                        $url = '#';
                                        if ($menu_value['open_new_tab']) {
                                            $top_new_tab = "target='_blank'";
                                        }
                                        if ($menu_value['ext_url']) {
                                            $url = $menu_value['ext_url_link'];
                                        } else {
                                            $url = site_url($menu_value['page_url']);
                                        }
                                        if(!$is_home)
                                        {
                                        ?>
                                        <a class="<?php echo $is_appointment ? 'is_appointment' : ''; ?>"  style="letter-spacing: 1px; text-transform: uppercase; <?php echo $is_appointment ? 'color: #fff; background-color: #387a70;padding:15px;' : ''; ?>" href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $menu_value['menu']; ?><?php echo $is_appointment ? '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; <i aria-hidden="true" class="fa fa-plus"></i>' : ''; ?></a>
                                        <?php
                                        }
                                    } else {
                                        $child_new_tab = '';
                                        $url = '#';
                                        ?>
                                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu_value['menu']; ?> <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            foreach ($menu_value['submenus'] as $submenu_key => $submenu_value) {
                                                if ($submenu_value['open_new_tab']) {
                                                    $child_new_tab = "target='_blank'";
                                                }
                                                if ($submenu_value['ext_url']) {
                                                    $url = $submenu_value['ext_url_link'];
                                                } else {
                                                    $url = site_url($submenu_value['page_url']);
                                                }
                                                ?>
                                                <li><a  href="<?php echo $url; ?>" <?php echo $child_new_tab; ?> ><?php echo $submenu_value['menu'] ?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav><!-- /.navbar -->
            </div>
        </div>
    </div>  
    </header>