<link rel="stylesheet" href="css/style.css" type="text/css">
<?php
  $pageTitle = 'View Images';

  echo '<header>';
  include './include/globalheader.php';
  echo '</header>';
  require "database.php";
  $stmt = $conn->prepare('select * from imagestest');
  $stmt->execute();
  $imagelist = $stmt->fetchAll();
?>
  <section class="view-masthead">
    <div>
      <h1>View Images</h1>
    </div>
  </section>
  <section class="image-row row">
<?php
  foreach($imagelist as $image) {
 ?>
    <div class="col-sm-12 col-md-3 col-lg-3"> 
      <img class = "viewimage" src="<?=$image['image']?>" title="<?=$image['name'] ?>" class="img-fluid">
      <p><?php echo $image["name"]; ?></p>
    </div>
<?php
}
?>
  </section>
  <footer>
<?php include './include/globalfooter.php'; ?>
</footer>
