<?php
include_component('moduleMenu', 'breadscrumbs', array('arrBread' => array(__('Contact Us'))));
?>


<div class="contact_map mt-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map-area">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Han%20Exim%20Club%20%C4%90%C3%A0o%20t%E1%BA%A1o%20Xu%E1%BA%A5t%20nh%E1%BA%ADp%20kh%E1%BA%A9u%20logistics&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:300px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:1080px;}</style></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3>contact us</h3>
                    <p>GLOVIMEX COMPANY LIMITED</p>
                    <ul>
                        <li><i class="fa fa-fax"></i>  Address : No.18, 67 Lane, Chua Lang street, Dong Da district, Hanoi, Vietnam</li>
<!--                        <li><i class="fa fa-phone"></i> <a href="#">Infor@roadthemes.com</a></li>-->
                        <li><i class="fa fa-phone"></i>Hotline: +84 916869585 | +84 906246584</li>
                        <li><i class="fa fa-phone"></i>Email: sale@glovimex.com | harry@glovimex.com</li>
                        <li><i class="fa fa-phone"></i>Wechat: jade_thuy</li>
                        <li><i class="fa fa-phone"></i>Skype: jade.exim</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3>Tell us your project</h3>
                    <form id="contact-form" method="POST" action="assets/mail.php">
                        <p>
                            <label> Your Name (required)</label>
                            <input name="name" placeholder="Name *" type="text">
                        </p>
                        <p>
                            <label>  Your Email (required)</label>
                            <input name="email" placeholder="Email *" type="email">
                        </p>
                        <p>
                            <label>  Subject</label>
                            <input name="subject" placeholder="Subject *" type="text">
                        </p>
                        <div class="contact_textarea">
                            <label>  Your Message</label>
                            <textarea placeholder="Message *" name="message" class="form-control2"></textarea>
                        </div>
                        <button type="submit"> Send</button>
                        <p class="form-messege"></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

