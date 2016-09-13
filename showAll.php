<?php include("inc/header.php"); ?>

<div class="container">

  <div class="posts">
    <div class="info"></div>
    <?php
      if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = "";
      }
      getPoststable($db);

    ?>
  </div>
</div>

<?php include("inc/footer.php"); ?>
