<?php
if(!isset($_SESSION['username'])) {
  header("Location: ../index.php");
} else {
  if(isset($_POST['createBtn'])) {

    $errors = array();
    $required_fields = array("title", "author", "body");
    $errors = array_merge($errors, check_empty_fields($required_fields));

    if(empty($errors)) {
      $title = $_POST['title'];
      $author = $_POST['author'];
      $body = $_POST['body'];
      $query = "INSERT INTO posts(title, author, created_at, body)
                VALUES(:title, :author, now(), :body)";

      $stmt = $db->prepare($query);
      $rs = $stmt->execute(array(":title" => $title,
                           ":author" => $author,
                           ":body" => $body));
      if($rs) {
        $_SESSION['msg']= showMessage("A new post created successfully!", "Success");
        header("Location: index.php");
      }
    }
  }
}
