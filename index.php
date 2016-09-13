<?php include("inc/header.php"); ?>

<div class="container">

  <div class="posts">
    <?php
      if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = "";
      }
      getPosts($db);
    ?>
  </div>
</div>

<?php include("inc/footer.php"); ?>
