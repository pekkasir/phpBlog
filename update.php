<?php
include_once('res/Database.php');
include_once('res/func.php');

// UPDATE TITLE

if(isset($_POST['title']) && isset($_POST['id'])) {
  $title = trim($_POST['title']);
  $id = $_POST['id'];

  try {
    $update = "UPDATE posts SET title = :title WHERE id = :id";
    $stmt = $db->prepare($update);
    $stmt->execute(array(":title" => $title, ":id" => $id));

    if($stmt->rowCount() == 1) {
      echo showMessage("Title updated successfully!", "Success");
    } else {
      "Title is not updated!";
    }
  } catch(PDOException $e) {
    echo "An erro occurred " . $e->getMessage();
  }

  // UPDATE AUTHOR

} elseif(isset($_POST['author']) && isset($_POST['id'])) {
  $author = trim($_POST['author']);
  $id = $_POST['id'];

  try {
    $update = "UPDATE posts SET author = :author WHERE id = :id";
    $stmt = $db->prepare($update);
    $stmt->execute(array(":author" => $author, ":id" => $id));

    if($stmt->rowCount() == 1) {
      echo showMessage("Author updated successfully!", "Success");
    } else {
      "Author is not updated!";
    }
  } catch(PDOException $e) {
    echo "An erro occurred " . $e->getMessage();
  }

  // UPDATE BODY

} elseif(isset($_POST['body']) && isset($_POST['id'])) {
  $body = trim($_POST['body']);
  $id = $_POST['id'];

  try {
    $update = "UPDATE posts SET body = :body WHERE id = :id";
    $stmt = $db->prepare($update);
    $stmt->execute(array(":body" => $body, ":id" => $id));

    if($stmt->rowCount() == 1) {
      echo showMessage("Body updated successfully!", "Success");
    } else {
      "Body is not updated!";
    }
  } catch(PDOException $e) {
    echo "An erro occurred " . $e->getMessage();
  }
}
