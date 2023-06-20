<?php

// SQL Columns Bind Data
function bindCols(...$columns) {
  $col = "";
  try {
    for($i = 0; $i < count($columns); $i++):
      if($i === count($columns) - 1):
        $col .= $columns[$i];
      else:
        $col .= $columns[$i].", ";
      endif;
    endfor;
    return $col;
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

// SQL Values Bind Data
function bindVals(...$values) {
  $val = "";
  for($i = 0; $i < count($values); $i++):
    if($i === count($values) - 1):
      $val .= ':'.$values[$i];
    else:
      $val .= ':'.$values[$i].", ";
    endif;
  endfor;
  return $val;
}

// SQL Columns and Values Data
function bindColsVals(...$cols_vals) {
  $col_val = "";
  for($i = 0; $i < count($cols_vals); $i++):
    if($i === count($cols_vals) - 1):
      $col_val .= $cols_vals[$i]."=:".$cols_vals[$i];
    else:
      $col_val .= $cols_vals[$i]."=:".$cols_vals[$i].", ";
    endif;
  endfor;
  return $col_val;
}

?>