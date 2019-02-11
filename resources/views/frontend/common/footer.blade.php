<div class="coupons m-t-50">
    <div class="coupons-grids text-center">
        <div class="w3layouts_mail_grid">

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>PROMO CODE</h3>
                    <p></p>
                    <p>stay tuned on our website and social media accounts to get promo code notifications</p>
                    <p></p>
                </div>
            </div>

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>ORDER  BY ONLINE SHOP</h3>
                    <p></p>
                    <p>get some special price in our online shop in Tokopedia and Shopee</p>
                    <p></p>
                </div>
            </div>

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa fa-headphones" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>CUSTOMER SUPPORT</h3>
                    <p></p>
                    <p>we provide online customer support from Monday to Saturday 08.00 a.m untill 17.00 p.m</p>
                    <p></p>
                </div>
            </div>

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>LIFE TIME GUARANTEE</h3>
                    <p></p>
                    <p>we guarantee Endless OS in any products with life time guarantee</p>
                    <p></p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>

<div class="footer">
    <div class="footer_agile_inner_info_w3l">
        <div class="col-md-3 footer-left">
            <a href="index.php"><img src="{!! asset('resources/views/frontend/images/logo/endless.png') !!}" class="img-responsive" /></a>
            <p>Follow our social media to see our event, new information, and update promotion.</p>
            <div class="w3-address">
                <div class="w3-address-grid">
                    <div class="w3-address-left">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                    <div class="w3-address-right">
                        <h6>{{ App\Models\Setting::getAttr('phone_no') }}</h6>
                    </div>
                </div>
                <div class="w3-address-grid">
                    <div class="w3-address-left">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="w3-address-right">
                        <h6>{{ App\Models\Setting::getAttr('contact_us_email') }}</h6>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9 footer-right">
            <div class="sign-grds">
                <div class="col-md-4 sign-gd">
                    <h4>Information </h4>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-blankenheim.html">About</a></li>
                        <li><a href="how-to-buy.html">How to buy</a></li>
                        <li><a href="faq-blankenheim.html">FAQ</a></li>
                        <li><a href="payment-confirmation.html">Payment confirmation</a></li>
                        <li><a href="track-my-order.html">Track your order</a></li>
                    </ul>
                </div>

                <div class="col-md-4 sign-gd-two">
                    <h4>Customer Support</h4>
                    <div class="w3-address">
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Phone number</h6>
                                <p>{{ App\Models\Setting::getAttr('phone_no') }}</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Email address</h6>
                                <p><a href="mailto:{{ App\Models\Setting::getAttr('contact_us_email') }}"> {{ App\Models\Setting::getAttr('contact_us_email') }}</a></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 sign-gd flickr-post">
                    <h4>Location</h4>
                    <div class="w3-address-grid">
                        <div class="w3-address-left">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="w3-address-right">
                            <h6>
                                {{ App\Models\Setting::getAttr('address') }}, {{ App\Models\Setting::getAttr('city') }}, {{ App\Models\Setting::getAttr('state') }}
                            </h6>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="text-right">
            <p class="copy-right">Term of use | Privacy Policy | Endless OS  Redistribution Policy</p>
        </div>
    </div>
</div>
<!-- //footer -->