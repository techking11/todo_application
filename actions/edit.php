<?php
require_once '../helpers/config.php';

$sql = "SELECT * FROM posts WHERE post_id=:post_id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':post_id', $_GET['id']);
$stmt->execute();
$res = $stmt->fetch();

if(!empty($_POST)) :

  $title = htmlspecialchars($_POST['title']);
  $desc = htmlspecialchars($_POST['desc']);
  $post_id = htmlspecialchars($_POST['post_id']);

  $sql = "UPDATE posts SET title=:title, description=:desc WHERE post_id=:post_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':title', $title);
  $stmt->bindValue(':desc', $desc);
  $stmt->bindValue(':post_id', $post_id);
  $stmt->execute();
  header("location: ../index.php");

endif;

$bootstrap = "../css/bootstrap.min.css";
$logo = "../img/techking.ico";
$style = "../css/style.css";
$title= "ToDo Edit App";
require_once "../helpers/header.php"; 

?>
  <div class="container mt-3">
    <div class="card-body">
      <h4 class="text-success text-center">ToDo Edit Blog</h4>
      <form action="edit.php" method="post" class="form">
        <input type="hidden" name="post_id" value="<?= htmlspecialchars($res->post_id); ?>">

        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" id="" class="form-control" value="<?= htmlspecialchars($res->title); ?>" required>
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="desc" id="" cols="30" rows="10" class="form-control" required><?= htmlspecialchars($res->description); ?></textarea>
        </div>

        <div class="button-group">
          <input type="submit" value="Edit" class="btn btn-primary">
          <a href="../index.php" type="button" class="btn btn-secondary">Back</a>
        </div>
        
      </form>
    </div>
  </div>
</body>
</html>