<?php
require_once("includes/linsygame_fns.php");
session_start();
//session_set();
 if ((!isset($_SESSION["color"])) or ($_SESSION["urlvalid"]==false) or (!isset($_SESSION["level"]))) {
    $_SESSION["color"] = "rgb(".mt_rand(0,250).",".mt_rand(0,250).",".mt_rand(0,250).")"; //Select rand color for play.
    $_SESSION["lifes"]=3;
    $_SESSION["level"]=1;
    $_SESSION["prevlevel"]=0;
}
if (!isset($_SESSION["performance"])){
$_SESSION["performance"]=0;
}
if (!isset($_SESSION["prevlevel"])){
    $_SESSION["prevlevel"]=0;
}
    //$_SESSION["success"]=false; //Reinicia la pantalla del nivel.
$color = $_SESSION["color"];
$level = $_SESSION["level"];
$performance=$_SESSION["performance"];
$lifes = $_SESSION["lifes"];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lincy Game</title>

    <!-- Bootstrap stylesheet-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Custom Styles-->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style media="screen" type="text/css">
      <?php
$xpos=rand(1,$level);
$ypos=rand(1,$level);
$_SESSION["x"]= $xpos;//Set color position
$_SESSION["y"]= $ypos;//Set color position
//$selected=false;
for ($i = 1; $i <= $level; $i++) {
  for ($j = 1; $j <= $level; $j++) {
if ($i==$xpos and $j==$ypos){
$bgcolor = $color;    
} else {
    
$bgcolor="rgb(".mt_rand(0,250).",".mt_rand(0,250).",".mt_rand(0,250).")";//str_pad(dechex(rand(0,16777215)),6,"F", STR_PAD_LEFT);//dechex(rand( 0, 0xFFFFFF )); //$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; //$random_color = sprintf("%02x%02x%02x", mt_rand(0x22, 0xaa), mt_rand(0x22, 0xaa), mt_rand(0x22, 0xaa));//strtoupper(dechex(rand(0,10000000)));
}
echo "#td".$i.$j."{ background-color: ".$bgcolor.";}";
}
}?>
</style>
  </head>
  <body > 
      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
       <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lincy Game</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#how">Cómo jugar</a></li>
            <li><a href="#about">Sobre este juego</a></li>
            <li><a href="#contact">Contacto</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  <div class="container">
    <div class="inner">
      
        <table class="display-box" style="width:100%; height:80%;">
        <?php if($lifes>0){ //Draw new grid.
      draw_grid($level,$color);    ?>
            </table>
            <!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                 <h4 class="modal-title" id="memberModalLabel">Ouch!</h4>
            </div>
            <div class="modal-body">
                <p class="lead text-center">Te quedan <i class="fa fa-heart red"></i>
            <?php echo $lifes?> intentos.</p>
                <p class="lead text-center">¡Vamos de nuevo con el <button type="button" class="btn btn-default" data-dismiss="modal">Nivel <?php echo $level;?>! </button></p>
            </div>
        </div>
    </div>
</div> <!--modal end-->
        <?php 
} else {?>
            <tr>
    <td bgcolor="#<?php echo $color?>">        
 <h1 style="color:<?php echo get_text_color($color);?>">GAME OVER! <a href="index.php" class="btn btn-primary" role="button">Intentar de nuevo!</a></h1>
        <h2 style="color:<?php echo get_text_color($color);?>">Comparte tu mejor puntaje: <a href="https://twitter.com/share" class="twitter-share-button"{count} data-text="Logré anotar <?php echo $performance;?>% en LincyGame, un juego online de memoria visual." data-size="large" data-hashtags="LincyGame">Tweet</a></h2>
</td>
            </tr>
        <?php $_SESSION["lifes"]=3;
        "rgb(".mt_rand(0,250).",".mt_rand(0,250).",".mt_rand(0,250).")"; //Select rand color for play.
    $_SESSION["level"]=1;?></table><?php }?>
        
           <div class="container"> 
    <div class="row padding player-box">
        <div class="col-md-3">
    <p style="color:#fff;"><i class="fa fa-heart red"></i>
            <?php echo $lifes?><?php if($level==$_SESSION["prevlevel"]){?>
              <?php if($lifes<3){?>&nbsp; Intenta de nuevo! Tu color: <?php } ?><i class="fa fa-stop fa" style="color:<?php echo $color;?>;"></i>
        <?php }?></p>
        </div>
        <div class="col-md-6">
            <p style="color:#fff">Tu mejor puntaje:</p> 
      <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $performance?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $performance?>%;">
                      
                      <?php echo $performance?>% Completo
                  </div>
            </div></div>
        <div class="col-md-3">
            <a href="https://twitter.com/share" class="twitter-share-button" data-text="I scored <?php echo $performance;?>% at LincyGame, a free visual memory game." data-size="large" data-hashtags="LincyGame">Tweet</a>
            
        </div> 
        
        
          
      </div>
        <div class="row">
            <div class="col-md-12">
                        <div class="panel panel-primary">
  <div class="panel-heading">
      <h3 class="panel-title"><a id="how"></a>¿Cómo jugar?</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li class="lead">El objetivo es seguir un determinado color, dado arbitrariamente al comienzo del juego, a través de diversas grillas sucesivas que se van mostrando en la pantalla. </li>
        <li class="lead">Para seguir el color es suficiente que hagas click o toques el casillero que corresponda. </li>
    <li class="lead">Si fallas, vuelves al nivel anterior.</li>
    <li class="lead">Tienes 3 intentos por jugada. </li>
      </ul>
      <p class="lead">Si alcanzas más del 80%, puedes considerarte pariente de <a href="https://en.wikipedia.org/wiki/Lynceus_%28Argonaut%29" target="_blank">Linceo</a></p>
  </div>
</div>
                <div class="panel panel-primary">
  <div class="panel-heading">
      <h3 class="panel-title"><a id="about"></a>Sobre Lincy Game</h3>
  </div>
  <div class="panel-body">
      <p class="lead" style="color:#333">Creado y desarrollado por Sarah Pendino (sarah.pendino@gmail.com) en enero de 2016. Inspirada en el <a href="https://en.wikipedia.org/wiki/Four_color_theorem" target="_blank">Teorema de los cuatro colores</a> y el juego <a href="https://gabrielecirulli.github.io/2048/" target="_blank">2048</a></p>
  </div>
</div>
                    </div>
           
      </div>
      
         </div>
      
       
      </div>
</div>
<?php $_SESSION["urlvalid"]=false;?>  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   <?php if ($_SESSION["level"]>0 and $_SESSION["level"]==$_SESSION["prevlevel"]){?>
      <script>
        $(document).ready(function () {

    $('#memberModal').modal('show');

});
      </script><?php }?>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  </body>
</html>
<?php
?>
