<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lds
 */

?>

<footer class="bg-mapimg highlights-bg">
  <div class="container mb-4">
  <div class="row">
    <div class="col-md-4 pt-4">

      <address class="text-white"><h4><u>Address</u></h4>
        CampusTutr.com<br>
5th Floor IT Hub Khammam<br>
India-507001<br>
        <p>Phone: +91 9701294401 <br>
        Email: Support@Campustutr.com</p>
      </address>
      <div class="footer-social-icon mb-5">
        <ul class="text-white">
          <li><a href=""> <i class="fab fa-facebook-f"></i></a></li>
          <li><a href=""> <i class="fab fa-twitter"></i></a></li>
          <li><a href=""> <i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
      <div class="quick-link text-white">
        <h4><u>Quick Links</u></h4>
        <ul class="text-white">
          <li><a class="text-white" href="https://www.campustutr.com/blocks/customhomepage/about.php"><i class="fas fa-angle-right"></i> About Us</a></li>
          <li><a class="text-white" href="https://www.campustutr.com/blocks/customhomepage/learning.php"><i class="fas fa-angle-right"></i> Learning</a></li>
          <li><a class="text-white" href=""><i class="fas fa-angle-right"></i> Join Now</a></li>
          <li><a class="text-white" href="https://www.campustutr.com/blocks/customhomepage/pricing.php"><i class="fas fa-angle-right"></i> Pricing</a></li>
          <li><a class="text-white" href="https://www.campustutr.com/blocks/customhomepage/contact.php"><i class="fas fa-angle-right"></i> Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="contact-form">
        <h1 class=" text-center ">Contact Us</h1>
        <div class="form-us mt-4">
        <form method="POST" action="https://www.campustutr.com/theme/lambda/layout/includes/mail.php">
          <div class="form-group mb-4">
          <input type="Name"  placeholder="Name"  class="form-control" name="fullname" required='true'>
        </div>
        <div class="form-group mb-4">
          <input type="Email" placeholder="Email" class="form-control" name="email" required='true'>
        </div>
        <div class="form-group mb-4">
          <input type="number" placeholder="Phone" class="form-control" name="phone" required='true'>
        </div>
        <div class="form-group mb-4">
         <textarea rows="3" cols="70" placeholder="Message" name="message">
</textarea>

         <!--- <input type="text" placeholder="Message" class="form-control" name="message" required='true'>--->
        </div>
        <div class="form-group mb-4 text-right">
          <input type="submit" value="SEND MESSAGE" name="send_message" class="btn btn-info">
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="sub-footer pb-1">
  <p class="text-center mb-0">&copy; 2021 All Rights Reserved</p>
</div>
</footer>


 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<style>

         .headeing {

    color: #ffae00;

} 

section#region-main {

    width: 100%!important;

    display: inline-block;

}

section#region-main .row {

    display: inline-flex;

    justify-content: space-between;

}

aside#block-region-side-pre {

    display: none;

}

.campus_tutur-image.first img {

    margin-left: 4em;

}

@media only screen and (max-width: 768px) {

    section#region-main .row {

    display: inline-block;

    justify-content: space-between;

}

.campus_tutur-image.first img {

    margin-left: 0em;

}

}

</style>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
