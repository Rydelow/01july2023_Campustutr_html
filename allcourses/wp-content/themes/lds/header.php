<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lds
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="width=device-width, initial-scale=1" name="viewport" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://www.campustutr.com/theme/lambda/layout/style/lds.css" />

 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

 <style type="text/css">



body{

    padding-top: 0;

}



nav.navbar.navbar-expand-lg.navbar-light.bg-transparent {

    background-color: transparent;

}

    header#page-header {

    display: none;

}



header.navbar ,img.lambda-shadow , div#page-navbar {

    display: none;

}



/*div#wrapper {

    display: none;

}*/

#wrapper{

    border-top: unset;

        width: 100%;

}



body#page-blocks-customhomepage-campustutr_for_students {

    background-image: unset;

}

.student_bg-layer{

    background-image: url("https://www.campustutr.com/blocks/customhomepage/image/CampusTutr_tutor-banner.png");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 675px;



}

input.btn.btn-info {

    font-weight: 600;

    color: #fff;

    border-radius: 20px;

    padding: 10px;

    background-color: #138496;

    border-color: #138496;

}

textarea {

    overflow: hidden;

    resize: vertical;

    width: 100%;

}

div#page {

    padding: 0;

}

#page-header-nav {

    min-height: 0;

}

ul.nav.justify-content {

    justify-content: space-evenly;

}

section#region-main .row{

    display: flex;

}

@media only screen and (max-width: 768px) {
.student_bg-layer{
        min-height: 499px;
    background-position: 84%;
    }
}


</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lds' ); ?></a>
 -->
	

<section class="bg-layer">
    <!-- Navigation -->


 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap" rel="stylesheet">

  
  <!-- Navigation -->


 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

  
<nav class="navbar navbar-expand-lg navbar-light bg-transparent pt-3 pb-3">

<div class="container-fluid">

    <div class="logo">
      <a href="https://www.campustutr.com">
			<img src="https://www.campustutr.com/theme/lambda/layout/image/logo.svg"></a>
		</div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<div class="top_menubx">	
  <ul class=" navbar-nav">
      <li class="nav-item" ><a href="https://www.campustutr.com/blocks/customhomepage/campustutr_for_schools.php">Schools & Colleges</a></li>
      <li class="nav-item" ><a href="https://www.campustutr.com/blocks/customhomepage/campustutr_for_tutors.php">Students</a></li>

      <li class="nav-item" ><a href="https://www.campustutr.com/blocks/customhomepage/campustutr_for_students.php">Tutors</a></li>

      <li class="nav-item explore dropdown"><a href="#"> Explore</a>
        <div class="dropdown-content">
<ul class='menu_box'><li class='b'><a href='javascript:void(0);' >Curriculum</a><div class='sub_pmn'><ul class='sbm_box'><h3 class='menutext'>Curriculum </h3><li><a href='' >CBSE </a></li><li><a href='' >ICSC </a></li><li><a href='' >STATE BOARD </a></li><li><a href='' >OTHERS </a></li> </ul> </div> </li><li class='b'><a href='javascript:void(0);' >Boards</a><div class='sub_pmn'><ul class='sbm_box'><h3 class='menutext'>Boards </h3><li><a href='' >ANDHRA PRADESH </a></li><li><a href='' >TELANGANA </a></li><li><a href='' >MAHARASHTRA </a></li><li><a href='' >TAMILNADU </a></li><li><a href='' >CHHATTISGARH </a></li><li><a href='' >ORISSA </a></li><li><a href='' >RAJASTHAN </a></li> </ul> </div> </li><li class='b'><a href='javascript:void(0);' >Courses</a><div class='sub_pmn'><ul class='sbm_box'><h3 class='menutext'>Courses </h3><li><a href='' >ENGINEERING </a></li><li><a href='' >MEDICAL </a></li><li><a href='' >PHARMACY </a></li><li><a href='' >BED </a></li><li><a href='' >MBA </a></li><li><a href='' >DIPLOMA </a></li> </ul> </div> </li><li class='b'><a href='javascript:void(0);' >Mock test</a><div class='sub_pmn'><ul class='sbm_box'><h3 class='menutext'>Mock test </h3><li><a href='' >JEE(main) </a></li><li><a href='' >JEE(advanced) </a></li> </ul> </div> </li></ul>      </div>
     
    </li>
	

   <li><div class="d-flex buttons">
        <a href="https://www.campustutr.com/blocks/customhomepage/login.php" class="reg"><button class="btn btn-default" type="submit">Login</button></a>
        <a href="https://www.campustutr.com/blocks/customhomepage/sign_up.php" class="log"> <button class="btn btn-default" type="submit">Join For Free</button></a>
    </div></li>
  </ul>
  </div>
</div>
       
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>


  


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
            <img src="https://www.campustutr.com/theme/lambda/layout/image/HeroImg.png" class="img-fluid">
        </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
</section>
