<?php

namespace App\Service\Avatar;
use App\Service\Tools\ColorTools;

class SvgAvatarFactory {

    static public function getAvatar(int $nbcolors, int $size) {
        $matrix = new AvatarMatrix();
        $matrix->setColors(ColorTools::getRandomColors($nbcolors));
        $matrix->setSize($size);

        $svgAvatarRenderer = new SvgAvatarRenderer('templates/avatar.svg.tpl');

        $svg = $svgAvatarRenderer->render($matrix);

        return $svg;
    }
}