<?php

function pwdMatch($password, $password_2)
{
  $result;
    if ($password !== $password_2)
    {
      $result = true;
    }
      else
      {
        $result = false;
      }
  return $result;
}

?>
