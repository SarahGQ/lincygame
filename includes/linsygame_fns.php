<?php
function reset_var()//Try again.
{
}

function get_text_color($color) {
$c = str_replace('#','',$color);
$rgb[0] = hexdec(substr($c,0,2));
$rgb[1] = hexdec(substr($c,2,2));
$rgb[2] = hexdec(substr($c,4,2));
if ($rgb[0]+$rgb[1]+$rgb[2]<382) {
return '#fff';
} else {
return '#000';
}
}

function draw_grid($level,$color){
$xpos=rand(1,$level);
$ypos=rand(1,$level);
$selected=false;
for ($i = 1; $i <= $level; $i++) {?>
     <tr>
<?php
for ($j = 1; $j <= $level; $j++) {
?>
    <td id="td<?php echo $i; echo $j;?>" onclick="window.location='check.php?x=<?php echo $i;?>&y=<?php echo $j;?>'">&nbsp;        
 <?php if ($level==1){
echo "<h1 style='color:".get_text_color($color).";'>Sígueme... si puedes</h1><h3 style='color:".get_text_color($color).";'>Toca mi color</h3>";}?>
</td>
<?php
}?>
</tr>
         <?php
}
$_SESSION["fail"]=true;
}
function session_set(){
    if ((!isset($_SESSION["color"])) or ($_SESSION["urlvalid"]==false) or (!isset($_SESSION["level"]))) {
    $_SESSION["color"] = strtoupper(dechex(rand(0,10000000))); //Select rand color for play.
    $_SESSION["lifes"]=3;
    $_SESSION["level"]=1;
}
if (!isset($_SESSION["performance"])){
$_SESSION["performance"]=0;
}
if (!isset($_SESSION["prevlevel"])){
    $_SESSION["prevlevel"]=1;
}
    //$_SESSION["success"]=false; //Reinicia la pantalla del nivel.

}
?>
