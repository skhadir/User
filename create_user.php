<?php

include "vendor/autoload.php";
use App\Model\UserModel;
use App\Service\Avatar\SvgAvatarFactory;
use App\Service\Helpers\FileSystemHelper;

if(!empty($_POST)){

    $svg = SvgAvatarFactory::getAvatar(12,15);
    $filename = sha1(uniqid(rand(),true)). '.svg';
    $fs = new FileSystemHelper();
    $fs->write('uploads/avatars/'. $filename, $svg);

    $userModel = new UserModel();
    $userModel ->createAccount($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $filename);


}






include 'create_user.phtml';