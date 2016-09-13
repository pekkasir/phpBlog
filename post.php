<?php include("inc/header.php"); ?>

<div class="container">

  <div class="posts">
    <?php
    if(isset($_GET['id'])) {
      post($db, $_GET['id']);
    } else {
      echo "Postausta ei löytynyt!";
    }
    ?>
  </div>
</div>

<?php include("inc/footer.php"); ?>
