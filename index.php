<?php
require_once "helpers/config.php";
require_once "helpers/bindData.php";
require_once "models/postModel.php";
require_once "controllers/postController.php";

// Bind StyleSheet Link && title
$bootstrap = "css/bootstrap.min.css";
$logo = "img/techking.ico";
$style = "css/style.css";
$title= "ToDo Blog App";
require_once "helpers/header.php";

$res = showAllData();
?>
  <div class="container mt-5">
    <h4 class="text-success text-center">ToDo Blog App</h4>
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
          <h5 class="text-secondary">Blog Data Lists</h5>
          <a href="actions/create.php" type="button" class="btn btn-sm btn-success mb-1">New Post</a>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th>Title</th>
              <th>Description</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach($res as $data): ?>          
            <tr>
              <td class="text-center"><?= htmlspecialchars($i); ?></td>
              <td><?= htmlspecialchars($data->title); ?></td>
              <td><?= htmlspecialchars(substr($data->description, 0, 30)."..."); ?></td>
              <td><?= htmlspecialchars(date('d/m/Y', strtotime($data->created_at))); ?></td>
              <td>
                <a href="actions/view.php?id=<?= htmlspecialchars($data->post_id); ?>" type="button" class="btn btn-sm btn-info">View</a>
                <a href="actions/edit.php?id=<?= htmlspecialchars($data->post_id); ?>" type="button" class="btn btn-sm btn-warning">Edit</a>
                <a href="actions/delete.php?id=<?= htmlspecialchars($data->post_id); ?>" type="button" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>