<?php require_once(__DIR__ . '/../../../../config.php');
global $DB, $OUTPUT, $PAGE, $USER,$CFG;

          $instancesql = $DB->get_record_sql("SELECT * FROM {config} where `name`='custommenuitems'");
         $a=$instancesql->value;
  
               ?>
<?php if(!empty($_GET['mail'])){ 




	?>

<div class="sent_sms" id="div1send">
  
  <p class="sndp"><i class="fas fa-check-circle"></i>Message send Sucessfully</p>
</div>
<?php } ?>
<script type="text/javascript">
 setTimeout(function(){ 
      $("#div1send").hide();
}, 5000);
</script>