<?php
include_once("inc/header.php");
include_once("inc/login.inc.php");
?>

<div class="container">

  <div class="col col-md-7 login">
    <h2>Login Form</h2><hr>
    <?php
      if(isset($msg)) echo $msg;
      if(!empty($errors)) echo show_errors($errors);
    ?>
    <form class="" action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" id="username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" id="password">
      </div>
      <div class="form-group">
        <button class="btn btn-primary pull-right" name="loginBtn">Login</button>
      </div>
    </form>
  </div>
</div>

<?php include("inc/footer.php"); ?>
