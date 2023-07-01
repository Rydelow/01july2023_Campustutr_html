<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">-->
   <?php 
include('menu.php');
global $DB, $OUTPUT, $PAGE, $USER;
include("enquiry.php");
        ?>
<section class="bg-layer">
  <?php include('custom_header.php'); ?>
  </div>
<ul class="vn">
 <li class="mbv"><div class="d-flex buttons " >
        <a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/login.php" class="reg"><button class="btn btn-default" type="submit">Login</button></a>
        <a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/sign_up.php" class="log"> <button class="btn btn-default" type="submit">Join For Free</button></a>
    </div></li>
</ul>
<div class="container-fluid">
	<div class="row align-items-center">
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<div class="banner-text">
        <span class="online-text">on-line Education</span>
        <p class="lets-text">Lets Grow Your<br>Education Level up with <span class="yello-text">CAMPUSTUTR</span></p>
      </div>
		</div>
		<div class="col-md-4">
		<div class="top-layer">
			<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/HeroImg.png" class="img-fluid">
		</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
</section>
<section class="curve-img"> </section>

    <style>
.sub_pmn ul.sbm_box h3.menutext.animated.fadeIn{
    text-align: justify;
    color: #0179ca;
}
	ul.sbm_box {
        border-left: 1px solid #999 !important;
    margin-left: 0px;
	}
.top_menubx {
    width: 100%;
}

	
nav {    
    display: block;
    text-align: center;
  }
  nav ul {
    margin: 0;
    padding:0;
    list-style: none;
  }
  .nav a {
    display:block; 
    color:#111; 
    text-decoration: none;
     /*padding: 6px 12px;*/
    text-shadow: 0 -1px 0 #000;
    position: relative;
	font-size: 16px;
  }
  .nav{  
    vertical-align: top; 
    justify-content:space-evenly;
    align-items: center;
    box-shadow: 1px -1px -1px 1px #000, -1px 1px -1px 1px #fff, 0 0 6px 3px #fff;
    border-radius:6px;
  }
  /* .nav li{position: relative;} */
  .nav > li { 
    float:left;  
    margin-right: 1px; 
  } 
  .nav > li > a { 
    margin-bottom:1px;
   /*  box-shadow:inset 0 2em .33em -.5em #fff;  */
  }

  .nav ul> li> a {
	text-align: justify;
	}
/*  .nav > li:first-child  { border-radius: 4px 0 0 4px;} 
  .nav > li:first-child>a{border-radius: 4px 0 0 0;}
  .nav > li:last-child  { 
    border-radius: 0 0 4px 0; 
    margin-right: 0;
  } */

   
   div[role=main] {
    display: none;
}
   
   
   
   /* submenu positioning*/

}
.nav > li li ul {  border-left:1px solid #fff;}


.navbar .nav>li>a {
    background: #0178ca00;
}
.navbar .nav>li>a:hover {
    background: #0178ca00;
}
.nav > li li:hover > .sub_pmn ul { 
  left: 100%;
  top: 0px;
}


button.navbar-toggler {
    position: absolute;
    z-index: 99;
    right: 0;
    top: 20px;
}


.pt-5 {
    padding-top: 2rem!important;
}




@media only screen and (max-width: 375px) {

.d-flex.buttons{
  position: unset;
}
.nav > li {
    margin-right: 61px;

}
}






@media only screen and (max-width: 768px) {
  .logo img {
    margin-left: -50px;
}
.hover-div {
    width: 345px;
    }
    ul.menu_box{
      width: 100%;
    }
    .nav ul> li> a{
      font-size: 16px;
    }
    ul.menu_box li{
      border-bottom: 1px solid #ddd;
    }
    .nav > li {
    margin-right: 61px;
}

.sub_pmn ul.sbm_box h3.menutext.animated.fadeIn{
  font-size: 1.75rem;
}

}










</style>

