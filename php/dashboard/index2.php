<?php

require_once 'config.php';
include 'header.php';

class Resultats
{
    private $prenom;
    private $nom;
    private $mobile;
    private $email;
    public function __construct(string $prenom, string $nom, int $mobile, string $email)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mobile = $mobile;
        $this->email = $email;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


  
    /**
     * Get the value of mobile
     */ 
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set the value of mobile
     *
     * @return  self
     */ 
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

      /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

}

/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
    $pagenum = 1;
} else {
    $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] != "" && is_numeric($_GET["show"])) ? $_GET["show"] : 8;

try {
    $keyword = trim($_GET["keyword"]);
    if ($keyword != "") {
        $sql = "SELECT * FROM contact WHERE 1 AND "
            . " (prenom LIKE :keyword) ORDER BY prenom ";
        $stmt = $DB->prepare($sql);

        $stmt->bindValue(":keyword", $keyword . "%");

    } else {
        $sql = "SELECT * FROM contact WHERE 1 ORDER BY prenom ";
        $stmt = $DB->prepare($sql);
    }

    $stmt->execute();
    $total_count = count($stmt->fetchAll());

    $last = ceil($total_count / $page_limit);

    if ($pagenum < 1) {
        $pagenum = 1;
    } elseif ($pagenum > $last) {
        $pagenum = $last;
    }

    $lower_limit = ($pagenum - 1) * $page_limit;
    $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;

    $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";

    $stmt = $DB->prepare($sql2);

    if ($keyword != "") {
        $stmt->bindValue(":keyword", $keyword . "%");
    }

    $stmt->execute();

    //$results = $stmt->fetchAll();
    while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
        $res = new Resultats(
            $row['prenom'],
            $row['nom'],
            $row['mobile'],
            $row['email']
        );
        $results[] = $res;
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
/*******PAGINATION CODE ENDS*****************/
?>
<div class="row">
<?php if ($ERROR_MSG != "") {?>
    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
      <button data-dismiss="alert" class="close" type="button">×</button>
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php }?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Votre formulaire de contact</h3>
    </div>
    <div class="panel-body">

      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
        <form action="index2.php" method="get" >
        <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
          <span class="pull-left">
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="rechercher le prénom" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>
          <button class="btn btn-info">search</button>
        </div>
        </form>
        <div class="pull-right" ><a href="contacts.php"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Ajouter un contact</button></a></div>
      </div>

      <div class="clearfix"></div>
<?php if (count($results) > 0) {?>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered ">
            <tbody><tr>
                <th>Photo</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Action</th>

              </tr>
  <?php foreach ($results as $res) {?>
                <tr>
                  <td style="text-align: center;">
                <?php $pic = ($row["profile_pic"] != "") ? $row["profile_pic"] : "no_avatar.png"?>
                    <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a>
                  </td>
                  <td><?=$res->getPrenom()?></td>
                  <td><?=$res->getNom()?></td>
                  <td><?=$res->getMobile()?></td>
                  <td><?=$res->getEmail()?></td>
                  <td>
                    <a href="view_contacts.php?cid=<?php echo $row["id_contact"]; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> Voir</button></a>&nbsp;
                    <a href="contacts.php?m=update&cid=<?php echo $row["id_contact"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Modifier</button></a>&nbsp;
                    <a href="process_form.php?mode=delete&cid=<?php echo $row["id_contact"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Supprimer</button></a>&nbsp;
                  </td>
                </tr>
  <?php }?>
            </tbody></table>
        </div>
        <div class="col-lg-12 center">
          <ul class="pagination pagination-sm">
  <?php
//Show page links
    for ($i = 1; $i <= $last; $i++) {
        if ($i == $pagenum) {
            ?>
                <li class="active"><a href="javascript:void(0);" ><?php echo $i ?></a></li>
                <?php
} else {
            ?>
                <li><a href="index2.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                <?php
}




    }
    ?>
          </ul>
        </div>

          <?php } else {?>
        <div class="well well-lg">Aucun contact trouvé</div>
<?php }?>
    </div>
  </div>
</div>
      <?php
include 'footer.php';
?>