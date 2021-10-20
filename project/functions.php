<?php

if(!function_exists('mysqli_result'))
{
  function mysqli_result($source, $row, $column = 0)
  {
    $source ->data_seek($row);
    $datarow = $source->fetch_array();
    return $datarow[$column];
  }
}

?>
