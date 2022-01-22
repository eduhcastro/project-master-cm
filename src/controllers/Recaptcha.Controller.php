<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite RECAPTCHA 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMRecaptcha;

class Recaptcha
{


  public function verify($token, $type = "V2")
  {
    if($type == "V2"){
    $Content = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_SECRET . "&response=" . $token . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    return strpos($Content, 'true');
    }
    $Content = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_SECRETV3 . "&response=" . $token . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    return strpos($Content, 'true');
  }
}
