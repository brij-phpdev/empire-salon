<?php
include_once './includes/header.php';
?>
<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>Trendy Salon &amp; Spa</h3>
            <h2>Make an appointment</h2>
            <div class="heading-line"></div>
        </div>
    </div>
</section><!--/. page_header -->



<section class="service_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>Trendy Salon &amp; Spa</h3>
            <h2>Book our Services</h2>
            <div class="heading-line"></div>
        </div>


            

                <div id="step-1" >
                    


                    <div class="contact-form">
                        <form name="bookForm" id="ajax_form" class="form-horizontal" method="post" action="booking_post.php">

<h3 class="s2">Choose Services</h3>
<div class="row">
                                    <!--<div class="col-md-12">-->
                                
                                    <div class="col-3">
                                        <h5 class="s1">Haircuts</h5>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Haircuts" id="s_a1" value="Regular Haircut">
                                            <label for="s_a1">Regular Haircut</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Haircuts" id="s_a2" value="Scissors Haircut">
                                            <label for="s_a2">Scissors Haircut</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Haircuts" id="s_a3" value="Kids Haircut">
                                            <label for="s_a3">Kids Haircut</label>
                                        </div>
                                    </div>
                                

                                
                                    <div class="col-3">
                                        <h5>Shave</h5>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Shave" id="s_b1" value="Head Shave">
                                            <label for="s_b1">Head Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Shave" id="s_b2" value="Royal Shave">
                                            <label for="s_b2">Royal Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Shave" id="s_b3" value="Royal Head Shave">
                                            <label for="s_b3">Royal Head Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Shave" id="s_b4" value="Beard Trim No Shave">
                                            <label for="s_b4">Beard Trim No Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Shave" id="s_b5" value="Beard Trim Shave">
                                            <label for="s_b5">Beard Trim Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services" id="s_b6" value="Beard Shave Up">
                                            <label for="s_b6">Beard Shave Up</label>
                                        </div>
                                    </div>
                                

                                
                                    <div class="col-3">
                                        <h5>Facial</h5>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Facial" id="s_c1" value="Deep Pore Cleansing">
                                            <label for="s_c1">Deep Pore Cleansing</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Facial" id="s_c2" value="Aromatherapy Facial">
                                            <label for="s_c2">Aromatherapy Facial</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Facial" id="s_c3" value="Acne Problem Facial">
                                            <label for="s_c3">Acne Problem Facial</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Facial" id="s_c4" value="European Facial">
                                            <label for="s_c4">European Facial</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Facial" id="s_c5" value="Glycolic Peel Facial">
                                            <label for="s_c5">Glycolic Peel Facial</label>
                                        </div>
                                    </div>
                                


                                    <div class="col-3">
                                        <h5>Package</h5>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Package" id="s_d1" value="Haircut + Shave">
                                            <label for="s_d1">Haircut + Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Package" id="s_d2" value="Haircut + Beard Trim">
                                            <label for="s_d2">Haircut + Beard Trim</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Package" id="s_d3" value="Haircut + Beard Trim Shave">
                                            <label for="s_d3">Haircut + Beard Trim Shave</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="Services Package" id="s_d4" value="Haircut + Beard Shape Up">
                                            <label for="s_d4">Haircut + Beard Shape Up</label>
                                        </div>
                                    </div>
                                
                                <input type="hidden" name="serviceId" value="1" />
                                <input type="hidden" name="agentId" value="1" />
                                <input type="hidden" name="serviceAdult" value="1" />
                                <input type="hidden" name="serviceChildren" value="1" />

                            <!--</div>-->
                            <div class="clearfix"></div>
                            </div>

                            <div class="spacer-single"></div>

                            <!-- step 2 -->

                            <!--<div class="row" >-->
                                <!--                                        <div class="col-lg-6 ">
                                                                            <h3 class="s2">Choose Staff</h3>
                                
                                                                            <div class="de_form de_radio">
                                                                                <div class="radio-img">
                                                                                    <input id="radio-1a" name="Staff" type="radio" value="Steven" checked="checked">
                                                                                    <label for="radio-1a"><img src="images/team/1.jpg" alt="">Steven</label>
                                                                                </div>
                                
                                                                                <div class="radio-img">
                                                                                    <input id="radio-1b" name="Staff" type="radio" value="Huey">
                                                                                    <label for="radio-1b"><img src="images/team/2.jpg" alt="">Huey</label>
                                                                                </div>
                                
                                                                                <div class="radio-img">
                                                                                    <input id="radio-1c" name="Staff" type="radio" value="Harry">
                                                                                    <label for="radio-1c"><img src="images/team/3.jpg" alt="">Harry</label>
                                                                                </div>
                                
                                                                                <div class="radio-img">
                                                                                    <input id="radio-1d" name="Staff" type="radio" value="Axe">
                                                                                    <label for="radio-1d"><img src="images/team/4.jpg" alt="">Axe</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->

                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <h3 class="s2">Select Date</h3>
                                        <input type="date" name="date" id="date" class="form-control" min="<?php echo date('Y-m-d') ?>" required />
                                        <div class="spacer-single"></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h3 class="s2">Select Time</h3>

                                        <div class="custom_radio">
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_8AM" value="8:00 AM" name="select_time" checked><label for="choose_8AM">8:00 AM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_9AM" value="9:00 AM" name="select_time"><label for="choose_9AM">9:00 AM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_10AM" value="10:00 AM" name="select_time"><label for="choose_10AM">10:00 AM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_11AM" value="11:00 AM" name="select_time"><label for="choose_11AM">11:00 AM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_12AM" value="12:00 AM" name="select_time"><label for="choose_12AM">12:00 AM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_1PM" value="1:00 PM" name="select_time"><label for="choose_1PM">1:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_2PM" value="2:00 PM" name="select_time"><label for="choose_2PM">2:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_3PM" value="2:00 PM" name="select_time"><label for="choose_3PM">2:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_4PM" value="3:00 PM" name="select_time"><label for="choose_4PM">3:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_5PM" value="4:00 PM" name="select_time"><label for="choose_5PM">4:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_6PM" value="5:00 PM" name="select_time"><label for="choose_6PM">5:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_7PM" value="6:00 PM" name="select_time"><label for="choose_7PM">6:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_8PM" value="7:00 PM" name="select_time"><label for="choose_8PM">7:00 PM</label>
                                            </div>
                                            <div class="radio-opt">
                                                <input type="radio" id="choose_9PM" value="8:00 PM" name="select_time"><label for="choose_9PM">8:00 PM</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <!--</div>-->

                            <div class="spacer-single"></div>


                            <h3 class="s2">Your details</h3>

                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <div id='name_error' class='error'>Please enter your name.</div>
                                    <div class="mb25">
                                        <input type='text' name='Name' id='name' class="form-control" placeholder="Your Name" required>
                                    </div>

                                    <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                                    <div class="mb25">
                                        <input type='email' name='Email' id='email' class="form-control" placeholder="Your Email" required>
                                    </div>

                                    <div id='phone_error' class='error'>Please enter your phone number.</div>
                                    <div class="mb25">
                                        <input type='text' name='phone' id='phone' class="form-control" placeholder="Your Phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div id='message_error' class='error'>Please enter your message.</div>
                                    <div>
                                        <textarea name='message' id='message' class="form-control" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div id="form-messages" class="alert" role="alert"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                        <!--<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY ?>"></div>-->
                                    <p id='submit' class="mt20">
                                        <input type='submit' id='send_message' value='Book' class="default_btn">
                                    </p>
                                </div>
                            </div>

<div id="success_message" class='success'>
                    Your message has been sent successfully. Refresh this page if you want to send more messages.
                </div>
                <div id="error_message" class='error'>
                    Sorry there was an error sending your form.
                </div>
                        </form>
                    </div>





                </div>



                
            

        </div>
</section>


<section class="cta_section padding d-none">
    <div class="container">
        <div class="display-table">
            <div class="table-cel">
                <div class="cta_content align-center wow fadeInUp" data-wow-delay="300ms">
                    <h2>Making You Look Good <br> Is In Our Haritage.</h2>
                    <p>Barber is a person whose occupation is mainly to cut dress groom <br>style and shave men's and boys hair.</p>
                    <a href="#" class="default_btn">Make Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.cta_section -->
<!-- content close -->
<?php
include_once './includes/footer.php';
?>
