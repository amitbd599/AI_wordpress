<?php

/**
 * Template Name: Contact
 */

get_header();

?>

<main>


   <!-- Contact Section start -->
   <section class="contact-section">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="section-title-shape-one">
                  <h2>Contact With Us</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-8">
               <form id="contact-form" class="contact-form" action="mail.php" method="POST">

                  <div class="d-block d-md-flex gap-0">
                     <div class="form-author">
                        <label>Name <span class="required">*</span>
                        </label>
                        <input type="text" id="name" name="name" required="required">
                     </div>
                     <div class="form-email mt-2 mt-md-0">
                        <label>Email <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" required="required">
                     </div>
                  </div>


                  <div class="d-block d-md-flex gap-0 mt-2">
                     <div class="form-author">
                        <label>Subject <span class="required">*</span>
                        </label>
                        <input type="text" id="subject" name="subject" required="required">
                     </div>
                     <div class="form-web mt-2 mt-md-0">
                        <label>Website</label>
                        <input type="url" id="url" name="url">
                     </div>
                  </div>

                  <div class="form-comment mt-2">
                     <label>Massage <span class="required">*</span></label>
                     <textarea name="message" rows="8" spellcheck="false"></textarea>
                  </div>

                  <div class="form-submit">
                     <div class="inner-btn">
                        <div>
                           <button class="default-btn" type="submit">
                              Send Massage
                           </button>
                        </div>
                     </div>
                  </div>
               </form>
               <p class="form-Messages mt-3"></p>
            </div>
            <div class="col-lg-4">
               <div class="appointment">
                  <div class="title">
                     <h4>Need Appointment</h4>
                     <p>Schedule a meeting with someone, as in Do I need to make another appointment with the team?
                     </p>
                  </div>
                  <table class="table  table-dark">
                     <thead>
                        <tr>
                           <th scope="col">Day</th>
                           <th scope="col">Morning</th>
                           <th scope="col">Night</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th scope="row">Sunday</th>
                           <td>Closed</td>
                           <td>5pm - 9pm</td>
                        </tr>
                        <tr>
                           <th scope="row">Monday - Friday</th>
                           <td>Open</td>
                           <td>5pm - 9pm</td>
                        </tr>
                        <tr>
                           <th scope="row">Saturday</th>
                           <td>Closed</td>
                           <td>Closed</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>

         <div class="row location-tag">
            <div class="col-lg-3 col-md-6 col-12">
               <div class="item wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                  <div class="icon">
                     <i class="fa-sharp fa-solid fa-location-dot"></i>
                  </div>
                  <div class="view">
                     <h3>Head Office</h3>
                     <p>2590 Rockford Mountain Lane Four Oaks, NC.</p>
                  </div>
               </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
               <div class="item wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                  <div class="icon">
                     <i class="fa-solid fa-headset"></i>
                  </div>
                  <div class="view">
                     <h3>Need Support?</h3>
                     <p>Phone: +919-963-4308</p>
                     <p>Phone: +913-624-2047</p>
                  </div>
               </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
               <div class="item wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                  <div class="icon">
                     <i class="fa-regular fa-messages"></i>
                  </div>
                  <div class="view">
                     <h3>Live Chat</h3>
                     <p>Need live chat all the time with our company 24/7</p>
                  </div>
               </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
               <div class="item wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                  <div class="icon">
                     <i class="fa-solid fa-envelope"></i>
                  </div>
                  <div class="view">
                     <h3>Email Us</h3>
                     <p>help-dline@demo.com</p>
                     <p>support@demo.com</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="contact-map">

         <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.829986131271!2d-122.4746968033092!3d37.80374752160443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586e6302615a1%3A0x86bd130251757c00!2sStorey+Ave%2C+San+Francisco%2C+CA+94129!5e0!3m2!1sen!2sus!4v1435826432051"
            height="570"></iframe>
      </div>
      <div class="shape-image-file">
         <div class="shape-img-1 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/21_icon.png" alt="">
         </div>
         <div class="shape-img-2 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/64_icon.png" alt="">
         </div>
         <div class="shape-img-4 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/08_icon.png" alt="">
         </div>
         <div class="shape-img-5 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/78_icon.png" alt="">
         </div>
         <div class="shape-img-6 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/43_icon.png" alt="">
         </div>
         <div class="shape-img-7 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/68_icon.png" alt="">
         </div>
         <div class="shape-img-8 poa">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/71_icon.png" alt="">
         </div>

      </div>
   </section>
   <!-- Contact Section end -->

   <!-- News Letter One start -->
   <section class="news-letter one"
      data-background="<?php echo get_template_directory_uri(); ?>./assets/img/shape/06_shape.png">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-12">
               <div class="left-wrapper wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                  <h5>Newsletter</h5>
                  <h2>Subscribe to newsletter <br> & get company news.</h2>
               </div>
            </div>
            <div class="col-lg-6 col-12">
               <div class="right-wrapper wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                  <form action="#">
                     <div class="input-box">
                        <input type="text" placeholder="Enter Your Email Address">
                        <a class="submit" href="#">Sign Up Free</a>
                     </div>
                  </form>

               </div>
            </div>
         </div>
      </div>
      <div class="shape-image">
         <img class="shape-1 poa" src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/60_icon.png" alt="">
         <img class="shape-2 poa" src="<?php echo get_template_directory_uri(); ?>./assets/img/icon/61_icon.png" alt="">
      </div>
   </section>
   <!-- News Letter One end -->



</main>


<?php
get_footer();

