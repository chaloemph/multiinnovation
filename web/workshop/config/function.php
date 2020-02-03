<?php
    function pathname()
    {
      $path = pathinfo($_SERVER['PHP_SELF']);
      return  $path["basename"];
    }

    function filename()
    {
      $path = pathinfo($_SERVER['PHP_SELF']);
      $path =  explode(".", $path["basename"])[0];
      return $path;
    }
  
    function activeclass_sidebar($pathname)
    {
      $path = pathinfo($_SERVER['PHP_SELF']);
      return  ($path["basename"] == $pathname)? 'active':'';
    }
?>