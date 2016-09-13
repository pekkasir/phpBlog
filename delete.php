<?php
include_once("res/Database.php");
include_once("res/func.php");

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  try {
    $delete = "DELETE FROM posts WHERE id = :id";
    $stmt = $db->prepare($delete);
    $stmt->execute(array(":id" => $id));
    if($stmt) {
      echo showMessage("Post deleted successfully!", "Success");
    }
  } catch(PDOException $e) {
    echo "An error occurred " . $e->getMessage();
  }
}
