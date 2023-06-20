<?php

require_once '../helpers/config.php';

$sql = "DELETE FROM posts WHERE post_id=:postId";
$stmt = $db->prepare($sql);
$stmt->bindValue(':postId', $_GET['id']);
$stmt->execute();

header("location: ../index.php");