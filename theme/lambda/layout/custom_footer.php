<?php 
global $PAGE, $CFG;
?>
<footer class="bg-mapimg highlights-bg">
  <div class="container mb-4">
  <div class="row">
    <div class="col-md-4 pt-4">

      <address class="text-white"><h4><u>Address</u></h4>
        CampusTutr.com<br>
4th floor, Kandi Towers, <br>
Opposite Raheja Mindspace,<br>
Phase II, Hitech City Hyderabad,<br>
TS-500081<br>
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
     
    </div>
    <div class="col-md-4 pt-4">
       <div class="quick-link text-white">
        <h4><u>Quick Links</u></h4>
        <ul class="text-white">
          <li><a class="text-white" href="<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/about.php"><i class="fas fa-angle-right"></i> About Us</a></li>
          <li><a class="text-white" href="<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/learning.php"><i class="fas fa-angle-right"></i> Learning</a></li>
          <li><a class="text-white" href=""><i class="fas fa-angle-right"></i> Join Now</a></li>
          <li><a class="text-white" href="<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/pricing.php"><i class="fas fa-angle-right"></i> Pricing</a></li>

        

          <li><a class="text-white" href="<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/terms_and_conditions.php"><i class="fas fa-angle-right"></i> Terms and Conditions, Privacy Policy</a></li>
        </ul>
      </div>



    </div>
    <div class="col-md-4">
     
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="sub-footer pb-1">
  <p class="text-center mb-0">&copy; 2021 All Rights Reserved</p>
</div>
</footer>

<script type="text/javascript">
  
    
 $('#contemil').on('keyup', function () {
        var email=jQuery(this).val();
    if(email.length>0){
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)){
            
                    $('#cemailmessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    $(":submit").removeAttr("disabled");
                    return (true);
               
           
           
            
            }else{
        $('#cemailmessage').html('Please Enter valid Email address').css('color', 'red');  
            $(":submit").attr("disabled", true);
            return (false);
            }
        }
    });

 $('#contphone').on('keyup', function () {
        var phone=jQuery(this).val();
    if(phone.length>0){
            if (/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/.test(phone)){
            
                    $('#cphonemessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    $(":submit").removeAttr("disabled");
                    return (true);
               
           
           
            
            }else{
        $('#cphonemessage').html('Please Enter valid Phone Number').css('color', 'red');  
            $(":submit").attr("disabled", true);
            return (false);
            }
        }
    });




</script>