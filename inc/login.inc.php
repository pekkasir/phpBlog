<?php
if(isset($_POST['loginBtn'])) {

  $errors = array();
  $required_fields = array("username", "password");
  $errors = array_merge($errors, check_empty_fields($required_fields));

  if(empty($errors)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE BINARY username = :username";

    $stmt = $db->prepare($query);
    $stmt->execute(array(":username" => $username));

    while($row = $stmt->fetch()) {
      $id = $row['id'];
      $hashed_password = $row['password'];
      $username = $row['username'];

      if(password_verify($password, $hashed_password)) {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        //$msg = flashMessage("You are logged in succesfully!", "Success");
        header("Location: index.php");
      } else {
        $msg = showMessage("Invalid username or password", "Fail");
      }
    }
    $msg = showMessage("Invalid username or password", "Fail");
  }
}
