<?php
  // include security image class
  require('mkimg-class.inc.php');
   
  // get parameters
  isset($_GET['width']) ? $iWidth = (int)$_GET['width'] : $iWidth = 150;
  isset($_GET['height']) ? $iHeight = (int)$_GET['height'] : $iHeight = 30;
  // create new image
  $oSecurityImage = new SecurityImage($iWidth, $iHeight);
  $oSecurityImage->GenerateCode();
  // assign corresponding code to cookie
  // for checking against user entered value
  $a = setcookie("wpcfmd", serialize(md5($oSecurityImage->GetCode())), time()+60*10, '/'); 
  if ($oSecurityImage->Create(0)) {
  } else {
     echo 'Image GIF library is not installed.';
  }
?>