<?php

// Get All Data from table
function getALL($tbl, $columns) { // getAll('tbl', [col1, col2])
  global $db;
  $cols = bindCols(...$columns);
  try {
    $sql = "SELECT $cols FROM $tbl ORDER BY id DESC;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    return $res;
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

// Get Data from Table
function get($tbl, $columns, $id) { // select(tbl, [col1, col2], id)
  global $db;
  $cols = bindCols(...$columns);
  try {
    $sql = "SELECT $cols FROM $tbl WHERE id=$id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

// Create Data To Table
function insert($tbl, $cols_vals, $data) {// insert(tbl, [col1, col2], [col1 => val1])
  global $db;                              
  $cols = bindCols(...$cols_vals);
  $vals = bindVals(...$cols_vals);
  try {
    $sql = "INSERT INTO $tbl ($cols) VALUES ($vals);";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

// Edit Data from Table
function edit($tbl, $columns_values, $data, $id) {//edit(tbl,[col1],[col1=>val1],id)
  global $db;                                      
  $cols_vals = bindColsVals(...$columns_values);
  try {
    $sql = "UPDATE $tbl SET $cols_vals WHERE id=$id;";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
  } catch (Exception $e) {
    return $e->getMessage();
  }
}


// Delete Data from table
function delete($tbl, $id) { // delete(tbl, id)
  global $db;
  try {
    $sql = "DELETE FROM $tbl WHERE id=$id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
  } catch (Exception $e) {
    return $e->getMessage();
  }
}


// Delete All Data from Table
function deleteAll($tbl) { // deleteAll(tbl)
  global $db;
  try {
    $sql = "DELETE FROM $tbl;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

?>