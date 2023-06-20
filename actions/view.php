<?php

require_once "../helpers/config.php";

$sql = "SELECT * FROM posts WHERE post_id=:post_id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':post_id', $_GET['id']);
$stmt->execute();
$res = $stmt->fetch();

$bootstrap = "../css/bootstrap.min.css";
$logo = "../img/techking.ico";
$style = "../css/style.css";
$title= "ToDo View App";
require_once "../helpers/header.php";

?>
  <div class="container mt-5">
    <h4 class="text-center mb-3 text-success">ToDo View Blog</h4>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h5 class="text-secondary"><?= htmlspecialchars($res->title); ?></h5>
          <small class="mt-3 text-secondary"><?= htmlspecialchars(date('d/m/Y', strtotime($res->created_at))); ?></small>
        </div>
        <p class="my-3 text-dark"><?= htmlspecialchars($res->description); ?></p>
        <a href="../index.php" type="button" class="btn btn-sm btn-secondary">Back Home</a>
      </div>
    </div>
  </div>
</body>
</html>