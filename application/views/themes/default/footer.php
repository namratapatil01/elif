<!-- <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <h3 class="fo-title"><?php echo $this->lang->line('links'); ?></h3>
                <ul class="f1-list">
                    <?php
                    foreach ($footer_menus as $footer_menu_key => $footer_menu_value) {
                        $cls_menu_dropdown = "";
                        if (!empty($footer_menu_value['submenus'])) {
                            $cls_menu_dropdown = "dropdown";
                        }
                        ?>
                        <li class="<?php echo $cls_menu_dropdown; ?>">
                            <?php
                            $top_new_tab = '';
                            $url = '#';
                            if ($footer_menu_value['open_new_tab']) {
                                $top_new_tab = "target='_blank'";
                            }
                            if ($footer_menu_value['ext_url']) {
                                $url = $footer_menu_value['ext_url_link'];
                            } else {
                                $url = site_url($footer_menu_value['page_url']);
                            }
                            ?>
                            <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $footer_menu_value['menu']; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3 class="fo-title"><?php echo $this->lang->line('follow_us'); ?></h3>
                <ul class="social">
                    <?php $this->view('/themes/default/social_media'); ?>        
                </ul>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3 class="fo-title"><?php echo $this->lang->line('contact'); ?></h3>
                <ul class="co-list">
                    <li><i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo $school_setting->email; ?>"><?php echo $school_setting->email; ?></a></li>
                    <li><i class="fa fa-phone"></i><?php echo $school_setting->phone; ?></li>
                    <li><i class="fa fa-map-marker"></i><?php echo $school_setting->address; ?></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6">
                <a class="twitter-timeline" data-tweet-limit="1" href="javascript:void(0)"></a>
            </div>   
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <p><?php echo $front_setting->footer_text; ?></p>
                </div>
            </div>
        </div>
    </div>
</footer> -->
<style>
    .list_text{
        color:#F2C078 !important;
    }
    .white_color{
        color:#fff !important;
    }
    .padding_left{
        padding:0px 5px;
    }
    footer ul li{
        margin:7px;
    }
    footer h2{
        font-size:23px !important;
        margin-bottom: 15px !important;
    }
    footer .social_links a span i{
        border-radius: 50%;
        padding: 10px;
        color:white;
    }
</style>
<footer style="background-color:#272932">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="white_color text-left" >SERVICES</h2>
                <ul style="list-style-type: none;padding:0px">
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Behavioral Therapy</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Mindfulness Therapy</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Grief Counseling</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Telepsychiatry Therapy</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Family Therapy</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">CBT/ REBT/ DBT</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Stress Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="text-center">
                            <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                            <span class="list_text">Marriage Counseling</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="row" style="  padding: 0px 20px;">
                    <h2 class="white_color text-left" style="" >CITIES</h2>
                    <ul style="list-style-type: none;padding:0px">
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Nagpur Branch</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Kolhapur Branch</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Sangli Branch</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Miraj Branch</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row" style="margin-top: 15px;padding: 0px 20px;">
                    <h2 class="white_color text-left" >PROGRAMS</h2>
                    <ul style="list-style-type: none;padding:0px">
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Corporate Training</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Workshop & Webinars</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Awareness</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-check white_color padding_left"></i></span>
                                <span class="list_text">Counselling</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
            <div class="row" style="  padding: 0px 20px;">
                    <h2 class="white_color text-left" style="" >CORPORATE ADDRESS</h2>
                    <ul style="list-style-type: none;padding:0px">
                        <li>
                            <a href="https://elif.in/contact-us/">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-address-book white_color padding_left"></i></span>
                                <span class="list_text">4th - Floor, Skyes Extension <br> <span class="text-center" style="  margin-left: 25px;" > Business Hub, Kolhapur </span></span>
                            </a>
                        </li>
                        <li>
                        <a href="mailto:info@elif.in">
                                <span class="text-center">
                                <i aria-hidden="true" class="fa fa-envelope white_color padding_left"></i></span>
                                <span class="list_text">info@elif.in</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row" style="margin-top: 15px;padding: 0px 20px;">
                    <h2 class="white_color text-left" >BRANCH ADDRESS</h2>
                    <ul style="list-style-type: none;padding:0px">
                        <li>
                        <a href="https://elif.in/contact-us/">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-address-book  white_color padding_left"></i></span>
                                <span class="list_text">Oasis Hospital, Prashant Nagar,<br> <span class="text-center" style="  margin-left: 25px;" > Nagpur, MH-440013 INDIA </span></span>
                            </a>
                        </li>
                        <li>
                        <a href="mailto:info@elif.in">
                                <span class="text-center">
                                <i aria-hidden="true" class="fa fa-envelope white_color padding_left"></i></span>
                               <span class="list_text">info@elif.in</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                
            <div class="row" style="  padding: 0px 20px;">
                    <h2 class="white_color text-left" style="" >CALL OUR HELPLINE</h2>
                    <ul style="list-style-type: none;padding:0px">
                        <li>
                            <a href="tel:+91 9096855853">
                                <span class="text-center">
                                <i aria-hidden="true" class="fas fa-phone white_color padding_left"></i></span>
                                <span class="list_text">+91 9096855853</span>
                            </a>
                        </li>
                        <li>
                        <a href="mailto:info@elif.in">
                                <span class="text-center">
                                <i aria-hidden="true" class="fa fa-envelope white_color padding_left"></i></span>
                                <span class="list_text">info@elif.in</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row social_links" style="margin-top: 15px;padding: 0px 20px;">
                    <h2 class="white_color  text-left" >STAY CONNECT</h2>
                   
                            <a href="javascript:void(0)">
                                <span class="text-center">
                                <i aria-hidden="true" class="fab fa-facebook  padding_left" style=" background-color: #3b5998;"></i></span>
                            </a>
                      
                            <a href="https://twitter.com/Elif_health" target="_blank">
                                <span class="text-center">
                                <i aria-hidden="true" class="fab fa-twitter  padding_left" style=" background-color: #1da1f2;"></i></span>
                            </a>
                       
                            <a href="https://www.instagram.com/elif_mentalhealth?igsh=dWVob3o3YW80Mzhu" target="_blank">
                                <span class="text-center">
                                <i aria-hidden="true" class="fab fa-instagram  padding_left" style=" background-color: #e1306c;"></i></span>
                            </a>
                       
                            <a href="https://www.linkedin.com/company/elif-healthcare/" target="_blank">
                                <span class="text-center">
                                <i aria-hidden="true" class="fab fa-linkedin  padding_left" style=" background-color: #0077b5;"></i></span>
                            </a>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color:#247b7b;padding:20px 0px;color:#fff">
        <div class="col-md-6">
        <p class="text-left" style="padding-left:20px;" >© 2024 Elif Healthcare Private Limited, All Rights Reserved</p>
        </div>
        <div class="col-md-6 text-right">
        <a href="https://elif.in/privacy-policy/" style="text-decoration: none;color:#fff" >Privacy Policy  &nbsp;&nbsp;|</a>
        <a href="https://elif.in/refund_returns/" style="text-decoration: none;color:#fff" >Refund Policy &nbsp;&nbsp;|</a>
        <a href="https://elif.in/terms-condition/" style="text-decoration: none;color:#fff" >Terms And Conditions &nbsp;&nbsp;</a>
            
        </div>
    </div>
</footer>