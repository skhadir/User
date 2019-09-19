<?php

use App\Avatar\SvgAvatarFactory;
use App\Helpers\FileSystemHelper;

include 'vendor/autoload.php';


//$colorTools = new ColorTools();
//$colors = ColorTools::getRandomColors(21);

$svg = SvgAvatarFactory::getAvatar(12,15);
$filename = sha1(uniqid(rand(),true));
$fs = new FileSystemHelper();
$fs->write('uploads/avatars/'. $filename . '.svg', $svg);



include 'templates/index.phtml';

//include 'AvatarMatrix.php';
//include 'SvgAvatarRenderer.php';
//include 'ColorTools.php';
//
//$matrix = new AvatarMatrix;
//$matrix->setSize(4);
//$matrix->setColors($colors);
//$matrix->Create();
//$result=$matrix->getMatrix();
//$svgAvatarRenderer = new SvgAvatarRenderer('avatar.svg.tpl');
//$svg = $svgAvatarRenderer->render($matrix);
//$colorTools = new ColorTools();
//$colors = $colorTools->getRandomColors();
//
//echo '<pre>';
//var_dump($svg);
//echo '</pre>';
//
//echo '<pre>';
//var_dump($result);
//echo '</pre>';
//
//function randomColor() {
//    $chars = str_split('ABCDEF0123456789');
//    $color = '#';
//    for($i=0; $i < 6;$i++){
//        $color .=$chars[rand(0,count($chars)-1)];
//    }
//    return $color;
//}
//
//$taille = 20;
//$colors = [];
//
//$nbColors = 2;
//
//for($i=0; $i < $nbColors; $i++){
//    $colors[] = randomColor();
//}
//
//$avatar = [];
//
//for($i=0; $i<$taille; $i++) {
//    
//    $avatar[$i]=[];
//    
//    for($g=0; $g<$taille/2; $g++){
//        
//        $color = $colors[rand(0, count($colors) - 1)];
//        $avatar[$i][$g]= $color;
//        $avatar[$i][$taille-1-$g]= $color;
//    }
//}
//
////foreach($avatar as $ligne) {
////    foreach($ligne as $case) {
////        echo '
////              <rect x="0" y="0" width="100" height="100" fill="'.$case.'"></rect>
////              ';
////    }
////}

//
//
//


//include 'index.phtml';