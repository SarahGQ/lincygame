<?php
session_start();
if (isset($_SESSION["color"]) and isset($_SESSION["level"]) and isset($_GET["x"]) and isset($_GET["y"])) {
    $_SESSION["urlvalid"]=true; //Only form check.php, else reset.
  if (($_SESSION["x"]==$_GET["x"]) and ($_SESSION["y"]==$_GET["y"])) {
    $_SESSION["prevlevel"]=$_SESSION["level"];
      $progress=($_SESSION["level"]*100)/25;
if ($progress>$_SESSION["performance"]){
    $_SESSION["performance"]= $progress;
}
    $_SESSION["level"]=$_SESSION["level"]+1;

    header('Location: index.php');
  } else { //If player fail.
    $_SESSION["level"]=$_SESSION["prevlevel"];
    $_SESSION["lifes"]=$_SESSION["lifes"]-1;
        header('Location: index.php');

    }
} else {
session_unset();
header('Location: index.php');
}

?>

