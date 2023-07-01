  <!-- Navigation -->


 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

  
<nav class="navbar navbar-expand-lg navbar-light bg-transparent pt-3 pb-3">

<div class="container-fluid">

    <div class="logo">
      <a href="<?= $CFG->wwwroot; ?>">
			<img src="<?= $CFG->wwwroot; ?>/theme/lambda/layout/image/logo.svg"></a>
		</div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<div class="top_menubx">	
  <ul class=" navbar-nav">
      <li class="nav-item" <?php if($sitetitle=="forschool"){ echo "style='display:none;'"; } ?>><a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/campustutr_for_schools.php">Schools & Colleges</a></li>
      <li class="nav-item" <?php if($sitetitle=="forstudent"){ echo "style='display:none;'"; } ?>><a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/campustutr_for_students.php  ">Students</a></li>

      <li class="nav-item" <?php if($sitetitle=="fortutors"){ echo "style='display:none;'"; } ?>><a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/campustutr_for_tutors.php">Tutors</a></li>

     <!--  <li class="nav-item explore dropdown"><a href="#"> Explore</a>
        <div class="dropdown-content">
<?php   echo "<ul class='menu_box'>";    
local_universitystr_extend_navigation($a);
        echo "</ul>";
        ?>
      </div>
     
    </li> -->
	

   <li class="dk"><div class="d-flex buttons " >
        <a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/login.php" class="reg"><button class="btn btn-default" type="submit">Login</button></a>
        <a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/sign_up.php" class="log"> <button class="btn btn-default" type="submit">Join For Free</button></a>
    </div></li>
  </ul>
  </div>
</div>
       
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<style type="text/css">
  @media(max-width: 767px){
  .dk{
    display: none;
  }
  .vn{
  list-style: none;
      margin-top: 15px;
    display: block !important;
}
}

.vn{
  list-style: none;
    display: none;
}
</style>
