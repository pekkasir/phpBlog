<?php
//include_once("res/Database.php");

function getPosts($db) {

  try {
    $query = "SELECT * FROM posts ORDER BY id DESC";
    $stmt = $db->query($query);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $text = shortenText($row['body'], 15);
      $out = <<<EOT
      <div class="post">
      <h2>$row[title]</h2>
      <span class="meta">$row[created_at] | $row[author]</span>
      <p class="content">$text</p>
      <a href="post.php?id=$row[id]">Read More</a>
      </div>
EOT;
  echo $out;
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

function getPostsTable($db) {
  try{
    $query = "SELECT * FROM posts ORDER BY id DESC";
    $stmt = $db->query($query);
    $out = "<h3>Edit Posts</h3><hr><table class='table table-striped'>
      <thead><th>ID</th><th>Author</th><th>Title</th><th>Body</th><th>Remove</th></thead><tbody>";
    while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
      //$out .= "<tr><td>$row->id</td></tr>";
      //$text = shortenText($row->body, 15);
      $out .= <<<EOT
      <tr>
        <td>$row->id</td>
        <td title='Click to edit' class='editable' contenteditable='true'
        onblur='updateAuthor(this, $row->id)'>$row->author</td>
        <td title='Click to edit' class='editable' contenteditable='true'
        onblur='updateTitle(this, $row->id)'>$row->title</td>
        <td title='Click to edit' class='editable' contenteditable='true'
        onblur='updateBody(this, $row->id)'>$row->body</td>
        <td>
          <button class="btn btn-danger" onclick='deletePost($row->id)'><span class="glyphicon glyphicon-remove"></span></button>
        </td>
      </tr>
EOT;
  }
    $out .= "</tbody></table>";
    echo $out;

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

function post($db, $id) {
  $query = "SELECT * FROM posts WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->execute(array(":id" => $id));
  $rs = $stmt->fetch(PDO::FETCH_OBJ);
  $out = <<<EOT
  <div class="post">
  <h2>$rs->title</h2>
  <span class="meta">$rs->created_at | $rs->author</span>
  <p class="content">$rs->body</p>
  <a href="index.php">Back</a>
  </div>
EOT;
echo $out;
}

function shortenText($text, $len) {
  if(strlen($text) > $len) {
    //$words = str_word_count($text, 2);
    //$pos = array_keys($words);
    $text = substr($text, 0, $len) . '...';
  }
  return $text;
}

function check_empty_fields($required_fields) {
  $errors = array();

  foreach($required_fields as $field) {
    if(!isset($_POST[$field]) || $_POST[$field] == NULL) {
      $errors[] = $field . " is a required field";
    }
  }
  return $errors;
}

function show_errors($form_errors) {
  $errors = "<div class='alert alert-danger'><ul>";
  foreach($form_errors as $error) {
    $errors .= "<li>$error</li>";
  }
  $errors .= "</ul></div>";
  return $errors;
}

function showMessage($message, $status = "Fail") {
  if($status === "Success") {
    $data = "<div class='alert alert-success'>$message</div>";
  } else {
    $data = "<div class='alert alert-danger'>$message</div>";
  }

  return $data;
}
