<?php
require_once '../helpers/config.php';

if(!empty($_POST)):

  $title = htmlspecialchars($_POST['title']);
  $desc = htmlspecialchars($_POST['desc']);
  $postId = sha1(rand(1, 1000).time());

  $sql = "INSERT INTO posts (title, description, post_id) VALUES (:title, :desc, :postId);";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':title', $title);
  $stmt->bindValue(':desc', $desc);
  $stmt->bindValue(':postId', $postId);
  $res = $stmt->execute();

endif;

$bootstrap = "../css/bootstrap.min.css";
$logo = "../img/techking.ico";
$style = "../css/style.css";
$title= "ToDo Create App";
require_once "../helpers/header.php";

?>
  <div class="container mt-3">
    <div class="card-body">
      <h4 class="text-success text-center mb-0">ToDo Create Blog</h4>
      <form action="create.php" method="post" class="form">
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" id="" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="desc" id="" cols="30" rows="10" class="form-control" required></textarea>
        </div>

        <div class="button-group">
          <input type="submit" value="Create" class="btn btn-primary">
          <a href="../index.php" type="button" class="btn btn-secondary">Back</a>
        </div>
        
      </form>
    </div>
  </div>
</body>
</html>