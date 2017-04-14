<?php 
function imagecreatefromfile($flotaImage) {
$flotaMime = getimagesize($flotaImage);
$flotaMime = $flotaMime['mime'];
switch($flotaMime){
case 'image/png':
$image = imagecreatefrompng($flotaImage);
break;
case 'image/jpeg':
$image = imagecreatefromjpeg($flotaImage);
break;
case 'image/gif':
$image = imagecreatefromgif($flotaImage);
break;
default:
die("Archivo no soportado");
}
return $image;
}
function waterMark($flotaDst,$flotaSrc,$flotaPos=4) { //imagen limpia, marca de agua, tipo de posision de dicha marca
$flotaDst = str_replace("scuanck", "/", $flotaDst);
if(!in_array($flotaPos,array('0','1','2','3','4','repeat'))) die('Wrong position');
$fileSize=getimagesize($flotaDst);
$mimes=array('image/png','image/jpeg','image/gif');
if(is_file($flotaDst)&&in_array($fileSize['mime'],$mimes)) {
$cleanImage=imagecreatefromfile($flotaDst);
$water=imagecreatefrompng($flotaSrc);
imagealphablending($water,true);
imagesavealpha($water,true);
$filesSize=array(
'clean'=>array(
imagesx($cleanImage),
imagesy($cleanImage)
),
'water'=>array(
imagesx($water),
imagesy($water)
)
);
$position = array(
array(0,0),
array(0,$filesSize['clean'][1]-$filesSize['water'][1]),
array($filesSize['clean'][0]-$filesSize['water'][0],0),
array($filesSize['clean'][0]-$filesSize['water'][0],$filesSize['clean'][1]-$filesSize['water'][1]),
array(($filesSize['clean'][0]-$filesSize['water'][0])/2,($filesSize['clean'][1]-$filesSize['water'][1])/2)
);
if(is_numeric($flotaPos)) {
imagecopy($cleanImage,$water,$position[$flotaPos][0],$position[$flotaPos][1],0,0,$filesSize['water'][0],$filesSize['water'][1]);
} elseif($flotaPos=='repeat') {
$repeat=array(
'x'=>ceil($filesSize['clean'][0]/$filesSize['water'][0]),
'y'=>ceil($filesSize['clean'][1]/$filesSize['water'][1])
);
for($x=1;$x<=$repeat['x'];$x++) {
for($y=1;$y<=$repeat['y'];$y++) {
imagecopy($cleanImage,$water,(($x-1)*$filesSize['water'][0]),(($y-1)*$filesSize['water'][1]),0,0,$filesSize['water'][0],$filesSize['water'][1]);
}
}
}
header("Content-type: image/jpeg");
imagejpeg($cleanImage,false,90);
imagedestroy($cleanImage);
imagedestroy($water);
}
}
$file=(isset($_GET['f'])&&!empty($_GET['f']))?str_replace(array('..','/'),'scuanck',$_GET['f']):'index.jpeg';
waterMark($file,'marca-de-agua.png');
?>