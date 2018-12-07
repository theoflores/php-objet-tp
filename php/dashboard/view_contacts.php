<?php

require_once 'config.php';
include 'header.php';
try {
   $sql = "SELECT * FROM contact WHERE 1 AND id_contact = :cid";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":cid", intval($_GET["cid"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="index2.php">Accueil</a></li>
      <li class="active">Voir le contact</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Voir le contact</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="process_form.php">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="first_name"><span class="required">*</span>Prénom:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="Prénom" value="<?php echo $results[0]["first_name"] ?>" id="first_name" class="form-control" name="first_name"><span id="first_name_err" class="error"></span>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="last_name"><span class="required">*</span>Nom:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["last_name"] ?>" placeholder="Nom" id="last_name" class="form-control" name="last_name"><span id="last_name_err" class="error"></span>
              </div>
            </div>
            
             <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic">Profile picture:</label>
              <div class="col-lg-5">
                <?php $pic = ($results[0]["profile_pic"] <> "" ) ? $results[0]["profile_pic"] : "no_avatar.png" ?>
                <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="email_id"><span class="required">*</span>Email:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["email_address"] ?>" placeholder="Email" id="email_id" class="form-control" name="email_id"><span id="email_id_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no1"><span class="required">*</span>Téléphone:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["contact_no1"] ?>" placeholder="Numéro de téléphone" id="contact_no1" class="form-control" name="contact_no1"><span id="contact_no1_err" class="error"></span>
              </div>
            </div>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
<?php
include './footer.php';
?>