<?php
  include("inc/header.php");
  include("inc/create.inc.php");
  if(!isset($_SESSION['username']))
    header("Location:index.php");
?>
<div class="container">
  <div class="col col-md-7 newPost">
    <h2>Create a New Post</h2><hr>
    <?php
      if(isset($msg)) echo $msg;
      if(!empty($errors)) echo show_errors($errors);
    ?>
    <form class="" action="newPost.php" method="post">
      <div class="form-group">
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title">
      </div>
      <div class="form-group">
        <label for="author">Author:</label>
        <input class="form-control" type="text" name="author" id="author">
      </div>
      <div class="form-group">
        <label for="body">Body:</label>
        <textarea class="form-control" rows=10 id="body" name="body"></textarea>
        <script>CKEDITOR.replace("body");</script>
      </div>
      <div class="form-group">
        <button class="btn btn-primary pull-right" name="createBtn">Create Post</button>
      </div>
    </form>
  </div>
</div>

<?php include("inc/footer.php"); ?>
