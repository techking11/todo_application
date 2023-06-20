<?php

function showAllData() {
  try {
    $dataList = getAll('posts', [
      'id', 'title', 'description', 'post_id', 'created_at'
    ]);
    return $dataList;
  } catch(Exception $e) {
    return $e->getMessage();
  }
}

?>